<?php

/*
DELETE.PHP
Deletes a specific entry from the 'Ca_Reg_Users' and 'employee' tables
*/


// connect to the database
// include('../pdo_config.php');


// check if the 'id' variable is set in URL, and check that it is valid
if (isset($_GET['email']))
{
// get id value
$email = $_GET['email'];
// echo $email;

			require_once('../pdo_config.php');


// 		$sql2 = 'DELETE FROM Ca_Reg_User WHERE emailAddr = :email; DELETE FROM employee WHERE email = :email';
		$sql2 = 'DELETE FROM employee WHERE email = :email';
					$stmt=$conn->prepare($sql2);
					$stmt->bindValue(':email', $email);
// 					$stmt->bindValue(':email', $email);
					$result = $stmt ->execute()
					or die(mysql_error());
// 					echo ':email';
// 					echo $email;



// redirect back to the view page
header("Location: Ca_Remove_Employee.php");
}

else

// if id isn't set, or isn't valid, redirect back to view page
{
header("Location: Ca_Remove_Employee.php");
}

?>
