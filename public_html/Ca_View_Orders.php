<?php

	// $search = preg_replace("#[^0-9a-z]#i","",$searchq);
	require_once('../pdo_config.php');
	$sql = 'SELECT * FROM orders1';
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
<!--     <td><strong>Emp ID</strong></td> -->
<!--     <td><strong>Cus ID</strong></td> -->
		<td><strong>Total</strong></td>
		<td><strong>Created</strong></td>
		<td><strong>Modified</strong></td>
<!-- 		<td><strong>Quantity</strong></td> -->



		</tr>
		</div>



<?php foreach($conn->query($sql) as $row) { ?>
		<tr>
		<?php $o_id = $row['id']; ?>
			<td><?php echo $row['id']; ?></td>
<!-- 			<td><?php echo $row['e_id']; ?></td> -->
<!-- 			<td><?php echo $row['customer_id']; ?></td> -->
			<td><?php echo $row['total_price']; ?></td>
			<td><?php echo $row['created']; ?></td>
			<td><?php echo $row['modified']; ?></td>
<!-- 			<td><?php echo $row['qty']; ?></td> -->
						<?php
			echo '<td><a href="Ca_Discount.php?o_id=' . $o_id . '">Discount Order 10%</a></td>'
			?>

			<!-- <?php
				echo '<td><a href="Delete_Employee.php?id=' . $email . '">Make Order</a></td>'
			?> -->

	</tr>

<?php } ?>


	</table>
	</body>
</html>
<?php include './includes/Ca_Footer.php'; ?>
