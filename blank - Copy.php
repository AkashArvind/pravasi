<?php

session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php include('includes/head.php'); ?>

  <style type="text/css">

  	

  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <!-- Header - set the background image for the header in the line below -->

	<?php include('includes/slider.php'); ?>

  <main id="main">

    



   



  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

