<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
$admin = find_admin_by_id($_GET["id"]);
if(!$admin){
  redirect_to("Manage_admin.php");
}

$id = $admin["id"];
$query = "DELETE FROM ";
$query.= "admin WHERE ";
$query.= "id = {$id} ";
$query.= "LIMIT 1";
$result = mysqli_query($connection,$query);
if($result && mysqli_affected_rows($connection) == 1){
  $_SESSION["message"] = "Admin Deleted";
  redirect_to("Manage_admin.php");
}
else{
  $_SESSION["message"] = "Admin Deletion Failed";
  redirect_to("Manage_admin.php");
}


 ?>

<?php include("includes/footer.php"); ?>
