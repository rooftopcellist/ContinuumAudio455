<?php

//include_once("processAddItem.php");

function addItem() {
     print("Executing addItem.php<br>");

     print ("<h3>Add item to catalog</h3><br>");
    
     //target="_blank" causes search results to be displayed in new window 
     print ("<form action=\"processAddItem.php\" target=\"_blank\" method=\"post\">");

     print("Item name:");
     print("<input type=\"text\" name=\"itemName\" value=\"\" /><br>");

     print("Price: ");
     print("<input type=\"text\" name=\"price\" value=\"\" /><br>");
     print ("<input type=\"submit\" name=\"ok\" value=\"ok\">"); 
     
     }
?>
