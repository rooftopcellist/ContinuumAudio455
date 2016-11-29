<?php
define(DBCONNSTRING,'mysql:host=127.0.0.1;dbname=ap7488');
define(DBUSER, 'ap7488');
define(DBPASS,'20171895');
try {
$conn= new PDO(DBCONNSTRING, DBUSER, DBPASS);
} catch (PDOException $e) {
echo $e->getMessage();
}