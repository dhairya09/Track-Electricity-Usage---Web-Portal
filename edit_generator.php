<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$generator = find_generator_by_Building_Code($_GET["generator"]);
if(!$generator){
  redirect_to("Modify_upc_update_data_generators.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("Primary_Feeder_ID", "Secondary_Feeder_ID", "Primary_Feed","Primary_Manhole","Primary_Handhole","Secondary_Feed","Secondary_Manhole","Secondary_Handhole","Generator_SizekW","Gen_SizekVA","Gen_Voltage","Gen_Manufacturer","Gen_ModelYear","Gen_EquipNumber","Gen_EngineType","Gen_FuelCapacity","Gen_FuelType","Gen_Location","Gen_LoadSupport","DPF","ATS","Sound_Attenuation");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){

    $building_Code = mysql_prep($generator['Building_Code']);



		$varPrimary_Feeder_ID = mysql_prep($_POST['Primary_Feeder_ID']);
		$varSecondary_Feeder_ID = mysql_prep($_POST['Secondary_Feeder_ID']);
	  $varPrimary_Feed = mysql_prep($_POST['Primary_Feed']);
		$varPrimary_Manhole = mysql_prep($_POST['Primary_Manhole']);

		$varPrimary_Handhole = mysql_prep($_POST['Primary_Handhole']);

		$varSecondary_Feed = mysql_prep($_POST['Secondary_Feed']);

		$varSecondary_Manhole = mysql_prep($_POST['Secondary_Manhole']);

		$varSecondary_Handhole = mysql_prep($_POST['Secondary_Handhole']);

		$varGenerator_SizekW = mysql_prep($_POST['Generator_SizekW']);

		$varGen_SizekVA = mysql_prep($_POST['Gen_SizekVA']);

		$varGen_Voltage = mysql_prep($_POST['Gen_Voltage']);

		$varGen_Manufacturer = mysql_prep($_POST['Gen_Manufacturer']);

		$varGen_ModelYear = mysql_prep($_POST['Gen_ModelYear']);

		$varGen_EquipNumber = mysql_prep($_POST['Gen_EquipNumber']);

		$varGen_EngineType = mysql_prep($_POST['Gen_EngineType']);

		$varGen_FuelCapacity = mysql_prep($_POST['Gen_FuelCapacity']);

		$varGen_FuelType = mysql_prep($_POST['Gen_FuelType']);

		$varGen_Location = mysql_prep($_POST['Gen_Location']);

		$varGen_LoadSupport = mysql_prep($_POST['Gen_LoadSupport']);

    $DPF = mysql_prep($_POST['DPF']);
    $ATS = mysql_prep($_POST['ATS']);

    $sound_att = mysql_prep($_POST['Sound_Attenuation']);








    $query = "UPDATE elec_upc_generators ";
    $query.= "SET ";
    $query.= "Primary_Feeder_ID = {$varPrimary_Feeder_ID}, ";
    $query.= "Secondary_Feeder_ID = {$varSecondary_Feeder_ID}, ";
    $query.= "Primary_Feed = '{$varPrimary_Feed}', ";
    $query.= "Primary_Manhole = '{$varPrimary_Manhole}', ";
    $query.= "Primary_Handhole = '{$varPrimary_Handhole}', ";
    $query.= "Secondary_Feed = '{$varSecondary_Feed}', ";
    $query.= "Secondary_Manhole = '{$varSecondary_Manhole}', ";
    $query.= "Secondary_Handhole = '{$varSecondary_Handhole}', ";
    $query.= "Generator_SizekW = {$varGenerator_SizekW}, ";
    $query.= "Gen_SizekVA = {$varGen_SizekVA}, ";
    $query.= "Gen_Voltage = '{$varGen_Voltage}', ";
    $query.= "Gen_Manufacturer = '{$varGen_Manufacturer}', ";
    $query.= "Gen_ModelYear = '{$varGen_ModelYear}', ";
    $query.= "Gen_EquipNumber = '{$varGen_EquipNumber}', ";
    $query.= "Gen_EngineType = '{$varGen_EngineType}', ";
    $query.= "Gen_FuelCapacity = '{$varGen_FuelCapacity}', ";
    $query.= "Gen_FuelType = '{$varGen_FuelType}', ";
    $query.= "Gen_Location = '{$varGen_Location}', ";
    $query.= "Gen_LoadSupport = '{$varGen_LoadSupport}', ";
    $query.= "DPF = '{$DPF}', ";
    $query.= "ATS = {$ATS}, ";
    $query.= "Sound_Attenuation = '{$sound_att}' ";

    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result){
        $_SESSION["message"] = "Generator information Updated";
        redirect_to("Modify_upc_update_data_generators.php");
    }
    else{
        echo "Error is:" . mysqli_error($connection);
        $_SESSION["message"] = "Generator information Update Failed";
    }
  }



}



 ?>

<div class = "row2">

  <div class ="col1">

    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    <div>
    <h2>Edit Generator Information for <?php echo htmlentities($generator["Building_Code"]); ?></h2><br/>
    (Inset <b>NULL</b> in case of leaving the textfield blank)
    </div>


    <form action="edit_generator.php?generator=<?php echo urlencode($generator["Building_Code"]); ?>" method="post">
    <p>Primary_Feeder_ID:
      <input type="text" name="Primary_Feeder_ID" value="<?php echo htmlentities($generator["Primary_Feeder_ID"]); ?>" />
    </p>
    <p>Secondary_Feeder_ID:
      <input type="text" name="Secondary_Feeder_ID" value="<?php echo htmlentities($generator["Secondary_Feeder_ID"]); ?>" />
    </p>
    <p>Primary_Feed:
      <input type="text" name="Primary_Feed" value="<?php echo htmlentities($generator["Primary_Feed"]); ?>" />
    </p>
    <p>Primary_Manhole:
      <input type="text" name="Primary_Manhole" value="<?php echo htmlentities($generator["Primary_Manhole"]); ?>" />
    </p>
    <p>Primary_Handhole:
      <input type="text" name="Primary_Handhole" value="<?php echo htmlentities($generator["Primary_Handhole"]); ?>" />
    </p>
    <p>Secondary_Feed:
      <input type="text" name="Secondary_Feed" value="<?php echo htmlentities($generator["Secondary_Feed"]); ?>" />
    </p>
    <p>Secondary_Manhole:
      <input type="text" name="Secondary_Manhole" value="<?php echo htmlentities($generator["Secondary_Manhole"]); ?>" />
    </p>
    <p>Secondary_Handhole:
      <input type="text" name="Secondary_Handhole" value="<?php echo htmlentities($generator["Secondary_Handhole"]); ?>" />
    </p>
    <p>Generator_SizekW:
      <input type="text" name="Generator_SizekW" value="<?php echo htmlentities($generator["Generator_SizekW"]); ?>" />
    </p>
    <p>Gen_SizekVA:
      <input type="text" name="Gen_SizekVA" value="<?php echo htmlentities($generator["Gen_SizekVA"]); ?>" />
    </p>
    <p>Gen_Voltage:
      <input type="text" name="Gen_Voltage" value="<?php echo htmlentities($generator["Gen_Voltage"]); ?>" />
    </p>
    <p>Gen_Manufacturer:
      <input type="text" name="Gen_Manufacturer" value="<?php echo htmlentities($generator["Gen_Manufacturer"]); ?>" />
    </p>
  </div>



  <div class="col2">
    <p>Gen_ModelYear:
      <input type="text" name="Gen_ModelYear" value="<?php echo htmlentities($generator["Gen_ModelYear"]); ?>" />
    </p>
    <p>Gen_EquipNumber:
      <input type="text" name="Gen_EquipNumber" value="<?php echo htmlentities($generator["Gen_EquipNumber"]); ?>" />
    </p>
    <p>Gen_EngineType:
      <input type="text" name="Gen_EngineType" value="<?php echo htmlentities($generator["Gen_EngineType"]); ?>" />
    </p>
    <p>Gen_FuelCapacity:
      <input type="text" name="Gen_FuelCapacity" value="<?php echo htmlentities($generator["Gen_FuelCapacity"]); ?>" />
    </p>
    <p>Gen_FuelType:
      <input type="text" name="Gen_FuelType" value="<?php echo htmlentities($generator["Gen_FuelType"]); ?>" />
    </p>
    <p>Gen_Location:
      <input type="text" name="Gen_Location" value="<?php echo htmlentities($generator["Gen_Location"]); ?>" />
    </p>
    <p>Gen_LoadSupport:
      <input type="text" name="Gen_LoadSupport" value="<?php echo htmlentities($generator["Gen_LoadSupport"]); ?>" />
    </p>
    <p>DPF:
      <input type="text" name="DPF" value="" />
    </p>
    <p>ATS:
      <input type="text" name="ATS" value="" />
    </p>
    <p>Sound_Attenuation:
      <input type="text" name="Sound_Attenuation" value="" />
    </p>
  </div>
  <input type="submit" name="submit" value="Edit Generator" />
</form>


<a href="Modify_upc_update_data_generators.php">Cancel</a>

</div>
<?php include("includes/footer.php"); ?>
