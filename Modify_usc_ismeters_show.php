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
			<h3>USC - IS METERS</h3>

			<?php
			$query = "SELECT * FROM elec_USC_ISMETERS ORDER BY IS_Num ASC, Meter_Number ASC";
			$result = mysqli_query($connection,$query);

			echo '<table id="table1" style="width:200%" class="sortable">';
			echo'<th>IS_Num</th><th>Campus</th><th>Size</th><th>Meter_Number</th><th>Meter_Location</th><th>Building</th><th>Address</th><th>Line</th>';

			while($data = mysqli_fetch_assoc($result))
			{




			echo'<tr style="text-align:center;">';
			echo '<td>'.$data['IS_Num'].'</td><td>'.$data['Campus'].'</td><td>'.$data['Size'].'</td><td>'.$data['Meter_Number'].'</td><td>'.$data['Meter_Location'].'</td><td>'.$data['Building'].'</td><td>'.$data['Address'].'</td><td>'.$data['Line'].'</td>';
			echo'</tr>';
			}

			echo '</table>';
			?>
			</div>

			<br>
			<form action="Modify_usc_ismeters_show_booklet1.php"><input type="submit" value="USC IS-Meteres Booklet Print"></form>
			<br>
		</div>
</div>
<?php include("includes/footer.php"); ?>
