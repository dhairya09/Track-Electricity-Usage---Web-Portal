<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("Building_Code", "size", "location", "equipment");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $building_Code = mysql_prep($_POST['Building_Code']);
    $size =  mysql_prep($_POST["size"]);
    $location =  mysql_prep($_POST["location"]);
    $equipment =  mysql_prep($_POST["equipment"]);



    $query = "INSERT into cam_locks( ";
    $query.= "Building_Code, Size, Location, Equipment_Supported";
    $query.= ") VALUES (";
    $query.= " '{$building_Code}', {$size}, '{$location}', '{$equipment}'";
    $query.= ")";



    $result = mysqli_query($connection,$query);
    if($result){
      $_SESSION["message"] = "CamLock Information Created";
      redirect_to("Modify_upc_update_data_camlocks.php");
    }
      $_SESSION["message"] = "CamLock Information Creation Failed";
  }



}



 ?>

<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>
  <h2>Create CamLock Information</h2>
  <form action="new_camlock.php" method="post">
    <p>Building_Code:
      <input type="text" name="Building_Code" value="" />
    </p>
    <p>Size:
      <input type="text" name="size" value="" />
    </p>
    <p>Location:
      <input type="text" name="location" value="" />
    </p>
    <p>Equipment Supported:
      <input type="text" name="equipment" value="" />
    </p>
    <input type="submit" name="submit" value="Create CamLock Information" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_camlocks.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
