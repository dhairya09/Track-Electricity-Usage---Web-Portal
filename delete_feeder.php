<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$feeder = find_feeder_by_Feeder_Name($_GET["feeder"]);
if(!$feeder){
  redirect_to("Manage_Services.php");
}


$feed = $feeder["Feeder_Name"];
$query = "DELETE FROM ";
$query.= "elec_upc_services WHERE ";
$query.= "Feeder_Name = '{$feed}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Feeder Deleted";
  redirect_to("Manage_Services.php");
}
else{
  $_SESSION["message"] = "Feeder Deletion Failed";
  redirect_to("Manage_Services.php");
}


 ?>

<?php include("includes/footer.php"); ?>
