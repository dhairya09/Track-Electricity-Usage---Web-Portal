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


        <button class="btn btn-success" onClick ="printDiv('printableArea1')">PDF Export</button>
        <button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
        <button class="btn btn-success" onClick ="$('#table1').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

        <br><br>

      <div id="printableArea1">

                <?php
                  $counter = 0;
                  $nullVar = "-";


                  $query = "SELECT * FROM elec_USC_LADWP_METERS ORDER BY Campus ASC, Name ASC, Service_Number ASC";
            			$result = mysqli_query($connection,$query);


                ?>




                    <table id="table1" border="1px solid black;" style="width:36%;border-collapse:collapse;font-size:6pt;">




                    <th colspan="10">Campus</th>
                    <th colspan="10">Name</th>
                    <th colspan="10">Address</th>
                    <th colspan="1">Service_Number</th>
                    <th colspan="1">Meter_Information</th>
                  <?php

                    while($counter < 36){

                      $data = mysqli_fetch_assoc($result);

                      $var1=empty($data['Campus'])? $nullVar : $data['Campus'];
                      $var2=empty($data['Name'])? $nullVar : $data['Name'];
                      $var3=empty($data['Address'])? $nullVar : $data['Address'];
                      $var4=empty($data['Service_Number'])? $nullVar : $data['Service_Number'];
                      $var5=empty($data['Meter_Information'])? $nullVar : $data['Meter_Information'];


                      /*echo'<tr>';
                			echo '<td>'.$var1.'</td><td>'.$var2.'</td><td>'.$var3.'</td><td>'.$var4.'</td><td>'.$var5.'</td>';
                			echo'</tr>';*/

                      echo'<tr>';
                      echo '<td colspan="10" width="11%">'.$var1.'</td>';
                      echo '<td colspan="10" width="11%">'.$var2.'</td>';



                      echo '<td colspan="10" width="11%">'.$var3.'</td>';
                      echo '<td colspan="1" width="2%">'.$var4.'</td>';
                      echo '<td colspan="1" width="1%">'.$var5.'</td>';
                      echo'</tr>';



                      $counter = $counter + 1;
                     }
                     echo "</table>";
                  ?>
      </div>


      <br><br>

        <button class="btn btn-success" onClick ="printDiv('printableArea12')">PDF Export</button>
        <button class="btn btn-success" onClick ="$('#table2').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
        <button class="btn btn-success" onClick ="$('#table2').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

        <br><br>

      <div id="printableArea12">

                <?php
                  $counter = 36;
                  $nullVar = "-";

                    echo '<table id="table1" class="sortable" style="width:36%;">';
                    echo'<th>Campus</th><th>Name</th><th>Address</th><th>Service_Number</th><th>Meter_Information</th>';


                    while($counter < 72){

                      $data = mysqli_fetch_assoc($result);

                      $var1=empty($data['Campus'])? $nullVar : $data['Campus'];
                      $var2=empty($data['Name'])? $nullVar : $data['Name'];
                      $var3=empty($data['Address'])? $nullVar : $data['Address'];
                      $var4=empty($data['Service_Number'])? $nullVar : $data['Service_Number'];
                      $var5=empty($data['Meter_Information'])? $nullVar : $data['Meter_Information'];


                      echo'<tr>';
                			echo '<td>'.$var1.'</td><td>'.$var2.'</td><td>'.$var3.'</td><td>'.$var4.'</td><td>'.$var5.'</td>';
                			echo'</tr>';



                      $counter = $counter + 1;
                     }
                     echo "</table>";
                  ?>
      </div>

      <br><br>



    </div>
</div>
<?php include("includes/footer.php"); ?>
