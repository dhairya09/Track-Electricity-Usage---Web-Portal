<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("Building_Code", "UPS_Size", "UPS_Location", "Equipment_Supported", "FMS_Maintained");
  validate_presences($required_fields);




  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $building_Code = mysql_prep($_POST['Building_Code']);
    $size =  mysql_prep($_POST["UPS_Size"]);
    $location =  mysql_prep($_POST["UPS_Location"]);
    $equipment =  mysql_prep($_POST["Equipment_Supported"]);
    $maintained =  mysql_prep($_POST["FMS_Maintained"]);



    $query = "INSERT into ups( ";
    $query.= "Building_Code, UPS_Size, UPS_Location, Equipment_Supported, FMS_Maintained";
    $query.= ") VALUES (";
    $query.= " '{$building_Code}', {$size} , '{$location}', '{$equipment}', '{$maintained}' ";
    $query.= ")";



    $result = mysqli_query($connection,$query);
    if($result){
      $_SESSION["message"] = "UPS Information Created";
      redirect_to("Modify_upc_update_data_ups.php");
    }
      $_SESSION["message"] = "UPS Information Creation Failed";
  }



}



 ?>

<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>
  <h2>Create UPS Information</h2>
  <form action="new_ups.php" method="post">
    <p>Building_Code:
      <input type="text" name="Building_Code" value="" />
    </p>
    <p>Size:
      <input type="text" name="UPS_Size" value="" />
    </p>
    <p>Location:
      <input type="text" name="UPS_Location" value="" />
    </p>
    <p>Equipment Supported:
      <input type="text" name="Equipment_Supported" value="" />
    </p>

    <p>FMS Maintained:
      <input type="text" name="FMS_Maintained" value="" />
    </p>

    <input type="submit" name="submit" value="Create UPS Information" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_ups.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
