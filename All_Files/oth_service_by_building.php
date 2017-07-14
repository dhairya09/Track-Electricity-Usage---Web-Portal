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

    <?php
$mysql_hostname = "localhost";
$mysql_user     = "uscfmsco_elecusr";
$mysql_password = "trojan3434grand";
$mysql_database = "uscfmsco_elec";
$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");
?>



<button class="btn btn-success" onClick ="printDiv('printableArea')">PDF Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>
<!--
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'csv', escape: 'false'});">CSV/TXT Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'doc', escape: 'false'});">DOC Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'powerpoint', escape: 'false'});">PPT Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>
-->
<br><br>



<div id="printableArea">

<?php

$result = mysql_query("SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_OTH_TXDEMAND T1 LEFT JOIN elec_OTH_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-l]' ORDER BY 1 ");
$result2 = mysql_query("SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_OTH_TXDEMAND T1 LEFT JOIN elec_OTH_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[m-z]' ORDER BY 1 ");

echo 'OTH SERVICE BY BUILDING';
echo '<br><br>';
echo'*Grayed Cell indicates current position of switch<br>';
echo'<table id="table1" style="width:100%" CLASS="dispServiceTable">';
echo'<tr><td colspan="1" width = 49%>';
//echo'<table style="width:100%" CLASS="dispTable">';
echo '<table style="width:100%" CLASS="sortable">';
echo'<tr>
    <th colspan="5">Building</th>
    <th colspan="1">Pri.</th>
    <th colspan="1">Sec.</th>
    <th colspan="2">Vault</th>
    <th colspan="1">Service</th>
  </tr>';

$nullVar = NULL;
while($data = mysql_fetch_array($result))
{

$var1=empty($data['Building'])? $nullVar : $data['Building'];
$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
$var5=empty($data['Service'])? $nullVar : $data['Service'];

echo'<tr>';
echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

if($var3==NULL)
	echo '<td colspan="1" width = 10%>'.$var2.'</td>';
else
	echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

echo '<td colspan="1" width = 10%>'.$var3.'</td>';
echo '<td colspan="2" width = 20%>'.$var4.'</td>';
echo '<td colspan="1" width = 10%>'.$var5.'</td>';
echo'</tr>';
}
echo '</table>';
echo'</td><td colspan="1" width = 2%></td>';
echo'<td colspan="1" width = 49%>';

//echo'<table style="width:100%" CLASS="dispTable">';
echo '<table style="width:100%" CLASS="sortable">';
echo'<tr>
    <th colspan="5">Building</th>
    <th colspan="1">Pri.</th>
    <th colspan="1">Sec.</th>
    <th colspan="2">Vault</th>
    <th colspan="1">Service</th>
  </tr>';

$nullVar = NULL;
while($data2 = mysql_fetch_array($result2))
{

$var1=empty($data2['Building'])? $nullVar : $data2['Building'];
$var2=empty($data2['Pri'])? $nullVar : $data2['Pri'];
$var3=empty($data2['Sec'])? $nullVar : $data2['Sec'];
$var4=empty($data2['Vault'])? $nullVar : $data2['Vault'];
$var5=empty($data2['Service'])? $nullVar : $data2['Service'];

echo'<tr>';
echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

if($var3==NULL)
	echo '<td colspan="1" width = 10%>'.$var2.'</td>';
else
	echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

echo '<td colspan="1" width = 10%>'.$var3.'</td>';
echo '<td colspan="2" width = 20%>'.$var4.'</td>';
echo '<td colspan="1" width = 10%>'.$var5.'</td>';
echo'</tr>';
}
echo '</table>';
echo'</td></tr>';
echo'</table>';

?>

</div>

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
				© USC FMS - Engineering Services/Electrical. All Rights Reserved.
			</p>
		</div>
	</div>
</body>
</html>
