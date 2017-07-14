<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$camlock = find_camlock_by_Building_Code($_GET["camlock"]);
if(!$camlock){
  redirect_to("Modify_upc_update_data_camlocks.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("size", "location", "equipment");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $building_Code = mysql_prep($camlock['Building_Code']);
    $size =  mysql_prep($_POST["size"]);
    $location =  mysql_prep($_POST["location"]);
    $equipment =  mysql_prep($_POST["equipment"]);



    $query = "UPDATE cam_locks ";
    $query.= "SET ";
    $query.= "Size = {$size}, ";
    $query.= "Location = '{$location}', ";
    $query.= "Equipment_Supported = '{$equipment}' ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "CamLock Updated";
        redirect_to("Modify_upc_update_data_camlocks.php");
    }
    else{
        $_SESSION["message"] = "CamLock Update Failed";
    }
  }



}



 ?>

<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>
  <h2>Edit CamLock <?php echo htmlentities($camlock["Building_Code"]); ?></h2>
  <form action="edit_camlock.php?camlock=<?php echo urlencode($camlock["Building_Code"]); ?>" method="post">
    <p>Size:
      <input type="text" name="size" value="<?php echo htmlentities($camlock["Size"]); ?>" />
    </p>
    <p>Location:
      <input type="text" name="location" value="<?php echo htmlentities($camlock["Location"]); ?>" />
    </p>
    <p>Equipment Supported:
      <input type="text" name="equipment" value="<?php echo htmlentities($camlock["Equipment_Supported"]); ?>" />
    </p>
    <input type="submit" name="submit" value="Edit camlock" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_camlocks.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
