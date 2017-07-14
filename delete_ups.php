<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$ups = find_ups_by_Building_Code($_GET["ups"]);
if(!$ups){
    redirect_to("Modify_upc_update_data_ups.php");
}


$building_Code = mysql_prep($ups['Building_Code']);
$query = "DELETE FROM ";
$query.= "ups WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);

if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "UPS information Deleted";
  redirect_to("Modify_upc_update_data_ups.php");
}
else{
  $_SESSION["message"] = "UPS information Deletion Failed";

}


 ?>

<?php include("includes/footer.php"); ?>
