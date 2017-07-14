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
                	$res_A_Prim = Booklet_Data('A');
                	$res_B_Prim = Booklet_Data('B');

                ?>

                	<table id="table1" class="booklet" border="1px solid black;">
                		<tr style="background-color:yellow;">
                			<th colspan="15">(Beigler) Feeder A Primary</th>
                			<th colspan="1"></th>
                			<th colspan="15">(Beigler) Feeder B Primary</th>

                		</tr>
                <?php
                    while($counter < 20){

                      $display = mysqli_fetch_assoc($res_A_Prim);
                      $display2 = mysqli_fetch_assoc($res_B_Prim);

                      $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                      $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                      $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                      $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                      $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                      $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                  ?>

                      <tr>




                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA3 ?></td>

                        <td align="center" colspan="1" width = "1%"></td>

                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB3 ?></td>


                      </tr>
                    <?php    $counter = $counter + 1;
                        }  ?>

                	<!--</table>-->

                  <?php
                      $counter = 0;
                      $nullVar = "-";
                      $res_A_Sec = Booklet_Data_Sec('A');
                      $res_B_Sec = Booklet_Data_Sec('B');
                  ?>

                <!--  <table border="1px solid black;" style="width:60%">-->
                    <tr style="background-color:yellow;">
                      <th colspan="15">Secondary</th>
                      <th colspan="1"></th>
                      <th colspan="15">Secondary</th>

                    </tr>
                    <?php
                    while($counter < 15){

                      $display = mysqli_fetch_assoc($res_A_Sec);
                      $display2 = mysqli_fetch_assoc($res_B_Sec);

                      $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                      $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                      $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                      $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                      $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                      $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                  ?>

                      <tr>

                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA3 ?></td>

                        <td align="center" colspan="1" width = "1%"></td>

                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB3 ?></td>


                      </tr>
                    <?php    $counter = $counter + 1;
                        }  ?>

                  </table>



    </div>

      <br><br>


      <!-- 2 -->
      <button class="btn btn-success" onClick ="printDiv('printableArea2')">PDF Export</button>
      <button class="btn btn-success" onClick ="$('#table2').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
      <button class="btn btn-success" onClick ="$('#table2').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

      <br><br>

      <div id="printableArea2">

                <?php
                  $counter = 0;
                  $nullVar = "-";
                  $res_C_Prim = Booklet_Data('C');
                  $res_D_Prim = Booklet_Data('D');

                ?>

                  <table id="table2" class="booklet" border="1px solid black;">
                  	<tr style="background-color:yellow;">
                      <th colspan="15">(Beigler) Feeder C Primary</th>
                      <th colspan="1"></th>
                      <th colspan="15">(Beigler) Feeder D Primary</th>

                    </tr>
                <?php
                    while($counter < 20){

                      $display = mysqli_fetch_assoc($res_C_Prim);
                      $display2 = mysqli_fetch_assoc($res_D_Prim);

                      $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                      $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                      $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                      $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                      $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                      $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                  ?>

                      <tr>




                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA3 ?></td>

                        <td align="center" colspan="1" width = "1%"></td>

                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB3 ?></td>


                      </tr>
                    <?php    $counter = $counter + 1;
                        }  ?>



                  <?php
                      $counter = 0;
                      $nullVar = "-";
                      $res_C_Sec = Booklet_Data_Sec('C');
                      $res_D_Sec = Booklet_Data_Sec('D');
                  ?>


                    <tr style="background-color:yellow;">
                      <th colspan="15">Secondary</th>
                      <th colspan="1"></th>
                      <th colspan="15">Secondary</th>

                    </tr>
                    <?php
                    while($counter < 15){

                      $display = mysqli_fetch_assoc($res_C_Sec);
                      $display2 = mysqli_fetch_assoc($res_D_Sec);

                      $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                      $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                      $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                      $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                      $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                      $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                  ?>

                      <tr>

                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varA3 ?></td>

                        <td align="center" colspan="1" width =1%></td>

                        <td align="center" colspan="5" width = "2%"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB2 ?></td>
                        <td align="center" colspan="5" width = "1%"><?php echo $varB3 ?></td>


                      </tr>
                    <?php    $counter = $counter + 1;
                        }  ?>

                  </table>



      </div>

      <br><br>


      <!-- 2 -->
      <button class="btn btn-success" onClick ="printDiv('printableArea3')">PDF Export</button>
      <button class="btn btn-success" onClick ="$('#table3').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
      <button class="btn btn-success" onClick ="$('#table3').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

      <br><br>

      <div id="printableArea3">

                <?php
                  $counter = 0;
                  $nullVar = "-";
                  $res_E_Prim = Booklet_Data('E');
                  $res_F_Prim = Booklet_Data('F');

                ?>

                  <table id="table3" class="booklet" border="1px solid black;">
                  	<tr style="background-color:yellow;">
                      <th colspan="15">(Beigler) Feeder E Primary</th>
                      <th colspan="1"></th>
                      <th colspan="15">(Beigler) Feeder F Primary</th>

                    </tr>
                <?php
                    while($counter < 20){

                      $display = mysqli_fetch_assoc($res_E_Prim);
                      $display2 = mysqli_fetch_assoc($res_F_Prim);

                      $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                      $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                      $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                      $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                      $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                      $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                  ?>

                      <tr>




                        <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                        <td align="center" colspan="1" width =1%></td>

                        <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                      </tr>
                    <?php    $counter = $counter + 1;
                        }  ?>



                  <?php
                      $counter = 0;
                      $nullVar = "-";
                      $res_E_Sec = Booklet_Data_Sec('E');
                      $res_F_Sec = Booklet_Data_Sec('F');
                  ?>


                  	<tr style="background-color:yellow;">
                      <th colspan="15">Secondary</th>
                      <th colspan="1"></th>
                      <th colspan="15">Secondary</th>

                    </tr>
                    <?php
                    while($counter < 15){

                      $display = mysqli_fetch_assoc($res_E_Sec);
                      $display2 = mysqli_fetch_assoc($res_F_Sec);

                      $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                      $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                      $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                      $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                      $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                      $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                  ?>

                      <tr>

                        <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                        <td align="center" colspan="1" width =1%></td>

                        <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                        <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                      </tr>
                    <?php    $counter = $counter + 1;
                        }  ?>

                  </table>



    </div>

    <br><br>


    <!-- 2 -->
    <button class="btn btn-success" onClick ="printDiv('printableArea4')">PDF Export</button>
    <button class="btn btn-success" onClick ="$('#table4').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
    <button class="btn btn-success" onClick ="$('#table4').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

    <br><br>

    <div id="printableArea4">

              <?php
                $counter = 0;
                $nullVar = "-";
                $res_G_Prim = Booklet_Data('G');
                $res_H_Prim = Booklet_Data('H');

              ?>

                <table id="table4" class="booklet" border="1px solid black;">
                	<tr style="background-color:yellow;">
                    <th colspan="15">(Beigler) Feeder G Primary</th>
                    <th colspan="1"></th>
                    <th colspan="15">(Beigler) Feeder H Primary</th>

                  </tr>
              <?php
                  while($counter < 20){

                    $display = mysqli_fetch_assoc($res_G_Prim);
                    $display2 = mysqli_fetch_assoc($res_H_Prim);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>




                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>



                <?php
                    $counter = 0;
                    $nullVar = "-";
                    $res_G_Sec = Booklet_Data_Sec('G');
                    $res_H_Sec = Booklet_Data_Sec('H');
                ?>


                	<tr style="background-color:yellow;">
                    <th colspan="15">Secondary</th>
                    <th colspan="1"></th>
                    <th colspan="15">Secondary</th>

                  </tr>
                  <?php
                  while($counter < 15){

                    $display = mysqli_fetch_assoc($res_G_Sec);
                    $display2 = mysqli_fetch_assoc($res_H_Sec);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?><a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>

                </table>



  </div>

  <br><br>


  <!-- 2 -->
  <button class="btn btn-success" onClick ="printDiv('printableArea5')">PDF Export</button>
  <button class="btn btn-success" onClick ="$('#table5').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
  <button class="btn btn-success" onClick ="$('#table5').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

  <br><br>

  <div id="printableArea5">

            <?php
              $counter = 0;
              $nullVar = "-";
              $res_I_Prim = Booklet_Data('I');
              $res_J_Prim = Booklet_Data('J');

            ?>

              <table id="table5" class="booklet" border="1px solid black;">
              	<tr style="background-color:yellow;">
                  <th colspan="15">(Beigler) Feeder I Primary</th>
                  <th colspan="1"></th>
                  <th colspan="15">(Beigler) Feeder J Primary</th>

                </tr>
            <?php
                while($counter < 20){

                  $display = mysqli_fetch_assoc($res_I_Prim);
                  $display2 = mysqli_fetch_assoc($res_J_Prim);

                  $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                  $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                  $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                  $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                  $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                  $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

              ?>

                  <tr>




                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                    <td align="center" colspan="1" width =1%></td>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>



              <?php
                  $counter = 0;
                  $nullVar = "-";
                  $res_I_Sec = Booklet_Data_Sec('I');
                  $res_J_Sec = Booklet_Data_Sec('J');
              ?>


              	<tr style="background-color:yellow;">
                  <th colspan="15">Secondary</th>
                  <th colspan="1"></th>
                  <th colspan="15">Secondary</th>

                </tr>
                <?php
                while($counter < 15){

                  $display = mysqli_fetch_assoc($res_I_Sec);
                  $display2 = mysqli_fetch_assoc($res_J_Sec);

                  $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                  $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                  $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                  $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                  $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                  $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

              ?>

                  <tr>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                    <td align="center" colspan="1" width =1%></td>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>

              </table>



  </div>

  <br><br>


  <!-- 2 -->
  <button class="btn btn-success" onClick ="printDiv('printableArea6')">PDF Export</button>
  <button class="btn btn-success" onClick ="$('#table6').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
  <button class="btn btn-success" onClick ="$('#table6').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

  <br><br>


  <div id="printableArea6">

            <?php
              $counter = 0;
              $nullVar = "-";
              $res_X_Prim = Booklet_Data('X');
              $res_Z_Prim = Booklet_Data('Z');

            ?>

              <table id="table6" class="booklet" border="1px solid black;">
            	<tr style="background-color:yellow;">
                  <th colspan="15">(Beigler) Feeder X Primary</th>
                  <th colspan="1"></th>
                  <th colspan="15">(Beigler) Feeder Z Primary</th>

                </tr>
            <?php
                while($counter < 20){

                  $display = mysqli_fetch_assoc($res_X_Prim);
                  $display2 = mysqli_fetch_assoc($res_Z_Prim);

                  $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                  $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                  $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                  $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                  $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                  $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

              ?>

                  <tr>




                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                    <td align="center" colspan="1" width =1%></td>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>



              <?php
                  $counter = 0;
                  $nullVar = "-";
                  $res_X_Sec = Booklet_Data_Sec('X');
                  $res_Z_Sec = Booklet_Data_Sec('Z');
              ?>


            	<tr style="background-color:yellow;">
                  <th colspan="15">Secondary</th>
                  <th colspan="1"></th>
                  <th colspan="15">Secondary</th>

                </tr>
                <?php
                while($counter < 15){

                  $display = mysqli_fetch_assoc($res_X_Sec);
                  $display2 = mysqli_fetch_assoc($res_Z_Sec);

                  $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                  $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                  $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                  $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                  $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                  $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

              ?>

                  <tr>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                    <td align="center" colspan="1" width =1%></td>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>

              </table>



  </div>

  <br><br>


  <!-- 2 -->
  <button class="btn btn-success" onClick ="printDiv('printableArea7')">PDF Export</button>
  <button class="btn btn-success" onClick ="$('#table7').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
  <button class="btn btn-success" onClick ="$('#table7').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

  <br><br>


  <div id="printableArea7">

            <?php
              $counter = 0;
              $nullVar = "-";
              $res_K_Prim = Booklet_Data('K');
              $res_L_Prim = Booklet_Data('L');

            ?>

              <table id="table7" class="booklet" border="1px solid black">
              	<tr style="background-color:green;">
                  <th colspan="15">(Jefferson) Feeder K Primary</th>
                  <th colspan="1"></th>
                  <th colspan="15">(Jefferson) Feeder L Primary</th>

                </tr>
            <?php
                while($counter < 20){

                  $display = mysqli_fetch_assoc($res_K_Prim);
                  $display2 = mysqli_fetch_assoc($res_L_Prim);

                  $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                  $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                  $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                  $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                  $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                  $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

              ?>

                  <tr>




                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                    <td align="center" colspan="1" width =1%></td>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>



              <?php
                  $counter = 0;
                  $nullVar = "-";
                  $res_K_Sec = Booklet_Data_Sec('K');
                  $res_L_Sec = Booklet_Data_Sec('L');
              ?>


              <tr style="background-color:green;">
                  <th colspan="15">Secondary</th>
                  <th colspan="1"></th>
                  <th colspan="15">Secondary</th>

                </tr>
                <?php
                while($counter < 15){

                  $display = mysqli_fetch_assoc($res_K_Sec);
                  $display2 = mysqli_fetch_assoc($res_L_Sec);

                  $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                  $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                  $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                  $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                  $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                  $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

              ?>

                  <tr>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                    <td align="center" colspan="1" width =1%></td>

                    <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                    <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>

              </table>



  </div>

  <br><br>


  <!-- 2 -->
  <button class="btn btn-success" onClick ="printDiv('printableArea8')">PDF Export</button>
  <button class="btn btn-success" onClick ="$('#table8').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
  <button class="btn btn-success" onClick ="$('#table8').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

  <br><br>


  <div id="printableArea8">

              <?php
                $counter = 0;
                $nullVar = "-";
                $res_M_Prim = Booklet_Data('M');
                $res_N_Prim = Booklet_Data('N');

              ?>

                <table id="table8" class="booklet" border="1px solid black;">
                <tr style="background-color:green;">
                    <th colspan="15">(Jefferson) Feeder M Primary</th>
                    <th colspan="1"></th>
                    <th colspan="15">(Jefferson) Feeder N Primary</th>

                  </tr>
              <?php
                  while($counter < 20){

                    $display = mysqli_fetch_assoc($res_M_Prim);
                    $display2 = mysqli_fetch_assoc($res_N_Prim);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>




                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>



                <?php
                    $counter = 0;
                    $nullVar = "-";
                    $res_M_Sec = Booklet_Data_Sec('M');
                    $res_N_Sec = Booklet_Data_Sec('N');
                ?>


                <tr style="background-color:green;">
                    <th colspan="15">Secondary</th>
                    <th colspan="1"></th>
                    <th colspan="15">Secondary</th>

                  </tr>
                  <?php
                  while($counter < 15){

                    $display = mysqli_fetch_assoc($res_M_Sec);
                    $display2 = mysqli_fetch_assoc($res_N_Sec);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>

                </table>



    </div>

<br><br>


<!-- 2 -->
<button class="btn btn-success" onClick ="printDiv('printableArea9')">PDF Export</button>
<button class="btn btn-success" onClick ="$('#table9').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
<button class="btn btn-success" onClick ="$('#table9').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

<br><br>

    <div id="printableArea9">

              <?php
                $counter = 0;
                $nullVar = "-";
                $res_P_Prim = Booklet_Data('P');
                $res_Q_Prim = Booklet_Data('Q');

              ?>

                <table id="table9" class="booklet" border="1px solid black;">
                 <tr style="background-color:green;">
                    <th colspan="15">(Jefferson) Feeder P Primary</th>
                    <th colspan="1"></th>
                    <th colspan="15">(Jefferson) Feeder Q Primary</th>

                  </tr>
              <?php
                  while($counter < 20){

                    $display = mysqli_fetch_assoc($res_P_Prim);
                    $display2 = mysqli_fetch_assoc($res_Q_Prim);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>




                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>



                <?php
                    $counter = 0;
                    $nullVar = "-";
                    $res_P_Sec = Booklet_Data_Sec('P');
                    $res_Q_Sec = Booklet_Data_Sec('Q');
                ?>


                  <tr style="background-color:green;">
                    <th colspan="15">Secondary</th>
                    <th colspan="1"></th>
                    <th colspan="15">Secondary</th>

                  </tr>
                  <?php
                  while($counter < 15){

                    $display = mysqli_fetch_assoc($res_P_Sec);
                    $display2 = mysqli_fetch_assoc($res_Q_Sec);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>

                </table>



    </div>

    <br><br>


    <!-- 2 -->
    <button class="btn btn-success" onClick ="printDiv('printableArea10')">PDF Export</button>
    <button class="btn btn-success" onClick ="$('#table10').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
    <button class="btn btn-success" onClick ="$('#table10').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

    <br><br>


    <div id="printableArea10">

              <?php
                $counter = 0;
                $nullVar = "-";
                $res_R_Prim = Booklet_Data('R');
                $res_S_Prim = Booklet_Data('S');

              ?>

                <table id="table10" class="booklet" border="1px solid black;">
                <tr style="background-color:green;">
                    <th colspan="15">(Jefferson) Feeder R Primary</th>
                    <th colspan="1"></th>
                    <th colspan="15">(Jefferson) Feeder S Primary</th>

                  </tr>
              <?php
                  while($counter < 20){

                    $display = mysqli_fetch_assoc($res_R_Prim);
                    $display2 = mysqli_fetch_assoc($res_S_Prim);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>




                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>



                <?php
                    $counter = 0;
                    $nullVar = "-";
                    $res_R_Sec = Booklet_Data_Sec('R');
                    $res_S_Sec = Booklet_Data_Sec('S');
                ?>


                <tr style="background-color:green;">
                    <th colspan="15">Secondary</th>
                    <th colspan="1"></th>
                    <th colspan="15">Secondary</th>

                  </tr>
                  <?php
                  while($counter < 15){

                    $display = mysqli_fetch_assoc($res_R_Sec);
                    $display2 = mysqli_fetch_assoc($res_S_Sec);

                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                ?>

                    <tr>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                      <td align="center" colspan="1" width =1%></td>

                      <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                      <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>

                </table>



    </div>

<br><br>


<!-- 2 -->
<button class="btn btn-success" onClick ="printDiv('printableArea11')">PDF Export</button>
<button class="btn btn-success" onClick ="$('#table11').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
<button class="btn btn-success" onClick ="$('#table11').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

<br><br>

  <div id="printableArea11">

          <?php
            $counter = 0;
            $nullVar = "-";
            $res_T_Prim = Booklet_Data('T');
            $res_U_Prim = Booklet_Data('U');

          ?>

            <table id="table11" class="booklet" border="1px solid black;">
            <tr style="background-color:green;">
                <th colspan="15">(Jefferson) Feeder T Primary</th>
                <th colspan="1"></th>
                <th colspan="15">(Jefferson) Feeder U Primary</th>

              </tr>
          <?php
              while($counter < 20){

                $display = mysqli_fetch_assoc($res_T_Prim);
                $display2 = mysqli_fetch_assoc($res_U_Prim);

                $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

            ?>

                <tr>




                  <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                  <td align="center" colspan="1" width =1%></td>

                  <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                </tr>
              <?php    $counter = $counter + 1;
                  }  ?>



            <?php
                $counter = 0;
                $nullVar = "-";
                $res_T_Sec = Booklet_Data_Sec('T');
                $res_U_Sec = Booklet_Data_Sec('U');
            ?>


            <tr style="background-color:green;">
                <th colspan="15">Secondary</th>
                <th colspan="1"></th>
                <th colspan="15">Secondary</th>

              </tr>
              <?php
              while($counter < 15){

                $display = mysqli_fetch_assoc($res_T_Sec);
                $display2 = mysqli_fetch_assoc($res_U_Sec);

                $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

            ?>

                <tr>

                  <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>><?php echo $varA1 ?></a></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varA2 ?></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varA3 ?></td>

                  <td align="center" colspan="1" width =1%></td>

                  <td align="center" colspan="5" width = 2%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>><?php echo $varB1 ?></a></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varB2 ?></td>
                  <td align="center" colspan="5" width = 1%><?php echo $varB3 ?></td>


                </tr>
              <?php    $counter = $counter + 1;
                  }  ?>

            </table>



          </div>


    <br>
  </div>
</div>
  <?php include("includes/footer.php"); ?>
