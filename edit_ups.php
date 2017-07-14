<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$ups = find_ups_by_Building_Code($_GET["ups"]);
if(!$ups){
  redirect_to("Modify_upc_update_data_ups.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("UPS_Size", "UPS_Location", "Equipment_Supported", "FMS_Maintained");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $building_Code = mysql_prep($ups['Building_Code']);
    $size =  mysql_prep($_POST["UPS_Size"]);
    $location =  mysql_prep($_POST["UPS_Location"]);
    $equipment =  mysql_prep($_POST["Equipment_Supported"]);
    $maintained =  mysql_prep($_POST["FMS_Maintained"]);



    $query = "UPDATE ups ";
    $query.= "SET ";
    $query.= "UPS_Size = '{$size}', ";
    $query.= "UPS_Location = '{$location}', ";
    $query.= "Equipment_Supported = '{$equipment}', ";
    $query.= "FMS_Maintained = '{$maintained}' ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "UPS Information Updated";
        redirect_to("Modify_upc_update_data_ups.php");
    }
    else{
        $_SESSION["message"] = "UPS Information Update Failed";
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
  <h2>Edit UPS Information For <?php echo htmlentities($ups["Building_Code"]); ?></h2>
  <form action="edit_ups.php?ups=<?php echo urlencode($ups["Building_Code"]); ?>" method="post">
    <p>Size:
      <input type="text" name="UPS_Size" value="<?php echo htmlentities($ups["UPS_Size"]); ?>" />
    </p>
    <p>Location:
      <input type="text" name="UPS_Location" value="<?php echo htmlentities($ups["UPS_Location"]); ?>" />
    </p>
    <p>Equipment Supported:
      <input type="text" name="Equipment_Supported" value="<?php echo htmlentities($ups["Equipment_Supported"]); ?>" />
    </p>

    <p>FMS Maintained:
      <input type="text" name="FMS_Maintained" value="<?php echo htmlentities($ups["FMS_Maintained"]); ?>" />
    </p>

    <input type="submit" name="submit" value="Edit UPS Information" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_ups.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
