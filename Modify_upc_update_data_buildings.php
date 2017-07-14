<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php include("includes/header.php"); ?>

<div class = "row2">

  <div class ="col1">
	</div>
	<div class="col2">

<?php echo message(); ?>
<?php echo form_errors($errors); ?>
<h2> Manage Buildings </h2>
<form method="POST">
<p>Search for Building Codes:
<input type="text" name="keyword" required/>
<input type="submit" name="submit" value="Search!" />
</p>
</form>

<?php
  //if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if(isset($_POST["submit"])) {

		$required_fields = array("keyword");
    validate_presences($required_fields);

    if(empty($errors))
		{
			$keyword = $_POST["keyword"];
    	$result= Find_Building_By_Search($keyword);
     ?>

		<table class="sortable" style="visibility:visible">
	    <tr>
	      <th style="text-align: left; width: 200px;">Building Code</th>
				<th style="text-align: left; width: 200px;">Building Name</th>
	      <th style="text-align: left; width: 200px;">Building Address</th>
	      <th colspan="2" style="text-align: left;">Actions</th>
			</tr>

	      <?php while($display = mysqli_fetch_assoc($result)){ ?>
	          <tr>
	            <td><?php echo htmlentities($display["Building_Code"]); ?></td>
	            <td><?php echo htmlentities($display["Building_Name"]); ?></td>
	            <td><?php echo htmlentities($display["Building_Address"]); ?></td>
	            <td><a href= "edit_building.php?building=<?php echo urlencode($display["Building_Code"]); ?>">Edit</a></td>
	            <td><a href= "delete_building.php?building=<?php echo urlencode($display["Building_Code"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
	          </tr>
	      <?php } ?>
	    </table>

<?php
	}
}  ?>






        <br/>

        <a href="new_building.php">Add new Building</a>
        <br/>
          <a href="Modify_upc_update_data.php">Main Menu</a>

</div>
</div>
<?php include("includes/footer.php"); ?>
