<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php

if(isset($_POST["submit"])){

  // validations
  $required_fields = array("Building_Code", "equipment", "location", "purpose");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $building_Code = mysql_prep($_POST['Building_Code']);
    $equipment =  mysql_prep($_POST["equipment"]);
    $location =  mysql_prep($_POST["location"]);
    $purpose =  mysql_prep($_POST["purpose"]);



    $query = "INSERT into key_interlocks( ";
    $query.= "Building_Code, Equipment, Location, Purpose";
    $query.= ") VALUES (";
    $query.= " '{$building_Code}', '{$equipment}' , '{$location}', '{$purpose}' ";
    $query.= ")";



    $result = mysqli_query($connection,$query);
    if($result){
      $_SESSION["message"] = "KeyInterlocks Information Created";
      redirect_to("Modify_upc_update_data_keylocks.php");
    }
      $_SESSION["message"] = "KeyInterlocks Information Creation Failed";
  }



}



 ?>

<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>
  <h2>Create KeyInterlocks Information</h2>
  <form action="new_keylocks.php" method="post">
    <p>Building_Code:
      <input type="text" name="Building_Code" value="" />
    </p>
    <p>Equipment:
      <input type="text" name="equipment" value="" />
    </p>
    <p>Location:
      <input type="text" name="location" value="" />
    </p>
    <p>Purpose:
      <input type="text" name="purpose" value="" />
    </p>

    <input type="submit" name="submit" value="Create KeyInterlocks Information" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_keylocks.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
