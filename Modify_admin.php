<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<div class="row2">
    <div class = "col1"></div>
    <div class = "col2">
    <h2>Admin Menu</h2>
    <p>Welcome to the admin area <?php echo htmlentities($_SESSION["username"]); ?></p>
    <ul>
      <li><a href="Modify_data.php">View HomePage</a></li><br>
      <li><a href="Modify_upc_update_data.php">Update Data</a></li><br>
      <li><a href="Manage_admin.php">Manage Admin Users</a></li><br>

      <li><a href="Manage_nonadmin.php">Manage Non-Admin Users</a></li><br>
      <li><a href="Logout.php">Logout</a></li><br>
    </ul>
  </div>
</div>
<?php include("includes/footer.php"); ?>
