<?php
session_start();
//login.php


function login($scriptToActivate) {
   static $sessionId = 0; //initialize once - the first time the function is invoked 
   
	print ("<form action=\"$scriptToActivate\" method=\"post\">");
	print("Username:");
	print("<input type=\"text\" name=\"username\" value=\"\" /><br>");
	
	print("Password:");
	print("<input type=\"password\" name=\"password\" value=\"\" /><br>");
	print ("<input type=\"submit\" name=\"login\" value=\"Login\">");
}

?>
