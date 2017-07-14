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
			<h3>USC - LADWP METERS</h3>

			<?php
			$query = "SELECT * FROM elec_USC_LADWP_METERS ORDER BY Campus ASC, Name ASC, Service_Number ASC";
			$result = mysqli_query($connection,$query);

			echo '<table id="table1" style="width:200%" class="sortable">';
			echo'<th>Campus</th><th>Name</th><th>Address</th><th>Service_Number</th><th>Meter_Information</th>';

			while($data = mysqli_fetch_assoc($result))
			{
			echo'<tr style="text-align:center;">';
			echo '<td>'.$data['Campus'].'</td><td>'.$data['Name'].'</td><td>'.$data['Address'].'</td><td>'.$data['Service_Number'].'</td><td>'.$data['Meter_Information'].'</td>';
			echo'</tr>';
			}

			echo '</table>';
			?>
			</div>

			<br>
			<form action="Modify_usc_ladwp_meters_show_booklet1.php"><input type="submit" value="USC LADWP-Meteres Booklet Print"></form>
			<br>

		</div>
</div>
<?php include("includes/footer.php"); ?>
