<?php
	//session_start();
	require 'includes/header.php';
	echo "<main>";
	// Check if the form has been submitted:
	if (isset($_SESSION['firstName'])){


	if (isset($_POST['submit'])) {
	// Check for an uploaded file:
	if (isset($_FILES['upload'])) {
		// Validate the type. Should be JPEG or PNG.
		$allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
		if (in_array($_FILES['upload']['type'], $allowed)) {
			// Move the file over.
			$folder = $_SESSION['folder'];
			$email = $_SESSION['email'];
			// $image_info = getimagesize($_FILES['upload']['tmp_name']);
			if (move_uploaded_file ($_FILES['upload']['tmp_name'], "../uploads/$folder/{$_FILES['upload']['name']}")) {
				echo '<h2>The file '.$_FILES['upload']['name'].' has been uploaded!</h2>';
				$name = $_FILES['upload']['name'];
				$type= $_FILES['upload']['type'];

				require_once ('../pdo_config.php'); // Connect to the db.
				$sql = "INSERT into JJ_user_images (emailAddr, imageName, imageType) VALUES (:email, :name, :type)";
				$stmt = $conn->prepare($sql);
				$stmt->bindValue(':email', $email);
				$stmt->bindValue(':name', $name);
				$stmt->bindValue(':type', $type);
				$success = $stmt->execute();
				$errorInfo = $stmt->errorInfo();
				if (isset($errorInfo[2]))
					echo $errorInfo[2];
				else
					echo '<h3>The file data has been saved!</h3></main>';
				// include ('includes/create_thumb.php');




				echo "</main>";
				include './includes/footer.php';
				// Delete the file if it still exists:
				if (file_exists ($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
					unlink ($_FILES['upload']['tmp_name']);
				}
				exit;
			} // End of move... IF.
		} else { // Invalid type.
			echo '<h2 class="warning">Please upload a JPEG or PNG image.</h2>';
			}
	} // End of isset($_FILES['upload']) IF.

	// Check for an error:
	if ($_FILES['upload']['error'] > 0) {
		echo '<p class="warning">The file could not be uploaded because: <strong>';
		// Print a message based upon the error.
		switch ($_FILES['upload']['error']) {
			case 1:
				echo 'The file exceeds the upload_max_filesize setting in php.ini.';
				break;
			case 2:
				echo 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
				break;
			case 3:
				echo 'The file was only partially uploaded.';
				break;
			case 4:
				echo 'No file was uploaded.';
				break;
			case 6:
				echo 'No temporary folder was available.';
				break;
			case 7:
				echo 'Unable to write to the disk.';
				break;
			case 8:
				echo 'File upload stopped.';
				break;
			default:
				echo 'A system error occurred.';
				break;
		} // End of switch.
		echo '</strong></p>';

		} // End of error IF.
	}// End of the submitted conditional.
}else{
	echo "<h2>We re sorry, but you must be logged in as a registered user to upload images</h2>";
	exit;
}

?>
	<h2>Upload an image</h2>
	<form enctype="multipart/form-data" action="upload_image.php" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="2097152">
		<fieldset>
			<legend>Select a JPEG or PNG image of 2M or smaller to be uploaded:</legend>
			<label for="file">
			File:<input type="file" name="upload" id="file"></label>
			<label for = "submit">And press
			<input type="submit" name="submit" value="Submit" id="submit"></label>
		</fieldset>
	</form>

</main>
<?php include './includes/footer.php'; ?>
