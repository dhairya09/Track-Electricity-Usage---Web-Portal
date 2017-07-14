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
  	if($_POST['formManholeSubmit'] == "ManholeSubmit")
  	{
		$errorMessage = "";
 		if(empty($_POST['formManhole']))
  		{
    		$errorMessage .= "<li>Manhole Number cannot be empty ... Please Enter Again!</li>";
  		}
   	 	$varManhole = $_POST['formManhole'];
   	 	
   	 	if(empty($_POST['campusType']))
  		{
    		$errorMessage .= "<li>Campus Type cannot be empty ... Please Enter Again!</li>";
  		}
   	 	$campus = $_POST['campusType'];
   	 	   	 	
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

mysql_query("INSERT INTO elec_".$campus."_manhole_submit(manhole, entry_date) VALUES (".PrepSQL($varManhole).",NOW())");

$resultP = mysql_query("SELECT distinct Building_Code,Building_Number FROM elec_".$campus."_TXDEMAND WHERE Primary_Manhole =(SELECT manhole FROM elec_".$campus."_manhole_submit order by entry_date desc LIMIT 0,1) ORDER BY Building_Code ASC ;");
?>
<button class="btn btn-success" onClick ="printDiv('printableArea')">PDF Export</button>			
<!--
<button class="btn btn-success" onClick ="$('#tableThis').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
<button class="btn btn-success" onClick ="$('#tableThis').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'csv', escape: 'false'});">CSV/TXT Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'doc', escape: 'false'});">DOC Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'powerpoint', escape: 'false'});">PPT Export</button>
<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>
-->
<div id="printableArea">
<br> Buildings affected by the manhole (Primary)<br>
<?php
//echo '<table style="width:60%" CLASS="dispTable">';
echo '<table id="tableThis" style="width:60%" CLASS="sortable">';  
echo'<th>Building_Code</th><th>Building_Number</th>'; 

while($data = mysql_fetch_array($resultP))
{
echo'<tr>'; 
echo '<td>'.$data['Building_Code'].'</td><td>'.$data['Building_Number'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
?>

<br>
<br> Buildings affected by the manhole (Secondary)<br>
<br>

<?php
$resultS = mysql_query("SELECT distinct Building_Code,Building_Number FROM elec_".$campus."_TXDEMAND WHERE Secondary_Manhole=(SELECT manhole FROM elec_".$campus."_manhole_submit order by entry_date desc LIMIT 0,1) ;");

echo '<table style="width:100%" CLASS="dispTable">';  
echo'<th>Building_Code</th><th>Building_Number</th>'; 

while($data2 = mysql_fetch_array($resultS))
{
echo'<tr>'; 
echo '<td>'.$data2['Building_Code'].'</td><td>'.$data2['Building_Number'].'</td>'; 
echo'</tr>'; 
}
echo '</table>'; 
?>

<br>
<br> Buildings affected by the manhole (Primary or Secondary)<br>
<br>
<?php

$resultPS = mysql_query("SELECT distinct Building_Code,Building_Number FROM elec_".$campus."_TXDEMAND WHERE Primary_Manhole =(SELECT manhole FROM elec_".$campus."_manhole_submit order by entry_date desc LIMIT 0,1) OR Secondary_Manhole=(SELECT manhole FROM elec_".$campus."_manhole_submit order by entry_date desc LIMIT 0,1) ;");
 
echo '<table style="width:100%" CLASS="dispTable">';  
echo'<th>Building_Code</th><th>Building_Number</th>'; 

while($data3 = mysql_fetch_array($resultPS))
{
echo'<tr>'; 
echo '<td>'.$data3['Building_Code'].'</td><td>'.$data3['Building_Number'].'</td>'; 
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