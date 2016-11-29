<?php

function connectDatabase($server, $user, $password) {

        ini_set('display_errors', 1);
        ini_set('log_errors', 1); 
        error_reporting(E_ALL | E_STRICT);
        print("Attempting to connect to mysql server...".$user."<br>");
	//connect to server, then test for failure
	if(!($dbLink = mysqli_connect('localhost', $user, $password,"")))
	{
		print("Failed to connect to database on ".$server."<br>\n");
		print("Aborting!<br>\n");
		exit();
	}
	
	
	//select database, then test for failure
	if(!($dbResult = mysqli_query($dbLink, "USE ".$user)))
	{
		print("Can't use the ".$user." database!<br>\n");
		print("Aborting!<br>\n");
		exit(); 
	} 
	
	//success - return reference to database 

	return $dbLink;
 }
 ?>
