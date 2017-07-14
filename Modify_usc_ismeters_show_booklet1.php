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


                  $query = "SELECT * FROM elec_USC_ISMETERS ORDER BY IS_Num ASC, Meter_Number ASC";
            			$result = mysqli_query($connection,$query);


                ?>


                <?php

                    echo '<table id="table1" class="sortable" style="width:36%">';
                    echo'<th>IS_Num</th><th>Campus</th><th>Building</th><th>Line</th>';

                    while($counter < 36){

                      $data = mysqli_fetch_assoc($result);

                      $var1=empty($data['IS_Num'])? $nullVar : $data['IS_Num'];
                      $var2=empty($data['Campus'])? $nullVar : $data['Campus'];
                      /*$var3=empty($data['Size'])? $nullVar : $data['Size'];
                      $var4=empty($data['Meter_Number'])? $nullVar : $data['Meter_Number'];
                      $var5=empty($data['Meter_Location'])? $nullVar : $data['Meter_Location'];*/
                      $var6=empty($data['Building'])? $nullVar : $data['Building'];
                      //$var7=empty($data['Address'])? $nullVar : $data['Address'];
                      $var8=empty($data['Line'])? $nullVar : $data['Line'];

                      echo'<tr style="text-align:center;">';
                			echo '<td>'.$var1.'</td><td>'.$var2.'</td><td>'.$var6.'</td><td>'.$var8.'</td>';
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

                    echo '<table id="table2" class="sortable" style="width:36%">';
                    echo'<th>IS_Num</th><th>Campus</th><th>Building</th><th>Line</th>';

                    while($counter < 72){

                      $data = mysqli_fetch_assoc($result);

                      $var1=empty($data['IS_Num'])? $nullVar : $data['IS_Num'];
                      $var2=empty($data['Campus'])? $nullVar : $data['Campus'];
                      /*$var3=empty($data['Size'])? $nullVar : $data['Size'];
                      $var4=empty($data['Meter_Number'])? $nullVar : $data['Meter_Number'];
                      $var5=empty($data['Meter_Location'])? $nullVar : $data['Meter_Location'];*/
                      $var6=empty($data['Building'])? $nullVar : $data['Building'];
                      //$var7=empty($data['Address'])? $nullVar : $data['Address'];
                      $var8=empty($data['Line'])? $nullVar : $data['Line'];

                      echo'<tr style="text-align:center;">';
                			echo '<td>'.$var1.'</td><td>'.$var2.'</td><td>'.$var6.'</td><td>'.$var8.'</td>';
                			echo'</tr>';



                      $counter = $counter + 1;
                     }
                     echo "</table>";
                  ?>
      </div>

      <br>




    </div>
</div>
<?php include("includes/footer.php"); ?>
