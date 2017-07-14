<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<div class="row2">
    <div class = "col1"></div>
    <div class = "col2">
    <h2>Non Admin Menu</h2>
    <p>Welcome to the non admin area <?php echo htmlentities($_SESSION["username"]); ?></p>
    <ul>
      <li><a href="Modify_data.php">View HomePage</a></li>

      
      <li><a href="Logout.php">Logout</a></li>
    </ul>
  </div>
</div>
  <?php include("includes/footer.php"); ?>
