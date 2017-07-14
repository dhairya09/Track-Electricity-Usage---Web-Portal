<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/session.php"); ?>
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
			<button class="btn btn-success" onClick ="$('#tableB').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
			<button class="btn btn-success" onClick ="$('#tableB').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

      <br><br>

      <div id="printableArea1">

                <?php
                  $counter = 0;
                  $nullVar = "-";
                	$res_A_Prim = Booklet_HOF_Data('A');
                	$res_B_Prim = Booklet_HOF_Data('B');
                  $res_C_Prim = Booklet_HOF_Data('C');
                	$res_D_Prim = Booklet_HOF_Data('D');
                  $res_E_Prim = Booklet_HOF_Data('E');
                	$res_F_Prim = Booklet_HOF_Data('F');
                  //display:inline-block

                ?>

                <h2>CHP VAULT</h2>
                <table id="tableB" class="sortable" style="width:200%">
                <!--<table border="1px solid black;" style="width:60%">-->
                  <tr>
                    <th colspan="10">Feeder A Primary</th>
                    <th colspan="10">Feeder B Primary</th>
                    <th colspan="10">Feeder C Primary</th>
                    <th colspan="10">Feeder D Primary</th>
                    <th colspan="10">Feeder E Primary</th>
                    <th colspan="10">Feeder F Primary</th>


                 </tr>
              <?php
                  while($counter < 20){

                    $display = mysqli_fetch_assoc($res_A_Prim);
                    $display2 = mysqli_fetch_assoc($res_B_Prim);
                    $display3 = mysqli_fetch_assoc($res_C_Prim);
                    $display4 = mysqli_fetch_assoc($res_D_Prim);
                    $display5 = mysqli_fetch_assoc($res_E_Prim);
                    $display6 = mysqli_fetch_assoc($res_F_Prim);



                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                    $varC1=empty($display3['Building_Code'])? $nullVar : $display3['Building_Code'];
                    $varC2=empty($display3['Primary_Feed'])? $nullVar : $display3['Primary_Feed'];
                    $varC3=empty($display3['Secondary_Feed'])? $nullVar : $display3['Secondary_Feed'];


                    $varD1=empty($display4['Building_Code'])? $nullVar : $display4['Building_Code'];
                    $varD2=empty($display4['Primary_Feed'])? $nullVar : $display4['Primary_Feed'];
                    $varD3=empty($display4['Secondary_Feed'])? $nullVar : $display4['Secondary_Feed'];

                    $varE1=empty($display5['Building_Code'])? $nullVar : $display5['Building_Code'];
                    $varE2=empty($display5['Primary_Feed'])? $nullVar : $display5['Primary_Feed'];
                    $varE3=empty($display5['Secondary_Feed'])? $nullVar : $display5['Secondary_Feed'];


                    $varF1=empty($display6['Building_Code'])? $nullVar : $display6['Building_Code'];
                    $varF2=empty($display6['Primary_Feed'])? $nullVar : $display6['Primary_Feed'];
                    $varF3=empty($display6['Secondary_Feed'])? $nullVar : $display6['Secondary_Feed'];



                ?>

                    <tr>
                      <td align="center" width="10%" colspan="8"  ><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>> <?php echo $varA1 ?></a></td>
                      <td align="center" width="3%" colspan="1"  ><?php echo $varA2 ?></td>
                      <td align="center" width="3%" colspan="1" ><?php echo $varA3 ?></td>
                      <!--<td align="center" colspan="1" width =1%></td>-->
                      <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>> <?php echo $varB1 ?></a></td>
                      <td align="center"  width="3%" colspan="1"><?php echo $varB2 ?></td>
                      <td align="center"  width="3%" colspan="1"><?php echo $varB3 ?></td>

                      <td align="center"  width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varC1,0,3)).'.php"'  ?>> <?php echo $varC1 ?></a></td>
                      <td align="center" width="3%" colspan="1"><?php echo $varC2 ?></td>
                      <td align="center"  width="3%" colspan="1"><?php echo $varC3 ?></td>

                      <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varD1,0,3)).'.php"'  ?>> <?php echo $varD1 ?></a></td>
                      <td align="center" width="3%" colspan="1"><?php echo $varD2 ?></td>
                      <td align="center" width="3%" colspan="1"><?php echo $varD3 ?></td>

                      <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varE1,0,3)).'.php"'  ?>> <?php echo $varE1 ?></a></td>
                      <td align="center" width="3%" colspan="1"><?php echo $varE2 ?></td>
                      <td align="center" width="3%" colspan="1"><?php echo $varE3 ?></td>

                      <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varF1,0,3)).'.php"'  ?>> <?php echo $varF1 ?></a></td>
                      <td align="center"  width="3%" colspan="1"><?php echo $varF2 ?></td>
                      <td align="center" width="3%" colspan="1"><?php echo $varF3 ?></td>




                    </tr>
                  <?php    $counter = $counter + 1;
                      }  ?>

                </table>

                <?php
                    $counter = 0;
                    $nullVar = "-";
                    $res_A_Sec = Booklet_HOF_Data_Sec('A');
                    $res_B_Sec = Booklet_HOF_Data_Sec('B');
                    $res_C_Sec = Booklet_HOF_Data_Sec('C');
                    $res_D_Sec = Booklet_HOF_Data_Sec('D');
                    $res_E_Sec = Booklet_HOF_Data_Sec('E');
                    $res_F_Sec = Booklet_HOF_Data_Sec('F');

                ?>

                <table id="tableB" class="sortable" style="width:200%">

                  <tr>

                    <th colspan="10">Secondary</th>
                    <th colspan="10">Secondary</th>
                    <th colspan="10">Secondary</th>
                    <th colspan="10">Secondary</th>
                    <th colspan="10">Secondary</th>
                    <th colspan="10">Secondary</th>

                  </tr>
                  <?php
                  while($counter < 15){

                    $display = mysqli_fetch_assoc($res_A_Sec);
                    $display2 = mysqli_fetch_assoc($res_B_Sec);
                    $display3 = mysqli_fetch_assoc($res_C_Sec);
                    $display4 = mysqli_fetch_assoc($res_D_Sec);
                    $display5 = mysqli_fetch_assoc($res_E_Sec);
                    $display6 = mysqli_fetch_assoc($res_F_Sec);


                    $varA1=empty($display['Building_Code'])? $nullVar : $display['Building_Code'];
                    $varA2=empty($display['Primary_Feed'])? $nullVar : $display['Primary_Feed'];
                    $varA3=empty($display['Secondary_Feed'])? $nullVar : $display['Secondary_Feed'];


                    $varB1=empty($display2['Building_Code'])? $nullVar : $display2['Building_Code'];
                    $varB2=empty($display2['Primary_Feed'])? $nullVar : $display2['Primary_Feed'];
                    $varB3=empty($display2['Secondary_Feed'])? $nullVar : $display2['Secondary_Feed'];

                    $varC1=empty($display3['Building_Code'])? $nullVar : $display3['Building_Code'];
                    $varC2=empty($display3['Primary_Feed'])? $nullVar : $display3['Primary_Feed'];
                    $varC3=empty($display3['Secondary_Feed'])? $nullVar : $display3['Secondary_Feed'];


                    $varD1=empty($display4['Building_Code'])? $nullVar : $display4['Building_Code'];
                    $varD2=empty($display4['Primary_Feed'])? $nullVar : $display4['Primary_Feed'];
                    $varD3=empty($display4['Secondary_Feed'])? $nullVar : $display4['Secondary_Feed'];

                    $varE1=empty($display5['Building_Code'])? $nullVar : $display5['Building_Code'];
                    $varE2=empty($display5['Primary_Feed'])? $nullVar : $display5['Primary_Feed'];
                    $varE3=empty($display5['Secondary_Feed'])? $nullVar : $display5['Secondary_Feed'];


                    $varF1=empty($display6['Building_Code'])? $nullVar : $display6['Building_Code'];
                    $varF2=empty($display6['Primary_Feed'])? $nullVar : $display6['Primary_Feed'];
                    $varF3=empty($display6['Secondary_Feed'])? $nullVar : $display6['Secondary_Feed'];


                ?>



                      <tr>
                        <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varA1,0,3)).'.php"'  ?>> <?php echo $varA1 ?></a></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varA2 ?></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varA3 ?></td>
                        <!--<td align="center" colspan="1" width =1%></td>-->
                        <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varB1,0,3)).'.php"'  ?>> <?php echo $varB1 ?></a></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varB2 ?></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varB3 ?></td>

                        <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varC1,0,3)).'.php"'  ?>> <?php echo $varC1 ?></a></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varC2 ?></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varC3 ?></td>

                        <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varD1,0,3)).'.php"'  ?>> <?php echo $varD1 ?></a></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varD2 ?></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varD3 ?></td>

                        <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varE1,0,3)).'.php"'  ?>> <?php echo $varE1 ?></a></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varE2 ?></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varE3 ?></td>

                        <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varF1,0,3)).'.php"'  ?>> <?php echo $varF1 ?></a></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varF2 ?></td>
                        <td align="center" colspan="1" width = 3%><?php echo $varF3 ?></td>


                      </tr>



                  <?php    $counter = $counter + 1;
                      }  ?>

                </table>
              </div>

          <br><br>

          <button class="btn btn-success" onClick ="printDiv('printableArea12')">PDF Export</button>
          <button class="btn btn-success" onClick ="$('#tableC').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
          <button class="btn btn-success" onClick ="$('#tableC').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

          <br><br>

      <div id="printableArea12">


              <?php
                $counter = 0;
                $nullVar = "-";

                $res_G_Prim = Booklet_HOF_Data('G');
                $res_H_Prim = Booklet_HOF_Data('H');
                $res_4_Prim = Booklet_HOF_Data('4');
                $res_5_Prim = Booklet_HOF_Data('5');
                $res_UNH_Prim = Booklet_HOF_Data('UNH');
                $res_DWP_Prim = Booklet_HOF_Data('DWP');

              ?>


             <table id="tableC" class="sortable" style="width:200%">
              <!--<table border="1px solid black;" style="width:60%">-->
                <tr>
                  <th colspan="10">Feeder G Primary</th>
                  <th colspan="10">Feeder H Primary</th>
                  <th colspan="10">Feeder 4 Primary</th>
                  <th colspan="10">Feeder 5 Primary</th>
                  <th colspan="10">Feeder UNH Primary</th>
                  <th colspan="10">Feeder DWP Primary</th>


               </tr>
            <?php
                while($counter < 20){


                  $display7 = mysqli_fetch_assoc($res_G_Prim);
                  $display8 = mysqli_fetch_assoc($res_H_Prim);
                  $display9 = mysqli_fetch_assoc($res_4_Prim);
                  $display10 = mysqli_fetch_assoc($res_5_Prim);
                  $display11 = mysqli_fetch_assoc($res_UNH_Prim);
                  $display12 = mysqli_fetch_assoc($res_DWP_Prim);

                  $varG1=empty($display7['Building_Code'])? $nullVar : $display7['Building_Code'];
                  $varG2=empty($display7['Primary_Feed'])? $nullVar : $display7['Primary_Feed'];
                  $varG3=empty($display7['Secondary_Feed'])? $nullVar : $display7['Secondary_Feed'];


                  $varH1=empty($display8['Building_Code'])? $nullVar : $display8['Building_Code'];
                  $varH2=empty($display8['Primary_Feed'])? $nullVar : $display8['Primary_Feed'];
                  $varH3=empty($display8['Secondary_Feed'])? $nullVar : $display8['Secondary_Feed'];

                  $varI1=empty($display9['Building_Code'])? $nullVar : $display9['Building_Code'];
                  $varI2=empty($display9['Primary_Feed'])? $nullVar : $display9['Primary_Feed'];
                  $varI3=empty($display9['Secondary_Feed'])? $nullVar : $display9['Secondary_Feed'];


                  $varJ1=empty($display10['Building_Code'])? $nullVar : $display10['Building_Code'];
                  $varJ2=empty($display10['Primary_Feed'])? $nullVar : $display10['Primary_Feed'];
                  $varJ3=empty($display10['Secondary_Feed'])? $nullVar : $display10['Secondary_Feed'];

                  $varX1=empty($display11['Building_Code'])? $nullVar : $display11['Building_Code'];
                  $varX2=empty($display11['Primary_Feed'])? $nullVar : $display11['Primary_Feed'];
                  $varX3=empty($display11['Secondary_Feed'])? $nullVar : $display11['Secondary_Feed'];


                  $varZ1=empty($display12['Building_Code'])? $nullVar : $display12['Building_Code'];
                  $varZ2=empty($display12['Primary_Feed'])? $nullVar : $display12['Primary_Feed'];
                  $varZ3=empty($display12['Secondary_Feed'])? $nullVar : $display12['Secondary_Feed'];


              ?>

                  <tr>


                    <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varG1,0,3)).'.php"'  ?>> <?php echo $varG1 ?></a></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varG2 ?></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varG3 ?></td>
                    <!--<td align="center" colspan="1" width =1%></td>-->
                    <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varH1,0,3)).'.php"'  ?>> <?php echo $varH1 ?></a></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varH2 ?></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varH3 ?></td>

                    <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varI1,0,3)).'.php"'  ?>> <?php echo $varI1 ?></a></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varI2 ?></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varI3 ?></td>

                    <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varJ1,0,3)).'.php"'  ?>> <?php echo $varJ1 ?></a></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varJ2 ?></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varJ3 ?></td>

                    <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varX1,0,3)).'.php"'  ?>> <?php echo $varX1 ?></a></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varX2 ?></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varX3 ?></td>

                    <td align="center" width="10%" colspan="8"><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varZ1,0,3)).'.php"'  ?>> <?php echo $varZ1 ?></a></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varZ2 ?></td>
                    <td align="center" width="3%" colspan="1"><?php echo $varZ3 ?></td>




                  </tr>
                <?php    $counter = $counter + 1;
                    }  ?>

              </table>

              <?php
                  $counter = 0;
                  $nullVar = "-";

                  $res_G_Sec = Booklet_HOF_Data_Sec('G');
                  $res_H_Sec = Booklet_HOF_Data_Sec('H');
                  $res_4_Sec = Booklet_HOF_Data_Sec('4');
                  $res_5_Sec = Booklet_HOF_Data_Sec('5');
                  $res_UNH_Sec = Booklet_HOF_Data_Sec('UNH');
                  $res_DWP_Sec = Booklet_HOF_Data_Sec('DWP');
              ?>

             <table id="tableC" class="sortable" style="width:200%">

                <tr>

                  <th colspan="10">Secondary</th>
                  <th colspan="10">Secondary</th>
                  <th colspan="10">Secondary</th>
                  <th colspan="10">Secondary</th>
                  <th colspan="10">Secondary</th>
                  <th colspan="10">Secondary</th>

                </tr>
                <?php
                while($counter < 15){


                  $display7 = mysqli_fetch_assoc($res_G_Sec);
                  $display8 = mysqli_fetch_assoc($res_H_Sec);
                  $display9 = mysqli_fetch_assoc($res_4_Sec);
                  $display10 = mysqli_fetch_assoc($res_5_Sec);
                  $display11 = mysqli_fetch_assoc($res_UNH_Sec);
                  $display12 = mysqli_fetch_assoc($res_DWP_Sec);



                  $varG1=empty($display7['Building_Code'])? $nullVar : $display7['Building_Code'];
                  $varG2=empty($display7['Primary_Feed'])? $nullVar : $display7['Primary_Feed'];
                  $varG3=empty($display7['Secondary_Feed'])? $nullVar : $display7['Secondary_Feed'];


                  $varH1=empty($display8['Building_Code'])? $nullVar : $display8['Building_Code'];
                  $varH2=empty($display8['Primary_Feed'])? $nullVar : $display8['Primary_Feed'];
                  $varH3=empty($display8['Secondary_Feed'])? $nullVar : $display8['Secondary_Feed'];

                  $varI1=empty($display9['Building_Code'])? $nullVar : $display9['Building_Code'];
                  $varI2=empty($display9['Primary_Feed'])? $nullVar : $display9['Primary_Feed'];
                  $varI3=empty($display9['Secondary_Feed'])? $nullVar : $display9['Secondary_Feed'];


                  $varJ1=empty($display10['Building_Code'])? $nullVar : $display10['Building_Code'];
                  $varJ2=empty($display10['Primary_Feed'])? $nullVar : $display10['Primary_Feed'];
                  $varJ3=empty($display10['Secondary_Feed'])? $nullVar : $display10['Secondary_Feed'];

                  $varX1=empty($display11['Building_Code'])? $nullVar : $display11['Building_Code'];
                  $varX2=empty($display11['Primary_Feed'])? $nullVar : $display11['Primary_Feed'];
                  $varX3=empty($display11['Secondary_Feed'])? $nullVar : $display11['Secondary_Feed'];


                  $varZ1=empty($display12['Building_Code'])? $nullVar : $display12['Building_Code'];
                  $varZ2=empty($display12['Primary_Feed'])? $nullVar : $display12['Primary_Feed'];
                  $varZ3=empty($display12['Secondary_Feed'])? $nullVar : $display12['Secondary_Feed'];

              ?>



                    <tr>


                      <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varG1,0,3)).'.php"'  ?>> <?php echo $varG1 ?></a></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varG2 ?></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varG3 ?></td>
                      <!--<td align="center" colspan="1" width =1%></td>-->
                      <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varH1,0,3)).'.php"'  ?>> <?php echo $varH1 ?></a></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varH2 ?></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varH3 ?></td>

                      <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varI1,0,3)).'.php"'  ?>> <?php echo $varI1 ?></a></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varI2 ?></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varI3 ?></td>

                      <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varJ1,0,3)).'.php"'  ?>> <?php echo $varJ1 ?></a></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varJ2 ?></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varJ3 ?></td>

                      <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varX1,0,3)).'.php"'  ?>> <?php echo $varX1 ?></a></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varX2 ?></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varX3 ?></td>

                      <td align="center" colspan="8" width = 10%><a style="text-decoration: none" <?php echo 'href="data/'.(substr($varZ1,0,3)).'.php"'  ?>> <?php echo $varZ1 ?></a></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varZ2 ?></td>
                      <td align="center" colspan="1" width = 3%><?php echo $varZ3 ?></td>
                    </tr>



                <?php    $counter = $counter + 1;
                    }  ?>

            </table>

        </div>



      	<br>

			



  </div>
</div>
  <?php include("includes/footer.php"); ?>
