<?php

	// $search = preg_replace("#[^0-9a-z]#i","",$searchq);
	require_once('../pdo_config.php');
// 	$sql2 = 'SELECT * FROM employee';

	$sql = 'SELECT * FROM nmEmployee';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();

require 'includes/Ca_Header.php';
?>

<style>

.container{

	padding: 30px;
	padding-left: 150px;
}


</style>


<body>
<div class = "container">

<table width = "70%" cellpadding = "5" cellspace= "5" class="table">

<tr>

		<td><strong>ID</strong></td>
		<td><strong>First Name</strong></td>
		<td><strong>Last Name</strong></td>
		<td><strong>Email</strong></td>


		</tr>


<?php foreach($conn->query($sql) as $row) { ?>


		<tr>

			<td><?php echo $row['e_id']; ?></td>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>
			<td><?php echo $row['email']; ?></td>

	</tr>

<?php } ?>


	</table>
	</div>
	</body>

<?php include './includes/Ca_Footer.php'; ?>
