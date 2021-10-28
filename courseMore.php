<?php
session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");



if(!isset($_GET['id']))

{

	header('Location: index.php');

}

else

{

	$id=$_GET['id'];

	$table_nme = 'courses';   

	$result="SELECT * FROM $table_nme WHERE id='$id'";

	$q1=mysqli_query($db,$result);

	if (mysqli_num_rows($q1) == 0) 

	{

		header('Location: index.php');

	} 

	else 

	{

	    if ($r = mysqli_fetch_array($q1)) 

	    {

	      $CourseName=$r["name"];

	      $e_CourseName=$r["e_name"];

	      $subheading=$r["subheading"];

	      $e_subheading=$r["e_subheading"];

	      $type=$r["type"];

	      $e_type=$r["e_type"];

	      $description=$r["description"];

	      $e_description=$r["e_description"];

	      $imagename=$r["image"];

		  $imageDisplay="assets/images/courses/".$imagename;

	  	}

	}  	

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php include('includes/head.php'); ?>

  <style type="text/css">

  	.headT

  	{

  		margin-top: 60px;

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
	.banerImgCourse
	{
	  background-image: url('<?= $imageDisplay ?>');
	  background-size: cover;
	  background-position: 50% 30%;
	}

  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

 <header class="py-5 bg-image-full baner banerImgCourse">

 		<?php
		if($ln=='en')
		{
			?>
			<h1><?= $e_CourseName ?></h1>
			<?php
		}
		else
		{
			?>
			<h1 class="ml-dyuthi"><?= $CourseName ?></h1>
			<?php
		}
		?>


		

  </header>

  <main id="main">



	<section>

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<header class="headT"> 

						<?php
						if($ln=='en')
						{
							?>
							<h1 class="wow fadeInUp" data-wow-delay="0.2s"><?= $e_CourseName ?><span class="wow fadeInUp" data-wow-delay="0.4s">

							<?= $e_subheading ?>

						</span></h1>
							<?php
						}
						else
						{
							?>
							<h1 class="wow fadeInUp ml-dyuthi" data-wow-delay="0.2s"><?= $CourseName ?><span class="wow fadeInUp" data-wow-delay="0.4s">

							<?= $subheading ?>
							<?php
						}
						?>


					</header>

				</div>

			</div>

		</div>

	</section>



	<section class="secbgContent">

		<div class="container">

			<div class="row">

				<div class="col-md-8 textarea txtpanel">
					<?php
					if($ln=='en')
					{
						?>
						<p class="content wow fadeInLeft" data-wow-delay="0.4s">
							<?= $e_description ?>
						</p>
						<?php
					}
					else
					{
						?>
						<p class="content wow fadeInLeft mlText" data-wow-delay="0.4s">
							<?= $description ?>
						</p>
						<?php
					}
					?>
					<br>
				</div>

				<div class="col-md-4" style="padding-top: 20px;padding-bottom: 20px;">

					<img src="<?= $imageDisplay ?>" class="img-fluid wow fadeIn" data-wow-delay="0.4s" style="width: 100%;position: relative;top: 50%;transform: translateY(-50%); border: 5px solid white">

				</div>

			</div>

		</div>	

	</section>



	<section class="enq">

		<div class="container">

			<div class="col-md-12">

				<?php
				if($ln=='en')
				{
					?>
					<h4 class="wow fadeInLeft" data-wow-delay="0.4s">Enquiry form for <?= $e_CourseName ?></h4>
					<?php
				}
				else
				{
					?>
					<h4 class="wow fadeInLeft ml-dyuthi" data-wow-delay="0.4s"><b><?= $CourseName ?></b> നെ പറ്റി  കൂടുതൽ അറിയാൻ </h4>
					<?php
				}
				?>




				<form action="" method="post" role="form" class="contactForm">

			        <div class="form-row">

			          <div class="form-group col-lg-6">

			            <input type="text" name="name" class="form-control wow fadeInLeft" data-wow-delay="0.4s" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

			            <div class="validation"></div>

			          </div>

			          <div class="form-group col-lg-6">

			            <input type="email" class="form-control wow fadeInRight" data-wow-delay="0.4s"  name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />

			            <div class="validation"></div>

			          </div>

			        </div>

			        <div class="form-group">

			          <textarea class="form-control wow fadeInUp" data-wow-delay="0.4s" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>

			          <div class="validation"></div>

			        </div>

			        <div class="text-center"><button type="submit" title="Send Message" class="btn-4  wow fadeInUp" data-wow-delay="0.4s">Send Message</button></div>

			    </form>

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

