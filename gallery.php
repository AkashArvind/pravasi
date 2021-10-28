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

    .imageHomeSub

    {

    	position:relative;

    	overflow:hidden;

    	height:200px;

    }

    .imageHomeSub img

    {

    	position:absolute;

    	top:-100%;

    	left:0;

    	right:0;

    	bottom:-100%;

    	margin:auto;

    }

    .imagefullwidth

    {

    	width:100% !important;

    }

    .subtext

    {

  		font-size: 14px;

  		text-align: justify;

  		color: #b10c0c;

  		margin-bottom: 0px;

    }

    .gallery

    {

		  margin-top: 40px;

    }

    .itemG

    {

		/*margin-top: 15px;*/

    }

    .gallBox

    {

      /*border: 5px red solid;*/

      padding-left: 12px;

      padding-right: 12px;

      padding-bottom: 20px;

      padding-top: 12px;

      margin-top: 30px;

      -webkit-box-shadow: -8px 10px 0px 0px rgba(192,40,44,1);

      -moz-box-shadow: -8px 10px 0px 0px rgba(192,40,44,1);

      box-shadow: -8px 10px 0px 0px rgba(192,40,44,1);

      border: 1px solid #7f6f03;

      padding-bottom: 10px;

    }

    .gallBox img

    {

      border-radius: 7px 7px 7px 7px;

      -moz-border-radius: 7px 7px 7px 7px;

      -webkit-border-radius: 7px 7px 7px 7px;

      border: 0px solid #000000;

    }

    .gallBox:hover

    {

    	

    }

    .btnView

    {

      margin-top: 30px;

      background-color: #c0282c;

      color: white;

      padding-top: 5px;

      padding-bottom: 5px;

      padding-right: 8px;

      padding-left: 8px;

      font-size: 12px;

      

      border-radius: 13px 13px 13px 13px;

      border-radius: 7px 7px 7px 7px;

      -moz-border-radius: 7px 7px 7px 7px;

      -webkit-border-radius: 7px 7px 7px 7px;

      

      border: 0px solid #000000;

      

      position: relative;

      bottom: 110px;

      left: 0px;

    }

    .btnView:hover

    {

    	background-color: #c70039;

    	color: white;

    }

    .maintext

    {

    	margin-bottom: 0px;

    	color: black;

    	font-size: 18px;

      

    }

    .headSec

    {

    	text-align: center;

    	padding-top: 5px;

    	padding-bottom: 5px;

    }

  </style>

   <style type="text/css">

    .bg-image-full

    {

      background-image: url('img/bg4.jpg');

    }

  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <!-- Header - set the background image for the header in the line below -->

	<?php include('includes/slider.php'); ?>

  <main id="main">

    <div class="container">

      <div class="row gallery">

        <?php

        $table_nme = 'gallerysubcategory';   

        $result="SELECT * FROM $table_nme ORDER BY id ASC";

        $q1=mysqli_query($db,$result);

        if (mysqli_num_rows($q1) == 0) 

        {

           

        } 

        else 

        {

            while ($r = mysqli_fetch_array($q1)) 

            { 

              $categoryid=$r["categoryid"];

              $name=$r["name"];

              $e_name=$r["e_name"];

              $description=$r["description"];

              $coverimage=$r["coverimage"];

              $gallId=$r["id"];

              ?>



              <div class="col-md-3">

                <div class="gallBox wow fadeInUp">

                    <div class="headSec">

                        <?php
                        if($ln=='en')
                        {
                          ?>
                          <p class="maintext"><?= $e_name ?></p>
                          <?php
                        }
                        else
                        {
                          ?>
                          <p class="maintext ml-dyuthi"><?= $name ?></p>
                          <?php
                        }
                        ?>




                    </div>

                    <div class="imageHomeSub itemG">

                      <img src="assets/images/gallery/<?= $coverimage ?>" class="img-responsive imagefullwidth" alt="">

                    </div>

                    <div class="text-center">

                        <a href="galleryImages.php?galId=<?= $gallId ?>" class="btnView">View Album</a>

                    </div>

                </div>

              </div>



              <?php

            }

        }

        ?>

      </div>

    </div>

  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

