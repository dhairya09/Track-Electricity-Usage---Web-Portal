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
    <form action="usc_serviceForm_show_initial.php" method="post">
    Which campus is it affecting<br>
    <select name="campusType">
    	<option value="Select...">Select...</option>
        <option value="UPC">UPC</option>
        <option value="HSC">HSC</option>
        <option value="VLG">Village</option>
        <option value="UOF">UPC-Off</option>
		<option value="HOF">HSC-Off</option>
		<option value="OTH">Others</option>
    </select><br><br>
	Service affected<br>
    <select name="serviceName">
    	<option value="Select...">Select...</option>
        <option value="Jefferson">(UPC) Jefferson</option>
        <option value="Biegler">(UPC) Biegler</option>
        <option value="CHP">(HSC) CHP</option>
        <option value="SVR">(HSC) SVR</option>
        <option value="DWP">(HSC) DWP</option>
    </select>
    <br><br>
    Vault Section<br>
    <select name="vaultSection">
    	<option value="Select...">Select...</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="1 OR 2">1 OR 2</option>
    </select>
    <br><br>
    Affecting Type<br>
    <select name="affectingType">
    	<option value="Select...">Select...</option>
        <option value="Primary">Primary</option>
        <option value="Secondary">Secondary</option>
        <option value="Primary OR Secondary">Primary OR Secondary</option>
    </select>
    <input type="submit" name="formServiceSubmit" value="ServiceQuerySubmit">
	</form>

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