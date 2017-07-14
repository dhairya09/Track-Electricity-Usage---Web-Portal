<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$mambreak = find_mambreak_by_Building_Code($_GET["mambreaker"]);
if(!$mambreak){
  redirect_to("Modify_upc_update_data_mambreak.php");
}


 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("FIS_LIS_Size", "FIS_LIS_Location", "Mam_Breaker_Size", "Mam_Breaker_Location");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){



    $building_Code = mysql_prep($mambreak['Building_Code']);
    $fis_size =  mysql_prep($_POST["FIS_LIS_Size"]);
    $fis_location =  mysql_prep($_POST["FIS_LIS_Location"]);
    $mam_size =  mysql_prep($_POST["Mam_Breaker_Size"]);
    $mam_location =  mysql_prep($_POST["Mam_Breaker_Location"]);





    $query = "UPDATE mam_breakers ";
    $query.= "SET ";
    $query.= "FIS_LIS_Size = {$fis_size}, ";
    $query.= "FIS_LIS_Location = '{$fis_location}', ";
    $query.= "Mam_Breaker_Size = {$mam_size}, ";
    $query.= "Mam_Breaker_Location = '{$mam_location}' ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result && mysqli_affected_rows($connection) == 1){
        $_SESSION["message"] = "Mam Breaker Information Updated";
        redirect_to("Modify_upc_update_data_mambreak.php");
    }
    else{
        $_SESSION["message"] = "Mam Breaker Information Update Failed";
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
  <h2>Edit Mam Breaker Information For <?php echo htmlentities($mambreak["Building_Code"]); ?></h2>
  <form action="edit_mambreaker.php?mambreaker=<?php echo urlencode($mambreak["Building_Code"]); ?>" method="post">
    <p>FIS/LIS_Size:
      <input type="text" name="FIS_LIS_Size" value="<?php echo htmlentities($mambreak["FIS_LIS_Size"]); ?>" />
    </p>
    <p>FIS/LIS_Location:
      <input type="text" name="FIS_LIS_Location" value="<?php echo htmlentities($mambreak["FIS_LIS_Location"]); ?>" />
    </p>
    <p>Mam Breaker Size:
      <input type="text" name="Mam_Breaker_Size" value="<?php echo htmlentities($mambreak["Mam_Breaker_Size"]); ?>" />
    </p>

    <p>Mam Breaker Location:
      <input type="text" name="Mam_Breaker_Location" value="<?php echo htmlentities($mambreak["Mam_Breaker_Location"]); ?>" />
    </p>

    <input type="submit" name="submit" value="Edit mambreak Information" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_mambreak.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
