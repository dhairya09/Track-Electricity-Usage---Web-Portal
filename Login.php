<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php include("includes/header.php"); ?>

<?php
    $username ="";
    if(isset($_POST["submit"])){


      $required_fields = array("username","password");
      validate_presences($required_fields);



      if(empty($errors))
      {
        $username = mysql_prep($_POST["username"]);
        $password = mysql_prep($_POST["password"]);

        $found_admin = attempt_login($username,$password);
        $found_nonadmin = attempt_nonlogin($username,$password);

        if($found_admin){
          //$_SESSION["message"] = "Welcome to the Dashboard " . $username;
          $_SESSION["admin_id"] = $found_admin["id"];
          $_SESSION["username"] = $found_admin["username"];
          redirect_to("Modify_admin.php");
        }
        else
        if($found_nonadmin){
          $_SESSION["admin_id"] = $found_nonadmin["id"];
          $_SESSION["username"] = $found_nonadmin["username"];
          redirect_to("Modify_nonadmin.php");
        }
        else{
          $_SESSION["message"] = "Username/Password not found";
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
  <h2 class="title">Login</h2>
  <form action="Login.php" method="post">
    <p>Username: <input type="text" name="username" value="<?php echo htmlentities($username); ?>" placeholder="Enter Username" />
    </p>
    <p>Password: <input type="password" name="password" value="" placeholder="Enter Password" />
    </p>
    <input type="submit" name="submit" value="submit" />

  </form>




  <br/>

</div>
</div>
<?php include("includes/footer.php"); ?>
