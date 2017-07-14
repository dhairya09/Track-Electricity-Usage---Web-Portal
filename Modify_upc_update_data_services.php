<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>

<?php require_once("includes/header_update.php"); ?>

<?php

if(isset($_POST["insertDataSubmit"])){

  // validations
  $required_fields = array("Feeder_Name", "Vault_Name","Vault_Section");
  validate_presences($required_fields);



	if(empty($errors)){
		$query1 = "select COLUMN_NAME from information_schema.columns where TABLE_NAME = 'elec_upc_services'";
		$result1 = mysqli_query($connection,$query1);
		echo '<table style="width:80%" CLASS="dispTable">';

		while($data = mysqli_fetch_assoc($result1))
		{
		echo '<th>'.$data['COLUMN_NAME'].'</th>';
		}
		echo '</table>';


		$varFeederName = mysql_prep($_POST['Feeder_Name']);
		$varVaultName = mysql_prep($_POST['Vault_Name']);
		$varVaultSection = mysql_prep($_POST['Vault_Section']);

		$query2 = "INSERT INTO elec_upc_services(Feeder_Name, Vault_Name, Vault_Section) VALUES ( '{$varFeederName}','{$varVaultName}','{$varVaultSection}')";
		$result2 = mysqli_query($connection,$query2);
		//$result2 = mysqli_query("select COLUMN_NAME from information_schema.columns where TABLE_NAME = 'elec_UPC_SERVICES'");
		if($result2){
			$_SESSION["message"] = "Data Inserted";
		}
		else{
			$_SESSION["message"] = "Data Insertion Failed";
		}

	}
}

if(isset($_POST['updateDataSubmit']))
 {

   $required_fields = array("serviceType", "vaultType","vaultSectionType");
   validate_presences($required_fields);

   if(empty($errors)){
     $query3 = "UPDATE elec_upc_services SET Vault_Name=". {$varVaultName} .", Vault_Section=". {$varVaultSection}. " WHERE Feeder_Name=".{$varFeederName} ." LIMIT 1";
     $result3 = mysqli_query($connection,$query3);
     if($result3){
 			$_SESSION["message"] = "Data Updated";
 		}
 		else{
 			$_SESSION["message"] = "Data Updation Failed";
 		}


   }

}


?>

<div id="contentsTable">
<?php echo message(); ?>
<?php echo form_errors($errors); ?>
<form action="Modify_upc_update_data_services.php" method="post">
<table style="width:80%" CLASS="dispTable">
<td><input type="text" name="Feeder_Name" style="width: 99%;"></td>
<td><input type="text" name="Vault_Name" style="width: 99%;"></td>
<td><input type="text" name="Vault_Section" style="width: 99%;"></td>
</table>

<input type="submit" name="insertDataSubmit" value="InsertData">
</form>

<br><br>



<form action="Modify_upc_update_data_services.php" method="post">
<table style="width:80%" CLASS="dispTable">
<td>
<select name="serviceType">
<?php
$result = mysqli_query("select distinct Feeder_Name from elec_upc_services");
echo'<option value="Select...">Select...</option>';
while($data = mysql_fetch_array($result))
{
echo'<option value="'.$data[Feeder_Name].'">'.$data[Feeder_Name].'</option>';
}

?>
</select>
</td>

<td>
<select name="vaultType">
<?php
$result = mysql_query("select distinct Vault_Name from elec_UPC_SERVICES");
echo'<option value="Select...">Select...</option>';
while($data = mysql_fetch_array($result))
{
echo'<option value="'.$data[Vault_Name].'">'.$data[Vault_Name].'</option>';
}

?>
</select>
</td>

<td>
<select name="vaultSectionType">
<?php
$result = mysql_query("select distinct Vault_Section from elec_UPC_SERVICES");
echo'<option value="Select...">Select...</option>';
while($data = mysql_fetch_array($result))
{
echo'<option value="'.$data[Vault_Section].'">'.$data[Vault_Section].'</option>';
}

?>
</select>
</td>

</table>
<input type="submit" name="updateDataSubmit" value="UpdateData">
</form>




<?php include("includes/footer.php"); ?>
	<!--<div id="footer">
		<span class="divider"></span>
		<div class="area">
			<div id="connect">
				<a href="" target="_blank" class="googleplus"></a> <a href="" target="_blank" class="mail"></a> <a href="" target="_blank" class="facebook"></a> <a href="" target="_blank" class="twitter"></a>
			</div>
			<p>
				� USC FMS - Engineering Services/Electrical. All Rights Reserved.
			</p>
		</div>
	</div>
</body>
</html>-->
