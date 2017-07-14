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




			$query = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_upc_txdemand T1 LEFT JOIN elec_upc_services T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[a-l]' ORDER BY 1 ";
		  $result = mysqli_query($connection,$query);

			$query2 = "SELECT T1.Building_Code AS Building, T1.Primary_Feed AS Pri, T1.Secondary_Feed AS Sec, T2.Vault_Name AS Vault, T2.Vault_Section AS Service FROM elec_upc_txdemand T1 LEFT JOIN elec_upc_services T2 ON T1.Primary_Feed = T2.Feeder_Name WHERE T1.Building_Code REGEXP '^[m-z]' ORDER BY 1 ";
			$result2 = mysqli_query($connection,$query2);

			echo 'UPC SERVICE BY BUILDING';
			echo '<br><br>';
			echo'*Grayed Cell indicates current position of switch<br>';
			echo'<table id="table1" style="width:200%">';
			echo'<tr><td colspan="1" width = 50%>';
			//echo'<table style="width:100%" CLASS="dispTable">';
			echo '<table style="width:100%" class="sortable">';
			echo'<tr>
			    <th colspan="5">Building</th>
			    <th colspan="1">Pri.</th>
			    <th colspan="1">Sec.</th>
			    <th colspan="2">Vault</th>
			    <th colspan="1">Service</th>
			  </tr>';

			$nullVar = NULL;
			while($data = mysqli_fetch_assoc($result))
			{

			$var1=empty($data['Building'])? $nullVar : $data['Building'];
			$var2=empty($data['Pri'])? $nullVar : $data['Pri'];
			$var3=empty($data['Sec'])? $nullVar : $data['Sec'];
			$var4=empty($data['Vault'])? $nullVar : $data['Vault'];
			$var5=empty($data['Service'])? $nullVar : $data['Service'];

			echo'<tr style="text-align:center;">';
			echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

			if($var3==NULL)
				echo '<td colspan="1" width = 10%>'.$var2.'</td>';
			else
				echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

			echo '<td colspan="1" width = 10%>'.$var3.'</td>';
			echo '<td colspan="2" width = 20%>'.$var4.'</td>';
			echo '<td colspan="1" width = 10%>'.$var5.'</td>';
			echo'</tr>';
			}
			echo '</table>';
			echo'</td><td colspan="1" width = 2%></td>';
			echo'<td colspan="1" width = 49%>';

			//echo'<table style="width:100%" CLASS="dispTable">';
			echo '<table style="width:100%" class="sortable">';
			echo'<tr>
			    <th colspan="5">Building</th>
			    <th colspan="1">Pri.</th>
			    <th colspan="1">Sec.</th>
			    <th colspan="2">Vault</th>
			    <th colspan="1">Service</th>
			  </tr>';

			$nullVar = NULL;
			while($data2 = mysqli_fetch_assoc($result2))
			{

			$var1=empty($data2['Building'])? $nullVar : $data2['Building'];
			$var2=empty($data2['Pri'])? $nullVar : $data2['Pri'];
			$var3=empty($data2['Sec'])? $nullVar : $data2['Sec'];
			$var4=empty($data2['Vault'])? $nullVar : $data2['Vault'];
			$var5=empty($data2['Service'])? $nullVar : $data2['Service'];

			echo'<tr style="text-align:center;">';
			echo '<td colspan="5" width = 50%><a style="text-decoration: none" href="data/'.(substr($var1,0,3)).'.php">'.$var1.'</a></td>';

			if($var3==NULL)
				echo '<td colspan="1" width = 10%>'.$var2.'</td>';
			else
				echo '<td colspan="1" width = 10% BGCOLOR="#7e7e7e">'.$var2.'</td>';

			echo '<td colspan="1" width = 10%>'.$var3.'</td>';
			echo '<td colspan="2" width = 20%>'.$var4.'</td>';
			echo '<td colspan="1" width = 10%>'.$var5.'</td>';
			echo'</tr>';
			}
			echo '</table>';
			echo'</td></tr>';
			echo'</table>';

			?>

			</div>
			<br>
			<form action="Modify_upc_servicebybuilding_booklet1.php"><input type="submit" value="UPC ServiceByBuilding Booklet Print"></form>
			<br>


		</div>
</div>
<?php include("includes/footer.php"); ?>
