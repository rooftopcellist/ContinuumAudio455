<!-- Alejandro Pena Osorio -->

<?php
	require_once('../pdo_config.php');
	$sql = 'SELECT * Ca_Images';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2])) 
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rentals</title>
</head>

<body>
	<?php
	if (isset($error)) {
		echo "<p>$error</p>";
	} else {
		echo "<p>A total of $numRows records were found.</p>";
	?>
    <table>
        <tr>
            <th>image_id</th>
            <th>filename</th>
            <th>caption</th>
            <th>images</th>
			
        </tr>
		<!-- $conn is the db connection string from the pdo_config file required above -->
        <?php foreach ($conn->query($sql) as $row) { ?>
        <tr>
			<td><?php echo $row['image_id']; ?></td>
			<td><?php echo $row['filename']; ?></td>
			<td><?php echo $row['caption']; ?></td>
			<td><img src = <?php echo "images/".$row['filename'];?> alt= <?php echo $row['caption'];?></td>
		
            </tr>
    <?php } //endforeach loop ?>
    </table>
<?php } //end else ?>   
</body>
</html>
