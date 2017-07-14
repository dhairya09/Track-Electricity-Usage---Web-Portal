<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>

<?php
    if(isset($_POST["submit"])){


      $required_fields = array("Building_Code","Building_Number","Primary_Feeder_ID", "Secondary_Feeder_ID", "Primary_Feed","Primary_Manhole","Primary_Handhole","Secondary_Feed","Secondary_Manhole","Secondary_Handhole","Generator_SizekW","Gen_SizekVA","Gen_Voltage","Gen_Manufacturer","Gen_ModelYear","Gen_EquipNumber","Gen_EngineType","Gen_FuelCapacity","Gen_FuelType","Gen_Location","Gen_LoadSupport","DPF","ATS");

      validate_presences($required_fields);



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


          $query = "INSERT into elec_upc_generators( ";
          $query.= "Building_Code, Building_Number,Primary_Feeder_ID, Secondary_Feeder_ID, Primary_Feed,Primary_Manhole,Primary_Handhole,Secondary_Feed,Secondary_Manhole,Secondary_Handhole,Generator_SizekW,Gen_SizekVA,Gen_Voltage,Gen_Manufacturer,Gen_ModelYear,Gen_EquipNumber,Gen_EngineType,Gen_FuelCapacity,Gen_FuelType,Gen_Location,Gen_LoadSupport,DPF,ATS,Sound_Attenuation";
          $query.= ") VALUES (";
          $query.= "'{$building_Code}',{$building_Number},{$varPrimary_Feeder_ID}, {$varSecondary_Feeder_ID}, '{$varPrimary_Feed}', '{$varPrimary_Manhole}', '{$varPrimary_Handhole}', '{$varSecondary_Feed}', '{$varSecondary_Manhole}', '{$varSecondary_Handhole}', {$varGenerator_SizekW}, {$varGen_SizekVA}, '{$varGen_Voltage}','{$varGen_Manufacturer}','{$varGen_ModelYear}', '{$varGen_EquipNumber}', '{$varGen_EngineType}',";
          $query.= " '{$varGen_FuelCapacity}', '{$varGen_FuelType}', '{$varGen_Location}', '{$varGen_LoadSupport}', '{$DPF}', {$ATS}, '{$sound_att}' ";
          $query.= ")";

          $result = mysqli_query($connection,$query);
          if($result){
            $_SESSION["message"] = "Generator Information Created";
            redirect_to("Modify_upc_update_data_generators.php");
          }
          else{
              echo "Error is:" . mysqli_error($connection);
                $_SESSION["message"] = "Generator Information Creation failed";
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
  <div>
  <h2>Create Generator</h2>
  (Inset <b>NULL</b> in case of leaving the textfield blank)
  </div>

  <form action="new_generator.php" method="post">
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
    <p>Generator_SizekW:
      <input type="text" name="Generator_SizekW" value="" />
    </p>
    <p>Gen_SizekVA:
      <input type="text" name="Gen_SizekVA" value="" />
    </p>
    <p>Gen_Voltage:
      <input type="text" name="Gen_Voltage" value="" />
    </p>
    <p>Gen_Manufacturer:
      <input type="text" name="Gen_Manufacturer" value="" />
    </p>
    <p>Gen_ModelYear:
      <input type="text" name="Gen_ModelYear" value="" />
    </p>
    <p>Gen_EquipNumber:
      <input type="text" name="Gen_EquipNumber" value="" />
    </p>
    <p>Gen_EngineType:
      <input type="text" name="Gen_EngineType" value="" />
    </p>
    <p>Gen_FuelCapacity:
      <input type="text" name="Gen_FuelCapacity" value="" />
    </p>
    <p>Gen_FuelType:
      <input type="text" name="Gen_FuelType" value="" />
    </p>
    <p>Gen_Location:
      <input type="text" name="Gen_Location" value="" />
    </p>
    <p>Gen_LoadSupport:
      <input type="text" name="Gen_LoadSupport" value="" />
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
    <input type="submit" name="submit" value="Create Generator" />
  </form>

  <br/>
  <a href="Modify_upc_update_data_generators.php">Cancel</a>
</div>
</div>
<?php include("includes/footer.php"); ?>
