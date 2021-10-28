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

	.courseSetion

	{

		margin-top: 30px;

	}

	.courseType

	{

		padding: 4px 4px 4px 4px;

		float: right;

		font-size: 11px;

	}





	.course1

	{

		color: white;

		background-color: #39a998;

	}

	.course2

	{

		color: white;

		background-color: #7f3c81;

	}

	.course3

	{

		color: white;

		background-color: #81493c;

	}

	.course4

	{

		color: white;

		background-color: #8d8a3e;

	}



	.courseP

	{

		text-align: justify;

		color: #797575;



	}

	.courseItem

	{

		margin-top: 20px;

		padding: 20px 20px 40px 20px;

		border: 4px white solid;

	}

	.courseItem:hover

	{

		border: 4px #baabab solid;

	}

  </style>

  <style type="text/css">

    .bg-image-full

    {

      background-image: url('img/bg5.jpg');

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

					<header class="headT"> 

						<?php
						if($ln=='en')
						{
							?>
							<h1 class="ml-dyuthi" style="line-height: 22px">Courses<span style="margin-top: 10px;color: #c0282c">Khetrakala akademi has been conducting many courses, workshops and events related to temple art forms.</span></h1>
							<?php
						}
						else
						{
							?>
							<h1 class="ml-dyuthi" style="line-height: 22px;">കോഴ്‌സുകൾ<span style="margin-top: 10px;color: #c0282c">ക്ഷേത്രകല അക്കാദമിയിൽ   ക്ഷേത്ര കലാരൂപങ്ങളുമായി ബന്ധപ്പെട്ട നിരവധി കോഴ്‌സുകൾ, വർക്ക്‌ഷോപ്പുകൾ, ഇവന്റുകൾ എന്നിവ  നടത്തിവരുന്നു.</span></h1>
							<?php
						}
						?>

					</header>

				</div>

			</div>

		</div>

	</section>

	

	<section class="courseSetion">

		<div class="container">

			<div class="row">

			<?php

            $table_nme = 'courses';   

            $result="SELECT * FROM $table_nme ORDER BY id ASC";

            $q1=mysqli_query($db,$result);

            if (mysqli_num_rows($q1) == 0) 

            {



            } 

            else 

            {

                $i = 0;

                while ($r = mysqli_fetch_array($q1)) 

                {

                  $CourseName=$r["name"];

                  $e_CourseName=$r["e_name"];

                  $subheading=$r["subheading"];

                  $e_subheading=$r["e_subheading"];

                  $type=$r["type"];

                  $e_type=$r["e_type"];

                  $description=$r["description"];

                  $e_description=$r["e_description"];

                  //$description=substr($description,0,200).'...';
                 	$description= stringCut($description,250);

                  //$e_description=substr($e_description,0,350).'...';
                 	$e_description=stringCut($e_description,100);

                  $id=$r['id']; 

                 // $dataorg="admin/assets/images/gallery/".$imagename;

                  ?>

					
				<?php
				if($ln=='en')
				{

				?>
				<div class="col-md-6 courseItem">
					<h4><?= $e_CourseName ?><span class="courseType course1"><?= $e_type ?></span></h4>
					<p class="courseP">
						<?= $e_description ?>
					</p>
					<a href="courseMore.php?id=<?= $id ?>" class="btn btn-warning btn-sm">Know More</a>&nbsp;&nbsp;
					<a href="assets/Kshethrakala_Application_Form.pdf" target="_blank" class="btn btn-info btn-sm">Download Application form</a>
				</div>
				<?php
				}
				else
				{
				?>
				<div class="col-md-6 courseItem">
					<h4 class="mlText justifyText"><?= $CourseName ?><span class="courseType course1"><?= $type ?></span></h4>
					<p class="courseP mlText justifyText">
						<?= $description ?>
					</p>
					<a href="courseMore.php?id=<?= $id ?>" class="btn btn-warning btn-sm mlText">കൂടുതൽ അറിയുക</a>&nbsp;&nbsp;
					<a href="assets/Kshethrakala_Application_Form.pdf" target="_blank" class="btn btn-info btn-sm mlText">അപേക്ഷാ ഫോറം</a>
				</div>
				<?php
				}
				?>
                  <?php
                }
            }

    		?>

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