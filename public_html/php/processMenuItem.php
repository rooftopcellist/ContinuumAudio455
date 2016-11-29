<?php
session_start();
include_once("printCatalog.php");
include_once("addItem.php");

$choice = $_REQUEST['choice'];

print("Executing processMenuItem<br>");
print("Processing choice= ".$choice."<br>");
switch ($choice) {
        case 1:  // print catalog
         print("<h2><i><b>Catalog contents</i></b></h2>");
         printCatalog();
         break;
        case 2: 
         addItem();
         break;
        default:
          break;
      }
?>
