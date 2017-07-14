<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$generator = find_generator_by_Building_Code($_GET["generator"]);
if(!$generator){
    redirect_to("Modify_upc_update_data_generators.php");
}


$building_Code = mysql_prep($generator['Building_Code']);
$query = "DELETE FROM ";
$query.= "elec_upc_generators WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Generator information Deleted";
  redirect_to("Modify_upc_update_data_generators.php");
}
else{
  $_SESSION["message"] = "Generator information Deletion Failed";
  redirect_to("Modify_upc_update_data_generators.php");
}


 ?>

<?php include("includes/footer.php"); ?>
