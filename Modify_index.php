<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php");?>
<!DOCTYPE html>
<html>
	<head>
		<title>
				First_Page
		</title>
			<link rel="stylesheet" href="css/style_firstpage.css" type="text/css" />
			<?php
			include_once("includes/form_functions.php");
			if (isset($_POST['submit'])) {
		             $errors = array();

		             $required_fields = array('username', 'password');
		             foreach($required_fields as $fieldname) {
		                 if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
		                     $errors[] = $fieldname;
		                 }
		             }
		             $fields_with_lengths = array('username' => 30, 'password' => 30);
		             foreach($fields_with_lengths as $fieldname => $maxlength ) {
		                 if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength) { $errors[] = $fieldname; }
		             }


		         if(empty($errors))
		         {


		         $username = trim(mysql_prep($_POST['username']));
		         $password =  trim(mysql_prep($_POST['password']));
		         $hashed_password =sha1($password);

		         $query = "SELECT * FROM jos_users WHERE username = '{$username}' AND password = '{$hashed_password}' ";
		             $result= $connection-> query($query);


		             if($result)
		             {

		                 $found_user = $result->fetch_assoc();
		                 $_SESSION['user_id'] = $_POST['id'];
		                 $_SESSION['user_name']=$_POST['username'];
										 $_SESSION['name']=$_POST['name'];

										 echo "User Id is:" . $_SESSION['user_id'] . "<br/>";
										 echo "Password is:" . $_SESSION['user_name'] . "<br/>";

		                 redirect_to("Modify_data.php");

		             }
		             else
		             {
		                 $message = "not proper";
		                 $message .= "<br />" . $connection->error;
		             }
		         }
		         else
		         {
		             $message= "There were " . count($errors) . " errors";
		         }
		     }
		     else
		     {
		         if(isset($_GET['logout']) && $_GET['logout'] == 1)
		         {
		             $message= "you have been logged out";
		             $username="";
		             $password="";
		         }
		     }
				 ?>
	</head>
	<body>
		<div class="row1">
		<div id="header">
			<div class="area">
				<div id="logo">
					<a href="index.html"><img src="images/fms-short.png" alt="LOGO" height="43" width="225" /></a>
									<br>
									<a href="index.html"><img src="images/fms-acronym-out.png" alt="LOGO" height="17" width="204" /></a>
				</div>
			</div>
		</div>
	</div>

	<div class="row2">
		<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
		<?php if (!empty($errors)) { display_errors($errors); } ?>
		<!--	<div class="col1">-->
			<form action="Modify_index.php" method="post">
				<table>
					<tr>

				<td>Username:</td>
				<td><input type="text" name="username" maxlength="30" value="" /></td>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" value="" /></td>
				</tr>
				<tr>

				<td><input type="submit" name="submit" value="Login" /></td>
				</tr>
				</table>
			</form>
		<!--<div class="button_elec"><a class="bord_links_elec" href="Modify_data.php" target="_blank">ELEC-HOME </a></div>
		</div>-->
		<!--<div class="col2">
		<div class="button_admin"><a class="bord_links_admin" href="Modify_data.php" target="_blank">ADMIN-PANEL</a></div>
	</div>-->
	</div>
	<?php include("includes/footer.php"); ?>
	<!--<div class="row3">
		<div id="footer">

			<div class="area">
				<div id="connect">
					<a href="" target="_blank" class="googleplus"></a> <a href="" target="_blank" class="mail"></a> <a href="" target="_blank" class="facebook"></a> <a href="" target="_blank" class="twitter"></a>
				</div>
				<p>
					© USC FMS - Engineering Services/Electrical. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>



		</body>
		</html>-->

		<?php


					$connection->close();

		?>
