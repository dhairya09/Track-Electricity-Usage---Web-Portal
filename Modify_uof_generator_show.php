<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<div class="row2">
    <div class = "col1"></div>
    <div class = "col2">

      <div Class="sidebar">
          <a class="heading1" href="Modify_data.php">BACK</a>
      </div>

			<button class="btn btn-success" onClick ="printDiv('printableArea')">PDF Export</button>
			<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
			<button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

			<br><br>


			<div id="printableArea">



				<?php


	      $query = "SELECT * FROM view_generators_uof ORDER BY Bldg ASC";
	      $result = mysqli_query($connection,$query);

				echo 'UOF - Generators';
				echo '<br><br>';

	      if($result){



	        $data = mysqli_fetch_assoc($result);
	        $nullVar = NULL;
	        if($data){

            echo '<table id="table1" style="width:100%" CLASS="sortable">';
            echo'<th>Bldg</th><th>Building</th><th>Equipment</th><th>Nomenclature</th><th>Floor</th><th>kW</th><th>kVA</th><th>Output_Voltage</th><th>Manufacturer</th><th>Mfrd_Year</th><th>Engine_Type</th><th>Fuel_In_Gallons</th><th>Fuel_Type</th><th>Location</th><th>Keyword</th>';
	          while($data = mysqli_fetch_assoc($result))
	          {
              echo'<tr>';
              if (substr($data['Manufacturer'],0,4)=="With" || substr($data['Manufacturer'],0,4)=="WITH" || substr($data['Manufacturer'],0,4)=="with")
              {
              echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Bldg'],0,3)).'.php">'.$data['Bldg'].'</a></td><td>'.$data['Building'].'</td><td>'.$data['Equipment'].'</td><td>'.$data['Nomenclature'].'</td><td>'.$data['Floor'].'</td><td>'.$data['kW'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Output_Voltage'].'</td><td><a style="text-decoration: none" href="data/'.(substr($data['Manufacturer'],5,3)).'.php">'.$data['Manufacturer'].'</a></td><td>'.$data['Mfrd_Year'].'</td><td>'.$data['Engine_Type'].'</td><td>'.$data['Fuel_In_Gallons'].'</td><td>'.$data['Fuel_Type'].'</td><td>'.$data['Location'].'</td><td>'.$data['Keyword'].'</td>';
              }
              else
              {
              echo '<td><a style="text-decoration: none" href="data/'.(substr($data['Bldg'],0,3)).'.php">'.$data['Bldg'].'</a></td><td>'.$data['Building'].'</td><td>'.$data['Equipment'].'</td><td>'.$data['Nomenclature'].'</td><td>'.$data['Floor'].'</td><td>'.$data['kW'].'</td><td>'.$data['kVA'].'</td><td>'.$data['Output_Voltage'].'</td><td>'.$data['Manufacturer'].'</td><td>'.$data['Mfrd_Year'].'</td><td>'.$data['Engine_Type'].'</td><td>'.$data['Fuel_In_Gallons'].'</td><td>'.$data['Fuel_Type'].'</td><td>'.$data['Location'].'</td><td>'.$data['Keyword'].'</td>';
              }
              echo'</tr>';



	           }
						 echo '</table>';
	        }
	        else{
	            
                echo "<p style='text-align:center;border-color:black;border-width:2px;border-style:solid;border-collapse:collapse;'><b>No UPC-Offcampus Generator Information Found</b></p>";
	        }

	      }
        else{
            "Error is: " . mysqli_error($connection);
        }

				?>



			</div>

		</div>
</div>
<?php include("includes/footer.php"); ?>
