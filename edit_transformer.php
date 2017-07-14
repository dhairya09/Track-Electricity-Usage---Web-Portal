<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$transformer = find_transformer_by_Building_Code($_GET["transformer"]);
if(!$transformer){
  redirect_to("Modify_upc_update_data_txdemand.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations

  $required_fields = array("Primary_Feeder_ID", "Secondary_Feeder_ID", "Primary_Feed","Primary_Manhole","Primary_Handhole","Secondary_Feed","Secondary_Manhole","Secondary_Handhole","Xfmr_SizekVA","Peak_kW","Peak_Usage","Voltage","Meter_Number","Meter_Device","Priority_Level","Priority_Order","Xfmr_Manufacturer","Xfmr_Type","Xfmr_Impedance","Xfmr_ModelYear","Xfmr_FuelCapacity","Peak_kW_Prev_Year","Peak_kW_Prev_Month" );
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){

    $building_Code = mysql_prep($transformer['Building_Code']);



		$varPrimary_Feeder_ID = mysql_prep($_POST['Primary_Feeder_ID']);
		$varSecondary_Feeder_ID = mysql_prep($_POST['Secondary_Feeder_ID']);
	  $varPrimary_Feed = mysql_prep($_POST['Primary_Feed']);
		$varPrimary_Manhole = mysql_prep($_POST['Primary_Manhole']);

		$varPrimary_Handhole = mysql_prep($_POST['Primary_Handhole']);

		$varSecondary_Feed = mysql_prep($_POST['Secondary_Feed']);

		$varSecondary_Manhole = mysql_prep($_POST['Secondary_Manhole']);

		$varSecondary_Handhole = mysql_prep($_POST['Secondary_Handhole']);

		$varXfmr_SizekVA = mysql_prep($_POST['Xfmr_SizekVA']);

		$varPeak_kW = mysql_prep($_POST['Peak_kW']);

		$varPeak_Usage = mysql_prep($_POST['Peak_Usage']);

		$varVoltage = mysql_prep($_POST['Voltage']);

		$varMeter_Number = mysql_prep($_POST['Meter_Number']);

		$varMeter_Device = mysql_prep($_POST['Meter_Device']);

		$varPriority_Level = mysql_prep($_POST['Priority_Level']);

		$varPriority_Order = mysql_prep($_POST['Priority_Order']);

		$varXfmr_Manufacturer = mysql_prep($_POST['Xfmr_Manufacturer']);

		$varXfmr_Type = mysql_prep($_POST['Xfmr_Type']);

		$varXfmr_Impedance = mysql_prep($_POST['Xfmr_Impedance']);

		$varXfmr_ModelYear = mysql_prep($_POST['Xfmr_ModelYear']);

		$varXfmr_FuelCapacity = mysql_prep($_POST['Xfmr_FuelCapacity']);

		$varPeak_kW_Prev_Year = mysql_prep($_POST['Peak_kW_Prev_Year']);

		$varPeak_kW_Prev_Month = mysql_prep($_POST['Peak_kW_Prev_Month']);





    $query = "UPDATE elec_upc_txdemand ";
    $query.= "SET ";
    $query.= "Primary_Feeder_ID = {$varPrimary_Feeder_ID}, ";
    $query.= "Secondary_Feeder_ID = {$varSecondary_Feeder_ID}, ";
    $query.= "Primary_Feed = '{$varPrimary_Feed}', ";
    $query.= "Primary_Manhole = '{$varPrimary_Manhole}', ";
    $query.= "Primary_Handhole = '{$varPrimary_Handhole}', ";
    $query.= "Secondary_Feed = '{$varSecondary_Feed}', ";
    $query.= "Secondary_Manhole = '{$varSecondary_Manhole}', ";
    $query.= "Secondary_Handhole = '{$varSecondary_Handhole}', ";
    $query.= "Xfmr_SizekVA = {$varXfmr_SizekVA}, ";
    $query.= "Peak_kW = {$varPeak_kW}, ";
    $query.= "Peak_Usage = {$varPeak_Usage}, ";
    $query.= "Voltage = '{$varVoltage}', ";
    $query.= "Meter_Number = '{$varMeter_Number}', ";
    $query.= "Meter_Device = '{$varMeter_Device}', ";
    $query.= "Priority_Level = {$varPriority_Level}, ";
    $query.= "Priority_Order = {$varPriority_Order}, ";
    $query.= "Xfmr_Manufacturer = '{$varXfmr_Manufacturer}', ";
    $query.= "Xfmr_Type = '{$varXfmr_Type}', ";
    $query.= "Xfmr_Impedance = {$varXfmr_Impedance}, ";
    $query.= "Xfmr_ModelYear = '{$varXfmr_ModelYear}', ";
    $query.= "Xfmr_FuelCapacity = '{$varXfmr_FuelCapacity}', ";
    $query.= "Peak_kW_Prev_Year = {$varPeak_kW_Prev_Year}, ";
    $query.= "Peak_kW_Prev_Month = {$varPeak_kW_Prev_Month} ";
    $query.= "WHERE ";
    $query.= "Building_Code = '{$building_Code}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result){
        $_SESSION["message"] = "Transformer Information Updated";
        redirect_to("Modify_upc_update_data_txdemand.php");
    }
    else{
        //echo "Error is:" . mysqli_error($connection);
        $_SESSION["message"] = "Transformer Information Updation Failed";
    }

  }




}



 ?>

<div class = "row2">

  <div class ="col1">

    <?php echo message(); ?>
    <?php echo form_errors($errors); ?>
    <div>
    <h2>Edit Transformer Information for <?php echo htmlentities($transformer["Building_Code"]); ?></h2>
    (Inset <b>NULL</b> in case of leaving the textfield blank)
    </div>


    <form action="edit_transformer.php?transformer=<?php echo urlencode($transformer["Building_Code"]); ?>" method="post">
    <p>Primary_Feeder_ID:
      <input type="text" name="Primary_Feeder_ID" value="<?php echo htmlentities($transformer["Primary_Feeder_ID"]); ?>" />
    </p>
    <p>Secondary_Feeder_ID:
      <input type="text" name="Secondary_Feeder_ID" value="<?php echo htmlentities($transformer["Secondary_Feeder_ID"]); ?>" />
    </p>
    <p>Primary_Feed:
      <input type="text" name="Primary_Feed" value="<?php echo htmlentities($transformer["Primary_Feed"]); ?>" />
    </p>
    <p>Primary_Manhole:
      <input type="text" name="Primary_Manhole" value="<?php echo htmlentities($transformer["Primary_Manhole"]); ?>" />
    </p>
    <p>Primary_Handhole:
      <input type="text" name="Primary_Handhole" value="<?php echo htmlentities($transformer["Primary_Handhole"]); ?>" />
    </p>
    <p>Secondary_Feed:
      <input type="text" name="Secondary_Feed" value="<?php echo htmlentities($transformer["Secondary_Feed"]); ?>" />
    </p>
    <p>Secondary_Manhole:
      <input type="text" name="Secondary_Manhole" value="<?php echo htmlentities($transformer["Secondary_Manhole"]); ?>" />
    </p>
    <p>Secondary_Handhole:
      <input type="text" name="Secondary_Handhole" value="<?php echo htmlentities($transformer["Secondary_Handhole"]); ?>" />
    </p>
    <p>Xfmr_SizekVA:
      <input type="text" name="Xfmr_SizekVA" value="<?php echo htmlentities($transformer["Xfmr_SizekVA"]); ?>" />
    </p>
    <p>Peak_kW:
      <input type="text" name="Peak_kW" value="<?php echo htmlentities($transformer["Peak_kW"]); ?>" />
    </p>
    <p>Peak_Usage:
      <input type="text" name="Peak_Usage" value="<?php echo htmlentities($transformer["Peak_Usage"]); ?>" />
    </p>
    <p>Voltage:
      <input type="text" name="Voltage" value="<?php echo htmlentities($transformer["Voltage"]); ?>" />
    </p>
  </div>



  <div class="col2">
    <p>Meter_Number:
      <input type="text" name="Meter_Number" value="<?php echo htmlentities($transformer["Meter_Number"]); ?>" />
    </p>
    <p>Meter Device:
      <input type="text" name="Meter_Device" value="<?php echo htmlentities($transformer["Meter_Device"]); ?>" />
    </p>
    <p>Priority Level:
      <input type="text" name="Priority_Level" value="<?php echo htmlentities($transformer["Priority_Level"]); ?>" />
    </p>
    <p>Priority_Order:
      <input type="text" name="Priority_Order" value="<?php echo htmlentities($transformer["Priority_Order"]); ?>" />
    </p>
    <p>Xfmr_Manufacturer:
      <input type="text" name="Xfmr_Manufacturer" value="<?php echo htmlentities($transformer["Xfmr_Manufacturer"]); ?>" />
    </p>
    <p>Xfmr_Type:
      <input type="text" name="Xfmr_Type" value="<?php echo htmlentities($transformer["Xfmr_Type"]); ?>" />
    </p>
    <p>Xfmr_Impedance:
      <input type="text" name="Xfmr_Impedance" value="<?php echo htmlentities($transformer["Xfmr_Impedance"]); ?>" />
    </p>
    <p>Xfmr_ModelYear:
      <input type="text" name="Xfmr_ModelYear" value="<?php echo htmlentities($transformer["Xfmr_ModelYear"]); ?>" />
    </p>
    <p>Xfmr_FuelCapacity:
      <input type="text" name="Xfmr_FuelCapacity" value="<?php echo htmlentities($transformer["Xfmr_FuelCapacity"]); ?>" />
    </p>
    <p>Peak_kW_Prev_Year:
      <input type="text" name="Peak_kW_Prev_Year" value="<?php echo htmlentities($transformer["Peak_kW_Prev_Year"]); ?>" />
    </p>
    <p>Peak_kW_Prev_Month:
      <input type="text" name="Peak_kW_Prev_Month" value="<?php echo htmlentities($transformer["Peak_kW_Prev_Month"]); ?>" />
    </p>
  </div>
  <input type="submit" name="submit" value="Edit transformer" />
</form>


<a href="Modify_upc_update_data_txdemand.php">Cancel</a>

</div>
<?php include("includes/footer.php"); ?>
