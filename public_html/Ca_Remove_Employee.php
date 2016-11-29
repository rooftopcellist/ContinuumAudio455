<?php
	require_once('../pdo_config.php');
	require './includes/Ca_Header.php';

	$sql = 'SELECT * from employee';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();
	?>

        <?php foreach ($conn->query($sql) as $row) { ?>
        <?php $email = $row['email']; ?>

    <?php } //endforeach loop ?>


<style>
.container{

	padding-top: 20px;
	padding-bottom: 20px;
	padding-left: 200px;
}

</style>


</head>
<div class = "container">
<body>
	<?php
	if (isset($error)) {
		echo "<p>$error</p>";
	} else {
		echo "<p>A total of $numRows records were found.</p>";
	?>
    <table class = "table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>

            <th>E-mail</th>

        </tr>
		<!-- $conn is the db connection string from the pdo_config file required above -->
        <?php foreach ($conn->query($sql) as $row) { ?>
        <?php $email = $row['email']; ?>

        <tr>
			<td><?php echo $row['fname']; ?></td>
			<td><?php echo $row['lname']; ?></td>

			<td><?php echo $email; ?></td>
			<?php
			echo '<td><a href="Delete_Employee.php?email=' . $email . '">Delete</a></td>'
			?>
<!--
			<td><input type="button" value="Remove " onclick="window.location.href='Ca_New_Quote.php'" /></td><form method="POST" action="Remove_Employee.php">
			<td> <input type="hidden" name="delete_id" value="<?php echo $row['email']; ?>">
			<input name="send" type="submit" value="Remove Employee"></td></form>
            </tr>
 -->

    <?php } //endforeach loop ?>
    </table>
<?php } //end else ?>
</body>
</div>

