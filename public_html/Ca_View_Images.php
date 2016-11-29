<?php require 'includes/Ca_Header.php'; ?>
<style>

.container{

padding: 150px;

}
</style>
<main>
	<?php if (isset($_SESSION['firstName'])){ ?>
<div class= "container">
	<p>Click on an image to view it in a separate window.</p>
	<ul>
	<?php 	// This script lists the images in the uploads directory.
	$folder = $_SESSION['folder'];
	$dir = "../Uploads/".$folder; // Define the directory to view.
	$files = scandir($dir); // Read all the images into an array.

	// Display each image caption as a link
	foreach ($files as $image) {
		if (substr($image, 0, 1) != '.') { // Ignore anything starting with a period.
			// Get the image's size in pixels:
			$image_size = getimagesize ("$dir/$image");

			// Make the image's name URL-safe:
			$image_name = urlencode($image);

			// Print the information:
			echo "<li><a href=\"Ca_Show_Images.php?image=".$image."\">".$image."</a></li>\n";

		} // End of the IF.
	} // End of the foreach loop.
	?>
	</ul>
<?php } else
 {echo "A loggin is required";
}?>
</div>
</main>
<?php include './includes/Ca_Footer.php'; ?>
