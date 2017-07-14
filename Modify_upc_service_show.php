<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<div class="row2">
    <div class = "col1"></div>
    <div class = "col2">
      <br>

      <div Class="sidebar">
    			<a class="heading1" href="Modify_data.php">BACK</a>
    	</div>

			<button class="btn btn-success" onClick ="printDiv('printableArea')">PDF Export</button>
			<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
			<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

			<br><br>

			<div id="printableArea">
			<h3>UPC - Services</h3>

			<?php
			$query = "SELECT * FROM elec_upc_services ORDER BY Feeder_Name ASC";
			$result = mysqli_query($connection,$query);

			echo '<table id="table1" class="sortable" style="width:200%">';
			echo'<th>Feeder_Name</th><th>Vault_Name</th><th>Vault_Section</th>';

			while($data = mysqli_fetch_assoc($result))
			{
			echo'<tr style="text-align:center;">';
			echo '<td>'.$data['Feeder_Name'].'</td><td>'.$data['Vault_Name'].'</td><td>'.$data['Vault_Section'].'</td>';
			echo'</tr>';
			}

			echo '</table>';
			?>
			</div>
      <br>




		</div>
</div>

<?php include("includes/footer.php"); ?>
