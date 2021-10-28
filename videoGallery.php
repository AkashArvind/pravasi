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
  </style>
    
    <link href="assets/lightbox/dist/lity.css" rel="stylesheet"/> 
    <link href="assets/lightbox/dist/lity.css" rel="stylesheet">
    <!--<script src="assets/lightbox/vendor/jquery.js"></script>-->
    <script src="assets/lightbox/dist/lity.js"></script>

</head>

<body>
  <?php include('includes/header.php'); ?>
  <!-- Header - set the background image for the header in the line below -->
	<?php include('includes/slider.php'); ?>
  <main id="main">

    
    <section style="margin-top: 70px">
    
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php
            if($ln=='en')
            {
              ?>
                <h3 class="wow fadeInUp">1st State Kshethrakala Academy Award distribution – 2017</h3>
                <p class="wow fadeInUp">Kshethrakala academy Award distribution conducted at madayi bank auditorium 14th May 2018 frm 11am and the debt of the kids who completed training in theyyam mukhathezhuth attracted public attention</p>
              <?php
            }
            else
            {
              ?>
                <h3 class="mlText wow fadeInUp">പ്രഥമ സംസ്ഥാനക്ഷേത്രകലാ അക്കാദമിഅവാര്‍ഡ് വിതരണം - 2017</h3>
                <p class="mlText wow fadeInUp">2018 മെയ് 14 ന് തിങ്കളാഴ്ച രാവിലെ 11 മണി മുതല്‍ മാടായി ബാങ്ക് ഓഡിറ്റോറിയത്തില്‍ വെച്ച്  നടന്ന  ക്ഷേത്രകലാ  അവാര്‍ഡ്    വിതരണവും;  തെയ്യം മുഖത്തഴുത്ത്,  ചെണ്ട,  ഓട്ടന്‍തുള്ളല്‍  എന്നീ  ഹ്രസ്വകാല  കോഴ്സുകളില്‍  വിജയകരമായി  പരിശീലനം  പൂര്‍ത്തിയാക്കിയ  കുട്ടികളുടെ അരങ്ങേറ്റവും പൊതുസമൂഹത്തിന്‍റെ മുക്തകണ്ഠം പ്രശംസ പിടിച്ചുപറ്റി</p>
              <?php
            }
            ?>

          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a href="https://youtu.be/dJyDDOcu9JA" data-lity>
              <img src="img/video/2.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>

          <div class="col-md-4">
            <a href="https://youtu.be/TnraE_pcKWM" data-lity>
              <img src="img/video/3.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="https://youtu.be/vp4KEcGkGNs" data-lity>
              <img src="img/video/1.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>
        </div>
      </div>

    </section>

    <section style="margin-top: 50px">
    
      <div class="container">
        <div class="row">
          <div class="col-md-12">

            <?php
            if($ln=='en')
            {
              ?>
              <?php
            }
            else
            {
              ?>
              <?php
            }
            ?>


            <?php
            if($ln=='en')
            {
              ?>
              <h3 class="wow fadeInUp">Shilpi-Shilpam 2017</h3>
              <p class="wow fadeInUp">Kshethrakala Academy organized a workshop named shipi shilpam and adjoined workshop on theyyam mukathezhuth from 19th December 2017 at kunhimagalam village renamed as sculpture village.</p>
              <?php
            }
            else
            {
              ?>
              <h3 class="mlText wow fadeInUp">ശില്‍പ്പി- ശില്‍പ്പം- 2017</h3>
              <p class="mlText wow fadeInUp">ശില്‍പ്പഗ്രാമമെന്ന പേര്‍കൊണ്ട കണ്ണൂര്‍ജില്ലയിലെ കുഞ്ഞിമംഗലത്ത് 2017 ഡിസംബര്‍  പത്താന്‍പത് മുതല്‍ ഇരുപത്തിനാല് വരെ  'ശില്പ്പി-ശില്‍പ്പം -2017' എന്നപേരില്‍ ക്ഷേത്രകലാഅക്കാദമി തെന്നിന്ത്യന്‍ ദാരുലോഹ ശിലാ ശില്‍പ്പശാലയും  അനുബന്ധമായി  തെയ്യം മുഖത്തഴുത്ത് ശില്‍പ്പശാലയും സംഘടിപ്പിച്ചു.</p>
              <?php
            }
            ?>

          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a href="https://youtu.be/WQ5hLlWt0tc" data-lity>
              <img src="img/video/shilpishilpam_1.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="https://youtu.be/7AThShrk5FE" data-lity>
              <img src="img/video/shilpishilpam_2.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>

          <div class="col-md-4">
            <a href="https://youtu.be/SDsY79cMfjY" data-lity>
              <img src="img/video/shilpishilpam_3.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>

        </div>
      </div>

    </section>


    <section style="margin-top: 50px">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php
            if($ln=='en')
            {
              ?>
              <h3 class="mlText wow fadeInUp">Hridhyam Vadhyam</h3>
              <p class="mlText wow fadeInUp">Conducted a south Indian percussion instrument workshop ‘Hridyam Vadhyam’ At Cheruthazham Raghavapuram (Hanumarambalam) on 8th, 9th  December 2017 successfully.</p>
              <?php
            }
            else
            {
              ?>
              <h3 class="mlText wow fadeInUp">ഹൃദ്യം വാദ്യം 2017</h3>
              <p class="mlText wow fadeInUp">2017 ഡിസംബര്‍ 8,9 തീയ്യതികളിലായി 'ഹൃദ്യം വാദ്യം-2017' എന്നപേരില്‍ ചെറുതാഴം രാഘവപുരം(ഹനുമാരമ്പലം) ക്ഷേത്രത്തില്‍വെച്ച് തെന്നിന്ത്യന്‍ ക്ഷേത്രവാദ്യക്കളരി വളരെ  വിജകരമായി സംഘടിപ്പിക്കുകയുായി</p>
              <?php
            }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a href="https://youtu.be/ChrGkTEHsvo" data-lity>
              <img src="img/video/hv1.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="https://youtu.be/GqUaVNR1K_w" data-lity>
              <img src="img/video/hv2.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>

          <div class="col-md-4">
            <a href="https://youtu.be/w9Rwf7NjAI4" data-lity>
              <img src="img/video/hv31.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="https://youtu.be/Wii44EHqV-w" data-lity>
              <img src="img/video/hv32.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>

          <div class="col-md-4">
            <a href="https://youtu.be/aTC5Su8mYYQ" data-lity>
              <img src="img/video/hv33.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>
          
          <div class="col-md-4">
            <a href="https://youtu.be/kthb1aiO0tA" data-lity>
              <img src="img/video/hv34.jpg" class="img-fluid wow fadeInUp" style="border:8px ridge #b2714d;margin-bottom: 10px">
            </a>
          </div>

          

        </div>
      </div>

    </section>




    <div id="inline" style="background:#fff" class="lity-hide">
        
    </div>

    <script>
    // Open a URL in a lightbox
    //var lightbox = lity('//www.youtube.co');
    // Bind as an event handler
    $(document).on('click', '[data-lightbox]', lity);
    </script>



   



  </main>

  <?php include('includes/footer.php'); ?>
  <?php include('includes/backtotop.php'); ?>
  <?php include('includes/js.php'); ?>
  <?php include('includes/main.php'); ?>
</body>

</html>

