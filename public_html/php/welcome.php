Executing welcome.php<br>

<html>
<h1>Welcome to Shop-N-Save</h1>
</html>

<?php

include_once("login.php");

print("<h2>Enter your username and password below<br></h1>");
//invoke the login function defined in login.php
login("databaseApp.php");


?>
