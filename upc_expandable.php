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

$resultkW1J=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_UPC_TXDEMAND WHERE Primary_Feed IN ('K','L','M','S','T')");
$resultkW2J=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_UPC_TXDEMAND WHERE Primary_Feed IN ('N','P','Q','R')");
$dataKW1J=mysql_fetch_array($resultkW1J);
$dataKW2J=mysql_fetch_array($resultkW2J);


$resultkW1B=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_UPC_TXDEMAND WHERE Primary_Feed IN ('A','B','C','G','I','Z')");
$resultkW2B=mysql_query("SELECT SUM(Peak_kW) as sumKWPeak, SUM(Peak_kW_Prev_Month) as sumKWPrevMonth, SUM(Peak_kW_Prev_Year) as sumKWPrevYear FROM elec_UPC_TXDEMAND WHERE Primary_Feed IN ('D','E','F','H','J','X')");
$dataKW1B=mysql_fetch_array($resultkW1B);
$dataKW2B=mysql_fetch_array($resultkW2B);

?>

<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php
echo'<th colspan="3"><a title="Peak kW Prev Month : '.($dataKW1B[sumKWPrevMonth]+$dataKW2B[sumKWPrevMonth]+$dataKW1J[sumKWPrevMonth]+$dataKW2J[sumKWPrevMonth]).' | Peak kW Prev Year : '.($dataKW1B[sumKWPrevYear]+$dataKW2B[sumKWPrevYear]+$dataKW1J[sumKWPrevYear]+$dataKW2J[sumKWPrevYear]).'">University Park Campus (UPC) | Peak kW : '.($dataKW1B[sumKWPeak]+$dataKW2B[sumKWPeak]+$dataKW1J[sumKWPeak]+$dataKW2J[sumKWPeak]).'</a></th>';
?>
<tr><td colspan="1" width = 49%>
<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php  
echo'<th colspan="12"><a title="Peak kW Prev Month : '.($dataKW1B[sumKWPrevMonth]+$dataKW2B[sumKWPrevMonth]).' | Peak kW Prev Year : '.($dataKW1B[sumKWPrevYear]+$dataKW2B[sumKWPrevYear]).'">Biegler | Peak kW : '.($dataKW1B[sumKWPeak]+$dataKW2B[sumKWPeak]).'</a></th>';
echo'</tr><tr><th colspan="6"><a title="Peak kW Prev Month : '.$dataKW1B[sumKWPrevMonth].' | Peak kW Prev Year : '.$dataKW1B[sumKWPrevYear].'">Biegler #1 | Peak kW : '.$dataKW1B[sumKWPeak].'</a></th>';
echo'<th colspan="6"><a title="Peak kW Prev Month : '.$dataKW2B[sumKWPrevMonth].' | Peak kW Prev Year : '.$dataKW2B[sumKWPrevYear].'">Biegler #2 | Peak kW : '.$dataKW2B[sumKWPeak].'</a></th>';
?>
</tr>
<tr><td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderA">Feeder A</label>
		<input type="checkbox" id="subfolderA" />  
		<ol>
<?php
$resultA = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='A'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderB">Feeder B</label>
		<input type="checkbox" id="subfolderB" />  
		<ol>
<?php
$resultB = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='B'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderC">Feeder C</label>
		<input type="checkbox" id="subfolderC" />  
		<ol>
<?php
$resultC = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='C'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderG">Feeder G</label>
		<input type="checkbox" id="subfolderG" />  
		<ol>
<?php
$resultG = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='G'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderI">Feeder I</label>
		<input type="checkbox" id="subfolderI" />  
		<ol>
<?php
$resultI = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='I'");

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

<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderZ">Feeder Z</label>
		<input type="checkbox" id="subfolderZ" />  
		<ol>
<?php
$resultZ = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='Z'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultZ))
{
	$dataZ = mysql_fetch_array($resultZ);
	$var1=empty($dataZ['Building_Code'])? $nullVar : $dataZ['Building_Code'];
	$var2=empty($dataZ['Peak_kW'])? $nullVar : $dataZ['Peak_kW'];
	$var3=empty($dataZ['Peak_kW_Prev_Year'])? $nullVar : $dataZ['Peak_kW_Prev_Year'];
	$var4=empty($dataZ['Peak_kW_Prev_Month'])? $nullVar : $dataZ['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>
</td>


<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderD">Feeder D</label>
		<input type="checkbox" id="subfolderD" />  
		<ol>
<?php
$resultD = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='D'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderE">Feeder E</label>
		<input type="checkbox" id="subfolderE" />  
		<ol>
<?php
$resultE = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='E'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderF">Feeder F</label>
		<input type="checkbox" id="subfolderF" />  
		<ol>
<?php
$resultF = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='F'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderH">Feeder H</label>
		<input type="checkbox" id="subfolderH" />  
		<ol>
<?php
$resultH = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='H'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderJ">Feeder J</label>
		<input type="checkbox" id="subfolderJ" />  
		<ol>
<?php
$resultJ = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='J'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultJ))
{
	$dataJ = mysql_fetch_array($resultJ);
	$var1=empty($dataJ['Building_Code'])? $nullVar : $dataJ['Building_Code'];
	$var2=empty($dataJ['Peak_kW'])? $nullVar : $dataJ['Peak_kW'];
	$var3=empty($dataJ['Peak_kW_Prev_Year'])? $nullVar : $dataJ['Peak_kW_Prev_Year'];
	$var4=empty($dataJ['Peak_kW_Prev_Month'])? $nullVar : $dataJ['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>

</td>
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderX">Feeder X</label>
		<input type="checkbox" id="subfolderX" />  
		<ol>
<?php
$resultX = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='X'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultX))
{
	$dataX = mysql_fetch_array($resultX);
	$var1=empty($dataX['Building_Code'])? $nullVar : $dataX['Building_Code'];
	$var2=empty($dataX['Peak_kW'])? $nullVar : $dataX['Peak_kW'];
	$var3=empty($dataX['Peak_kW_Prev_Year'])? $nullVar : $dataX['Peak_kW_Prev_Year'];
	$var4=empty($dataX['Peak_kW_Prev_Month'])? $nullVar : $dataX['Peak_kW_Prev_Month'];
	
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

<td colspan="1" width = 2%>
<table style="width:100%" CLASS="dispUtilTable">
<th colspan="1"> | </th>
<tr><th colspan="1"> | </th></tr>
</table>
</td>

<td colspan="1" width = 49%>
<table style="width:100%" CLASS="dispUtilTable">
<tr>
<?php
echo'<th colspan="9"><a title="Peak kW Prev Month : '.($dataKW1J[sumKWPrevMonth]+$dataKW2J[sumKWPrevMonth]).' | Peak kW Prev Year : '.($dataKW1J[sumKWPrevYear]+$dataKW2J[sumKWPrevYear]).'">Jefferson | Peak kW : '.($dataKW1J[sumKWPeak]+$dataKW2J[sumKWPeak]).'</a></th>';
echo'<tr></tr><th colspan="5"><a title="Peak kW Prev Month : '.$dataKW1J[sumKWPrevMonth].' | Peak kW Prev Year : '.$dataKW1J[sumKWPrevYear].'">Jefferson #1 | Peak kW : '.$dataKW1J[sumKWPeak].'</a></th>';
echo'<th colspan="4"><a title="Peak kW Prev Month : '.$dataKW2J[sumKWPrevMonth].' | Peak kW Prev Year : '.$dataKW2J[sumKWPrevYear].'">Jefferson #2 | Peak kW : '.$dataKW2J[sumKWPeak].'</a></th>';
?>
</tr>
<tr><td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderK">Feeder K</label>
		<input type="checkbox" id="subfolderK" />  
		<ol>
<?php
$resultK = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='K'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderL">Feeder L</label>
		<input type="checkbox" id="subfolderL" />  
		<ol>
<?php
$resultL = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='L'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderM">Feeder M</label>
		<input type="checkbox" id="subfolderM" />  
		<ol>
<?php
$resultM = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='M'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderS">Feeder S</label>
		<input type="checkbox" id="subfolderS" />  
		<ol>
<?php
$resultS = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='S'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultS))
{
	$dataS = mysql_fetch_array($resultS);
	$var1=empty($dataS['Building_Code'])? $nullVar : $dataS['Building_Code'];
	$var2=empty($dataS['Peak_kW'])? $nullVar : $dataS['Peak_kW'];
	$var3=empty($dataS['Peak_kW_Prev_Year'])? $nullVar : $dataS['Peak_kW_Prev_Year'];
	$var4=empty($dataS['Peak_kW_Prev_Month'])? $nullVar : $dataS['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>


</td>
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderT">Feeder T</label>
		<input type="checkbox" id="subfolderT" />  
		<ol>
<?php
$resultT = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='T'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultT))
{
	$dataT = mysql_fetch_array($resultT);
	$var1=empty($dataT['Building_Code'])? $nullVar : $dataT['Building_Code'];
	$var2=empty($dataT['Peak_kW'])? $nullVar : $dataT['Peak_kW'];
	$var3=empty($dataT['Peak_kW_Prev_Year'])? $nullVar : $dataT['Peak_kW_Prev_Year'];
	$var4=empty($dataT['Peak_kW_Prev_Month'])? $nullVar : $dataT['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>


</td>
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderN">Feeder N</label>
		<input type="checkbox" id="subfolderN" />  
		<ol>
<?php
$resultN = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='N'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderP">Feeder P</label>
		<input type="checkbox" id="subfolderP" />  
		<ol>
<?php
$resultP = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='P'");

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
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderQ">Feeder Q</label>
		<input type="checkbox" id="subfolderQ" />  
		<ol>
<?php
$resultQ = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='Q'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultQ))
{
	$dataQ = mysql_fetch_array($resultQ);
	$var1=empty($dataQ['Building_Code'])? $nullVar : $dataQ['Building_Code'];
	$var2=empty($dataQ['Peak_kW'])? $nullVar : $dataQ['Peak_kW'];
	$var3=empty($dataQ['Peak_kW_Prev_Year'])? $nullVar : $dataQ['Peak_kW_Prev_Year'];
	$var4=empty($dataQ['Peak_kW_Prev_Month'])? $nullVar : $dataQ['Peak_kW_Prev_Month'];
	
echo '<li class="file"><a href="data/'.(substr($var1,0,3)).'.php" title="Peak kW Prev Month : '.$var4.' | Peak kW Prev Year : '.$var3.'">'.$var1.' | '.$var2.'</a></li>';

$counter=$counter+1;
}

?>
		</ol>
	</li>
</ol>


</td>
<td colspan="1" width = 3.5%>

<ol class="tree">
	<li>
		<label for="subfolderR">Feeder R</label>
		<input type="checkbox" id="subfolderR" />  
		<ol>
<?php
$resultR = mysql_query("SELECT Building_Code, Peak_kW, Peak_kW_Prev_Year, Peak_kW_Prev_Month FROM elec_UPC_TXDEMAND WHERE Primary_Feed='R'");

$nullVar = NULL;
$counter=0;
while($counter < mysql_num_rows($resultR))
{
	$dataR = mysql_fetch_array($resultR);
	$var1=empty($dataR['Building_Code'])? $nullVar : $dataR['Building_Code'];
	$var2=empty($dataR['Peak_kW'])? $nullVar : $dataR['Peak_kW'];
	$var3=empty($dataR['Peak_kW_Prev_Year'])? $nullVar : $dataR['Peak_kW_Prev_Year'];
	$var4=empty($dataR['Peak_kW_Prev_Month'])? $nullVar : $dataR['Peak_kW_Prev_Month'];
	
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