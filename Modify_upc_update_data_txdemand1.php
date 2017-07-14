<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>


<?php include("includes/header.php"); ?>

<?php $transformer_set = find_all_Transformers(); ?>
<div class = "update_services">

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $required_fields = array("keyword");
    validate_presences($required_fields);

    if(empty($errors)){
    $keyword = mysql_prep($_POST['keyword']);
    $disp = Find_Data_By_Search($keyword);
  }
  }
  ?>



  <h2> Manage Transformers </h2>

  <?php echo message(); ?>

  <?php echo form_errors($errors); ?>

<!--<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Search for Building_Codes:<br />
<input type="text" id="keyword" name="keyword" /><br />
<input type="submit" value="Search!" />
</form>


  <table border="1px solid black;">
    <tr>

      <th style="text-align: left; width: 200px;">Building Code</th>
      <th style="text-align: left; width: 200px;">Building Name</th>




    </tr>

      <?php// while($display = mysqli_fetch_assoc($disp)){ ?>
          <tr>
          <td><?php //echo htmlentities($display["Building_Code"]); ?></td>
          <td><?php //echo htmlentities($display["Building_Name"]); ?></td>
          </tr>
      <?php //} ?>
    </table>-->


  <table border="1px solid black;">
    <tr>

			<th style="text-align: left; width: 200px;">Building Code</th>
      <th style="text-align: left; width: 200px;">Building Name</th>

      <th colspan="2" style="text-align: left;">Actions</th>


    </tr>

      <?php while($transformer = mysqli_fetch_assoc($transformer_set)){ ?>
          <tr>
          <td><?php echo htmlentities($transformer["Building_Code"]); ?></td>
          <td><?php echo htmlentities($transformer["Building_Name"]); ?></td>

          <td><a href= "edit_transformer.php?transformer=<?php echo urlencode($transformer["Building_Code"]); ?>">Edit</a></td>
          <td><a href= "delete_transformer.php?transformer=<?php echo urlencode($transformer["Building_Code"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

        <br/>

        <a href="new_transformer.php">Add new transformer</a>
        <br/>
          <a href="Modify_upc_update_data.php">Main Menu</a>

</div>
<?php include("includes/footer.php"); ?>
