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



				<?php


	      $query = "SELECT * FROM view_txdemand_uof ORDER BY Building ASC";
	      $result = mysqli_query($connection,$query);

				echo 'UOF TX-Demand';
				echo '<br><br>';

	      if($result){



	        $data = mysqli_fetch_assoc($result);
	        $nullVar = NULL;
	        if($data){

						echo '<table id="table1" style="width:200%" CLASS="sortable">';
						echo'<th>Building</th><th>Ckt_P</th><th>Ckt_S</th><th>Fed_Through</th><th>kVA</th><th>Peak_kW</th><th>Peak_kW_Prev_Month</th><th>Peak_kW_Prev_Year</th><th>Peak_Usage</th><th>Voltage</th><th>Rotation</th><th>Device_Number</th><th>Level</th><th>Priority</th><th>Manufacturer</th><th>Type</th><th>Imp</th><th>Year</th><th>Capacity</th>';
	          while($data = mysqli_fetch_assoc($result))
	          {
								echo'<tr>';
								if (substr($data['Manufacturer'],0,4)=="With" || substr($data['Manufacturer'],0,4)=="WITH" || substr($data['Manufacturer'],0,4)=="with")
								{
								echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Building'],0,3)).'.php">'.$data['Building'].'</a></td><td>'.$data['Ckt_P'].'</td><td>'.$data['Ckt_S'].'</td><td>'.$data['Fed_Through'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Peak_kW'].'</td><td>'.$data['Peak_kW_Prev_Month'].'</td><td>'.$data['Peak_kW_Prev_Year'].'</td><td>'.$data['Peak_Usage'].'</td><td>'.$data['Voltage'].'</td><td>'.$data['Rotation'].'</td><td>'.$data['Device_Number'].'</td><td>'.$data['Level'].'</td><td>'.$data['Priority'].'</td><td><a style="text-decoration: none" href="data/'.(substr($data['Manufacturer'],5,3)).'.php">'.$data['Manufacturer'].'</a></td><td>'.$data['Type'].'</td><td>'.$data['Imp'].'</td><td>'.$data['Year'].'</td><td>'.$data['Capacity'].'</td>';
								}
								else
								{
								echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Building'],0,3)).'.php">'.$data['Building'].'</a></td><td>'.$data['Ckt_P'].'</td><td>'.$data['Ckt_S'].'</td><td>'.$data['Fed_Through'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Peak_kW'].'</td><td>'.$data['Peak_kW_Prev_Month'].'</td><td>'.$data['Peak_kW_Prev_Year'].'</td><td>'.$data['Peak_Usage'].'</td><td>'.$data['Voltage'].'</td><td>'.$data['Rotation'].'</td><td>'.$data['Device_Number'].'</td><td>'.$data['Level'].'</td><td>'.$data['Priority'].'</td><td>'.$data['Manufacturer'].'</td><td>'.$data['Type'].'</td><td>'.$data['Imp'].'</td><td>'.$data['Year'].'</td><td>'.$data['Capacity'].'</td>';
								}
								echo'</tr>';



	           }
						 echo '</table>';
	        }
	        else{

                echo "<p style='text-align:center;border-color:black;border-width:2px;border-style:solid;border-collapse:collapse;'><b>No Transformer - Offcampus Information Found </b></p>";
	        }

	      }
        else{
            "Error is: " . mysqli_error($connection);
        }

				?>



			</div>
      <br>

		</div>
</div>
<?php include("includes/footer.php"); ?>
