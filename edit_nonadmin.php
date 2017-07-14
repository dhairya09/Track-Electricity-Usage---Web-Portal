<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$nonadmin = find_nonadmin_by_id($_GET["id"]);
if(!$nonadmin){
  redirect_to("Manage_nonadmin.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("username", "password");
  validate_presences($required_fields);

  $fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);

  if(empty($errors)){
    $id = $nonadmin["id"];
    $username =  mysql_prep($_POST["username"]);
    $hashed_password =  password_encrypt($_POST["password"]);



    $query = "UPDATE nonadmin ";
    $query.= "SET ";
    $query.= "username = '{$username}', ";
    $query.= "hashed_password = '{$hashed_password}' ";
    $query.= "WHERE ";
    $query.= "id = $id ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "Non-Admin Updated";
        redirect_to("Manage_nonadmin.php");
    }
    else{
        $_SESSION["message"] = "Non-Admin Update Failed";
    }
  }



}



 ?>

<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>
  <h2>Edit Non-Admin <?php echo htmlentities($nonadmin["username"]); ?></h2>
  <form action="edit_nonadmin.php?id=<?php echo urlencode($nonadmin["id"]); ?>" method="post">
    <p>Username:
      <input type="text" name="username" value="<?php echo htmlentities($nonadmin["username"]); ?>" />
    </p>
    <p>Password:
      <input type="password" name="password" value="" />
    </p>
    <input type="submit" name="submit" value="Edit Admin" />
  </form>

  <br/>
  <a href="Manage_nonadmin.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
