<!DOCTYPE HTML>
<!-- Website designed by Nishant Nath ( www.nishantnath.com ) -->
<html lang="en-us">
<head>
<meta charset="UTF-8" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="pragma" content="no-cache" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="copyright" content="&copy;" />
<meta name="robot" content="noindex, nofollow" />
<script type="text/javascript" src="js/sorttable.js"></script>
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.base64.js"></script>
<script type="text/javascript" src="js/tableExport.js"></script>
<script type="text/javascript" src="js/sprintf.js"></script>
<script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript" src="js/base64.js"></script>
<script type="text/javascript" src="js/html2canvas.js"></script>
<script type="text/javascript" src="js/printArea.js"></script>
<title>USCFMS-ELEC</title>
	<link rel="stylesheet" href="css/styles.css" type="text/css" />
</head>
<body>
	<div id="header">
    <div class="area">
			<div id="logo">
				<a href="index.html"><img src="images/fms-short.png" alt="LOGO" height="43" width="225" /></a>
                <br>
                <a href="index.html"><img src="images/fms-acronym-out.png" alt="LOGO" height="17" width="204" /></a>
			</div>
			<ul id="navigation">
				<li class="selected">
					<a href="index.html">Home</a>
				</li>
				<li>
					<a href="about.html">About</a>
				</li>
				<li>
					<a href="data.html">Data</a>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
			</ul>
		</div>
	</div>
    <div id="contentsTable">
    <br>
    <?php
  	if($_POST['formServiceSubmit'] == "ServiceQuerySubmit")
  	{
		$errorMessage = "";
		$varServiceName = $_POST['serviceName'];
		$varVaultSection = $_POST['vaultSection'];
		$varAffectingType = $_POST['affectingType'];
		$campus = $_POST['campusType'];
 		if(empty($varServiceName))
  		{
    		$errorMessage .= "<li>Service cannot be empty ... Please Choose Again!</li>";
  		}
		if(empty($varVaultSection))
  		{
    		$errorMessage .= "<li>Vault Section cannot be empty ... Please Choose Again!</li>";
  		}
		if(empty($varAffectingType))
  		{
    		$errorMessage .= "<li>Affecting Type cannot be empty ... Please Choose Again!</li>";
  		}
  		if(empty($campus))
  		{
    		$errorMessage .= "<li>Campus Type cannot be empty ... Please Enter Again!</li>";
  		}
		if(!empty($errorMessage))
  		{
    		echo("<p>There was an error with your form:</p>\n");
    		echo("<ul>" . $errorMessage . "</ul>\n");
  		} 
		
 	 }

$mysql_hostname = "localhost";
$mysql_user     = "uscfmsco_elecusr";
$mysql_password = "trojan3434grand";
$mysql_database = "uscfmsco_elec";
$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");

function PrepSQL($value)
{
	if(get_magic_quotes_gpc())
	{
		$value=stripslashes($value);
	}

	$value = "'".mysql_real_escape_string($value)."'";
	return($value);
}

mysql_query("INSERT INTO elec_".$campus."_service_submit(Service,VaultSection,AffectingType,entry_date) VALUES(".PrepSQL($varServiceName).",".PrepSQL($varVaultSection).",".PrepSQL($varAffectingType).",NOW())");

if(PrepSQL($varVaultSection)=="'1'")
{
	$result = mysql_query("SELECT Building_Code,Building_Number FROM elec_".$campus."_TXDEMAND WHERE Primary_Feed in (SELECT distinct Feeder_Name FROM elec_".$campus."_SERVICES WHERE Vault_Name='".$varServiceName."' and Vault_Section='1') ORDER BY Building_Code ASC;");
}
else if(PrepSQL($varVaultSection)=="'2'")
{
	$result = mysql_query("SELECT Building_Code,Building_Number FROM elec_".$campus."_TXDEMAND WHERE Primary_Feed in (SELECT distinct Feeder_Name FROM elec_".$campus."_SERVICES WHERE Vault_Name='".$varServiceName."' and Vault_Section='2') ORDER BY Building_Code ASC;");
}
else if(PrepSQL($varVaultSection)=="'1 OR 2'")
{
	$result = mysql_query("SELECT Building_Code,Building_Number FROM elec_".$campus."_TXDEMAND WHERE Primary_Feed in (SELECT distinct Feeder_Name FROM elec_".$campus."_SERVICES WHERE Vault_Name='".$varServiceName."' and (Vault_Section='1' OR Vault_Section='2')) ORDER BY Building_Code ASC;");
}


?>

<button class="btn btn-success" onClick ="printDiv('printableArea')">PDF Export</button>			
<button class="btn btn-success" onClick ="$('#tableThis').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
<button class="btn btn-success" onClick ="$('#tableThis').tableExport({type: 'png', escape: 'false'});">PNG Export</button>
<!--
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'csv', escape: 'false'});">CSV/TXT Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'doc', escape: 'false'});">DOC Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'powerpoint', escape: 'false'});">PPT Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>
-->
<div id="printableArea">

<br> Buildings affected by the service 
<?php printf("%s ",PrepSQL($varServiceName)); ?>
with Vault Section 
<?php printf("%s ",PrepSQL($varVaultSection)); ?>
affecting 
<?php printf("%s ",PrepSQL($varAffectingType)); ?>
<br>
<?php
//echo '<table style="width:60%" CLASS="dispTable">';
echo '<table id="tableThis" style="width:60%" CLASS="sortable">';  
echo'<th>Building_Code</th><th>Building_Number</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
echo '<td>'.$data['Building_Code'].'</td><td>'.$data['Building_Number'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
?>

</div>

<!--
<meta http-equiv="refresh" content="1"; url=manholeForm_show.php>
-->
    </div>
	<div id="footer">
		<span class="divider"></span>
		<div class="area">
			<div id="connect">
				<a href="" target="_blank" class="googleplus"></a> <a href="" target="_blank" class="mail"></a> <a href="" target="_blank" class="facebook"></a> <a href="" target="_blank" class="twitter"></a>
			</div>
			<p>
				© USC FMS - Engineering Services/Electrical. All Rights Reserved.
			</p>
		</div>
	</div>
</body>
</html>