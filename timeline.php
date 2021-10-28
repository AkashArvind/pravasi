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

  	@import url('https://fonts.googleapis.com/css?family=Gentium+Basic|Pathway+Gothic+One|Quicksand');

  	.profile

  	{

  		padding-bottom: 50px;

  	}

  	.profile .head

  	{

  		margin-top: 20px;



  	}

  	.profile .content-text

  	{

  		padding-top: 38px;



  	}

  	.content-text p

  	{

  		margin-bottom: 10px;

  	}

  	.profile .content

  	{

  		border: 10px ridge   #b2714d;

  		background:linear-gradient(110deg, #ffffff 0, #ffffff 50%, #cba792 33%, #cba792 66%, #ffffff 66%, #ffffff 100%);

  	}

  	.profile .head p

  	{

  		font-family: 'Quicksand', sans-serif;

  		font-size: 18px;

  		margin-top: 0px;

  	}

  	.profile .head h1

  	{

  		font-family: 'Pathway Gothic One', sans-serif;

  		margin-bottom: 0px;

  	}

  	.profile .content-text p

  	{

  		text-align: justify;

  		font-family: 'Gentium Basic', serif;

  		font-size: 18px;

  	}

  	/*timeline*/

  	.timelineSection

  	{

  		/*background-color: #bb7f60;*/

  		margin-top: 30px;

  		padding-top: 30px;

  		padding-bottom: 30px;

  		padding-left: 10px;

  		padding-right: 10px;

  	}

  	.circle {

	  padding: 13px 20px;

	  border-radius: 50%;

	  background-color: #ED8D8D;

	  color: #fff;

	  max-height: 50px;

	  z-index: 2;

	}



	.how-it-works.row .col-2 {

	  align-self: stretch;

	}

	.how-it-works.row .col-2::after {

	  content: "";

	  position: absolute;

	  border-left: 3px solid #ED8D8D;

	  z-index: 1;

	}

	.how-it-works.row .col-2.bottom::after {

	  height: 50%;

	  left: 50%;

	  top: 50%;

	}

	.how-it-works.row .col-2.full::after {

	  height: 100%;

	  left: calc(50% - 3px);

	}

	.how-it-works.row .col-2.top::after {

	  height: 100%;

	  left: 50%;

	  top: 0;

	}

	.timeline div {

	  padding: 0;

	  height: 40px;

	}

	.timeline hr {

	  border-top: 3px solid #ED8D8D;

	  margin: 0;

	  top: 17px;

	  position: relative;

	}

	.timeline .col-2 {

	  display: flex;

	  overflow: hidden;

	}

	.timeline .corner {

	  border: 3px solid #ED8D8D;

	  width: 100%;

	  position: relative;

	  border-radius: 15px;

	}

	.timeline .top-right {

	  left: 50%;

	  top: -50%;

	}

	.timeline .left-bottom {

	  left: -50%;

	  top: calc(50% - 3px);

	}

	.timeline .top-left {

	  left: -50%;

	  top: -50%;

	}

	.timeline .right-bottom {

	  left: 50%;

	  top: calc(50% - 3px);

	}

	/*card style*/

	

	/* FontAwesome for working BootSnippet :> */



@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

#team {

    background: #ffffff !important;

    border-top: 5px double #c0282c;

}



.btn-primary:hover,

.btn-primary:focus {

    background-color: #108d6f;

    border-color: #108d6f;

    box-shadow: none;

    outline: none;

}



.btn-primary {

    color: #fff;

    background-color: #007b5e;

    border-color: #007b5e;

}



section {

    padding: 60px 0;

}



section .section-title {

    text-align: center;

    color: #c0282c;

    margin-bottom: 50px;

    text-transform: uppercase;

}



#team .card {

    border: none;

    background: #ffffff;

}



.image-flip:hover .backside,

.image-flip.hover .backside {

    -webkit-transform: rotateY(0deg);

    -moz-transform: rotateY(0deg);

    -o-transform: rotateY(0deg);

    -ms-transform: rotateY(0deg);

    transform: rotateY(0deg);

    border-radius: .25rem;

}



.image-flip:hover .frontside,

.image-flip.hover .frontside {

    -webkit-transform: rotateY(180deg);

    -moz-transform: rotateY(180deg);

    -o-transform: rotateY(180deg);

    transform: rotateY(180deg);

}



.mainflip {

    -webkit-transition: 1s;

    -webkit-transform-style: preserve-3d;

    -ms-transition: 1s;

    -moz-transition: 1s;

    -moz-transform: perspective(1000px);

    -moz-transform-style: preserve-3d;

    -ms-transform-style: preserve-3d;
    transform: perspective();

    transition: 1s;

    transform-style: preserve-3d;

    position: relative;

}



.frontside {

    position: relative;

    -webkit-transform: rotateY(0deg);

    -ms-transform: rotateY(0deg);
    transform: rotate();
    z-index: 2;

    margin-bottom: 30px;

}



.backside {

    position: absolute;

    top: 0;

    left: 0;

    background: white;

    -webkit-transform: rotateY(-180deg);

    -moz-transform: rotateY(-180deg);

    -o-transform: rotateY(-180deg);

    -ms-transform: rotateY(-180deg);

    transform: rotateY(-180deg);

    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);

    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);

    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);

}



.frontside,

.backside {

    -webkit-backface-visibility: hidden;

    -moz-backface-visibility: hidden;

    -ms-backface-visibility: hidden;

    backface-visibility: hidden;

    -webkit-transition: 1s;

    -webkit-transform-style: preserve-3d;

    -moz-transition: 1s;

    -moz-transform-style: preserve-3d;

    -o-transition: 1s;

    -o-transform-style: preserve-3d;

    -ms-transition: 1s;

    -ms-transform-style: preserve-3d;

    transition: 1s;

    transform-style: preserve-3d;

}



.frontside .card,

.backside .card {

    min-height: 312px;

}



.backside .card a {

    font-size: 18px;

    color: #c0282c !important;

}



.frontside .card .card-title,

.backside .card .card-title {

    color: #c0282c !important;

}



.frontside .card .card-body img {

    width: 120px;

    height: 120px;

    border-radius: 50%;

}

  </style>

  <style type="text/css">

    .bg-image-full

    {

      background-image: url('img/bg1.jpg');

    }

  </style>

</head>

<body>

    <?php include('includes/header.php'); ?>

	<?php include('includes/slider.php'); ?>

  <main id="main">

  	

	





	<div class="timelineSection">

	  <div class="container">

      <?php
      if($ln=='en')
      {
        ?>
        <h2 class="pb-3 pt-2 border-bottom mb-5">Kshethrakala Akademi <span style="color: #c0282c;font-size: 20px">Timeline</span></h2>
        <?php
      }
      else
      {
        ?>
        <h2 class="pb-3 pt-2 border-bottom mb-5 ml-dyuthi">ക്ഷേത്രകല അക്കാദമി <span class="ml-dyuthi" style="color: #c0282c;font-size: 20px">ടൈംലൈൻ </span></h2>
        
        <?php
      }
      ?>

      <?php

        $i=1;

        $table_nme = 'activities';   

        $result="SELECT * FROM $table_nme ORDER BY id DESC";

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

            $description=$r["description"];

            $e_description=$r["e_description"];

            //$description=substr($description,0,250);
            //$e_description=substr($e_description,0,350);

            $e_title=$title;
            $e_description=$description;


            $day=$r["day"];

            $month=$r["month"];

            $year=$r["year"];

            $date=$day.'-'.$month.'-'.$year;

            if($i%2!=0)

              {

              ?>



                <!--first section-->

                <div class="row align-items-center how-it-works d-flex">

                  <div class="col-2 text-center bottom top d-inline-flex justify-content-center align-items-center">

                    <div class="circle font-weight-bold"><?= $i ?></div>

                  </div>

                  <div class="col-6">

                    <?php
                    if($ln=='en')
                    {
                      ?>
                      <h5 class="mlText"><?= $e_title ?>  [<?= $date ?>]</h5>
                      <p class="mlText"><?= $e_description ?></p>
                      <?php
                    }
                    else
                    {
                      ?>
                      <h5 class="mlText ml-dyuthi"><?= $title ?>  [<?= $date ?>]</h5>
                      <p class="mlText mlText"><?= $description ?></p>
                      <?php
                    }
                    ?>



                    

                  </div>

                </div>





                <!--path between 1-2-->

                <div class="row timeline">

                  <div class="col-2">

                    <div class="corner top-right"></div>

                  </div>

                  <div class="col-8">

                    <hr/>

                  </div>

                  <div class="col-2">

                    <div class="corner left-bottom"></div>

                  </div>

                </div>





                <?php

              }

              else

              {

                 

                 ?>





                <!--second section-->

                <div class="row align-items-center justify-content-end how-it-works d-flex">

                  <div class="col-6 text-right">

                    <?php
                    if($ln=='en')
                    {
                      ?>
                      <h5 class="mlText"><?= $e_title ?>  [<?= $date ?>]</h5>
                      <p class="mlText"><?= $e_description ?></p>
                      <?php
                    }
                    else
                    {
                      ?>
                      <h5 class="mlText ml-dyuthi"><?= $title ?>  [<?= $date ?>]</h5>
                      <p class="mlText mlText"><?= $description ?></p>
                      <?php
                    }
                    ?>

                  </div>

                  <div class="col-2 text-center full d-inline-flex justify-content-center align-items-center">

                    <div class="circle font-weight-bold"><?= $i ?></div>

                  </div>

                </div>





                <!--path between 2-3-->

                <div class="row timeline">

                <div class="col-2">

                  <div class="corner right-bottom"></div>

                </div>

                <div class="col-8">

                  <hr/>

                </div>

                <div class="col-2">

                  <div class="corner top-left"></div>

                </div>

                </div>





              <?php

              }

            $i=$i+1;

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

