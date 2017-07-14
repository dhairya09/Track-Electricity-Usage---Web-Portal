<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("includes/header_update.php"); ?>
<div id="contents">
	<div style="margin-left:75px;" class="sidebar">
			<a class="heading1" href="Modify_admin.php">Admin Home</a>
	</div>
		<div id="blog" class="area">
			<div class="main">
				<ul class="list">
					<li>
						<table class="dataPageTable" width="100%" height="100%">
							<th colspan="2"><a href="Manage_Services.php"><strong style="font-size:40px;">Update Services</strong></a></th>
							<tr>
							<th colspan="2" style="line-height:14px"><i style="font-size:12px;">Insert or Update Information Regarding Services &amp; Feeders</i></th>
							</tr>
						</table>
					</li>

					<li>
						<table class="dataPageTable" width="100%" height="100%">
							<th colspan="2"><a href="Modify_upc_update_data_buildings.php"><strong style="font-size:40px;">Update Buildings</strong></a></th>
							<tr>
							<th colspan="2" style="line-height:14px"><i style="font-size:12px;">Insert or Update Information Regarding Buildings &amp; Building Numbers</i></th>
							</tr>
						</table>
					</li>
						<!--Modify_upc_update_data_txdemand1.php-->
					<li>
						<table class="dataPageTable" width="100%" height="100%">
							<th colspan="2"><a href="Modify_upc_update_data_txdemand.php"><strong style="font-size:40px;">Update Transformers Info</strong></a></th>
							<tr>
							<th colspan="2" style="line-height:14px"><i style="font-size:12px;">Insert or Update Information Regarding Transformers &amp; Demand</i></th>
							</tr>
						</table>
					</li>

					<li>
						<table class="dataPageTable" width="100%" height="100%">
							<th colspan="2"><a href="Modify_upc_update_data_generators.php"><strong style="font-size:40px;">Update Generators Info</strong></a></th>
							<tr>
							<th colspan="2" style="line-height:14px"><i style="font-size:12px;">Insert or Update Information Regarding Generators</i></th>
							</tr>
						</table>
					</li>
				</ul>
			</div>
		</div>
		<br/>

		<!--<a style="text-align:center; border:1px solid black" href="Modify_admin.php">Admin Home</a>-->



		<br/>

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
