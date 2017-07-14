<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/validation_functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php"); ?>
<?php
$feeder = find_feeder_by_Feeder_Name($_GET["feeder"]);
if(!$feeder){
  redirect_to("Manage_Service.php");
}

 ?>
<?php
if(isset($_POST["submit"])){

  // validations
  $required_fields = array("vault_name", "vault_section");
  validate_presences($required_fields);

  /*$fields_with_max_lengths = array("username" => 30);
  validate_max_lengths($fields_with_max_lengths);*/

  if(empty($errors)){
    $feed = $feeder["Feeder_Name"];
    $vault_name =  mysql_prep($_POST["vault_name"]);
    $vault_section =  mysql_prep($_POST["vault_section"]);



    $query = "UPDATE elec_upc_services ";
    $query.= "SET ";
    $query.= "Vault_Name = '{$vault_name}', ";
    $query.= "Vault_Section = {$vault_section} ";
    $query.= "WHERE ";
    $query.= "Feeder_Name = '{$feed}' ";
    $query.= "LIMIT 1";

    $result = mysqli_query($connection,$query);
    if($result){
        $_SESSION["message"] = "Feeder Updated";
        redirect_to("Manage_Services.php");
    }
    else{
        echo "Error is:" . mysqli_error($connection);
        $_SESSION["message"] = "Feeder Update Failed";
    }
  }



}



 ?>

<div class = "row2">
  <div class ="col1">
  </div>
  <div class="col2">
  <?php echo message(); ?>
  <?php echo form_errors($errors); ?>
  <div>
  <h2>Edit Feeder <?php echo htmlentities($feeder["Feeder_Name"]); ?></h2>
  (Inset <b>NULL</b> in case of leaving the textfield blank)
  </div>

  <form action="edit_feeder.php?feeder=<?php echo urlencode($feeder["Feeder_Name"]); ?>" method="post">
    <p>Vault Name:
      <input type="text" name="vault_name" value="<?php echo htmlentities($feeder["Vault_Name"]); ?>" />
    </p>
    <p>Vault Section:
      <input type="text" name="vault_section" value="<?php echo htmlentities($feeder["Vault_Section"]); ?>" />
    </p>
    <input type="submit" name="submit" value="Edit Feeder" />
  </form>

  <br/>
  <a href="Manage_Services.php">Cancel</a>
</div>
</div>

<?php include("includes/footer.php"); ?>
