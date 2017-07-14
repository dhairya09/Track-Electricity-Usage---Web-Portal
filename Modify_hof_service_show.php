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
			<h3>HOF - Services</h3>

			<?php
			$query = "SELECT * FROM elec_hof_services ORDER BY Feeder_Name ASC";
			$result = mysqli_query($connection,$query);

      if($result){


        $data = mysqli_fetch_assoc($result);
        if($data){
          while($data = mysqli_fetch_assoc($result))
          {
              echo '<table id="table1" style="width:50%" class="sortable">';
          		echo'<th>Feeder_Name</th><th>Vault_Name</th><th>Vault_Section</th>';
              echo'<tr>';
              echo '<td>'.$data['Feeder_Name'].'</td><td>'.$data['Vault_Name'].'</td><td>'.$data['Vault_Section'].'</td>';
              echo'</tr>';
              echo '</table>';
          }
        }
        else{
              echo "<p style='text-align:center;border:2px solid black;border-collapse:collapse;'><b>No HOF Records Found</b></p>";
        }




      }


			?>
			</div>
      <br>




		</div>
</div>

<?php include("includes/footer.php"); ?>
