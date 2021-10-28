<?php
session_start();
$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];
include_once("connection/conection.php");
function stringCut($content,$length)
{
  $content=strip_tags($content);
  $charLenghth=strlen($content);
  if($charLenghth>$length)
  {
    $i=$length;
    while($i<$charLenghth)
    {
      if($content[$i]==' ')
      {
        $content = substr($content,0, $i);
        break;
      }
    $i=$i+1;
    }
  }
  return $content.'...';
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
    .bg-image-full
    {
      background-image: url('img/0001.jpg');
    }
  </style>


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

	}
 */
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
	.eventContent
	{
		max-height: 650px;
		overflow: auto;
	}
	.spandate
    {

      font-size: 12px;

      font-weight: 100;

      margin-bottom: 10px;

      padding: 2px 5px 2px 5px;

      background-color: #abeae7;

      color: black;

    }
    .eventContent::-webkit-scrollbar { width: 0 !important }
    
    .EBI1
    {
    	border:8px #b2714d ridge;
    	margin-bottom: 5px; 
    }
	
	.EBI2
    {
    	border:8px #b2714d ridge;
    	margin-bottom: 5px; 
    }

    .EBI3
    {
    	border:8px #b2714d ridge;
    	margin-bottom: 5px; 
    }
    
  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <?php include('includes/slider.php'); ?>

  <main id="main">


	<section>

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<?php
		            if($ln=='en')
		            {
		              ?>
		             <header class="headT"> 
						<h1 class="wow fadeInUp" data-wow-delay="0.2s">Events<span class="wow fadeInUp" data-wow-delay="0.4s">
							Ksethrakala akademi events
						</span></h1>
					 </header>
		              <?php
		            }
		            else
		            {
		              ?>
		             <header class="headT"> 
						<h1 class="wow fadeInUp ml-dyuthi" data-wow-delay="0.2s">ഇവന്റുകൾ<span class="wow fadeInUp" data-wow-delay="0.4s">
							ക്ഷേത്രകല അക്കാദമി 
						</span></h1>
					 </header>
		              <?php
		            }
		            ?>




					

				</div>

			</div>

		</div>

	</section>



	<section style="padding: 10px 0px 10px 0px;background-color: #cabb11;margin-top: 40px">
		<marquee>
		<h5 style="margin: 0px;padding-top: 3px;font-size: 15px"><b>Kshethrakala Academy  &nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp; Kshethrakala Academy&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp; Kshethrakala Academy&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp; Kshethrakala Academy&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;&nbsp;&nbsp;&nbsp; Kshethrakala Academy</b></h5>
		</marquee>

	</section>


	<section style="background-color:#b2714d;color: #e5e3e2">
		<div class="container">

		<div class="row">
			<div class="col-md-8 eventContent" style="margin-top: 60px;">
				<?php
				$table_nme = 'events';   
				$result="SELECT * FROM $table_nme ORDER BY event_id DESC";
				$q1=mysqli_query($db,$result);
	            if (mysqli_num_rows($q1) == 0) 
	            {
   

	            } 
	            else
	            {
	                while ($r = mysqli_fetch_array($q1)) 
	                { 
	                  $title=$r["title"];
					  $e_title=$r["e_title"];
	                  $date=$r["date"];
	                  $discription=$r["discription"];
	                  $e_discription=$r["e_discription"];
	                  //$discription=substr($discription,0,250);
	                  $discription= stringCut($discription,600);
	                  //$e_discription=substr($e_discription,0,350);
	                  $e_discription= stringCut($e_discription,300);
	                  $place=$r['place'];
	                  $e_place=$r['e_place'];
	                  $event_id=$r['event_id'];
	                  ?>

					<?php
					if($ln=='en')
					{
						?>
						<div style="margin-bottom: 30px" class="wow fadeInUp" data-wow-delay="0.2s">
							<h3 style="margin: 2px"><?= $e_title ?></h3>
							<p style="margin: 0px"><span class="spandate">On <?= $date ?></span> <span class="spandate">@ <?= $e_place ?></span></p>
							<p style="margin:5px;text-align: justify"><?= $e_discription ?>..</p>
							<a href="eventMore.php?Eid=<?= $event_id ?>" class="btn btn-sm btn-danger" style="margin-top: 0px">View More</a>
						</div>
						<?php
					}
					else
					{
						?>
						<div style="margin-bottom: 30px" class="wow fadeInUp" data-wow-delay="0.2s">
							<h3 class="ml-dyuthi" style="margin: 2px"><?= $title ?></h3>
							<p style="margin: 0px"><span class="spandate mlText" style="font-size: 14px;padding-top: 5px"><?= $date ?></span> <span class="spandate mlText" style="font-size: 14px;padding-top: 5px"> <?= $place ?></span></p>
							<p style="margin:5px;text-align: justify;" class="mlText"><?= $discription ?>..</p>
							<a href="eventMore.php?Eid=<?= $event_id ?>" class="btn btn-sm btn-danger" style="margin-top: 0px">View More</a>
						</div>
						<?php
					}
					?>




						
				 	<?php
	                }
	            }
	            ?>
				<!--<div style="margin-bottom: 30px">
					<h3 style="margin: 2px">1) Hridyam Vadyam -17 (South Indian Percussion Workshop)</h3>
					<p style="margin: 0px"><span class="spandate">On 05/17/2019</span> <span class="spandate">@ Kunhimangalam Kannur</span></p>
					<p style="margin:5px;text-align: justify">It was conducted successfully on 8th and 9th of December 2017 at Hanumarambalam, Cheruthazham Kannur. The main attraction of the workshop was the active presence of the renowned chenda masters Padmasree Peruvanam Kuttan Marar, and Padmasree Mattannur Sankaran Kutty Marar. </p>
					<a href="" class="btn btn-sm btn-danger" style="margin-top: 0px">View More</a>
				</div>-->
			</div>
			<div class="col-md-4" style="margin-top: 50px;margin-bottom: 50px">
				<img src="img/ottanthullal_Events.jpg" class="img-fluid wow fadeInUp"  data-wow-delay="0.2s" style="border: 10px #eb9e9e solid">
			</div>
		</div>

		</div>
	</section>


	

	<section style="margin-top: 45px;margin-bottom: 50px">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="img/events/1.jpg" class="img-fluid EBI1 wow fadeInUp"  data-wow-delay="0.2s">
				</div>
				<div class="col-md-4">
					<img src="img/events/2.jpg" class="img-fluid EBI2 wow fadeInUp"  data-wow-delay="0.2s">
				</div>
				<div class="col-md-4">
					<img src="img/events/3.jpg" class="img-fluid EBI3 wow fadeInUp"  data-wow-delay="0.2s">
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

