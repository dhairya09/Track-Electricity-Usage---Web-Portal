<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

$keylocks = find_keylocks_by_Building_Code($_GET["keylocks"]);
if(!$keylocks){
    redirect_to("Modify_upc_update_data_keylocks.php");
}


$building_Code = mysql_prep($keylocks['Building_Code']);
$query = "DELETE FROM ";
$query.= "key_interlocks WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);

if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "KeyInterlocks information Deleted";
  redirect_to("Modify_upc_update_data_keylocks.php");
}
else{
  $_SESSION["message"] = "KeyInterlocks information Deletion Failed";

}


 ?>

<?php include("includes/footer.php"); ?>
