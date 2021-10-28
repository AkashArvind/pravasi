<?php

session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php include('includes/head.php'); ?>

</head>

<body>

  <?php include('includes/header.php'); ?>
  <?php include('includes/slider.php'); ?>
  <main id="main">



  	<section style="margin-top: 60px">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					
					<?php
					if($ln=='en')
					{
						?>
						<h3>Activities</h3>
						<p>The initiators Kshetrakala Akademi had a wide vision about this this intuition to be uplifted to a Deemed University</p>
						<p>The activities of Khetrakala Akademi include conducting exclusive long term training for kids in the temple art forms of Kerala to promote them as skilled artistes in temple art forms.</p>
						<p>The proposed activities of Kshetrakala Akademi are conducting seminars on the social relevance and value of the temple art forms, organizing stage performance, travelogue of temple art forms such as Kathakali, Koodiyattam, Krishnanattam, Panchavadyam, Thayambaka, Poorakkali, Marathkali, Ashtapadi, Thullal, Nangyar Koothu, Mohiniattam, Karnatic Music, and Yakshaganam etc.</p>
						<p>Kshetrakala Akademi plans a centre for art performance of the temple art forms for dissemination of art forms and to develop kshetrakala Akademi as an establishment which execute the three cultural functions viz. Leaning, Research and dissemination of temple art forms.</p>
						<p>A museum of the theyyam ornaments and accessories, kathakali dress, mural arts, wood and stone sculpture, related music instruments, festival related instruments, models of kalamezhuth, the ecological resources related to Kavu, is  one of the main proposed activity of kshetrakala Akademi, which in a seed form.</p>
						<p>Publishing a directory on temple art form out of which a Souvenir related to temple art forms and artistes has already been published by Khetrakala Akademi connected to the presence of Kshetrakala Akademi in print media. </p>
						<?php
					}
					else
					{
						?>
						<h3>Activities</h3>
						
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</section>





    



  
  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

