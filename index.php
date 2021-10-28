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
    .lng
    {
      background-color: red; /* Green */
      border: none;
      color: white;
      padding: 5px 10px 6px 10px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 11px;
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

  <link href="https://fonts.googleapis.com/css?family=Patua+One&display=swap" rel="stylesheet"> 







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

        <?php
          if($ln=='en')
          {
            ?>
            <div class="intro-info">

              <h2 style="font-family: 'Roboto', sans-serif;">KSHETHRAKALA AKADEMI<br><span>MALABAR DEVASWOM BOARD</span></h2>

              <div>

                <a href="#about" class="btn-home1 scrollto">About Us</a>

                <a href="about.php" class="btn-services scrollto">Our Profile</a>

              </div>

            </div>
            <?php
          }
          else
          {
            ?>
            <div class="intro-info">

              <h2 class="ml-dyuthi"><span style="font-size: 50px">ക്ഷേത്രകലാ അക്കാദമി</span><br><span>മലബാര്‍ ദേവസ്വം ബോർഡ്</span></h2>

              <div>

                <a href="#about" class="btn-home1 scrollto mlText">ഞങ്ങളെക്കുറിച്ച് </a>

                <a href="about.php" class="btn-services scrollto mlText">ഞങ്ങളുടെ പ്രൊഫൈൽ</a>

              </div>

            </div>
            <?php
          }
          ?>

        

    </div>

  </section><!-- #intro -->
<section>
  
  <p class="text-right"  style="border-top: red solid 5px;margin: 0px">
    <!--<button class="lng" onclick="aboutToEng();">English</button>-->
     <!--<button class="lng" onclick="aboutToMal();">View Malayalam Content</button></p>-->

</section>
  <main id="main">


    <script type="text/javascript">
      function aboutToEng() 
      {
        document.getElementById("aboutp1").innerHTML = "<b>Kshetrakala Akademi</b> was formed as a cultural and educational institution formed under the the leadership of <b>Malabar Devaswom Board of Kerala Devaswom</b>.";

        document.getElementById("aboutp1").innerHTML = "<b>Kshetrakala Akademi</b> was formed as a cultural and educational institution formed under the the leadership of <b>Malabar Devaswom Board of Kerala Devaswom</b>.";
      }
       function aboutToMal() 
      {
        document.getElementById("aboutp1").innerHTML = "കേരള ദേവതയുടെ മലബാർ ദേവസ്വം ബോർഡിന്റെ നേതൃത്വത്തിൽ രൂപം നൽകിയ സാംസ്കാരിക - വിദ്യാഭ്യാസ സ്ഥാപനമായി ഉയർന്നു";

        document.getElementById("aboutp1").innerHTML = "കേരള ദേവതയുടെ മലബാർ ദേവസ്വം ബോർഡിന്റെ നേതൃത്വത്തിൽ രൂപം നൽകിയ സാംസ്കാരിക - വിദ്യാഭ്യാസ സ്ഥാപനമായി ഉയർന്നു";
      }
    </script>
    <section id="about">

      <div class="container">


        <?php
          if($ln=='en')
          {
            ?>
            <header class="section-header">
              <h3 class="wow fadeInUp" data-wow-delay="0.3s" id="aboutHead">About Us </h3>
              <div class="typewriter">
                <p class="wow fadeInUp" data-wow-delay="0.3s" id=aboutp1><b>Kshetrakala Akademi</b> was formed as a cultural and educational institution formed under the the leadership of <b>Malabar Devaswom Board of Kerala Devaswom</b>.</p>
              </div>
            </header>
            <?php
          }
          else
          {
            ?>
            <header class="section-header">
              <h3 class="wow fadeInUp ml-dyuthi" data-wow-delay="0.3s" id="aboutHead">ഞങ്ങളെക്കുറിച്ച് </h3>
              <div class="typewriter">
                <p class="wow fadeInUp mlText" data-wow-delay="0.3s" id=aboutp1>കേരള സർക്കാർ ദേവസ്വം വകുപ്പിന്റെ കീഴിൽ, മലബാർ ദേവസ്വം ബോർഡിന്റെ നിയന്ത്രണത്തിനു വിധേയമായി പ്രവർത്തിക്കുന്ന ഒരു കലാ സാംസ്‌കാരിക വിദ്യാഭ്യാസ സ്ഥാപനമാണ് ക്ഷേത്രകല അക്കാദമി.</b></p>
              </div>
            </header>
            <?php
          }
          ?>
        <div class="row about-container">



          <div class="col-lg-6 content order-lg-1 order-2">

            <?php
            if($ln=='en')
            {
              ?>
                <p class="wow fadeInUp" data-wow-delay="0.4s">The primary objective of Kshetrakala Akademi is to encourage. the temple art forms, propagate and popularize them and to renovate the temple art forms which are in a vanishing stage from the cultural scenario. The method for these activities were planned to be in an effective method by providing training and development of temple arts, collecting, organizing and protecting valuable cultural treasures of temples arts, give opportunity for the artistes and public to perform and appreciate the different variety of temple art forms, giving aid to the suffering artistes, recognizing the skilled artistes, conducting cultural events for the young generation to introduce these art forms and so on.<a href="about.php"> Read more</a></p>
              <?php
            }
            else
            {
              ?>
              <p class="wow fadeInUp mlText justifyText" data-wow-delay="0.2s">
               ക്ഷേത്രകലകളുടെ പ്രോത്സാഹനം, പ്രചാരണം, ജനകീയ വൽക്കരണം എന്ന ലക്ഷ്യ സാക്ഷാത്ക്കാരത്തിനായി സമഗ്രമായ പ്രവർത്തനം കൊണ്ട് സജീവമാക്കലാണ് പ്രഥമ ഉദ്ദേശ്യം. നഷ്ടപ്രായമായിക്കൊണ്ടിരിക്കുന്ന ക്ഷേത്ര കലകളിൽ പരിശീലനം നൽകുക, വിദ്യാഭ്യാസ കലാ സാംസ്കാരിക സ്ഥാപനങ്ങളിൽ സോദാഹരണ ക്‌ളാസ്സുകൾ സംഘടിപ്പിക്കുക , ക്ഷേത്ര കലാകാരന്മാർക്കു പുരസ്‌ക്കാരങ്ങൾ നൽകുക, അവശ കലാകാരന്മാരെ സഹായിക്കുക എന്ന് തുടങ്ങി കേരള കലാമണ്ഡലം പോലെ ഒരു കല്പിത സർവകലാശാലയാക്കി ക്ഷേത്രകലാ അക്കാദമിയെ മാറ്റിത്തീർക്കുകയാണ് അക്കാദമിയുടെ പ്രഖ്യാപിത ലക്‌ഷ്യം. അതിനുള്ള പ്രാഥമിക നടപടികൾ അക്കാദമി കൈക്കൊണ്ടു വരികയാണ്. <a href="about.php">കൂടുതൽ അറിയാൻ</a>
              </p>
              <?php
            }
            ?>

            

            <?php
            if($ln=='en')
            {
              ?>
             
              <div class="icon-box wow fadeInUp">

                <div class="icon"><i class="fa fa-arrow-circle-o-up"></i></div>

                <h4 class="title"><a href="">Our Milestone</a></h4>

                <p class="description">
               	Temple Art Training Courses,Hrdhyam Vadyam-2017,Shilpi Shilpam-2017, Kerala State Temple Awards Distribution-2017,Bharathi-2018, Kerala State Temple Awards Distribution-2018, Temple Art Campaign in Educational Institutions, “<b>Kshethrakala</b>” Publication, Vadhyagramam etc.
				</p>

              </div>



              <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">

                <div class="icon"><i class="fa fa-building-o"></i></div>

                <h4 class="title"><a href="">Headquarters</a></h4>

                <p class="description">The headquarters of Kshetrakala Academy is at the premises of the renowned Sree Thiruvarkat temple, Madayi where fragrance of myth and history waves all around. </p>

              </div>

            </div>


              <?php
            }
            else
            {
              ?>
              <div class="icon-box wow fadeInUp">

                  <div class="icon"><i class="fa fa-arrow-circle-o-up"></i></div>

                  <h4 class="title ml-dyuthi"><a href="">ഞങ്ങളുടെ നാഴികക്കല്ല്</a></h4>

                  <p class="description mlText justifyText">ക്ഷേത്രകലാ പരിശീലന  കോഴ്‌സുകൾ  ഹൃദ്യം വാദ്യം-2017, ശിൽപി  ശിൽപം-2017, കേരള സംസ്ഥാന  ക്ഷേത്രകലാ  അവാർഡ്  വിതരണം-2017,  ഭാരതി-2018, കേരള സംസ്ഥാന  ക്ഷേത്രകലാ  അവാർഡ്  വിതരണം-2018,  വിദ്യാഭ്യാസ സ്ഥാപനങ്ങളിലെ ക്ഷേത്രകലാ  പ്രചാരണം, "<b>ക്ഷേത്രകല</b>" പ്രസദ്ധീകരണം, വാദ്യഗ്രാമം.</p>

                </div>



                <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">

                  <div class="icon"><i class="fa fa-building-o"></i></div>

                  <h4 class="title ml-dyuthi"><a href="">മുഖ്യ കാര്യാലയം</a></h4>

                  <p class="description mlText justifyText">ക്ഷേത്ര കലാ അക്കാദമിയുടെ  മുഖ്യ കാര്യാലയം പ്രവര്‍ത്തിക്കുന്നത് ചരിത്രവും ഐതീഹ്യവും ഒത്തു ചേര്‍ന്ന കണ്ണൂര്‍ ജില്ലയിലെ  മഹനീയമായ മാടായിക്കാവ് (തിരുവര്‍ക്കാട്ട് കാവ്)  ൻറെ പരിസരത്തുള്ള കെട്ടിടത്തില്‍ ആണ്.</p>

                </div>

              </div>
              <?php
            }
            ?>


            



          <div class="col-lg-6  order-lg-2 order-1 wow fadeInUp" data-wow-delay="0.3s">

            <img src="img/kshethrakala_home.jpg" class="img-fluid" alt="" style="border-radius: 35px 0px 35px 0px;border: 10px solid #c0282c;">

            <div class="row admission">

              <div class="col-md-6 wow fadeInUp">

                <a href="admission.php">
                  <img src="img/admission.jpg" class="img-fluid homAdmImg">
                </a>

              </div>

              <div class="col-md-6 wow fadeInUp">
                <a href="#" data-toggle="modal" data-target="#myModal">
                  <img src="img/enquiry.jpg" class="img-fluid homAdmImg">
                </a>
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
                <?php
                  if($ln=='en')
                  {
                    ?>
                    <h2>Courses, Workshops and Events</h2>
                    <p>Khetrakala academy has been conducting many courses, workshops and events related to temple art forms.</p>
                    <p>More than 45 campaigns on temple arts have been conducted in public education system. to make the young generation aware of the rich  temple art culture of Kerala. </p>
                    <a href="courses.php" class="btn-home3">Know More</a>
                    <?php
                  }
                  else
                  {
                    ?>
                    <h2 class="ml-dyuthi">കോഴ്‌സുകൾ, വർക്ക്‌ഷോപ്പുകൾ, ഇവന്റുകൾ</h2>
                    <p class="mlText">ക്ഷേത്രകല അക്കാദമിയിൽ ക്ഷേത്ര കലാരൂപങ്ങളുമായി ബന്ധപ്പെട്ട നിരവധി കോഴ്‌സുകൾ, വർക്ക്‌ഷോപ്പുകൾ, ഇവന്റുകൾ എന്നിവ നടത്തിവരുന്നു..</p>
                    <p class="mlText">പുതിയ തലമുറയെ  ക്ഷേത്രകലകളുടെ സമ്പന്നമായ  സംസ്‌കാരത്തെക്കുറിച്ചു  ബോധവാന്മാരാക്കുന്നതിനായി  പൊതു വിദ്യാഭ്യാസ മേഖലയിൽ ക്ഷേത്രകലകളെക്കുറിച്ച് 45 ലധികം കാമ്പയിനുകൾ  നടത്തിയിട്ടുണ്ട്.</p>
                    <a href="courses.php" class="btn-home3 mlText">കൂടുതൽ അറിയൂ </a>
                    <?php
                  }
                ?>
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
            <?php
            if($ln=='en')
            {
              ?>
             <h3 class="wow fadeInUp" data-wow-delay="0.3s" style="border-bottom: 5px solid #a40c0c;padding-bottom: 8px;">Events</h3>
              <?php
            }
            else
            {
              ?>
             <h3 class="wow fadeInUp ml-dyuthi" data-wow-delay="0.3s" style="border-bottom: 5px solid #a40c0c;padding-bottom: 8px;">ഇവന്റുകൾ</h3>
              <?php
            }
            ?>



            

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

                  $e_title=$r["e_title"];

                  $date=$r["date"];

                  $discription=$r["discription"];

                  $discription= stringCut($discription,250);

                  $e_discription=$r["e_discription"];

                  $e_discription= stringCut($e_discription,100);

                  $place=$r['place'];

                  $e_place=$r['e_place'];

                  $event_id=$r['event_id'];

                  ?>


                  <?php
                if($ln=='en')
                {
                  ?>
                  <div class="row eventItem wow fadeInUp" data-wow-delay="0.2s">

                    <div class="col-md-12">

                      <h4><?= $e_title ?></h4>

                      <span class="date">On <?= $date ?></span> <span class="date">@ <?= $e_place ?></span>

                      <p><?= $e_discription ?><a href="eventMore.php?event=<?= $title ?>&Eid=<?= $event_id ?>" class="readMoreNews"> Read More...</a></p>

                    </div>

                  </div>
                  <?php
                }
                else
                {
                  ?>
                  <div class="row eventItem wow fadeInUp" data-wow-delay="0.2s">

                    <div class="col-md-12">

                      <h4 class="mlText"><?= $title ?></h4>

                      <span class="date">On <?= $date ?></span> <span class="date">@ <?= $place ?></span>

                      <p class="mlText"><?= $discription ?><a href="eventMore.php?event=<?= $title ?>&Eid=<?= $event_id ?>" class="readMoreNews"> Read More...</a></p>

                    </div>

                  </div>
                  <?php
                }
                
              }

            }

            ?>

            <p class="wow fadeInUp"><a href="events.php" style="color: #b2714d;font-family: 'Patua One', cursive;">View All Events</a></p>

          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.3s" id="leftdiv" >

            <div class="fb-page" data-href="https://www.facebook.com/kshethrakalaakademi/" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kshethrakalaakademi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kshethrakalaakademi/">Kshethrakala Akademi</a></blockquote></div>

          </div>
        </div>  
      </div>
    </section>
  </main>
  
  



  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="color: white">
  <div class="modal-dialog" role="document">
  <form class="form-horizontal wooden"  action="mail/enquiry.php" method="post">
    <input type="hidden" name="type" value="all">
    <div class="modal-content" style="background-color: #615757">
      <div class="modal-header" id="wooden">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><font color="white">&times;</font></span>
        </button>
      </div>
      <div class="modal-body" id="wooden">
        <h4 style="color: #fff;font-size: 18px" class="text-center">Enquiry For Kshethrakala Academy</h4> 
        <div class="form-group form-group-sm">
          <label class="col-sm-12 control-label" for="formGroupInputSmall">Name<font color="#FF0000" size="1"> *</font></label>
          <div class="col-sm-12">
            <input class="form-control" type="text" id="e_name" name="name" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12 control-label" for="formGroupInputSmall">Address<font color="#FF0000" size="1"></font></label>
          <div class="col-sm-12">
            <textarea class="form-control" rows="3" id="e_address" name="address"></textarea>
          </div>
        </div>
        
        <div class="form-group form-group-sm">
          <label class="col-sm-12 control-label" for="formGroupInputSmall">Phone number<font color="#FF0000" size="1"> *</font></label>
          <div class="col-sm-12">
            <input class="form-control" type="number" id="e_phone" name="phone" required >
          </div>
        </div>
        <div class="form-group form-group-sm">
          <label class="col-sm-12 control-label" for="formGroupInputSmall">Email<font color="#FF0000" size="1"></font></label>
          <div class="col-sm-12">
            <input class="form-control" type="e_email" id="e_email" name="email">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-12 control-label" for="formGroupInputSmall">Preference <font color="#FF0000" size="1"> *</font></label>
            <div class="col-sm-12">   
              <select class="form-control" id="interest" name="pref" required>
                <option value="">Select Your Interest</option>
                <option value=""></option>
                <option value="Others">Others</option>
             </select>   
          </div>
        </div>
      </div>
      <div class="modal-footer" id="wooden">
        <button type="submit" name="enquiry" class="btn btn-default btn_purple" style="width:100%;color: white;background-color: #cc9900" >Send</button>
      </div>
  </div>
  </form>
 </div>
</div>











  <?php include('includes/footer.php'); ?>  

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>
</body>
</html>

