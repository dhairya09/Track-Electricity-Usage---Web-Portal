<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
    if(isset($_POST["submit"])){


      $required_fields = array("feeder_name", "vault_name", "vault_section");
      validate_presences($required_fields);


      $fields_with_max_lengths = array("feeder_name" => 30);
      validate_max_lengths($fields_with_max_lengths);

      if(empty($errors)){
          /*$_SESSION["errors"] = $errors;
          //var_dump($_SESSION["errors"]);
          redirect_to("Manage_admin.php");*/

          $feeder_name = mysql_prep($_POST["feeder_name"]);
          $vault_name =  mysql_prep($_POST["vault_name"]);
          $vault_section =  mysql_prep($_POST["vault_section"]);


          $query = "INSERT into elec_upc_services( ";
          $query.= "Feeder_Name, Vault_Name, Vault_Section";
          $query.= ") VALUES (";
          $query.= " '{$feeder_name}', '{$vault_name}', {$vault_section}";
          $query.= ")";

          $result = mysqli_query($connection,$query);
          if($result){
            $_SESSION["message"] = "Feeder Created";
            redirect_to("Manage_Services.php");
          }
          else{
                //echo "Error is:" . mysqli_error($connection);

                
                $_SESSION["message"] = "Feeder Creation failed. Vault Section cannot be NULL. Insert 0 instead";
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

  <div>
  <h2>Create Feeder</h2>
  (Inset <b>NULL</b> in case of leaving the textfield blank)
  </div>
  <form action="new_feeder.php" method="post">
    <p>Feeder Name:
      <input type="text" name="feeder_name" value="" />
    </p>
    <p>Vault Name:
      <input type="text" name="vault_name" value="" />
    </p>
    <p>Vault Section:
      <input type="text" name="vault_section" value="" />
    </p>
    <input type="submit" name="submit" value="Create Feeder" />
  </form>

  <br/>
  <a href="Manage_Services.php">Cancel</a>
</div>
</div>
<?php include("includes/footer.php"); ?>
