<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("Building_Code", "FIS_LIS_Size", "FIS_LIS_Location", "Mam_Breaker_Size", "Mam_Breaker_Location");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){

    $building_Code = mysql_prep($_POST['Building_Code']);
    $fis_size =  mysql_prep($_POST["FIS_LIS_Size"]);
    $fis_location =  mysql_prep($_POST["FIS_LIS_Location"]);
    $mam_size =  mysql_prep($_POST["Mam_Breaker_Size"]);
    $mam_location =  mysql_prep($_POST["Mam_Breaker_Location"]);






    $query = "INSERT into mam_breakers( ";
    $query.= "Building_Code, FIS_LIS_Size, FIS_LIS_Location, Mam_Breaker_Size, Mam_Breaker_Location";
    $query.= ") VALUES (";
    $query.= " '{$building_Code}', {$fis_size}, '{$fis_location}', {$mam_size}, '{$mam_location}'";
    $query.= ")";


    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "Mam Breaker Information Created";
        redirect_to("Modify_upc_update_data_mambreak.php");
    }
    else{
        $_SESSION["message"] = "Mam Breaker Information Creation Failed";
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
  <h2>Create Mam Breaker Information</h2>
  <form action="new_mambreaker.php" method="post">
    <p>Building Code:
      <input type="text" name="Building_Code" value="" />
    </p>
    <p>FIS/LIS Size:
      <input type="text" name="FIS_LIS_Size" value="" />
    </p>
    <p>FIS/LIS Location:
      <input type="text" name="FIS_LIS_Location" value="" />
    </p>
    <p>Mam Breaker Size:
      <input type="text" name="Mam_Breaker_Size" value="" />
    </p>

    <p>Mam Breaker Location:
      <input type="text" name="Mam_Breaker_Location" value="" />
    </p>

    <input type="submit" name="submit" value="Create mambreak Information" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_mambreak.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
