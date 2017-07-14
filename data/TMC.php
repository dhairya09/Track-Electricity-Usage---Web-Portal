<!DOCTYPE HTML>
<!-- Website designed by Nishant Nath ( www.nishantnath.com ) -->
<html lang="en-us">
<?php
$thisBuildingCode = "TMC";
?>
<head>
<meta charset="UTF-8" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="copyright" content="&copy;" />
<meta name="robot" content="noindex, nofollow" />
<title>USCFMS-ELEC</title>
	<link rel="stylesheet" href="../css/styles.css" type="text/css" />
</head>
<body>
	<div id="header">
    <div class="area">
			<div id="logo">
				<a href="../index.html"><img src="../images/fms-short.png" alt="LOGO" height="43" width="225" /></a>
                <br>
                <a href="../index.html"><img src="../images/fms-acronym-out.png" alt="LOGO" height="17" width="204" /></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="../index.html">Home</a>
				</li>
				<li>
					<a href="../about.html">About</a>
				</li>
				<li>
					<a href="../data.html">Data</a>
				</li>
				<li>
					<a href="../contact.html">Contact</a>
				</li>
			</ul>
		</div>
	</div>
    <div id="contentsTable">
    <?php
    //connection details - move to file based system later
	$mysql_hostname = "localhost";
	$mysql_user     = "uscfmsco_elecusr";
	$mysql_password = "trojan3434grand";
	$mysql_database = "uscfmsco_elec";
	$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
	mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
	
	$thisBuildingNameTemp = mysql_query("SELECT Building_Name FROM elec_upc_building_names WHERE Building_Code LIKE '%".$thisBuildingCode."%'");
	$thisBuildingName = mysql_fetch_array($thisBuildingNameTemp);
	$thisCodeTemp = mysql_query("SELECT Code FROM elec_upc_building_names WHERE Building_Code LIKE '%".$thisBuildingCode."%' LIMIT 0 , 1");
	$thisCode = mysql_fetch_array($thisCodeTemp);
	echo '<font size=4>'.$thisBuildingCode.' - <a href="http://fmsmaps2.usc.edu/mapguide2010/usc/php/facilities.php?OBJ_KEYS='.$thisCode[0].'">'.$thisBuildingName[0].'</a></font>';
    ?>
    <br><br>
    <?php
$result = mysql_query("SELECT * FROM elec_UPC_BUILDINGS WHERE Bldg_Cd_1 LIKE '%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>Associated Buildings</h2>';
echo '<table CLASS="dispTable">';  
echo'<th>Building_Number</th><th>Building_Code1</th><th>Building_Code2</th><th>Building_Code3</th><th>Building_Code4</th><th>Building_Code5</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['Bldg_Number'].'</td><td>'.$data['Bldg_Cd_1'].'</td><td>'.$data['Bldg_Cd_2'].'</td><td>'.$data['Bldg_Cd_3'].'</td><td>'.$data['Bldg_Cd_4'].'</td><td>'.$data['Bldg_Cd_5'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
}  
?>
<br>
	<?php
$result = mysql_query("SELECT * FROM elec_UPC_VACUUM_TRANSFER_SWITCH WHERE BUILDING_CODE like '%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>VACUUM / TRANSFER SWITCH</h2>';
echo '<table CLASS="dispTable">';  
echo'<th>BUILDING_CODE</th><th>VACUUM_SWITCH</th><th>TRANSFER_SWITCH</th><th>YEAR_REF_INST</th><th>REFERENCE</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['BUILDING_CODE'].'</td><td>'.$data['VACUUM_SWITCH'].'</td><td>'.$data['TRANSFER_SWITCH'].'</td><td>'.$data['YEAR_REF_INST'].'</td><td>'.$data['REFERENCE'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
}  
?>
<br>
    <?php
$result = mysql_query("SELECT * FROM view_txdemand WHERE Building like '%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>TX Demand</h2>';
echo '<table CLASS="dispTable">';  
echo'<th>Building</th><th>Ckt_P</th><th>Ckt_S</th><th>Fed_Through</th><th>kVA</th><th>Peak_kW</th><th>Peak_kW_Prev_Month</th><th>Peak_kW_Prev_Year</th><th>Peak_Usage</th><th>Voltage</th><th>Rotation</th><th>Device_Number</th><th>Level</th><th>Priority</th><th>Manufacturer</th><th>Type</th><th>Imp</th><th>Year</th><th>Capacity</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
if (substr($data['Manufacturer'],0,4)=="With" || substr($data['Manufacturer'],0,4)=="WITH" || substr($data['Manufacturer'],0,4)=="with")
{
echo '<td>'.$data['Building'].'</td><td>'.$data['Ckt_P'].'</td><td>'.$data['Ckt_S'].'</td><td>'.$data['Fed_Through'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Peak_kW'].'</td><td>'.$data['Peak_kW_Prev_Month'].'</td><td>'.$data['Peak_kW_Prev_Year'].'</td><td>'.$data['Peak_Usage'].'</td><td>'.$data['Voltage'].'</td><td>'.$data['Rotation'].'</td><td>'.$data['Device_Number'].'</td><td>'.$data['Level'].'</td><td>'.$data['Priority'].'</td><td><a style="text-decoration: none" href="'.(substr($data['Manufacturer'],5,3)).'.php">'.$data['Manufacturer'].'</a></td><td>'.$data['Type'].'</td><td>'.$data['Imp'].'</td><td>'.$data['Year'].'</td><td>'.$data['Capacity'].'</td>';
}
else
{ 
echo '<td>'.$data['Building'].'</td><td>'.$data['Ckt_P'].'</td><td>'.$data['Ckt_S'].'</td><td>'.$data['Fed_Through'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Peak_kW'].'</td><td>'.$data['Peak_kW_Prev_Month'].'</td><td>'.$data['Peak_kW_Prev_Year'].'</td><td>'.$data['Peak_Usage'].'</td><td>'.$data['Voltage'].'</td><td>'.$data['Rotation'].'</td><td>'.$data['Device_Number'].'</td><td>'.$data['Level'].'</td><td>'.$data['Priority'].'</td><td>'.$data['Manufacturer'].'</td><td>'.$data['Type'].'</td><td>'.$data['Imp'].'</td><td>'.$data['Year'].'</td><td>'.$data['Capacity'].'</td>'; 
} 
echo'</tr>'; 
}
echo '</table>';
}  
?>
<br>
<?php
$result = mysql_query("SELECT * FROM view_generators WHERE Bldg LIKE'%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>Generators</h2>';
echo '<table CLASS="dispTable">'; 
echo'<th>Bldg</th><th>Building</th><th>Equipment</th><th>Nomenclature</th><th>Floor</th><th>kW</th><th>kVA</th><th>Output_Voltage</th><th>Manufacturer</th><th>Mfrd_Year</th><th>Engine_Type</th><th>Fuel_In_Gallons</th><th>Fuel_Type</th><th>Location</th><th>Keyword</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
if (substr($data['Manufacturer'],0,4)=="With" || substr($data['Manufacturer'],0,4)=="WITH" || substr($data['Manufacturer'],0,4)=="with")
{
echo '<td>'.$data['Bldg'].'</td><td>'.$data['Building'].'</td><td>'.$data['Equipment'].'</td><td>'.$data['Nomenclature'].'</td><td>'.$data['Floor'].'</td><td>'.$data['kW'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Output_Voltage'].'</td><td><a style="text-decoration: none" href="'.(substr($data['Manufacturer'],5,3)).'.php">'.$data['Manufacturer'].'</a></td><td>'.$data['Mfrd_Year'].'</td><td>'.$data['Engine_Type'].'</td><td>'.$data['Fuel_In_Gallons'].'</td><td>'.$data['Fuel_Type'].'</td><td>'.$data['Location'].'</td><td>'.$data['Keyword'].'</td>'; 
}
else
{ 
echo '<td>'.$data['Bldg'].'</td><td>'.$data['Building'].'</td><td>'.$data['Equipment'].'</td><td>'.$data['Nomenclature'].'</td><td>'.$data['Floor'].'</td><td>'.$data['kW'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Output_Voltage'].'</td><td>'.$data['Manufacturer'].'</td><td>'.$data['Mfrd_Year'].'</td><td>'.$data['Engine_Type'].'</td><td>'.$data['Fuel_In_Gallons'].'</td><td>'.$data['Fuel_Type'].'</td><td>'.$data['Location'].'</td><td>'.$data['Keyword'].'</td>'; 
}
echo'</tr>'; 
}
echo '</table>';
}  
?>
<br>
<?php
$result = mysql_query("SELECT * FROM elec_UPC_HYDRAULIC_OIL_STORAGE WHERE Building_Code LIKE '%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>Hydraulic Oil Storage</h2>';
echo '<table CLASS="dispTable">';
echo'<th>Building_Code</th><th>Location</th><th>Address</th><th>Capacity</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['Building_Code'].'</td><td>'.$data['Location'].'</td><td>'.$data['Address'].'</td><td>'.$data['Capacity'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
}  
?>

<br>
<?php
$result = mysql_query("SELECT * FROM elec_USC_CONTACTS WHERE Building like '%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>CONTACTS</h2>';
echo '<table CLASS="dispTable">';
echo '<td>';
echo '<table CLASS="dispTable">';   
echo'<th>Building</th><th>LastName</th><th>FirstName</th><th>Telephone</th><th>JobTitle</th><th>Department</th><th>Note</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['Building'].'</td><td>'.$data['LastName'].'</td><td>'.$data['FirstName'].'</td><td>'.$data['Telephone'].'</td><td>'.$data['JobTitle'].'</td><td>'.$data['Department'].'</td><td>'.$data['Note'].'</td>'; 
echo'</tr>'; 
}

echo '</table></td>';
echo '<td>';
echo '<table CLASS="dispTable">';   
echo'<th>Email</th>'; 

$result = mysql_query("SELECT * FROM elec_USC_CONTACTS WHERE Building like '%".$thisBuildingCode."%'");

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['Email'].'</td>'; 
echo'</tr>'; 
}
echo '</table></td>';



echo '</table>';
}  
?>
<br>

<br>
<?php
$result = mysql_query("SELECT * FROM elec_USC_BUILDING_NOTES WHERE Building_Code like '%".$thisBuildingCode."%'");
if(mysql_num_rows($result)>0)
{
echo '<h2>BUILDING NOTES</h2>';
echo '<table CLASS="dispTable">';  
echo'<th>Building_Code</th><th>Note</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['Building_Code'].'</td><td>'.$data['Note'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
}  
?>
<br>

<?php
mysql_close($bd);
?>


    </div>
	<div id="footer">
		<span class="divider"></span>
		<div class="area">
			<div id="connect">
				<a href="" target="_blank" class="googleplus"></a> <a href="" target="_blank" class="mail"></a> <a href="" target="_blank" class="facebook"></a> <a href="" target="_blank" class="twitter"></a>
			</div>
			<p>
				Â© USC FMS - Engineering Services/Electrical. All Rights Reserved.
			</p>
		</div>
	</div>
</body>
</html>