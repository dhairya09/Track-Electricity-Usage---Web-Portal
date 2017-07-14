<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$building = find_building_by_Building_Code($_GET["building"]);
if(!$building){
    redirect_to("Modify_upc_update_data_buildings.php");
}


$building_Code = mysql_prep($building['Building_Code']);
$query = "DELETE FROM ";
$query.= "elec_upc_building_names WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Building Information Deleted";
  redirect_to("Modify_upc_update_data_buildings.php");
}
else{
  $_SESSION["message"] = "Building Information Deletion Failed";
  redirect_to("Modify_upc_update_data_buildings.php");
}


 ?>

<?php include("includes/footer.php"); ?>
