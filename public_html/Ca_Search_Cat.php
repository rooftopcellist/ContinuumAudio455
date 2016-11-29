<?php

	$search = $_POST['search_string'];

	// $search = preg_replace("#[^0-9a-z]#i","",$searchq);
	require_once ('../pdo_config.php');

	$sql1 = 'SELECT * from equipment';
	$result1 = $conn->query($sql1);
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2]))
		$error = $errorInfo[2];
	else $numRows = $result1->rowCount();

if(isset($_POST['search'])) {



	$sql = "SELECT * from equipment where eq_id= :search";
	$statement = $conn->prepare($sql);
	$statement->bindValue(":search", $search);
	$statement->execute();
	$numRows = $statement->rowCount();
	$result = $statement->fetch();
	$errorInfo = $conn->errorInfo();
	if (isset($errorInfo[2])){
		$error = $errorInfo[2];
		echo $error;
		}
}
require 'includes/Ca_Header.php';
?>


<head>
<title>Search</title>


</head>

<style>
.container{

	padding: 190px;
	padding-top: 20px;
}

</style>
	<div class = "container">
<body>

<form action="Ca_Search_Cat.php" method = "post">

	<input type="text" name= "search_string" placeholder= "Search for an Product ID"/>
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


		<td><strong>Equipment ID</strong></td>
		<td><strong>Product</strong></td>
		<td><strong>Purchase Price</strong></td>
		<td><strong>Brand</strong></td>
		<td><strong>Type</strong></td>
		<td><strong>Quantity</strong></td>



		</tr>
		</div>

</form>



<?php if(isset($result)) {?>

		<tr>
			<td><?php echo $result['eq_id']; ?></td>
			<td><?php echo $result['pname']; ?></td>
			<td><?php echo $result['purchase_price']; ?></td>
			<td><?php echo $result['brand_name']; ?></td>
			<td><?php echo $result['type_name']; ?></td>
			<td><?php echo $result['qty']; ?></td>


	</tr>
<?php } else { ?>
        <?php foreach ($conn->query($sql1) as $row) { ?>
        <tr>
			<td><?php echo $row['eq_id']; ?></td>
			<td><?php echo $row['pname']; ?></td>
			<td><?php echo $row['purchase_price']; ?></td>
			<td><?php echo $row['brand_name']; ?></td>
			<td><?php echo $row['type_name']; ?></td>
			<td><?php echo $row['qty']; ?></td>
        </tr>
    <?php } //endforeach loop ?>
<?php } //end of full Catalog display ?>


	</table>
</body>
</div>
</html>
<?php include './includes/Ca_Footer.php'; ?>
