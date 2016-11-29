<?php
	$jpeg = "jpeg";
	require './includes/Ca_Header.php';
	require_once '../pdo_config.php';
	function shortTitle ($title){
		$title = substr($title, 0, -4);
		$title = str_replace('_', ' ', $title);
		$title = ucwords($title);
		return $title;
	}
	$sql = "SELECT * FROM equipment";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2])) {
		$error = $errorInfo[2];
		echo $error;
		exit;
	} else {
		$rows = $stmt->fetchAll();
	?>
  <main>
	<h2>Shopping Cart</h2>
	<h3>The list of equipment for sale </h3>
	<h4>Please click on one of the images to see the purchase details</h4>
    <table>
        <tr>
            <th>Title</th>
			<th>Image</th>
			<th></th>
        </tr>
        <?php foreach ($rows as $row) { ?>
		<tr>
			<td><?php echo shortTitle($row['eq_id']); ?></td>
			<td><img src = "images/<?php echo $row['eq_id'.$jpeg];?>" alt="equipment">
			<td><form action="Ca_Image_Details.php" method="post">
				  <input type="hidden" name="action" value="add">
				  <input type="hidden" name="image_id" value="<?php echo $row['eq_id']; ?>">
				   <input type="hidden" name="qty" value = 1>
                  <input type="submit" value="View Details">
				</form>
			</td>
            </tr>
    <?php } //endforeach loop ?>
    </table>

<?php } //end else ?>

</main>
<?php include 'includes/Ca_Footer.php'; ?>
