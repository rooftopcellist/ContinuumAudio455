<?php require_once ('../secure_conn.php');
//This is the login page for registered users
//session_start();
//require 'includes/header.php';

if (isset($_POST['send'])) {
	$missing = array();
	$errors = array();

	$valid_email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));	//returns a string or null if empty or false if not valid
	if (trim($_POST['email']=='')|| (!$valid_email))  //Either empty or invalid email will be considered missing
		$missing[] = 'email';
	else
		$email = $valid_email;

	$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

	// Check for a password:
	if (empty($password))
		$missing[]='password';

	if (!$missing && !$errors) {
		require_once ('../pdo_config.php'); // Connect to the db.
		// Make the query:
		$sql = "SELECT firstName, emailAddr, pw, folder FROM Ca_Reg_User WHERE emailAddr = :email";
		$stmt = $conn->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();
		$errorInfo = $stmt->errorInfo();
		if (isset($errorInfo[2])){
			echo $errorInfo[2];
			exit;
			
// Make the query to employee to grab e_id to make super-global:
// 		$sql = "SELECT e_id FROM employee WHERE email = :email";
// 		$stmt = $conn->prepare($sql);
// 		$stmt->bindValue(':email', $email);
// 		$stmt->execute();
// 		$errorInfo = $stmt->errorInfo();
// 		if (isset($errorInfo[2])){
// 			echo $errorInfo[2];
// 			exit;
			
			
			
			
		}
		else {
			$rows = $stmt->rowCount();
			if ($rows==0) { //email not found
				$errors[] = 'email';
			}
			else { // email found, validate password
				$result = $stmt->fetch();
				if ($password == password_verify($password, $result['pw'])) { //passwords match
					$firstName = $result['firstName'];

					session_start();
					$_SESSION['firstName']=$firstName;
					$_SESSION['email']= $email;
					$_SESSION['folder']= $folder;
					$url = 'http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']). '/Ca_Logged_In.php';
					header("Location: $url");
					// header("Location: http://webdev.cislabs.uncw.edu/~ap7488/Ca_Logged_In.php");
					exit;

				}
				else {
					$errors[]='password';
				}
			}
		} // End of else errors

	}
}
require 'includes/Ca_Header.php';
?>
<style>
body {
  padding-top: 100px;
  padding-bottom: 40px;
  background-color: #666666;
}
.h1  {
	position: absolute;
	padding-top: 160px;
	padding-left: 150px;
	color: black;
}
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

tab1 { padding-left: 16em; }


</style>

<body>

		<div class= "container">
<figure><img src="images/Small_Logo.png" alt="Responsive image" width="150" height = "80"  class="img-responsive center-block"></figure>
<!-- <h1 class="title">CONTINUUM AUDIO</h1> -->
      <form  class="form-signin" method="post" action="">
			<h2 class= "form-signin-heading">Please sign in</h2>

				<?php if ($missing || $errors) { ?>
				<p class="warning">Please fix the item(s) indicated.</p>
				<?php } ?>

      <label for="email" class= "sr-only">Email address

				<?php if ($missing && in_array('email', $missing)) { ?>
                        <span class="warning">An email address is required</span>
                    <?php } ?>
				<?php if ($errors && in_array('email', $errors)) { ?>
                        <span class="warning">The email address you provided is not associated with an account</span>
                    <?php } ?>
				</label>
        <input name="email" id="email" type="email" class= "form-control" placeholder="Email address" required autofocus>
				<?php if (isset($email) && !$errors['email']) {
                    echo 'value="' . htmlspecialchars($email) . '"';
                } ?>


				<?php if ($errors && in_array('password', $errors)) { ?>
                        <span class="warning">The password supplied does not match the password for this email address. Please try again.</span>
                    <?php } ?>
        <label for="pw"  class= "sr-only">Password

				<?php if ($missing && in_array('password', $missing)) { ?>
                        <span class="warning">Please enter a password</span>
                    <?php } ?> </label>
                <input type="password" id="pw" class= "form-control" name="password" placeholder="Password" required>
								<div class= "checkbox">
									<label>
										<input type ="checkbox" value = "remember-me"> Remember me
										</label>
									</div>
                <button class="btn btn-lg btn-primary btn-block" name="send" type="submit" value="Login">Sign in</button>
        </form>
			</div>
</body>

<?php include './includes/Ca_Footer.php'; ?>
