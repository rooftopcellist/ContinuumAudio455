<?php require_once ('secure_conn.php');
  // Access the existing session.
session_start();
require 'includes/Ca_Header.php';
?>
<style>
.alert-success {

padding: 185px;

}


</style>

	<?php //check for session variable
		if(isset($_SESSION['firstName'])){
		 	$firstname= $_SESSION['firstName'];
			$message = "Welcome back, $firstname";
			$message2 = "You are now logged in...!";
		} else {
			$message = 'You have reached this page in error';
			$message2 = 'Please use the menu at the right';
		}
		// Print the message:
		?>

<div class="alert alert-success" role= "alert">
		<strong class="lead"><?php echo $message; ?></strong>
		<strong class="lead"><?php echo $message2; ?></strong>
</div>



	<?php // Include the footer and quit the script:
			include ('./includes/Ca_Footer.php');
			?>
