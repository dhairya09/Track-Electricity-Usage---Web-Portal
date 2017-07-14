<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>


<?php include("includes/header.php"); ?>


<?php



  $keyword = mysql_prep($_POST['keyword']);

  // Perform the fulltext search
  $query = "SELECT Building_Code,Building_Name ";
  $query.= "FROM elec_upc_building_names WHERE ";
  $query.= "MATCH(Building_Code, Building_Name) AGAINST ('$keyword')";
  $result = mysqli_query($connection,$query);
?>

  <table border="1px solid black;">
    <tr>

			<th style="text-align: left; width: 200px;">Building Code</th>
      <th style="text-align: left; width: 200px;">Building Name</th>




    </tr>

      <?php while($disp = mysqli_fetch_assoc($result)){ ?>
          <tr>
          <td><?php echo htmlentities($disp["Building_Code"]); ?></td>
          <td><?php echo htmlentities($disp["Building_Name"]); ?></td>
          </tr>
      <?php } ?>
    </table>






?>


<?php include("includes/footer.php"); ?>
