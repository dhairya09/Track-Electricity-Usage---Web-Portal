<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/connection.php"); ?>

<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php $feeder_set = find_all_Feeders(); ?>
<div class = "update_services">




  <h2 class="title"> Manage Feeders </h2>
  <?php echo message(); ?>


  <table class="sortable">
    <tr>
      <th style="text-align: center; width: 200px;">Feeder Name</th>
      <th style="text-align: center; width: 200px;">Vault Name</th>
      <th style="text-align: center; width: 200px;">Vault Section</th>
      <th colspan="2" style="text-align: center;">Actions</th>
    </tr>

      <?php while($feeder = mysqli_fetch_assoc($feeder_set)){ ?>
          <tr>
          <td><?php echo htmlentities($feeder["Feeder_Name"]); ?></td>
          <td><?php echo htmlentities($feeder["Vault_Name"]); ?></td>
          <td><?php echo htmlentities($feeder["Vault_Section"]); ?></td>
          <td colspan="1"><a href= "edit_feeder.php?feeder=<?php echo urlencode($feeder["Feeder_Name"]); ?>">Edit</a></td>
          <td colspan="1"><a href= "delete_feeder.php?feeder=<?php echo urlencode($feeder["Feeder_Name"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
        </tr>
      <?php } ?>
    </table>

        <br/>


        <a href="new_feeder.php">Add new Feeder</a>
        <br/>
          <a href="Modify_upc_update_data.php">Main Menu</a>

</div>
<?php include("includes/footer.php"); ?>
