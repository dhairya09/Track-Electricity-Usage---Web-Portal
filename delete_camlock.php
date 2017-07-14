<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$camlock = find_camlock_by_Building_Code($_GET["camlock"]);
if(!$camlock){
    redirect_to("Modify_upc_update_data_.php");
}


$building_Code = mysql_prep($camlock['Building_Code']);
$query = "DELETE FROM ";
$query.= "cam_locks WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Camlock information Deleted";
  redirect_to("Modify_upc_update_data_camlocks.php");
}
else{
  $_SESSION["message"] = "Camlock information Deletion Failed";
  
}


 ?>

<?php include("includes/footer.php"); ?>
