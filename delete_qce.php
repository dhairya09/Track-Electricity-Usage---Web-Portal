<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$qce = find_qce_by_Building_Code($_GET["qce"]);
if(!$qce){
    redirect_to("Modify_upc_update_data_qce.php");
}


$building_Code = mysql_prep($qce['Building_Code']);
$query = "DELETE FROM ";
$query.= "quick_connect_equipment WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);

if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "QuickConnectEquipment information Deleted";
  redirect_to("Modify_upc_update_data_qce.php");
}
else{
  $_SESSION["message"] = "QuickConnectEquipment information Deletion Failed";
  
}


 ?>

<?php include("includes/footer.php"); ?>
