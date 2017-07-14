<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
    if(isset($_POST["submit"])){


      $required_fields = array("Building_Code","Building_Number","Primary_Feeder_ID", "Secondary_Feeder_ID", "Primary_Feed","Primary_Manhole","Primary_Handhole","Secondary_Feed","Secondary_Manhole","Secondary_Handhole","Xfmr_SizekVA","Peak_kW","Peak_Usage","Voltage","Meter_Number","Meter_Device","Priority_Level","Priority_Order","Xfmr_Manufacturer","Xfmr_Type","Xfmr_Impedance","Xfmr_ModelYear","Xfmr_FuelCapacity","Peak_kW_Prev_Year","Peak_kW_Prev_Month" );
      validate_presences($required_fields);


      /*$fields_with_max_lengths = array("feeder_name" => 30);
      validate_max_lengths($fields_with_max_lengths);*/

      if(empty($errors)){
          /*$_SESSION["errors"] = $errors;
          //var_dump($_SESSION["errors"]);
          redirect_to("Manage_admin.php");*/

          $building_Code = mysql_prep($_POST['Building_Code']);
          $building_Number = mysql_prep($_POST['Building_Number']);


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


          $query = "INSERT into elec_upc_txdemand( ";
          $query.= "Building_Code, Building_Number, Primary_Feeder_ID, Secondary_Feeder_ID,Primary_Feed, Primary_Manhole, Primary_Handhole,Secondary_Feed, Secondary_Manhole, Secondary_Handhole,Xfmr_SizekVA, Peak_kW, Peak_Usage,Voltage, Meter_Number, Meter_Device,Priority_Level, Priority_Order, Xfmr_Manufacturer,Xfmr_Type, Xfmr_Impedance, Xfmr_ModelYear,Xfmr_FuelCapacity, Peak_kW_Prev_Year, Peak_kW_Prev_Month";
          $query.= ") VALUES (";
          $query.= " '{$building_Code}',{$building_Number}, {$varPrimary_Feeder_ID}, {$varSecondary_Feeder_ID},'{$varPrimary_Feed}','{$varPrimary_Manhole}','{$varPrimary_Handhole}','{$varSecondary_Feed}','{$varSecondary_Manhole}','{$varSecondary_Handhole}',{$varXfmr_SizekVA},{$varPeak_kW},{$varPeak_Usage},'{$varVoltage}','{$varMeter_Number}','{$varMeter_Device}',{$varPriority_Level},{$varPriority_Order},'{$varXfmr_Manufacturer}','{$varXfmr_Type}',";
          $query.= " '{$varXfmr_Impedance}','{$varXfmr_ModelYear}','{$varXfmr_FuelCapacity}',{$varPeak_kW_Prev_Year},{$varPeak_kW_Prev_Month}";
          $query.= ")";

          $result = mysqli_query($connection,$query);
          if($result){
            $_SESSION["message"] = "Transformer Information Created";
            redirect_to("Modify_upc_update_data_txdemand.php");
          }
            $_SESSION["message"] = "Transformer Information Creation Failed.";
        }    




    }

 ?>
 <div class = "row2">

   <div class ="col1">

     <?php echo message(); ?>
     <?php echo form_errors($errors); ?>
     <div>
     <h2>Create Transformer Information</h2>
     (Inset <b>NULL</b> in case of leaving the textfield blank)
     </div>

     <form action="new_transformer.php" method="post">
    <p>Building_Code:
      <input type="text" name="Building_Code" value="" />
    </p>
    <p>Building_Number:
      <input type="text" name="Building_Number" value="" />
    </p>
     <p>Primary_Feeder_ID:
       <input type="text" name="Primary_Feeder_ID" value="" />
     </p>
     <p>Secondary_Feeder_ID:
       <input type="text" name="Secondary_Feeder_ID" value="" />
     </p>
     <p>Primary_Feed:
       <input type="text" name="Primary_Feed" value="" />
     </p>
     <p>Primary_Manhole:
       <input type="text" name="Primary_Manhole" value="" />
     </p>
     <p>Primary_Handhole:
       <input type="text" name="Primary_Handhole" value="" />
     </p>
     <p>Secondary_Feed:
       <input type="text" name="Secondary_Feed" value="" />
     </p>
     <p>Secondary_Manhole:
       <input type="text" name="Secondary_Manhole" value="" />
     </p>
     <p>Secondary_Handhole:
       <input type="text" name="Secondary_Handhole" value="" />
     </p>
     <p>Xfmr_SizekVA:
       <input type="text" name="Xfmr_SizekVA" value="" />
     </p>
     <p>Peak_kW:
       <input type="text" name="Peak_kW" value="" />
     </p>
     <p>Peak_Usage:
       <input type="text" name="Peak_Usage" value="" />
     </p>
     <p>Voltage:
       <input type="text" name="Voltage" value="" />
     </p>
   </div>



   <div class="col2">
     <p>Meter_Number:
       <input type="text" name="Meter_Number" value="" />
     </p>
     <p>Meter Device:
       <input type="text" name="Meter_Device" value="" />
     </p>
     <p>Priority Level:
       <input type="text" name="Priority_Level" value="" />
     </p>
     <p>Priority_Order:
       <input type="text" name="Priority_Order" value="" />
     </p>
     <p>Xfmr_Manufacturer:
       <input type="text" name="Xfmr_Manufacturer" value="" />
     </p>
     <p>Xfmr_Type:
       <input type="text" name="Xfmr_Type" value="" />
     </p>
     <p>Xfmr_Impedance:
       <input type="text" name="Xfmr_Impedance" value="" />
     </p>
     <p>Xfmr_ModelYear:
       <input type="text" name="Xfmr_ModelYear" value="" />
     </p>
     <p>Xfmr_FuelCapacity:
       <input type="text" name="Xfmr_FuelCapacity" value="" />
     </p>
     <p>Peak_kW_Prev_Year:
       <input type="text" name="Peak_kW_Prev_Year" value="" />
     </p>
     <p>Peak_kW_Prev_Month:
       <input type="text" name="Peak_kW_Prev_Month" value="" />
     </p>
   </div>
   <input type="submit" name="submit" value= "Create Transformer Information" />
 </form>


 <a href="Modify_upc_update_data_txdemand.php">Cancel</a>

 </div>
 <?php include("includes/footer.php"); ?>
