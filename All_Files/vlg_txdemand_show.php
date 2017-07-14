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
<h3>VLG TX-Demand</h3>
<?php
$result = mysql_query("SELECT * FROM VIEW_TXDEMAND_VLG ORDER BY Building ASC");
//echo '<table style="width:100%" CLASS="dispTable">'; 
echo '<table id="table1" style="width:100%" CLASS="sortable">'; 
echo'<th>Building</th><th>Ckt_P</th><th>Ckt_S</th><th>Fed_Through</th><th>kVA</th><th>Peak_kW</th><th>Peak_kW_Prev_Month</th><th>Peak_kW_Prev_Year</th><th>Peak_Usage</th><th>Voltage</th><th>Rotation</th><th>Device_Number</th><th>Level</th><th>Priority</th><th>Manufacturer</th><th>Type</th><th>Imp</th><th>Year</th><th>Capacity</th>'; 

while($data = mysql_fetch_array($result))
{
echo'<tr>'; 
if (substr($data['Manufacturer'],0,4)=="With" || substr($data['Manufacturer'],0,4)=="WITH" || substr($data['Manufacturer'],0,4)=="with")
{
echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Building'],0,3)).'.php">'.$data['Building'].'</a></td><td>'.$data['Ckt_P'].'</td><td>'.$data['Ckt_S'].'</td><td>'.$data['Fed_Through'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Peak_kW'].'</td><td>'.$data['Peak_kW_Prev_Month'].'</td><td>'.$data['Peak_kW_Prev_Year'].'</td><td>'.$data['Peak_Usage'].'</td><td>'.$data['Voltage'].'</td><td>'.$data['Rotation'].'</td><td>'.$data['Device_Number'].'</td><td>'.$data['Level'].'</td><td>'.$data['Priority'].'</td><td><a style="text-decoration: none" href="data/'.(substr($data['Manufacturer'],5,3)).'.php">'.$data['Manufacturer'].'</a></td><td>'.$data['Type'].'</td><td>'.$data['Imp'].'</td><td>'.$data['Year'].'</td><td>'.$data['Capacity'].'</td>'; 
}
else
{ 
echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Building'],0,3)).'.php">'.$data['Building'].'</a></td><td>'.$data['Ckt_P'].'</td><td>'.$data['Ckt_S'].'</td><td>'.$data['Fed_Through'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Peak_kW'].'</td><td>'.$data['Peak_kW_Prev_Month'].'</td><td>'.$data['Peak_kW_Prev_Year'].'</td><td>'.$data['Peak_Usage'].'</td><td>'.$data['Voltage'].'</td><td>'.$data['Rotation'].'</td><td>'.$data['Device_Number'].'</td><td>'.$data['Level'].'</td><td>'.$data['Priority'].'</td><td>'.$data['Manufacturer'].'</td><td>'.$data['Type'].'</td><td>'.$data['Imp'].'</td><td>'.$data['Year'].'</td><td>'.$data['Capacity'].'</td>'; 
}
echo'</tr>'; 
}

echo '</table>';  
?>
</div>
    </div>
	<div id="footer">
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
</html>