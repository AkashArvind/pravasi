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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="assets/slider/dist/slippry.min.js"></script>
	<link rel="stylesheet" href="assets/slider/dist/slippry.css">
</head>

<body>

  <?php include('includes/header.php'); ?>
  <?php include('includes/slider.php'); ?>  

  <main id="main">

    



   



  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

