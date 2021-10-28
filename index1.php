<?php

session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>
  <script src="lib/jquery/jquery.min.js"></script>
  <?php include('includes/head.php'); ?>

  <style type="text/css">

    .admission

    {

      margin-top: 20px;

      margin-bottom: 20px;

    }

    .homAdmImg

    {

      margin-top: 10px;

      border-radius: 8px 8px 8px 8px;

      transition: all 0.5s;

    }

    .homAdmImg:hover

    {

      -webkit-box-shadow: 1px 3px 9px 0px rgba(0,0,0,0.75);

      -moz-box-shadow: 1px 3px 9px 0px rgba(0,0,0,0.75);

      box-shadow: 1px 3px 9px 0px rgba(0,0,0,0.75);

    }

    .parallax

    {

      background-image: url("img/parelexbgKsethrakala.jpeg");

      min-height: 300px; 

      background-attachment: fixed;

      background-position: center;

      background-repeat: no-repeat;

      background-size: cover;

      margin: 0;

      border-bottom: 8px solid #c0282c;

      border-top:  8px solid #c0282c;

      color: white;

    }

    @media only screen and (max-device-width: 1024px) 

    {

      .parallax

      {

        background-attachment: scroll;

      }

    }

    .parallax p

    {

      margin-bottom: 10px;

    }

    .paralexContent

    {

      margin-top: 32px;

      margin-bottom: 32px;

    }



    /*********************************************************/

    .event

    {

      margin-top: 60px;

      padding-left: 10px;

      padding-right: 10px;

    }

    

    /*.event .eventItem

    {

      min-height: 50px;

      border: 5px #007bff double;

      margin-bottom: 10px;

      transition: all 0.5s;

      padding-top: 10px;

    }*/



    .event .eventItem

    {

      min-height: 50px;

      border: 5px #9d5b36 solid;

      border-radius: 11px 11px 11px 11px;

      -moz-border-radius: 11px 11px 11px 11px;

      -webkit-border-radius: 11px 11px 11px 11px;

      margin-bottom: 10px;

      padding-top: 10px;

      transition: all 0.5s;

      -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.75);

      -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.75);

      box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.75);

      background-color: #b2714d;

      color: white;

    }



    .event .eventItem:hover

    {

      border: 5px #c0282c solid;

    }

    .eventItem h4

    {

      font-size: 20px;

      font-weight: 100;

      margin-bottom: 2px;

    }

    .eventItem p

    {

      font-size: 15px;

      font-weight: 100;

      margin-bottom: 10px;

      margin-top: 8px;

      text-align: justify;

    }

    .eventItem .date

    {

      font-size: 12px;

      font-weight: 100;

      margin-bottom: 10px;

      padding: 2px 5px 2px 5px;

      background-color: #abeae7;

      color: black;

    }

    .event .readMore

    {

      text-align: right;

      margin-bottom: 0px;

      color: black !important;

    }

    .bgRepeated

    {

      background-image: url("img/border.jpg");

      background-repeat: repeat-x;

      padding-top:20px;

      background-position: center; 

      width: 100%;

      border-top: 10px #c0282c solid;

      border-bottom: 10px #c0282c solid;

    }

    .bgRepeatedTop

    {

      background-image: url("img/border.jpg");

      background-repeat: repeat-x;

      padding-top:20px;

      background-position: center; 

      width: 100%;

      border-top: 10px #c0282c solid;

    }

    .bgRepeatedBottom

    {

      background-image: url("img/border.jpg");

      background-repeat: repeat-x;

      padding-top:20px;

      background-position: center; 

      width: 100%;

      border-bottom: 10px #c0282c solid;

    }

    .readMoreNews

    {

      color: black;

    }

    .readMoreNews:hover

    {

      color: #a12020;

    }

  </style>

  <script type="text/javascript">

    var right=document.getElementById('rightdiv').style.height;

    var left=document.getElementById('leftdiv').style.height;

    if(left>right)

    {

        document.getElementById('rightdiv').style.min-height;left;

    }

    else

    {

        document.getElementById('leftdiv').style.min-height;right;

    }

  </script>









</head>

<body>

  <div id="fb-root"></div>

  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=1732591393688925"></script>

  <?php include('includes/header.php'); ?>

  <section id="intro" class="clearfix">

    <div class="container">

      <div class="intro-img">

        <img src="img/logoR.png" alt="" class="img-fluid img-responsive" style="border-radius: 36px 36px 36px 36px;

-moz-border-radius: 36px 36px 36px 36px;

-webkit-border-radius: 36px 36px 36px 36px;

border: 0px solid #000000;">

      </div>

      <div class="intro-info">

        <h2 style="font-family: 'Roboto', sans-serif;">KSHETHRAKALA AKADEMI<br><span>MALABAR DEVASWOM BOARD</span></h2>

        <div>

          <a href="#about" class="btn-home1 scrollto">About Us</a>

          <a href="about.php" class="btn-services scrollto">Our Profile</a>

        </div>

      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">



    <section id="about">

      <div class="container">

        <header class="section-header">

          <h3 class="wow fadeInUp" data-wow-delay="0.3s">About Us</h3>

          <div class="typewriter">

            <p class="wow fadeInUp" data-wow-delay="0.3s"><b>Kshetrakala Akademi</b> was formed as a cultural and educational institution formed under the the leadership of <b>Malabar Devaswom Board of Kerala Devaswom</b>.</p>

          </div>

        </header>



        <div class="row about-container">



          <div class="col-lg-6 content order-lg-1 order-2">

            <p align="justify" class="wow fadeInUp" data-wow-delay="0.2s">

             The primary objective of <b>Kshetrakala Akademi</b> is to encourage. the temple art forms, propagate and popularize them and to renovate the temple art forms which are in a vanishing stage from the cultural scenario.  The method for these activities were planned to be in an effective method by providing training and development of temple arts, collecting, organizing and protecting valuable cultural treasures of temples arts, give opportunity for the artistes and public to perform and appreciate the different variety of temple art forms, giving aid to the suffering artistes, recognizing the skilled artistes, conducting cultural events for the young generation to introduce these art forms and so on.  

            </p>



            <div class="icon-box wow fadeInUp">

              <div class="icon"><i class="fa fa-arrow-circle-o-up"></i></div>

              <h4 class="title"><a href="">Our Milestone</a></h4>

              <p class="description">Kshetrakala Akademi was formed officially in 2013 but the full functionalities were channelized in 2016.</p>

            </div>



            <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">

              <div class="icon"><i class="fa fa-building-o"></i></div>

              <h4 class="title"><a href="">Headquarters</a></h4>

              <p class="description">The headquarters of Kshetrakala Academy is at the premises of the renowned Sree Thiruvarkat temple, Madayi where fragrance of myth and history waves all around. </p>

            </div>

          </div>



          <div class="col-lg-6  order-lg-2 order-1 wow fadeInUp" data-wow-delay="0.3s">

            <img src="img/kshethrakala_home.jpg" class="img-fluid" alt="" style="border-radius: 35px 0px 35px 0px;border: 10px solid #c0282c;">

            <div class="row admission">

              <div class="col-md-6 wow fadeInUp">

                <img src="img/admission.jpg" class="img-fluid homAdmImg">

              </div>

              <div class="col-md-6 wow fadeInUp">

                <img src="img/enquiry.jpg" class="img-fluid homAdmImg">

              </div>

            </div>

          </div>

          

        </div>

      </div>

    </section><!-- #about -->



  <div class="bgRepeatedTop"></div>



    <section>

        <div class="parallax">

          <div class="container">

            <div class="row">

              <div class="col-md-12 paralexContent">

                <h2>Courses, Workshops and Events</h2>

                <p>Khetrakala academy has been conducting many courses, workshops and events related to temple art forms.</p>

                <p>More than 45 campaigns on temple arts have been conducted in public education system. to make the young generation aware of the rich  temple art culture of Kerala. </p>

                <a href="courses.php" class="btn-home3">Know More</a>

              </div>

            </div>

          </div>

        </div>

    </section>



    

    <div class="bgRepeatedBottom"></div>



    <section class="event">





      <div class="container">



        <div class="row">

        <div class="col-md-12" style="padding-left: 0px">

          <header class="section-header">

            <h3 class="wow fadeInUp" data-wow-delay="0.3s" style="border-bottom: 5px solid #a40c0c;padding-bottom: 8px;">Events</h3>

          <div class="typewriter">

          </div>

        </header>

        </div>

      </div>



        <div class="row">

          <div class="col-md-8" id="leftdiv">

            

            <?php

            $table_nme = 'events';   

            $result="SELECT * FROM $table_nme ORDER BY event_id ASC LIMIT 3";

            $q1=mysqli_query($db,$result);

            if (mysqli_num_rows($q1) == 0) 

            {

               

            } 

            else 

            {

                while ($r = mysqli_fetch_array($q1)) 

                { 

                  $title=$r["title"];

                  $date=$r["date"];

                  $discription=$r["discription"];

                  $discription=substr($discription,0,100);

                  $place=$r['place'];

                  $event_id=$r['event_id'];

                  ?>



                  <div class="row eventItem wow fadeInUp" data-wow-delay="0.2s">

                    <div class="col-md-12">

                      <h4><?= $title ?></h4>

                      <span class="date">On <?= $date ?></span> <span class="date">@ <?= $place ?></span>

                      <p><?= $discription ?><a href="eventMore.php?event=<?= $title ?>&Eid=<?= $event_id ?>" class="readMoreNews"> Read More...</a></p>

                    </div>

                  </div>



                  <?php

                }

            }

            ?>

            <p class="readMore"><a href="events.php">Read More >></a></p>



          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s" id="leftdiv" >

            <div class="fb-page" data-href="https://www.facebook.com/kshethrakalaakademi/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kshethrakalaakademi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kshethrakalaakademi/">Kshethrakala Akademi</a></blockquote></div>

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

