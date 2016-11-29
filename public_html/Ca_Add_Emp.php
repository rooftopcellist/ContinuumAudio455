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

	$address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($address))
		$missing[]='address';

	$city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($city))
		$missing[]='city';

	$state = trim(filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($state))
		$missing[]='state';

	$zipcode = trim(filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($zipcode))
		$missing[]='zipcode';

	$phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)); //returns a string
	if (empty($phone))
		$missing[]='phone';

	$valid_email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));	//returns a string or null if empty or false if not valid
	if (trim($_POST['email']==''))
		$missing[] = 'email';
	elseif (!$valid_email)
		$errors[] = 'email';
	else
		$email = $valid_email;

	$manager = filter_input(INPUT_POST, 'manager');
	if (empty($manager))
		$manager = '0';
	else
		$manager = '1';

	$password1 = trim(filter_input(INPUT_POST, 'password1', FILTER_SANITIZE_STRING));
	$password2 = trim(filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING));

	// Check for a password:
	if (empty($password1) || empty($password2))
		$missing[]='password';
	elseif ($password1 !== $password2)
			$errors[] = 'password';
	else $password = $password1;

	$accepted = filter_input(INPUT_POST, 'terms');
	if (empty($accepted) || $accepted !='accepted')
		$missing[] = 'accepted';

	$e_id = uniqid();



	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		$folder = preg_replace("/[^a-zA-Z0-9]/", "", $email);
		$folder = strtolower($folder);
		$sql = "START TRANSACTION; INSERT into Ca_Reg_User (firstname, lastname, emailAddr, pw, manager, folder) VALUES (:fname, :lname, :email, :pw, :manager, :folder); INSERT into employee (fname, lname, address, city, state, zip, phone, email, manager) VALUES (:fname, :lname, :address, :city, :state, :zipcode, :phone, :email, :manager); COMMIT";

// 		INSERT into Ca_Add_Employee (firstname, lastname, emailAddr, pw, manager) VALUES (:fname, :lname, :email, :pw, :manager)

		$pw =
	$stmt= $conn->prepare($sql);

	$stmt->bindValue(':fname', $firstname);
	$stmt->bindValue(':lname', $lastname);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':pw', password_hash($password1, PASSWORD_DEFAULT));
	$stmt->bindValue(':manager', $manager);
	$stmt->bindValue(':folder', $folder);


	$stmt->bindValue(':fname', $firstname);
	$stmt->bindValue(':lname', $lastname);
	$stmt->bindValue(':address', $address);
	$stmt->bindValue(':city', $city);
	$stmt->bindValue(':state', $state);
	$stmt->bindValue(':zipcode', $zipcode);
	$stmt->bindValue(':phone', $phone);
	$stmt->bindValue(':email', $email);
	$stmt->bindValue(':manager', $manager);
	$success = $stmt->execute();
	$errorInfo = $stmt->errorInfo();
	if (isset($errorInfo[2]))
		echo $errorInfo[2];
	else

		echo '<main><h2>Completed...! </h2><h3>The record of a New employee and its information has been saved!</h3></main>';

	include 'includes/Ca_Footer.php';
	exit;
	}
}?>

<style>
.container{

	padding: 190px;
	padding-top: 20px;
}

</style>
	<div class = "container">

        <h2>Continuum Audio</h2>
        <p>Fill this form to register a new employee</p>
        <form method="post" action="">
			<fieldset>
				<legend>New Employee Registration form:</legend>
				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>
            <p>
                <label for="fn">First Name:
				<?php if ($missing && in_array('firstname', $missing)) { ?>
                        <span class="warning">Please enter your first name</span>
                    <?php } ?> </label>
                <input name="firstname" id="fn" type="text"
				 <?php if (isset($firstname)) {
                    echo 'value="' . htmlspecialchars($firstname) . '"';
                } ?>
            </p>
			<p>
                <label for="ln">Last Name:
				<?php if ($missing && in_array('lastname', $missing)) { ?>
                        <span class="warning">Please enter your last name</span>
                    <?php } ?> </label>
                <input name="lastname" id="ln" type="text"
				 <?php if (isset($lastname)) {
                    echo 'value="' . htmlspecialchars($lastname) . '"';
                } ?>
            </p>

            <p>
            	<label for="ln">Address:
            	<?php if ($missing && in_array('address', $missing)) { ?>
            			<span class="warning">Please enter your Address</span>
            		<?php } ?> </label>
            	<input name="address" id="ln" type="text"
            	<?php if (isset($address)) {
            		echo 'value="' . htmlspecialchars($address) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln">City:
            	<?php if ($missing && in_array('city', $missing)) { ?>
            			<span class="warning">Please enter your City</span>
            		<?php } ?> </label>
            	<input name="city" id="ln" type="text"
            	<?php if (isset($city)) {
            		echo 'value="' . htmlspecialchars($city) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln">State:
            	<?php if ($missing && in_array('state', $missing)) { ?>
            			<span class="warning">Please enter your State</span>
            		<?php } ?> </label>
            	<input name="state" id="ln" type="text"
            	<?php if (isset($state)) {
            		echo 'value="' . htmlspecialchars($state) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln">Zipcode:
            	<?php if ($missing && in_array('zipcode', $missing)) { ?>
            			<span class="warning">Please enter your Zipcode</span>
            		<?php } ?> </label>
            	<input name="zipcode" id="ln" type="text"
            	<?php if (isset($zipcode)) {
            		echo 'value="' . htmlspecialchars($zipcode) . '"';
            	} ?>
            </p>

            <p>
            	<label for="ln">Phone:
            	<?php if ($missing && in_array('phone', $missing)) { ?>
            			<span class="warning">Please enter your Phone number</span>
            		<?php } ?> </label>
            	<input name="phone" id="ln" type="text"
            	<?php if (isset($phone)) {
            		echo 'value="' . htmlspecialchars($phone) . '"';
            	} ?>
            </p>







            <p>
                <label for="email">Email:
				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">Please enter your email address</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not valid</span>
                    <?php } ?>
				</label>
                <input name="email" id="email" type="text"
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>>
            </p>
            <p>
            <?php if ($missing && in_array('manager', $missing)) { ?>
<!--                         <span class="warning">You must agree to the terms</span><br> -->
                    <?php } ?>
                <input type="checkbox" name="manager" value="1" id="manager"
				     <?php if ($accepted) {
                                echo 'checked';
                            } ?>
				>
                <label for="terms">Is this Employee a Manager?</label>
            </p>
			<p>
				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The entered passwords do not match. Please try again.</span>
                    <?php } ?> </label>
                <label for="pw1">Password:

				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input name="password1" id="pw1" type="password">
            </p>
			<p>
                <label for="pw2">Confirm Password:
				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please confirm the password</span>
                    <?php } ?> </label>
                <input name="password2" id="pw2" type="password">
            </p>

            <p>
			<?php if ($missing && in_array('accepted', $missing)) { ?>
                        <span class="warning">You must agree to the terms</span><br>
                    <?php } ?>
                <input type="checkbox" name="terms" value="accepted" id="terms"
				     <?php if ($accepted) {
                                echo 'checked';
                            } ?>
				>
                <label for="terms">I accept the terms of using this website</label>
            </p>
            <p>
                <input name="send" type="submit" value="Register">
            </p>
		</fieldset>
        </form>
</div>
<?php include './includes/Ca_Footer.php'; ?>
