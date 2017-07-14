<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php confirm_logged_in(); ?>

<?php include("includes/header.php"); ?>
<?php $admin_set = find_all_admins(); ?>
<div class = "row2">
  <div class = "col1">

  </div>

  <div class = "col2">

  <h2> Manage Admins </h2>
  <?php echo message(); ?>
  <?php $errors = errors(); ?>
 <?php echo form_errors($errors); ?>
  <table class="sortable">
    <tr>
      <th style="text-align: left; width: 200px;">Username</th>
      <th colspan="2" style="text-align: left;">Actions</th>
    </tr>

      <?php while($admin = mysqli_fetch_assoc($admin_set)){ ?>
          <tr>
          <td><?php echo htmlentities($admin["username"]); ?></td>
          <td><a href= "edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a></td>
          <td><a href= "delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>

        </tr>
      <?php } ?>
    </table>

        <br/>

        <a href="new_admin.php">Add new Admin</a>
          <a href="Modify_admin.php">Main Menu</a>
      </div>
</div>
<?php include("includes/footer.php");
