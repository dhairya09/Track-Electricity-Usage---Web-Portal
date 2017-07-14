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


                  $query = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_upc_txdemand T1 LEFT JOIN elec_upc_services T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-z]' ORDER BY 1 ";
                  $result = mysqli_query($connection,$query);


                ?>

                  <table id="table1" border="1px solid black;" class="booklet_is">
                    <tr style="background-color:yellow;">

                     <th colspan="5">Building</th>
                     <th colspan="1">Pri.</th>
                     <th colspan="1">Sec.</th>
                     <th colspan="2">Vault</th>
                     <th colspan="1">Service</th>

                    </tr>
                <?php
                    while($counter < 36){

                      $data = mysqli_fetch_assoc($result);

                      $var1=empty($data['Building'])? $nullVar : $data['Building'];
                			$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
                			$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
                			$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
                			$var5=empty($data['Service'])? $nullVar : $data['Service'];

                      echo'<tr>';
                			echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                			if($var3==NULL)
                				echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                			else
                				echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                			echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                			echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                			echo '<td colspan="1" width = 10%>'.$var5.'</td>';
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


                                //$query = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_UPC_TXDEMAND T1 LEFT JOIN elec_UPC_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-l]' ORDER BY 1 ";
                                //$result = mysqli_query($connection,$query);


                              ?>

                                <table id="table2" border="1px solid black;" class="booklet_is">
                                  <tr style="background-color:yellow;">

                                   <th colspan="5">Building</th>
                                   <th colspan="1">Pri.</th>
                                   <th colspan="1">Sec.</th>
                                   <th colspan="2">Vault</th>
                                   <th colspan="1">Service</th>

                                  </tr>
                              <?php
                                  while($counter < 72){

                                    $data = mysqli_fetch_assoc($result);

                                    $var1=empty($data['Building'])? $nullVar : $data['Building'];
                              			$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
                              			$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
                              			$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
                              			$var5=empty($data['Service'])? $nullVar : $data['Service'];

                                    echo'<tr>';
                              			echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                              			if($var3==NULL)
                              				echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                              			else
                              				echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                              			echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                              			echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                              			echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                              			echo'</tr>';
                                    $counter = $counter + 1;
                                   }
                                   echo "</table>";
                                ?>
                    </div>


                    <br><br>

                      <button class="btn btn-success" onClick ="printDiv('printableArea13')">PDF Export</button>
                      <button class="btn btn-success" onClick ="$('#table3').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
                      <button class="btn btn-success" onClick ="$('#table3').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

                      <br><br>

                      <div id="printableArea13">

                                <?php
                                  $counter = 72;
                                  $nullVar = "-";


                                  //$query = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_UPC_TXDEMAND T1 LEFT JOIN elec_UPC_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-l]' ORDER BY 1 ";
                                  //$result = mysqli_query($connection,$query);


                                ?>

                                  <table id="table3" border="1px solid black;" class="booklet_is">
                                    <tr style="background-color:yellow;">

                                      <th colspan="5">Building</th>
                                      <th colspan="1">Pri.</th>
                                      <th colspan="1">Sec.</th>
                                      <th colspan="2">Vault</th>
                                      <th colspan="1">Service</th>

                                    </tr>
                                <?php
                                    while($counter < 108){

                                      $data = mysqli_fetch_assoc($result);

                                      $var1=empty($data['Building'])? $nullVar : $data['Building'];
                                			$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
                                			$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
                                			$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
                                			$var5=empty($data['Service'])? $nullVar : $data['Service'];

                                      echo'<tr>';
                                      echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                                      if($var3==NULL)
                                        echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                                      else
                                        echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                                      echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                                      echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                                      echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                                      echo'</tr>';
                                      $counter = $counter + 1;
                                     }
                                     echo "</table>";
                                  ?>
                      </div>

                      <br><br>

                        <button class="btn btn-success" onClick ="printDiv('printableArea14')">PDF Export</button>
                        <button class="btn btn-success" onClick ="$('#table4').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
                        <button class="btn btn-success" onClick ="$('#table4').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

                        <br><br>

                        <div id="printableArea14">

                                  <?php
                                    $counter = 108;
                                    $nullVar = "-";


                                    //$query = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_UPC_TXDEMAND T1 LEFT JOIN elec_UPC_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-l]' ORDER BY 1 ";
                                    //$result = mysqli_query($connection,$query);


                                  ?>

                                    <table id="table4" border="1px solid black;" class="booklet_is">
                                      <tr style="background-color:yellow;">

                                       <th colspan="5">Building</th>
                                       <th colspan="1">Pri.</th>
                                       <th colspan="1">Sec.</th>
                                       <th colspan="2">Vault</th>
                                       <th colspan="1">Service</th>

                                      </tr>
                                  <?php
                                      while($counter < 144){

                                        $data = mysqli_fetch_assoc($result);

                                        $var1=empty($data['Building'])? $nullVar : $data['Building'];
                                  			$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
                                  			$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
                                  			$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
                                  			$var5=empty($data['Service'])? $nullVar : $data['Service'];

                                        echo'<tr>';
                                  			echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                                  			if($var3==NULL)
                                  				echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                                  			else
                                  				echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                                  			echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                                  			echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                                  			echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                                  			echo'</tr>';
                                        $counter = $counter + 1;
                                       }
                                       echo "</table>";
                                    ?>
                        </div>

                        <br><br>

                          <button class="btn btn-success" onClick ="printDiv('printableArea15')">PDF Export</button>
                          <button class="btn btn-success" onClick ="$('#table5').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
                          <button class="btn btn-success" onClick ="$('#table5').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

                          <br><br>

                          <div id="printableArea15">

                                    <?php
                                      $counter = 144;
                                      $nullVar = "-";


                                      //$query = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_UPC_TXDEMAND T1 LEFT JOIN elec_UPC_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-l]' ORDER BY 1 ";
                                      //$result = mysqli_query($connection,$query);


                                    ?>

                                      <table id="table5" border="1px solid black;" class="booklet_is">
                                        <tr style="background-color:yellow;">

                                         <th colspan="5">Building</th>
                                         <th colspan="1">Pri.</th>
                                         <th colspan="1">Sec.</th>
                                         <th colspan="2">Vault</th>
                                         <th colspan="1">Service</th>

                                        </tr>
                                    <?php
                                        while($counter < 180){

                                          $data = mysqli_fetch_assoc($result);

                                          $var1=empty($data['Building'])? $nullVar : $data['Building'];
                                    			$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
                                    			$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
                                    			$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
                                    			$var5=empty($data['Service'])? $nullVar : $data['Service'];

                                          echo'<tr>';
                                    			echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                                    			if($var3==NULL)
                                    				echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                                    			else
                                    				echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                                    			echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                                    			echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                                    			echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                                    			echo'</tr>';
                                          $counter = $counter + 1;
                                         }
                                         echo "</table>";
                                      ?>
                          </div>








          <!--          <br><br>

                      <button class="btn btn-success" onClick ="printDiv('printableArea2')">PDF Export</button>
                      <button class="btn btn-success" onClick ="$('#table5').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
                      <button class="btn btn-success" onClick ="$('#table5').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

                      <br><br>

                      <div id="printableArea2">

                        <?php
                            $counter1 = 0;
                            $nullVar = "-";
                            $query2 = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_upc_txdemand T1 LEFT JOIN elec_upc_services T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[m-z]' ORDER BY 1 ";
                            $result2 = mysqli_query($connection,$query2);

                        ?>

                        <table id="table5" border="1px solid black;" class="booklet_is">
                          <tr style="background-color:green;">
                            <th colspan="5">Building</th>
                            <th colspan="1">Pri.</th>
                            <th colspan="1">Sec.</th>
                            <th colspan="2">Vault</th>
                            <th colspan="1">Service</th>

                          </tr>
                          <?php
                          while($counter1 < 36){

                            $data2 = mysqli_fetch_assoc($result2);

                            $var1=empty($data2['Building'])? $nullVar : $data2['Building'];
                            $var2=empty($data2['Pri'])? $nullVar : $data2['Pri'];
                            $var3=empty($data2['Sec'])? $nullVar : $data2['Sec'];
                            $var4=empty($data2['Vault'])? $nullVar : $data2['Vault'];
                            $var5=empty($data2['Service'])? $nullVar : $data2['Service'];

                            echo'<tr>';
                            echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                            if($var3==NULL)
                              echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                            else
                              echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                            echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                            echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                            echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                            echo'</tr>';
                            $counter1 = $counter1 + 1;
                            }
                            echo "</table>";
                          ?>

                      </div>


                      <br><br>

                        <button class="btn btn-success" onClick ="printDiv('printableArea22')">PDF Export</button>
                        <button class="btn btn-success" onClick ="$('#table6').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
                        <button class="btn btn-success" onClick ="$('#table6').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

                        <br><br>

                        <div id="printableArea22">

                          <?php
                              $counter1 = 36;
                              $nullVar = "-";
                              //$query2 = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_UPC_TXDEMAND T1 LEFT JOIN elec_UPC_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[m-z]' ORDER BY 1 ";
                              //$result2 = mysqli_query($connection,$query2);

                          ?>

                          <table id="table6" border="1px solid black;" class="booklet_is">
                            <tr style="background-color:green;">
                              <th colspan="5">Building</th>
                              <th colspan="1">Pri.</th>
                              <th colspan="1">Sec.</th>
                              <th colspan="2">Vault</th>
                              <th colspan="1">Service</th>

                            </tr>
                            <?php
                            while($counter1 < 72){

                              $data2 = mysqli_fetch_assoc($result2);

                              $var1=empty($data2['Building'])? $nullVar : $data2['Building'];
                              $var2=empty($data2['Pri'])? $nullVar : $data2['Pri'];
                              $var3=empty($data2['Sec'])? $nullVar : $data2['Sec'];
                              $var4=empty($data2['Vault'])? $nullVar : $data2['Vault'];
                              $var5=empty($data2['Service'])? $nullVar : $data2['Service'];

                              echo'<tr>';
                              echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                              if($var3==NULL)
                                echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                              else
                                echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                              echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                              echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                              echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                              echo'</tr>';
                              $counter1 = $counter1 + 1;
                              }
                              echo "</table>";
                            ?>

                        </div>


                        <br><br>

                          <button class="btn btn-success" onClick ="printDiv('printableArea23')">PDF Export</button>
                          <button class="btn btn-success" onClick ="$('#table7').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
                          <button class="btn btn-success" onClick ="$('#table7').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

                          <br><br>

                          <div id="printableArea23">

                            <?php
                                $counter1 = 72;
                                $nullVar = "-";
                                //$query2 = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_UPC_TXDEMAND T1 LEFT JOIN elec_UPC_SERVICES T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[m-z]' ORDER BY 1 ";
                                //$result2 = mysqli_query($connection,$query2);

                            ?>

                            <table id="table7" border="1px solid black;" class="booklet_is">
                              <tr style="background-color:green;">
                                <th colspan="5">Building</th>
                                <th colspan="1">Pri.</th>
                                <th colspan="1">Sec.</th>
                                <th colspan="2">Vault</th>
                                <th colspan="1">Service</th>

                              </tr>
                              <?php
                              while($counter1 < 108){

                                $data2 = mysqli_fetch_assoc($result2);


                                $var1=empty($data2['Building'])? $nullVar : $data2['Building'];
                                $var2=empty($data2['Pri'])? $nullVar : $data2['Pri'];
                                $var3=empty($data2['Sec'])? $nullVar : $data2['Sec'];
                                $var4=empty($data2['Vault'])? $nullVar : $data2['Vault'];
                                $var5=empty($data2['Service'])? $nullVar : $data2['Service'];

                                echo'<tr>';
                                echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

                                if($var3==NULL)
                                  echo '<td colspan="1" width = 10%>'.$var2.'</td>';
                                else
                                  echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

                                echo '<td colspan="1" width = 10%>'.$var3.'</td>';
                                echo '<td colspan="2" width = 20%>'.$var4.'</td>';
                                echo '<td colspan="1" width = 10%>'.$var5.'</td>';
                                echo'</tr>';
                                $counter1 = $counter1 + 1;
                                }
                                echo "</table>";
                              ?>

                          </div>   -->



                          <br>






















    </div>
</div>
<?php include("includes/footer.php"); ?>
