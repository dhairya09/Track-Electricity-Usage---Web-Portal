<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$building = find_building_by_Building_Code($_GET["building"]);
if(!$building){
  redirect_to("Modify_upc_update_data_buildings.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("building_code", "building_name", "building_address");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $code = $building["Building_Code"];
    $building_code = mysql_prep($_POST["building_code"]);
    $building_name =  mysql_prep($_POST["building_name"]);
    $building_address =  mysql_prep($_POST["building_address"]);



    $query = "UPDATE elec_upc_building_names ";
    $query.= "SET ";
    $query.= "Building_Code = '{$building_code}', ";
    $query.= "Building_Name = '{$building_name}', ";
    $query.= "Building_Address = '{$building_address}' ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$code}' ";
    $query.= "LIMIT 1";

    echo "Query Fire thai Che?";
    $result = mysqli_query($connection,$query);
    echo "ha";
    if($result){
        $_SESSION["message"] = "Building Information Updated";
        redirect_to("Modify_upc_update_data_buildings.php");
    }
    else{
        //echo "Error is:" . mysqli_error($connection);
        $_SESSION["message"] = "Building Information Update Failed";
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
    <h2>Edit Building <?php echo htmlentities($building["Building_Code"]); ?></h2>
  (Inset <b>NULL</b> in case of leaving the textfield blank)
  </div>

  <form action="edit_building.php?building=<?php echo urlencode($building["Building_Code"]); ?>" method="post">
    <p>Building Code:
      <input type="text" name="building_code" value="<?php echo htmlentities($building["Building_Code"]); ?>" />
    </p>
    <p>Building Name:
      <input type="text" name="building_name" value="<?php echo htmlentities($building["Building_Name"]); ?>" />
    </p>
    <p>Building Address:
      <input type="text" name="building_address" value="<?php echo htmlentities($building["Building_Address"]); ?>" />
    </p>
    <input type="submit" name="submit" value="Edit building" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_buildings.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
