<?php //The cart workings
	session_start();

	// Create a cart array if needed
	if (empty($_SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	// Determine the action to perform
	$action = filter_input(INPUT_POST, 'action');
	if ($action === NULL) { //not via form post
		$action = filter_input(INPUT_GET, 'action');
	}
    if ($action === NULL) { //not via query string
        $action = 'show_add_item';
    }
	// Add or update cart as needed
	switch($action) {
		case 'add':
			$imgID = filter_input(INPUT_POST, 'pname');
			$qty = filter_input(INPUT_POST, 'qty', FILTER_VALIDATE_INT);
			if (isset($_SESSION['cart'][$imgID])) { //item already in cart
				$_SESSION['cart'][$imgID]['quantity'] = $qty; //update the quantity
			} else { // New product to the cart.
				// Get the print's data from the database:
				require_once '../pdo_config.php'; // Connect to the database.
				$getImage= "SELECT * FROM equipment WHERE pname = :pname";
				$stmt = $conn->prepare($getImage);
				$stmt->bindValue(':pname', $imgID);
				$stmt->execute();
				$errorInfo = $conn->errorInfo();
				if (isset($errorInfo[2])) {
					$error = $errorInfo[2];
					echo $error;
					exit;
				} else { //query executed without errors
					$rows = $stmt->rowCount();
					if ($rows == 1) { // Valid print ID.
						// Fetch the information.
						$item = $stmt->fetch();
						$imgID = $item['eq_id'];
						// $imgTitle = $item['caption'];
						$imgPrice = $item['purchase_price'];
						// Add to the cart:

					} else { // Not a valid print ID.
						echo '<h2>This page has been accessed in error!</h2>';
						include 'includes/Ca_Footer';
						exit;
					}
				} //end of errors else
			} // end of new product else
			include('Ca_Cart_View.php');
			break;
		case 'update':
			$new_qty_list = filter_input(INPUT_POST, 'newqty', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
			foreach($new_qty_list as $img => $qty) {
				if ($_SESSION['cart'][$img]['quantity'] != $qty) {
					 $quantity = (int) $qty;
					if (isset($_SESSION['cart'][$img])) {
						if ($quantity <= 0) {
							unset($_SESSION['cart'][$img]);
						} else {
							$_SESSION['cart'][$img]['quantity'] = $quantity;
						}
					}
				}
			}
			include('Ca_Cart_View.php');
			break;
		case 'show_cart':
			include('Ca_Cart_View.php');
			break;
		case 'show_add_item':
			include('Ca_Product_List.php');
			break;
		case 'empty_cart':
			unset($_SESSION['cart']);
			include('Ca_Cart_View.php');
			break;
	} //end switch
?>
