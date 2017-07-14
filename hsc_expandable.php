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

$resultkW1SVR=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_HSC_TXDEMAND WHERE Primary_Feed IN ('4','5')");
$resultkW2DWP=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_HSC_TXDEMAND WHERE Primary_Feed IN ('UNH','UNH+HCC')");
$dataKW1SVR=mysql_fetch_array($resultkW1SVR);
$datakW2DWP=mysql_fetch_array($resultkW2DWP);


$resultkW1CHP=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_HSC_TXDEMAND WHERE Primary_Feed IN ('A','B','C','H')");
$resultkW2CHP=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_HSC_TXDEMAND WHERE Primary_Feed IN ('D','E','F','G')");
$datakW1CHP=mysql_fetch_array($resultkW1CHP);
$datakW2CHP=mysql_fetch_array($resultkW2CHP);

?>

<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php
echo'<th colspan="5"><a title="Peak kW Prev Month : '.($datakW1CHP[sumKWPrevMonth]+$datakW2CHP[sumKWPrevMonth]+$dataKW1SVR[sumKWPrevMonth]+$datakW2DWP[sumKWPrevMonth]).' | Peak kW Prev Year : '.($datakW1CHP[sumKWPrevYear]+$datakW2CHP[sumKWPrevYear]+$dataKW1SVR[sumKWPrevYear]+$datakW2DWP[sumKWPrevYear]).'">Health Science Campus (HSC) | Peak kW : '.($datakW1CHP[sumKWPeak]+$datakW2CHP[sumKWPeak]+$dataKW1SVR[sumKWPeak]+$datakW2DWP[sumKWPeak]).'</a></th>';
?>
<tr><td colspan="1" width = 60%>
<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php  
echo'<th colspan="8"><a title="Peak kW Prev Month : '.($datakW1CHP[sumKWPrevMonth]+$datakW2CHP[sumKWPrevMonth]).' | Peak kW Prev Year : '.($datakW1CHP[sumKWPrevYear]+$datakW2CHP[sumKWPrevYear]).'">CHP | Peak kW : '.($datakW1CHP[sumKWPeak]+$datakW2CHP[sumKWPeak]).'</a></th>';
echo'</tr><tr><th colspan="4"><a title="Peak kW Prev Month : '.$datakW1CHP[sumKWPrevMonth].' | Peak kW Prev Year : '.$datakW1CHP[sumKWPrevYear].'">CHP #1 | Peak kW : '.$datakW1CHP[sumKWPeak].'</a></th>';
echo'<th colspan="4"><a title="Peak kW Prev Month : '.$datakW2CHP[sumKWPrevMonth].' | Peak kW Prev Year : '.$datakW2CHP[sumKWPrevYear].'">CHP #2 | Peak kW : '.$datakW2CHP[sumKWPeak].'</a></th>';
?>
</tr>
<tr><td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderA">Feeder A</label>
		<input type="checkbox" id="subfolderA" />  
		<ol>
<?php
$resultA = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='A'");

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
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderB">Feeder B</label>
		<input type="checkbox" id="subfolderB" />  
		<ol>
<?php
$resultB = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='B'");

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
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderC">Feeder C</label>
		<input type="checkbox" id="subfolderC" />  
		<ol>
<?php
$resultC = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='C'");

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
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderH">Feeder H</label>
		<input type="checkbox" id="subfolderH" />  
		<ol>
<?php
$resultH = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='H'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultH))
{
	$dataH = mysql_fetch_array($resultH);
	$var1=empty($dataH['Building_Code'])? $nullVar : $dataH['Building_Code'];
	$var2=empty($dataH['Peak_kW'])? $nullVar : $dataH['Peak_kW'];
	$var3=empty($dataH['Peak_kW_Prev_Year'])? $nullVar : $dataH['Peak_kW_Prev_Year'];
	$var4=empty($dataH['Peak_kW_Prev_Month'])? $nullVar : $dataH['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>


</td>

<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderD">Feeder D</label>
		<input type="checkbox" id="subfolderD" />  
		<ol>
<?php
$resultD = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='D'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultD))
{
	$dataD = mysql_fetch_array($resultD);
	$var1=empty($dataD['Building_Code'])? $nullVar : $dataD['Building_Code'];
	$var2=empty($dataD['Peak_kW'])? $nullVar : $dataD['Peak_kW'];
	$var3=empty($dataD['Peak_kW_Prev_Year'])? $nullVar : $dataD['Peak_kW_Prev_Year'];
	$var4=empty($dataD['Peak_kW_Prev_Month'])? $nullVar : $dataD['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>

</td>
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderE">Feeder E</label>
		<input type="checkbox" id="subfolderE" />  
		<ol>
<?php
$resultE = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='E'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultE))
{
	$dataE = mysql_fetch_array($resultE);
	$var1=empty($dataE['Building_Code'])? $nullVar : $dataE['Building_Code'];
	$var2=empty($dataE['Peak_kW'])? $nullVar : $dataE['Peak_kW'];
	$var3=empty($dataE['Peak_kW_Prev_Year'])? $nullVar : $dataE['Peak_kW_Prev_Year'];
	$var4=empty($dataE['Peak_kW_Prev_Month'])? $nullVar : $dataE['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>


</td>
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderF">Feeder F</label>
		<input type="checkbox" id="subfolderF" />  
		<ol>
<?php
$resultF = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='F'");

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
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderG">Feeder G</label>
		<input type="checkbox" id="subfolderG" />  
		<ol>
<?php
$resultG = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='G'");

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

</table>
</td>

<td colspan="1" width = 1%>
<table style="width:100%" CLASS="dispUtilTable">
<th colspan="1"> | </th>
<tr><th colspan="1"> | </th></tr>
</table>
</td>

<td colspan="1" width = 15%>
<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php
echo'<th colspan="2"><a title="Peak kW Prev Month : '.($dataKW1SVR[sumKWPrevMonth]).' | Peak kW Prev Year : '.($dataKW1SVR[sumKWPrevYear]).'">SVR | Peak kW : '.($dataKW1SVR[sumKWPeak]).'</a></th>';
echo'<tr></tr><th colspan="2"><a title="Peak kW Prev Month : '.$dataKW1SVR[sumKWPrevMonth].' | Peak kW Prev Year : '.$dataKW1SVR[sumKWPrevYear].'">SVR | Peak kW : '.$dataKW1SVR[sumKWPeak].'</a></th>';
?>
</tr>
<tr><td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolder4">Feeder 4</label>
		<input type="checkbox" id="subfolder4" />  
		<ol>
<?php
$result4 = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='4'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($result4))
{
	$data4 = mysql_fetch_array($result4);
	$var1=empty($data4['Building_Code'])? $nullVar : $data4['Building_Code'];
	$var2=empty($data4['Peak_kW'])? $nullVar : $data4['Peak_kW'];
	$var3=empty($data4['Peak_kW_Prev_Year'])? $nullVar : $data4['Peak_kW_Prev_Year'];
	$var4=empty($data4['Peak_kW_Prev_Month'])? $nullVar : $data4['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
	
</td>
<td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolder5">Feeder 5</label>
		<input type="checkbox" id="subfolder5" />  
		<ol>
<?php
$result5 = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='5'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($result5))
{
	$data5 = mysql_fetch_array($result5);
	$var1=empty($data5['Building_Code'])? $nullVar : $data5['Building_Code'];
	$var2=empty($data5['Peak_kW'])? $nullVar : $data5['Peak_kW'];
	$var3=empty($data5['Peak_kW_Prev_Year'])? $nullVar : $data5['Peak_kW_Prev_Year'];
	$var4=empty($data5['Peak_kW_Prev_Month'])? $nullVar : $data5['Peak_kW_Prev_Month'];
	
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


<!-- here 3rd big column starts -->
<td colspan="1" width = 1%>
<table style="width:100%" CLASS="dispUtilTable">
<th colspan="1"> | </th>
<tr><th colspan="1"> | </th></tr>
</table>
</td>

<td colspan="1" width = 8%>
<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php
echo'<th colspan="2"><a title="Peak kW Prev Month : '.($dataKW2DWP[sumKWPrevMonth]).' | Peak kW Prev Year : '.($dataKW2DWP[sumKWPrevYear]).'">DWP | Peak kW : '.($dataKW2DWP[sumKWPeak]).'</a></th>';
echo'<tr></tr><th colspan="2"><a title="Peak kW Prev Month : '.$dataKW2DWP[sumKWPrevMonth].' | Peak kW Prev Year : '.$dataKW2DWP[sumKWPrevYear].'">DWP | Peak kW : '.$dataKW2DWP[sumKWPeak].'</a></th>';
?>
</tr>
<tr><td colspan="1" width = 7.5%>

<ol class="tree">
	<li>
		<label for="subfolderUNH">Feeder UNH</label>
		<input type="checkbox" id="subfolderUNH" />  
		<ol>
<?php
$resultUNH = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_HSC_TXDEMAND WHERE Primary_Feed='UNH'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultUNH))
{
	$dataUNH = mysql_fetch_array($resultUNH);
	$var1=empty($dataUNH['Building_Code'])? $nullVar : $dataUNH['Building_Code'];
	$var2=empty($dataUNH['Peak_kW'])? $nullVar : $dataUNH['Peak_kW'];
	$var3=empty($dataUNH['Peak_kW_Prev_Year'])? $nullVar : $dataUNH['Peak_kW_Prev_Year'];
	$var4=empty($dataUNH['Peak_kW_Prev_Month'])? $nullVar : $dataUNH['Peak_kW_Prev_Month'];
	
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