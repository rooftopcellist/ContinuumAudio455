<?php
//DB details
$dbHost = '127.0.0.1';
$dbUsername = 'ap7488';
$dbPassword = '20171895';
$dbName = 'ap7488';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
} 
?>
