<?php

session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php include('includes/head.php'); ?>



 <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet"> 


 	<style type="text/css">
	    .bg-image-full
	    {
	      background-image: url('img/0003.jpg');
	    }
  	</style>

  <style type="text/css">

  	.headMain

  	{

  		padding-bottom: 20px;

  	}

  	.headMain .head

  	{

  		margin-top: 20px;



  	}

  	.headMain .content-text

  	{

  		padding-top: 38px;



  	}

  	.content-text p

  	{

  		margin-bottom: 10px;

  	}

  	.headMain .content

  	{

  		border: 10px ridge   #b2714d;

  		background:linear-gradient(110deg, #ffffff 0, #ffffff 50%, #cba792 33%, #cba792 66%, #ffffff 66%, #ffffff 100%);

  	}

  	.headMain .head p

  	{

  		font-family: 'Quicksand', sans-serif;

  		font-size: 18px;

  		margin-top: 0px;

  	}

  	.headMain .head h1

  	{

  		font-family: 'Pathway Gothic One', sans-serif;

  		margin-bottom: 0px;

  	}

  	.headMain .content-text p

  	{

  		text-align: justify;

  		font-family: 'Gentium Basic', serif;

  		font-size: 18px;

  	}

  	.Iconbtn

  	{

		background: rgba(208,93,5,1);

		background: -moz-linear-gradient(top, rgba(208,93,5,1) 0%, rgba(236,136,6,1) 100%);

		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(208,93,5,1)), color-stop(100%, rgba(236,136,6,1)));

		background: -webkit-linear-gradient(top, rgba(208,93,5,1) 0%, rgba(236,136,6,1) 100%);

		background: -o-linear-gradient(top, rgba(208,93,5,1) 0%, rgba(236,136,6,1) 100%);

		background: -ms-linear-gradient(top, rgba(208,93,5,1) 0%, rgba(236,136,6,1) 100%);

		background: linear-gradient(to bottom, rgba(208,93,5,1) 0%, rgba(236,136,6,1) 100%);

		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d05d05', endColorstr='#ec8806', GradientType=0 );



		border-radius: 33px 33px 33px 33px;

		-moz-border-radius: 33px 33px 33px 33px;

		-webkit-border-radius: 33px 33px 33px 33px;



		border: 3px solid #e07603;

		color: #f9cf9c !important;

		padding: 2px 20px;

		font-size: 13px;

		cursor: pointer;

		min-width: 150px;



		transition: all 0.5s;

	}

	.Iconbtn:hover

	{

		background: rgba(236,136,6,1);

		background: -moz-linear-gradient(top, rgba(236,136,6,1) 0%, rgba(208,93,5,1) 100%);

		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(236,136,6,1)), color-stop(100%, rgba(208,93,5,1)));

		background: -webkit-linear-gradient(top, rgba(236,136,6,1) 0%, rgba(208,93,5,1) 100%);

		background: -o-linear-gradient(top, rgba(236,136,6,1) 0%, rgba(208,93,5,1) 100%);

		background: -ms-linear-gradient(top, rgba(236,136,6,1) 0%, rgba(208,93,5,1) 100%);

		background: linear-gradient(to bottom, rgba(236,136,6,1) 0%, rgba(208,93,5,1) 100%);

		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ec8806', endColorstr='#d05d05', GradientType=0 );

	}

	.download .border

		{

		border-bottom: 2px solid #dfa054;

		padding-top: 30px;

	}

	.dHead

	{

		font-family: 'Dosis', sans-serif;

		margin-bottom: 5px;

		font-size: 20px;

	}

	.dHead:hover

	{

		color: #e07603;

	}

	/* .download

	{



	} */

  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <?php include('includes/slider.php'); ?>

  <main id="main">

  	<section>

  		<div class="container">

  		<div class="headMain">

	  		<div class="row head">

				<div class="col-md-12">

					<h1>Kshethrakala akademi</h1>

					<p>Course E- Brouchers</p>

				</div>

			</div>

		</div>

  	</div>

  	</section>



	<section class="download">

		<div class="container">

			<div class="row">

				<div class="col-md-7" style="margin-bottom: 10px;padding-top: 5px;">

					<div class="row">

						<?php

			            $table_nme = 'ebrochures';   

			            $result="SELECT * FROM $table_nme ORDER BY id ASC";

			            $q1=mysqli_query($db,$result);

			            if (mysqli_num_rows($q1) == 0) 

			            {

			                

			            } 

			            else 

			            {

			                $i = 0;

			                while ($r = mysql_fetch_array($q1)) 

			                {

			                  $i = $i + 1;  

			                  $filename=$r["filename"];

			                  $title=$r["title"];

			                  $date=$r["date"];

			                  $time=$r["time"];

			                  $id=$r['id']; 

			                  ?>

								<div class="col-12">

									<h4 class="dHead"><?= $title ?>

										<span style="float: right"><form method="get" action="assets/images/ebrochure/<?= $filename ?>"><button type="submit" class="Iconbtn"><i class="fa fa-download"></i> DOWNLOAD</button></form></span>

									</h4>

								</div>

			                  <?php

			                }

			            }

			            ?>

						

						

					</div>

				</div>

				<div class="col-md-5">

					<img src="img/PphotoGrid.jpg" class="img-fluid">

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

