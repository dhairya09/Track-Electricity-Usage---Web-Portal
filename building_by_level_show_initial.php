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
  	if($_POST['formLevelSubmit'] == "LevelSubmit")
  	{
		$errorMessage = "";
 		if(empty($_POST['formLevel']))
  		{
    		$errorMessage .= "<li>Level Number cannot be empty ... Please Enter Again!</li>";
  		}
   	 	$varLevel = $_POST['formLevel'];
		
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

mysql_query("INSERT INTO elec_UPC_level_submit(level, entry_date) VALUES (".PrepSQL($varLevel).",NOW())");

if($varLevel==100)
	$resultP = mysql_query("SELECT distinct Building_Code,Building_Number,Priority_Level,Priority_Order FROM elec_UPC_TXDEMAND WHERE Priority_Level is NOT NULL ;");
else	
	$resultP = mysql_query("SELECT distinct Building_Code,Building_Number,Priority_Level,Priority_Order FROM elec_UPC_TXDEMAND WHERE Priority_Level =(SELECT level FROM elec_UPC_level_submit order by entry_date desc LIMIT 0,1) ;");
?>
<br> Buildings affected by the Level : <?php echo $varLevel; ?><br>
<?php
//echo '<table style="width:60%" CLASS="dispTable">';
echo '<table style="width:80%" CLASS="sortable">';  
echo'<th>Building_Code</th><th>Building_Number</th><th>Priority_Level</th><th>Priority_Order</th>'; 

while($data = mysql_fetch_array($resultP))
{
echo'<tr>';
echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Building_Code'],0,3)).'.php">'.$data['Building_Code'].'</a></td>';
echo '<td>'.$data['Building_Number'].'</td><td>'.$data['Priority_Level'].'</td><td>'.$data['Priority_Order'].'</td>'; 
echo'</tr>'; 
}
echo '</table>';
?>

<!--
<meta http-equiv="refresh" content="1"; url=LevelForm_show.php>
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