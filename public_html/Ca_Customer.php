<?php
session_start();

	// $search = preg_replace("#[^0-9a-z]#i","",$searchq);
	require_once('../pdo_config.php');
	$sql = 'SELECT * FROM customers1';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();

require 'includes/Ca_Header.php';
?>

<!DOCTYPE html>
<style>
.container{

	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 200px;
}
</style>

<body>

<div class="container">

<br><table width = "70%" cellpadding = "5" cellspace= "5" class="table">

<tr>

		<td><strong>ID</strong></td>
		<td><strong>Name</strong></td>

		<td><strong>E-mail</strong></td>
		<td><strong>Address</strong></td>
		<td><strong>Created</strong></td>
		<td><strong>Modified</strong></td>
		<td><strong>Phone</strong></td>



		</tr>
		</div>



<?php foreach($conn->query($sql) as $row) { ?>
		<tr>
		<?php $email = $row['email'] ?>
			<td><?php echo $row['id']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['created']; ?></td>
			<td><?php echo $row['modified']; ?></td>
			<td><?php echo $row['phone']; ?></td>

			<?php
				echo '<td><a href="setCusID.php?id=' . $email . "&fname=" . $fname .'">Make Order</a></td>'
			?>

	</tr>

<?php } ?>


	</table>
	</body>
</html>
<?php include './includes/Ca_Footer.php'; ?>
