<?php //This page checks for required content, errors, and provides sticky output
	require 'includes/Ca_Header.php';
	if (isset($_POST['send'])) {
	$missing = array();
	$errors = array();

	$firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($firstname))
		$missing[]='firstname';

	$lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($lastname))
		$missing[]='lastname';
		
	$name = $firstname . $lastname;	

	$valid_email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));	//returns a string or null if empty or false if not valid
	if (trim($_POST['email']==''))
		$missing[] = 'email';
	elseif (!$valid_email)
		$errors[] = 'email';
	else
		$email = $valid_email;
		
		$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($phone))
		$missing[]='phone';
		
		$address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($address))
		$missing[]='address';

// 	$password1 = trim(filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING));
// 	$password2 = trim(filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING));
// 	// Check for a password:
// 	if (empty($password1) || empty($password2))
// 		$missing[]='password';
// 	elseif ($password1 !== $password2)
// 			$errors[] = 'password';
// 	else $password = $password1;
// 
// 	$accepted = filter_input(INPUT_POST, 'terms');
// 	if (empty($accepted) || $accepted !='accepted')
// 		$missing[] = 'accepted';

	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		$sql = "INSERT into customers1 (name, email, phone, address, created, modified,status) VALUES (:name, :email, :phone, :address, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1')";
		$pw =
	$stmt= $conn->prepare($sql);
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':phone', $phone);
	$stmt->bindValue(':address', $address);

	$success = $stmt->execute();
	$errorInfo = $stmt->errorInfo();
	if (isset($errorInfo[2]))
		echo $errorInfo[2];
	else
		echo '<main><h2>Thank you for registering</h2><h3>We have saved your information</h3></main>';

	exit;
	}
}?>


<style>
.container{

	padding-top: 25px;
	padding-bottom: 20px;
	padding-left: 200px;
	padding-right: 300px;
}
</style>
	<body>
<?php echo $name,$email,$phone,$address; ?>
		<div class = "container">
        <h2>Continuum Audio</h2>
        <p>Please fill out this information to Add a Customer.</p>
        <form method="post" action="">

				<legend>Please Register New Customer:</legend>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
                <label for="fn" >First Name:
				<?php if ($missing && in_array('firstname', $missing)) { ?>
                        <span class="warning">Please enter your first name</span>
                    <?php } ?> </label>
                <input name="firstname"  class= "form-control" id="fn" type="text" placeholder="First Name..."
				 <?php if (isset($firstname)) {
                    echo 'value="' . htmlspecialchars($firstname) . '"';
                } ?>
				>
            </p>
			<p>
                <label for="ln" >Last Name:
				<?php if ($missing && in_array('lastname', $missing)) { ?>
                        <span class="warning">Please enter your last name</span>
                    <?php } ?> </label>
                <input name="lastname" class= "form-control" id="ln" type="text" placeholder="Last Name..."
				 <?php if (isset($lastname)) {
                    echo 'value="' . htmlspecialchars($lastname) . '"';
                } ?>
				>
            </p>
            <p>
                <label for="email" >Email:
				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not valid</span>
                    <?php } ?>
				</label>
                <input name="email" class= "form-control"  id="email" type="text" placeholder="E-mail..."
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>>
            </p>
             <p>
                <label for="fn" >Phone:
				<?php if ($missing && in_array('firstname', $missing)) { ?>
                        <span class="warning">Please enter your phone number</span>
                    <?php } ?> </label>
                <input name="phone"  class= "form-control" id="fn" type="text" placeholder="Phone..."
				 <?php if (isset($address)) {
                    echo 'value="' . htmlspecialchars($phone) . '"';
                } ?>
				>
            </p>
             <p>
                <label for="fn" >Address:
				<?php if ($missing && in_array('address', $missing)) { ?>
                        <span class="warning">Please enter your phone number</span>
                    <?php } ?> </label>
                <input name="address"  class= "form-control" id="fn" type="text" placeholder="Address..."
				 <?php if (isset($address)) {
                    echo 'value="' . htmlspecialchars($address) . '"';
                } ?>
				>
            </p>
            
            
            
<!-- 
			<p>
				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The entered passwords do not match. Please try again.</span>
                    <?php } ?> </label>
                <label for="pw1" >Password: 

				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input name="password1" class= "form-control" id="pw1" placeholder="Password..." type="password">
            </p>
			<p>
                <label for="pw2" >Confirm Password:
				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please confirm the password</span>
                    <?php } ?> </label>
                <input name="password2" class= "form-control"  id="pw2" placeholder="Re-type Password..." type="password">
            </p>
                <label for="terms">I accept the terms of using this website</label>
            <p>
			<?php if ($missing && in_array('accepted', $missing)) { ?>
                        <span class="warning">You must agree to the terms</span><br>
                    <?php } ?>
                <input type="checkbox" class= "form-control" name="terms" value="accepted" id="terms"
				     <?php if ($accepted) {
                                echo 'checked';
                            } ?>
				>
            </p>
 -->
            <p>
                <button name="send" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            </p>

        </form>
			</div>
</body>
<?php include './includes/Ca_Footer.php'; ?>
