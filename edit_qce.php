<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$qce = find_qce_by_Building_Code($_GET["qce"]);
if(!$qce){
  //redirect_to("Modify_upc_update_data_qces.php");
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
    $building_Code = mysql_prep($qce['Building_Code']);
    $size =  mysql_prep($_POST["size"]);
    $location =  mysql_prep($_POST["location"]);
    $equipment =  mysql_prep($_POST["equipment"]);



    $query = "UPDATE quick_connect_equipment ";
    $query.= "SET ";
    $query.= "Size = {$size}, ";
    $query.= "Location = '{$location}', ";
    $query.= "Equipment_Supported = '{$equipment}' ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "Quick Connect Equipment Updated";
        redirect_to("Modify_upc_update_data_qce.php");
    }
    else{
        $_SESSION["message"] = "Quick Connect Equipment Update Failed";
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
  <h2>Edit Quick Connect Equipment For <?php echo htmlentities($qce["Building_Code"]); ?></h2>
  <form action="edit_qce.php?qce=<?php echo urlencode($qce["Building_Code"]); ?>" method="post">
    <p>Size:
      <input type="text" name="size" value="<?php echo htmlentities($qce["Size"]); ?>" />
    </p>
    <p>Location:
      <input type="text" name="location" value="<?php echo htmlentities($qce["Location"]); ?>" />
    </p>
    <p>Equipment Supported:
      <input type="text" name="equipment" value="<?php echo htmlentities($qce["Equipment_Supported"]); ?>" />
    </p>
    <input type="submit" name="submit" value="Edit QuickConnectEquipment" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_qce.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
