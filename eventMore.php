<?php

session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");



if(!isset($_GET['Eid']))

{

	header('Location: index.php');

}

else
{
	$eventid=$_GET['Eid'];
	$table_nme = 'events';
	$result="SELECT * FROM $table_nme WHERE event_id='$eventid'";
	$q1=mysqli_query($db,$result);
	if (mysqli_num_rows($q1) == 0) 
	{
		header('Location: index.php');
	} 

	else 

	{

	    if ($r = mysqli_fetch_array($q1)) 

	    {

	      $title=$r["title"];

	      $e_title=$r["e_title"];

	      $discription=$r["discription"];

	      $e_discription=$r["e_discription"];

	      $place=$r["place"];

	      $e_place=$r["e_place"];

	      $date=$r["date"];

		  $imagename=$r["image"];

		  $link=$r["link"];

		  $event_id=$r["event_id"];

	  	}
	}  	
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php include('includes/head.php'); ?>

  <link rel="stylesheet" type="text/css" href="assets/gallery/css/style.css"/>

  <script src="assets/gallery/js/modernizr.custom.70736.js"></script>

  <noscript><link rel="stylesheet" type="text/css" href="assets/gallery/css/noJS.css"/></noscript>

  <style type="text/css">

  	.headT

  	{

  		margin-top: 40px;

  	}

  	.headT > h1 span 

  	{

		display: block;

		font-size: 20px;

		font-weight: 300;

	}

	.justifyText 
	{
	  word-break: break-all;
	  text-align: justify;
	}


	.headT h2 

	{

		font-size: 38px;

		font-weight: 300;

		text-shadow: 0 1px 0 rgba(255,255,255,0.9);

		padding: 10px 0 0 0;

		margin-bottom: 20px;

		border-top: 1px solid #f7f7f7;

	}

	.headT > h1 

	{

	    font-size: 34px;

	    line-height: 38px;

	    margin: 0;

	    font-weight: 700;

	    color: #333;

	    float: left;

	}

	.content

	{

		text-align: justify;

		font-weight: 100;

	}

	.textarea

	{

		margin-top: 50px;

		color: #e4e2e2;

	}

	/* .txtpanel

	{

		background-color: ;

	} */

	@media screen and (min-width: 768px)

	{

		.secbgContent

		{

			margin-top: 30px;	

			background: rgba(52,52,52,1);

			background: -moz-linear-gradient(left, rgba(52,52,52,1) 0%, rgba(99,99,99,1) 67%, rgba(130,127,130,1) 80%, rgba(77,76,77,1) 95%, rgba(77,76,77,1) 100%);

			background: -webkit-gradient(left top, right top, color-stop(0%, rgba(52,52,52,1)), color-stop(67%, rgba(99,99,99,1)), color-stop(80%, rgba(130,127,130,1)), color-stop(95%, rgba(77,76,77,1)), color-stop(100%, rgba(77,76,77,1)));

			background: -webkit-linear-gradient(left, rgba(52,52,52,1) 0%, rgba(99,99,99,1) 67%, rgba(130,127,130,1) 80%, rgba(77,76,77,1) 95%, rgba(77,76,77,1) 100%);

			background: -o-linear-gradient(left, rgba(52,52,52,1) 0%, rgba(99,99,99,1) 67%, rgba(130,127,130,1) 80%, rgba(77,76,77,1) 95%, rgba(77,76,77,1) 100%);

			background: -ms-linear-gradient(left, rgba(52,52,52,1) 0%, rgba(99,99,99,1) 67%, rgba(130,127,130,1) 80%, rgba(77,76,77,1) 95%, rgba(77,76,77,1) 100%);

			background: linear-gradient(to right, rgba(52,52,52,1) 0%, rgba(99,99,99,1) 67%, rgba(130,127,130,1) 80%, rgba(77,76,77,1) 95%, rgba(77,76,77,1) 100%);

			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#343434', endColorstr='#4d4c4d', GradientType=1 );

		}

	}

	@media screen and (max-width: 768px)

	{

		.secbgContent
		{
			margin-top: 30px;
			background-color: #343434;
		}

	}

	.enq

	{

		margin-top: 50px;

	}

  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <?php include('includes/slider.php'); ?>

  <main id="main" class="MContent">



	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header class="headT"> 
						
						<?php
						if($ln=='en')
						{
							?>
							<h1 class="wow fadeInUp" data-wow-delay="0.2s"><?= $e_title ?><span class="wow fadeInUp" data-wow-delay="0.4s" style="color: #c0282c">
						On <?= $date ?>,  @<?= $e_place ?>
							<?php
						}
						else
						{
							?>
							<h1 class="wow fadeInUp mlText ml-dyuthi" data-wow-delay="0.2s"><?= $title ?><span class="wow fadeInUp" data-wow-delay="0.4s" style="color: #c0282c">
							<?= $date ?>,  <?= $place ?>
							<?php
						}
						?>

						



						</span></h1>
					</header>
				</div>
			</div>
		</div>
	</section>



	<section class="secbgContent">

		<div class="container">

			<div class="row">

				<div class="col-12 textarea txtpanel">


					<?php
					if($ln=='en')
					{
						?>
						<p class="content wow fadeInLeft" data-wow-delay="0.4s">
							<?= $e_discription ?>
						</p>
						<?php
					}
					else
					{
						?>
						<p class=" wow fadeInLeft mlText justifyText" data-wow-delay="0.4s">
							<?= $discription ?>
						</p>
						<?php
					}
					?>



					<br>

				</div>

				

			</div>

		</div>	

	</section>

	<?php
	$event_id;
  	$table_nme="eventphotos";
	$result1="SELECT * FROM $table_nme WHERE eventid='$event_id'";
	$q11=mysqli_query($db,$result1);
	if (mysqli_num_rows($q11) == 0) 
	{
	} 
	else 
	{
	?>
	<section style="margin-top: 40px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="gamma-container gamma-loading" id="gamma-container">
			          <ul class="gamma-gallery">
			          	<?php
			          	$event_id;
			          	$table_nme="eventphotos";
						$result1="SELECT * FROM $table_nme WHERE eventid='$event_id'";
						$q11=mysqli_query($db,$result1);
						if (mysqli_num_rows($q11) == 0) 
						{
							//header('Location: index.php');
						} 
						else 
						{
							while ($r11 = mysqli_fetch_array($q11)) 
							{
						  		$filename=$r11["filename"];
						  		?>

						  		<li>
					              <div data-alt="" data-description="<h3></h3>" data-max-width="1800" data-max-height="1350">
					                <div data-src="assets/images/events/<?= $filename ?>" data-min-width="1300"></div>
					                <div data-src="assets/images/events/<?= $filename ?>" data-min-width="1000"></div>
					                <div data-src="assets/images/events/<?= $filename ?>" data-min-width="700"></div>
					                <div data-src="assets/images/events/<?= $filename ?>" data-min-width="300"></div>
					                <div data-src="assets/images/events/<?= $filename ?>" data-min-width="200"></div>
					                <div data-src="assets/images/events/<?= $filename ?>" data-min-width="140"></div>
					                <div data-src="assets/images/events/<?= $filename ?>"></div>
					                <noscript>
					                  <img src="assets/images/events/<?= $filename ?>" alt=""/>
					                </noscript>
					              </div>
					            </li>

						  		<?php
						  	}
						}
						?>		           

			          </ul>
			          <div class="gamma-overlay"></div>
			          <!--<div id="loadmore" class="loadmore">Example for loading more items...</div>-->
			        </div>
				</div>
			</div>
		</div>
	</section>
	<?php
	}
	?>



  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>



  <!--  gallery -->

  <script src="assets/gallery/js/jquery.masonry.min.js"></script>

  <script src="assets/gallery/js/jquery.history.js"></script>

  <script src="assets/gallery/js/js-url.min.js"></script>

  <script src="assets/gallery/js/jquerypp.custom.js"></script>

  <script src="assets/gallery/js/gamma.js"></script>

  <script type="text/javascript">

    

    $(function() {



      var GammaSettings = {

          // order is important!

          viewport : [ {

            width : 1200,

            columns : 5

          }, {

            width : 900,

            columns : 4

          }, {

            width : 500,

            columns : 3

          }, { 

            width : 320,

            columns : 2

          }, { 

            width : 0,

            columns : 2

          } ]

      };



      Gamma.init( GammaSettings, fncallback );





      // Example how to add more items (just a dummy):



      var page = 0,

        items = ['']



      function fncallback() {



        $( '#loadmore' ).show().on( 'click', function() {



          ++page;

          var newitems = items[page-1]

          if( page <= 1 ) {

            

            Gamma.add( $( newitems ) );



          }

          if( page === 1 ) {



            $( this ).remove();



          }



        } );



      }



    });



  </script>





</body>

</html>

