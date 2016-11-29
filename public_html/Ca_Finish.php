<?php
	require '../secure_conn.php';
	require 'includes/Ca_Header.php';
?>
<main>
    <?php if (empty($_SESSION['cart_contents']) || !isset($_SESSION['cart_contents'])) {
        echo '<h2>There are no products in your cart.</h2>';
		echo '<h3>Please use the Purchase Prints link to the left to shop.</h3>';
	} elseif (empty($_SESSION['email']) || !isset($_SESSION['email'])) { //user is not logged in ?>
		<h3>If you are a registered user, please log in using the link at the left</h3>
		<h3>Or choose one of the other options below</h3>
		<h3><a href='Ca_Create_Acct.php'>Register as a new user</a> or <a href='Ca_Address.php'>Continue checkout as a guest</a><h3>
	<?php }
	else  { //user logged in
		$firstName = $_SESSION['firstName']; //set at login ?>
		<h3>Hello <?php echo $firstName;?>,<br>
		<h3>Please choose one of the options below:</h3>
		<h3><a href='Ca_Shop_Index.php'>Keep Shopping</a> or <a href="viewCart.php">View Cart</a> or <a href='Ca_checkout.php?guest=no'>Proceed to Checkout</a><h3>
	<?php } ?>
</main>
<?php include 'includes/Ca_Footer.php'; ?>
