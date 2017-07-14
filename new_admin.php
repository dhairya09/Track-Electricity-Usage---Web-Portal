<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
    if(isset($_POST["submit"])){


      $required_fields = array("username","password");
        validate_presences($required_fields);

      $fields_with_max_lengths = array("username" => 30);
      validate_max_lengths($fields_with_max_lengths);
      //var_dump($errors);
      //echo $errors;
      if(empty($errors)){
          /*$_SESSION["errors"] = $errors;
          //var_dump($_SESSION["errors"]);
          redirect_to("Manage_admin.php");*/

          $username = mysql_prep($_POST["username"]);
          $hashed_password = password_encrypt($_POST["password"]);

          $query = "INSERT into admin( ";
          $query.= "username, hashed_password";
          $query.= ") VALUES (";
          $query.= " '{$username}', '{$hashed_password}'";
          $query.= ")";

          $result = mysqli_query($connection,$query);
          if($result){
            $_SESSION["message"] = "Admin Created";
            redirect_to("Manage_admin.php");
          }
            $_SESSION["message"] = "Admin Creation failed";
      }



    }

 ?>
<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>

  <?php echo form_errors($errors); ?>
  <h2>Create Admin</h2>
  <form action="new_admin.php" method="post">
    <p>Username:
      <input type="text" name="username" value="" />
    </p>
    <p>Password:
      <input type="password" name="password" value="" />
    </p>
    <input type="submit" name="submit" value="Create Admin" />
  </form>

  <br/>
  <a href="Manage_admin.php">Cancel</a>
</div>
</div>
<?php include("includes/footer.php"); ?>
