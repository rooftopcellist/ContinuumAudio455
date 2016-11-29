<?php
	require 'includes/Ca_Header.php';
	require_once '../pdo_config.php'; // Connect to the database.
	function shortTitle ($title){
		$title = substr($title, 0, -4);
		$title = str_replace('_', ' ', $title);
		$title = ucwords($title);
		return $title;}

				$imageID = filter_input(INPUT_POST, 'eq_id');
				$getImage= "SELECT * FROM equipment WHERE eq_id = :eq_id";
				$stmt = $conn->prepare($getImage);
				$stmt->bindValue(':eq_id', $imageID);
				$stmt->execute();
				$errorInfo = $conn->errorInfo();
				if (isset($errorInfo[2])) {
					$error = $errorInfo[2];
					echo $error;
					exit;
				} else {
					$row = $stmt->fetch();

?>

<main>
		<h2>Purchase <?php echo shortTitle($row['pname']);?></h2>
		<form action = "Ca_Cart.php" method= "post" style = "display:inline;">
			<img src = "images/<?php echo $row['pname'];?>" alt="product"><br><br>
			Description:<br><br>
			<?php echo $row['brand_name'];?> <br><br>
			<?php echo $row['type_name'];?> <br><br>
			Price: $<?php echo $row['purchase_price']; ?>
			<input type= "hidden" name= "action" value="add">
			<input type= "hidden" name= "image_id" value="<?php echo $row['eq_id']; ?>">
			<input type= "submit" value= "Add To Cart">


		</form>

<?php } //end else ?>
</main>
<?php include 'includes/Ca_Footer.php'; ?>
