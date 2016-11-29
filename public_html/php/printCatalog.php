<?php
//session_start();

include_once("connectDatabase.php");

function printCatalog() {
   print("Doing print catalog...");
   
   // database connections are apparently not persistent
   // recreate database link using saved session variables user and password 
   $dbLink = connectDatabase('localhost', $_SESSION['user'], $_SESSION['password']);
   
   if (!$dbLink) {
     print("No link to database! Exiting..<br>");
     exit();
     }
     
       // get everything from catalog table
	$Query = "SELECT Name, Price " .
		"FROM catalog " .
		"ORDER BY Name ";
	if(!($dbResult = mysqli_query($dbLink, $Query)))
	{
		print("Couldn't execute query!<br>\n");
		print("MySQL reports: " . mysql_error() . "<br>\n");
		print("Query was: $Query<br>\n");
		exit();
	}

        //start html
        //print("<html><head><base target="main"></head><br>");
        //print("<body><br>");
	//start table
	print("<table border=\"0\">\n");

	//create header row
	print("<tr>\n");
	print("<td bgcolor=\"#cccccc\"><b>Item</b></td>\n");
	print("<td bgcolor=\"#cccccc\"><b>Price</b></td>\n");
	print("</tr>\n");

	// get each row
	while($dbRow = mysqli_fetch_assoc($dbResult))
	{
		print("<tr>\n");
		print("<td>{$dbRow['Name']}</td>\n");
		print("<td align=\"right\">{$dbRow['Price']}</td>\n");
		print("</tr>\n");
	}

	//end table
	print("</table>\n");
        //print("</body></html>\n");
	}
?>
