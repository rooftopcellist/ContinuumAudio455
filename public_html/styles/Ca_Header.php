<?php session_start();
include './includes/Ca_Title.php';?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset = "utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name= "viewport" content= "width=device-width, initial-scale=1.0" >
	<title>Continuum Audio<?php if (isset($tittle)) {echo "&mdash; $title";} ?></title>
<br><br><br><figure><img src="images/continuumAudio.png" alt="Responsive image" width="350" height = "200" class = "img-responsive"></figure>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles/stilo.css">



</head>



		<?php require './includes/Ca_Menu.php'; ?>
