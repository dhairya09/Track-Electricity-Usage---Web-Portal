<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
$nonadmin = find_nonadmin_by_id($_GET["id"]);
if(!$nonadmin){
  redirect_to("Manage_nonadmin.php");
}

$id = $nonadmin["id"];
$query = "DELETE FROM ";
$query.= "nonadmin WHERE ";
$query.= "id = {$id} ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Non-Admin Deleted";
  redirect_to("Manage_nonadmin.php");
}
else{
  $_SESSION["message"] = "Non-Admin Deletion Failed";
  redirect_to("Manage_nonadmin.php");
}


 ?>

<?php include("includes/footer.php"); ?>
