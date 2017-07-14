<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$keylocks = find_keylocks_by_Building_Code($_GET["keylocks"]);
if(!$keylocks){
  redirect_to("Modify_upc_update_data_keylocks.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("equipment", "location", "purpose");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $building_Code = mysql_prep($keylocks['Building_Code']);
    $equipment =  mysql_prep($_POST["equipment"]);
    $location =  mysql_prep($_POST["location"]);
    $purpose =  mysql_prep($_POST["purpose"]);



    $query = "UPDATE key_interlocks ";
    $query.= "SET ";
    $query.= "Equipment = '{$equipment}', ";
    $query.= "Location = '{$location}', ";
    $query.= "Purpose = '{$purpose}' ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "Key Interlocks Updated";
        redirect_to("Modify_upc_update_data_keylocks.php");
    }
    else{
        $_SESSION["message"] = "Key Interlocks Update Failed";
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
  <h2>Edit KeyInterlocks For <?php echo htmlentities($keylocks["Building_Code"]); ?></h2>
  <form action="edit_keylocks.php?keylocks=<?php echo urlencode($keylocks["Building_Code"]); ?>" method="post">
    <p>Equipment:
      <input type="text" name="equipment" value="<?php echo htmlentities($keylocks["Equipment"]); ?>" />
    </p>
    <p>Location:
      <input type="text" name="location" value="<?php echo htmlentities($keylocks["Location"]); ?>" />
    </p>
    <p>Purpose:
      <input type="text" name="purpose" value="<?php echo htmlentities($keylocks["Purpose"]); ?>" />
    </p>
    <input type="submit" name="submit" value="Edit KeyInterlocks" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_keylocks.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
