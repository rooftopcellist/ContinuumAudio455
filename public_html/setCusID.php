<?php
session_start();
// include database configuration file
include 'dbConfig.php';



// set customer ID in session
if (isset($_GET['id']))
{
  // get id value (customer e-mail)
$email = $_GET['id'];
}

if (isset($_GET['fname']))
{
$fname = $_GET['fname'];
}
// echo $email;
$_SESSION['sessCustomerName'] = $fname;
$_SESSION['sessCustomerEmail'] = $email;

// redirect to Shop
    header("Location: Ca_Shop_Index.php");


?>
