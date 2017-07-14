<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$transformer = find_transformer_by_Building_Code($_GET["transformer"]);
if(!$transformer){
    redirect_to("Modify_upc_update_data_.php");
}


$building_Code = mysql_prep($transformer['Building_Code']);
$query = "DELETE FROM ";
$query.= "elec_upc_txdemand WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Transformer information Deleted";
  redirect_to("Modify_upc_update_data_txdemand.php");
}
else{
  $_SESSION["message"] = "Transformer information Deletion Failed";
  redirect_to("Modify_upc_update_data_txdemand.php");
}


 ?>

<?php include("includes/footer.php"); ?>
