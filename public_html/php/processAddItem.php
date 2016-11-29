<?php

session_start();

include_once("connectDatabase.php");
print("Executing processAddItem.php<br>");
//Execute the function defined below
processAddItem();

//declaration of processAddItem
function processAddItem() {
	print("Adding item...<br>");
   
   // database connections are apparently not persistent
   // recreate database link using saved session variables user and password 
   $dbLink = connectDatabase('localhost', $_SESSION['user'], $_SESSION['password']);
   
   if (!$dbLink) {
     print("No link to database! Exiting..<br>");
     exit();
     }
     
	$itemName = $_REQUEST['itemName'];
	$itemPrice = $_REQUEST['price'];

	$Query = "insert into catalog " .
		"values(\"" . $itemName ."\",". $itemPrice .")"; 
	print("About to execute--> ". $Query."<br>");

	//Was query successful?
	 if(!($dbResult = mysqli_query($dbLink, $Query)))
	{
		print("\gCouldn't execute query!<br>\n");
		print("MySQL reports: " . mysql_error() . "<br>\n");
		print("Query was: $Query<br>\n");
		exit();
	}
        else {
                print($Query." executed successfully!<br>");
        }
}
?>
