<?php
	session_start();
	
	include_once("showMenu.php");
	include_once("connectDatabase.php");
        print ("Checking username/password <br>");
	
	if (connectDatabase("webdev.cislabs.uncw.edu", $_REQUEST['username'], $_REQUEST['password'])) {
	// database connection successful
	  print("Database connection established!<br>");
	
   	//save username and password in session variables if database access was successful
	  $_SESSION['user'] = $_REQUEST['username'];
	  $_SESSION['password'] = $_REQUEST['password'];

          // show user the menu options	
          showMenu();
   }
   else {
       print ("Database connection could not be made. Check username/password.<br>");
       print ("Click here <a href=\"login.php\"> here</a> to try again<br>");
	}
	
?>
