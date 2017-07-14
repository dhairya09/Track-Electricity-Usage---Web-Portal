<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
$mambreak = find_mambreak_by_Building_Code($_GET["mambreaker"]);
if(!$mambreak){
  redirect_to("Modify_upc_update_data_mambreak.php");
}






$building_Code = mysql_prep($mambreak['Building_Code']);
$query = "DELETE FROM ";
$query.= "mam_breakers WHERE ";
$query.= "Building_Code = '{$building_Code}' ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);

if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Mam Breaker information Deleted";
  redirect_to("Modify_upc_update_data_mambreak.php");
}
else{
  $_SESSION["message"] = "Mam Breaker information Deletion Failed";

}


 ?>

<?php include("includes/footer.php"); ?>
