<?php

	require_once('../pdo_config.php');
	$sql = 'SELECT * FROM type_item';
	$result = $conn->query($sql);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result->rowCount();
	
if(isset($_POST['search'])) {

	$search = $_POST['search_string'];	
	$sql .= "WHERE cat = '{$search}'";
}
require 'includes/Ca_Header.php';



?>

<!DOCTYPE html>


<head>
<title>Items</title>


</head>

<body>

<form action="Ca_Type_Item.php" method = "post">

	<input type="text" name= "search_string" placeholder= "Search for Category"/>
	<input type ="submit" name= "search" value= "search" />
	<!-- <p>
		<select name= "typeSearch" id="typeSearch">
			<option value"">Select one</option>
			<option value= "employees">Employees</option>
			<option value= "customers">Customers</option>
			<option value= "quotes">Quotes</option>
 -->
<table width = "70%" cellpadding = "5" cellspace= "5">

<tr>

		<td><strong>Type of equipment</strong></td>
		<td><strong>Category</strong></td>
	
	
		</tr>



</form>



<?php foreach($conn->query($sql) as $row) { ?>


		<tr>
			<td><?php echo $row['type_name']; ?></td>
			<td><?php echo $row['cat']; ?></td>
		</tr>
		
<?php }?>
	</table>
</body>
</html>
<?php include './includes/Ca_Footer.php'; ?>
