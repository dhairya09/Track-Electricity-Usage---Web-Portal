<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
    if(isset($_POST["submit"])){


      $required_fields = array("code","building_code", "building_name", "building_address");
      validate_presences($required_fields);


      /*$fields_with_max_lengths = array("building_name" => 30);
      validate_max_lengths($fields_with_max_lengths);*/

      if(empty($errors)){
          /*$_SESSION["errors"] = $errors;
          //var_dump($_SESSION["errors"]);
          redirect_to("Manage_admin.php");*/
          $code = mysql_prep($_POST["code"]);
          $building_code = mysql_prep($_POST["building_code"]);
          $building_name =  mysql_prep($_POST["building_name"]);
          $building_address =  mysql_prep($_POST["building_address"]);




          $query = "INSERT into elec_upc_building_names( ";
          $query.= "Code, Building_Code, Building_Name, Building_Address";
          $query.= ") VALUES (";
          $query.= " '{$code}', '{$building_code}', '{$building_name}', '{$building_address}' ";
          $query.= ")";

          $result = mysqli_query($connection,$query);
          if($result){
            $_SESSION["message"] = "Building Information Created";
            redirect_to("Modify_upc_update_data_buildings.php");
          }
            $_SESSION["message"] = "Building Information Creation failed";
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
  <h2>Create Building Information</h2>
  (Inset <b>NULL</b> in case of leaving the textfield blank)
  </div>

  <form action="new_building.php" method="post">
    <p>Code:
      <input type="text" name="code" value="" />
    </p>
    <p>Building Code:
      <input type="text" name="building_code" value="" />
    </p>
    <p>Building Name:
      <input type="text" name="building_name" value="" />
    </p>
    <p>Building Address:
      <input type="text" name="building_address" value="" />
    </p>

    <input type="submit" name="submit" value="Create Building" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_buildings.php">Cancel</a>
</div>
</div>
<?php include("includes/footer.php"); ?>
