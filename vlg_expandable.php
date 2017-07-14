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
	<?php
$mysql_hostname = "localhost";
$mysql_user     = "uscfmsco_elecusr";
$mysql_password = "trojan3434grand";
$mysql_database = "uscfmsco_elec";
$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");

$resultkW=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_VLG_TXDEMAND");
$datakW=mysql_fetch_array($resultkW);

?>

<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php
echo'<th colspan="5"><a title="Peak kW Prev Month : '.($datakW[sumKWPrevMonth]).' | Peak kW Prev Year : '.($datakW[sumKWPrevYear]).'">The Village (VLG) | Peak kW : '.($datakW[sumKWPeak]).'</a></th>';
?>
<tr><td colspan="1" width = 60%>
<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php  
echo'<th colspan="12"><a title="Peak kW Prev Month : '.($datakW[sumKWPrevMonth]).' | Peak kW Prev Year : '.($datakW[sumKWPrevYear]).'">VLG | Peak kW : '.($datakW[sumKWPeak]).'</a></th>';
?>
</tr>
<tr><td colspan="1" width = 8%>

<ol class="tree">
	<li>
		<label for="subfolderA">Feeder VA</label>
		<input type="checkbox" id="subfolderA" />  
		<ol>
<?php
$resultA = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VA'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultA))
{
	$dataA = mysql_fetch_array($resultA);
	$var1=empty($dataA['Building_Code'])? $nullVar : $dataA['Building_Code'];
	$var2=empty($dataA['Peak_kW'])? $nullVar : $dataA['Peak_kW'];
	$var3=empty($dataA['Peak_kW_Prev_Year'])? $nullVar : $dataA['Peak_kW_Prev_Year'];
	$var4=empty($dataA['Peak_kW_Prev_Month'])? $nullVar : $dataA['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
	
</td>
<td colspan="1" width = 8%>

<ol class="tree">
	<li>
		<label for="subfolderB">Feeder VB</label>
		<input type="checkbox" id="subfolderB" />  
		<ol>
<?php
$resultB = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VB'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultB))
{
	$dataB = mysql_fetch_array($resultB);
	$var1=empty($dataB['Building_Code'])? $nullVar : $dataB['Building_Code'];
	$var2=empty($dataB['Peak_kW'])? $nullVar : $dataB['Peak_kW'];
	$var3=empty($dataB['Peak_kW_Prev_Year'])? $nullVar : $dataB['Peak_kW_Prev_Year'];
	$var4=empty($dataB['Peak_kW_Prev_Month'])? $nullVar : $dataB['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>

<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderC">Feeder VC</label>
		<input type="checkbox" id="subfolderC" />  
		<ol>
<?php
$resultC = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VC'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultC))
{
	$dataC = mysql_fetch_array($resultC);
	$var1=empty($dataC['Building_Code'])? $nullVar : $dataC['Building_Code'];
	$var2=empty($dataC['Peak_kW'])? $nullVar : $dataC['Peak_kW'];
	$var3=empty($dataC['Peak_kW_Prev_Year'])? $nullVar : $dataC['Peak_kW_Prev_Year'];
	$var4=empty($dataC['Peak_kW_Prev_Month'])? $nullVar : $dataC['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderF">Feeder VF</label>
		<input type="checkbox" id="subfolderF" />  
		<ol>
<?php
$resultF = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VF'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultF))
{
	$dataF = mysql_fetch_array($resultF);
	$var1=empty($dataF['Building_Code'])? $nullVar : $dataF['Building_Code'];
	$var2=empty($dataF['Peak_kW'])? $nullVar : $dataF['Peak_kW'];
	$var3=empty($dataF['Peak_kW_Prev_Year'])? $nullVar : $dataF['Peak_kW_Prev_Year'];
	$var4=empty($dataF['Peak_kW_Prev_Month'])? $nullVar : $dataF['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>

<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderG">Feeder VG</label>
		<input type="checkbox" id="subfolderG" />  
		<ol>
<?php
$resultG = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VG'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultG))
{
	$dataG = mysql_fetch_array($resultG);
	$var1=empty($dataG['Building_Code'])? $nullVar : $dataG['Building_Code'];
	$var2=empty($dataG['Peak_kW'])? $nullVar : $dataG['Peak_kW'];
	$var3=empty($dataG['Peak_kW_Prev_Year'])? $nullVar : $dataG['Peak_kW_Prev_Year'];
	$var4=empty($dataG['Peak_kW_Prev_Month'])? $nullVar : $dataG['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>



<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderI">Feeder VI</label>
		<input type="checkbox" id="subfolderI" />  
		<ol>
<?php
$resultI = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VI'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultI))
{
	$dataI = mysql_fetch_array($resultI);
	$var1=empty($dataI['Building_Code'])? $nullVar : $dataI['Building_Code'];
	$var2=empty($dataI['Peak_kW'])? $nullVar : $dataI['Peak_kW'];
	$var3=empty($dataI['Peak_kW_Prev_Year'])? $nullVar : $dataI['Peak_kW_Prev_Year'];
	$var4=empty($dataI['Peak_kW_Prev_Month'])? $nullVar : $dataI['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderK">Feeder VK</label>
		<input type="checkbox" id="subfolderK" />  
		<ol>
<?php
$resultK = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VK'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultK))
{
	$dataK = mysql_fetch_array($resultK);
	$var1=empty($dataK['Building_Code'])? $nullVar : $dataK['Building_Code'];
	$var2=empty($dataK['Peak_kW'])? $nullVar : $dataK['Peak_kW'];
	$var3=empty($dataK['Peak_kW_Prev_Year'])? $nullVar : $dataK['Peak_kW_Prev_Year'];
	$var4=empty($dataK['Peak_kW_Prev_Month'])? $nullVar : $dataK['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderL">Feeder VL</label>
		<input type="checkbox" id="subfolderL" />  
		<ol>
<?php
$resultL = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VL'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultL))
{
	$dataL = mysql_fetch_array($resultL);
	$var1=empty($dataL['Building_Code'])? $nullVar : $dataL['Building_Code'];
	$var2=empty($dataL['Peak_kW'])? $nullVar : $dataL['Peak_kW'];
	$var3=empty($dataL['Peak_kW_Prev_Year'])? $nullVar : $dataL['Peak_kW_Prev_Year'];
	$var4=empty($dataL['Peak_kW_Prev_Month'])? $nullVar : $dataL['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderM">Feeder VM</label>
		<input type="checkbox" id="subfolderM" />  
		<ol>
<?php
$resultM = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VM'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultM))
{
	$dataM = mysql_fetch_array($resultM);
	$var1=empty($dataM['Building_Code'])? $nullVar : $dataM['Building_Code'];
	$var2=empty($dataM['Peak_kW'])? $nullVar : $dataM['Peak_kW'];
	$var3=empty($dataM['Peak_kW_Prev_Year'])? $nullVar : $dataM['Peak_kW_Prev_Year'];
	$var4=empty($dataM['Peak_kW_Prev_Month'])? $nullVar : $dataM['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderN">Feeder VN</label>
		<input type="checkbox" id="subfolderN" />  
		<ol>
<?php
$resultN = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VN'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultN))
{
	$dataN = mysql_fetch_array($resultN);
	$var1=empty($dataN['Building_Code'])? $nullVar : $dataN['Building_Code'];
	$var2=empty($dataN['Peak_kW'])? $nullVar : $dataN['Peak_kW'];
	$var3=empty($dataN['Peak_kW_Prev_Year'])? $nullVar : $dataN['Peak_kW_Prev_Year'];
	$var4=empty($dataN['Peak_kW_Prev_Month'])? $nullVar : $dataN['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderO">Feeder VO</label>
		<input type="checkbox" id="subfolderO" />  
		<ol>
<?php
$resultO = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VO'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultO))
{
	$dataO = mysql_fetch_array($resultO);
	$var1=empty($dataO['Building_Code'])? $nullVar : $dataO['Building_Code'];
	$var2=empty($dataO['Peak_kW'])? $nullVar : $dataO['Peak_kW'];
	$var3=empty($dataO['Peak_kW_Prev_Year'])? $nullVar : $dataO['Peak_kW_Prev_Year'];
	$var4=empty($dataO['Peak_kW_Prev_Month'])? $nullVar : $dataO['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>




<td colspan="1" width = 8%>
<ol class="tree">
	<li>
		<label for="subfolderP">Feeder VP</label>
		<input type="checkbox" id="subfolderP" />  
		<ol>
<?php
$resultP = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_VLG_TXDEMAND WHERE Primary_Feed='VP'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultP))
{
	$dataP = mysql_fetch_array($resultP);
	$var1=empty($dataP['Building_Code'])? $nullVar : $dataP['Building_Code'];
	$var2=empty($dataP['Peak_kW'])? $nullVar : $dataP['Peak_kW'];
	$var3=empty($dataP['Peak_kW_Prev_Year'])? $nullVar : $dataP['Peak_kW_Prev_Year'];
	$var4=empty($dataP['Peak_kW_Prev_Month'])? $nullVar : $dataP['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>



</table>
</td>

</tr>
</table>

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