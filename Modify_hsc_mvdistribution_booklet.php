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






									<button class="btn btn-success" onClick ="printDiv('printableArea12')">PDF Export</button>
									<button class="btn btn-success" onClick ="$('#table12').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
									<button class="btn btn-success" onClick ="$('#table12').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

									<br><br>


									<div id="printableArea12">

														<?php
															$counter = 0;
															$nullVar = "-";
															$res_A_Prim = Booklet_HSC_Data('A');
															$res_B_Prim = Booklet_HSC_Data('B');

														?>

															<table id="table12" class="booklet" border="1px solid black;">
															<tr style="background-color:blue;">
																	<th colspan="15">(CHP) Feeder A Primary</th>
																	<th colspan="1"></th>
																	<th colspan="15">(CHP) Feeder B Primary</th>

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
																	$res_A_Sec = Booklet_HSC_Data_Sec('A');
																	$res_B_Sec = Booklet_HSC_Data_Sec('B');
															?>


															<tr style="background-color:blue;">
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

									<button class="btn btn-success" onClick ="printDiv('printableArea13')">PDF Export</button>
									<button class="btn btn-success" onClick ="$('#table13').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
									<button class="btn btn-success" onClick ="$('#table13').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

									<br><br>


									<div id="printableArea13">

														<?php
															$counter = 0;
															$nullVar = "-";
															$res_C_Prim = Booklet_HSC_Data('C');
															$res_D_Prim = Booklet_HSC_Data('D');

														?>

															<table id="table13" class="booklet" border="1px solid black;">
															<tr style="background-color:blue;">
																	<th colspan="15">(CHP) Feeder C Primary</th>
																	<th colspan="1"></th>
																	<th colspan="15">(CHP) Feeder D Primary</th>

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
																	$res_C_Sec = Booklet_HSC_Data_Sec('C');
																	$res_D_Sec = Booklet_HSC_Data_Sec('D');
															?>


															<tr style="background-color:blue;">
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

									<button class="btn btn-success" onClick ="printDiv('printableArea14')">PDF Export</button>
									<button class="btn btn-success" onClick ="$('#table14').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
									<button class="btn btn-success" onClick ="$('#table14').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

									<br><br>


									<div id="printableArea14">

														<?php
															$counter = 0;
															$nullVar = "-";
															$res_E_Prim = Booklet_HSC_Data('E');
															$res_F_Prim = Booklet_HSC_Data('F');

														?>

															<table id="table14" class="booklet" border="1px solid black;">
															<tr style="background-color:blue;">
																	<th colspan="15">(CHP) Feeder E Primary</th>
																	<th colspan="1"></th>
																	<th colspan="15">(CHP) Feeder F Primary</th>

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
																	$res_E_Sec = Booklet_HSC_Data_Sec('E');
																	$res_F_Sec = Booklet_HSC_Data_Sec('F');
															?>


															<tr style="background-color:blue;">
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

									<button class="btn btn-success" onClick ="printDiv('printableArea15')">PDF Export</button>
									<button class="btn btn-success" onClick ="$('#table15').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
									<button class="btn btn-success" onClick ="$('#table15').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

									<br><br>


									<div id="printableArea15">

														<?php
															$counter = 0;
															$nullVar = "-";
															$res_G_Prim = Booklet_HSC_Data('G');
															$res_H_Prim = Booklet_HSC_Data('H');

														?>

															<table id="table15" class="booklet" border="1px solid black;">
															<tr style="background-color:blue;">
																	<th colspan="15">(CHP) Feeder G Primary</th>
																	<th colspan="1"></th>
																	<th colspan="15">(CHP) Feeder H Primary</th>

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
																	$res_G_Sec = Booklet_HSC_Data_Sec('G');
																	$res_H_Sec = Booklet_HSC_Data_Sec('H');
															?>


															<tr style="background-color:blue;">
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


									<button class="btn btn-success" onClick ="printDiv('printableArea16')">PDF Export</button>
									<button class="btn btn-success" onClick ="$('#table16').tableExport({type: 'excel', escape: 'false'});">Excel Export</button>
									<button class="btn btn-success" onClick ="$('#table16').tableExport({type: 'png', escape: 'false'});">PNG Export</button>

									<br><br>


									<div id="printableArea16">

														<?php
															$counter = 0;
															$nullVar = "-";
															$res_4_Prim = Booklet_HSC_Data('4');
															$res_5_Prim = Booklet_HSC_Data('5');

														?>

															<table id="table16" class="booklet" border="1px solid black;">
															<tr style="background-color:red;">
																	<th colspan="15">(SVR) Feeder 4 Primary</th>
																	<th colspan="1"></th>
																	<th colspan="15">(SVR) Feeder 5 Primary</th>

																</tr>
														<?php
																while($counter < 20){

																	$display = mysqli_fetch_assoc($res_4_Prim);
																	$display2 = mysqli_fetch_assoc($res_5_Prim);

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
																	$res_4_Sec = Booklet_HSC_Data_Sec('4');
																	$res_5_Sec = Booklet_HSC_Data_Sec('5');
															?>


															<tr style="background-color:red;">
																	<th colspan="15">Secondary</th>
																	<th colspan="1"></th>
																	<th colspan="15">Secondary</th>

																</tr>
																<?php
																while($counter < 15){

																	$display = mysqli_fetch_assoc($res_4_Sec);
																	$display2 = mysqli_fetch_assoc($res_5_Sec);

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


							<!--		<div id="printableArea17">

														<?php
															$counter = 0;
															$nullVar = "-";
															$res_UNH_Prim = Booklet_HSC_Data('UNH');
															$res_DWP_Prim = Booklet_HSC_Data('DWP');

														?>

															<table id="table17" class="booklet" border="1px solid black;">
															<tr style="background-color:red;">
																	<th colspan="15">(SVR) Feeder UNH Primary</th>
																	<th colspan="1"></th>
																	<th colspan="15">(SVR) Feeder DWP Primary</th>

																</tr>
														<?php
																while($counter < 20){

																	$display = mysqli_fetch_assoc($res_UNH_Prim);
																	$display2 = mysqli_fetch_assoc($res_DWP_Prim);

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
																	$res_UNH_Sec = Booklet_HSC_Data_Sec('UNH');
																	$res_DWP_Sec = Booklet_HSC_Data_Sec('DWP');
															?>


															<tr style="background-color:red;">
																	<th colspan="15">Secondary</th>
																	<th colspan="1"></th>
																	<th colspan="15">Secondary</th>

																</tr>
																<?php
																while($counter < 15){

																	$display = mysqli_fetch_assoc($res_UNH_Sec);
																	$display2 = mysqli_fetch_assoc($res_DWP_Sec);

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



									</div> -->









		</div>
</div>
  <?php include("includes/footer.php"); ?>
