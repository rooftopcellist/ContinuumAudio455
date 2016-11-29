<?php


function showMenu() {

     print ("<h3>Select 1 of the following options</h3><br>");
     print ("1. Print catalog<br>");
     print ("2. Add new item to catalog<br>");
    
     //target="_blank" causes search results to be displayed in new window 
     print ("<form action=\"processMenuItem.php\" target=\"_blank\" method=\"post\">");

     print("<input type=\"text\" name=\"choice\" value=\"\" /><br>");
     print ("<input type=\"submit\" name=\"submit\" value=\"submit\">"); 
     
}
?>
