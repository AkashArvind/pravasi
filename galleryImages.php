<?php
session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");

if(!isset($_GET['galId']))

{

  header('Location: gallery.php');

}

else

{

  $galId=$_GET['galId'];

  $table_nme = 'gallerysubcategory';

  $result="SELECT * FROM $table_nme WHERE id='$galId'";

  $q1=mysqli_query($db,$result);

  if (mysqli_num_rows($q1) == 0) 

  {

    header('Location: gallery.php');

  } 

  else 

  {

      if ($r = mysqli_fetch_array($q1)) 

      {

        $name=$r["name"];

        $e_name=$r["e_name"];

        $description=$r["description"];

        $e_description=$r["e_description"];

        $coverimage=$r["coverimage"];

        $coverimage='assets/images/gallery/'.$coverimage;

      }

  }   

}

if(!file_exists($coverimage))

{

  $bannerImg='';

}

else

{

  $bannerImg=$coverimage;

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

      background-image: url('<?= $bannerImg ?>');

    }

  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <!-- Header - set the background image for the header in the line below -->

  <?php include('includes/slider.php'); ?>

  <main id="main" style="margin-top: 50px">



    <div class="container">

      <div class="main">

        <header class="clearfix">
          <div class="row">
            <div class="col-md-12">

              <?php
              if($ln=='en')
              {
                ?>
                <h1 class="wow fadeInUp" data-wow-delay="0.2s"><?= $e_name ?></h1>
                <?php
              }
              else
              {
                ?>
                <h1 class="wow fadeInUp ml-dyuthi" data-wow-delay="0.2s"><?= $name ?></h1>
                <?php
              }
              ?>


            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              
              <?php
              if($ln=='en')
              {
                ?>
                <p class="wow fadeInUp" data-wow-delay="0.3s" style="font-size: 18px;text-align: justify;margin-bottom: 0px">
              <?= $e_description ?></p>
                <?php
              }
              else
              {
                ?>
                <p class="wow fadeInUp ml-dyuthi" data-wow-delay="0.3s" style="font-size: 18px;text-align: justify;margin-bottom: 0px">
              <?= $description ?></p>
                <?php
              }
              ?>

              



            </div>
          </div>
        <hr>

        </header>

        
        <div class="gamma-container gamma-loading" id="gamma-container">

          <ul class="gamma-gallery">

            <?php

            $table_nme = 'gallery';   

            $result="SELECT * FROM $table_nme WHERE subcategoryid=".$galId." ORDER BY id ASC";

            $q1=mysqli_query($db,$result);

            if (mysqli_num_rows($q1) == 0) 

            {

                echo "<h3 class='text-warning text-center'>No Item Found..!</h3>";

            } 

            else 

            {

                while ($r = mysqli_fetch_array($q1)) 

                {

                  $title=$r["title"];

                  $subcategoryid=$r["subcategoryid"];

                  $description=$r["description"];

                  $imagename=$r["imagename"];

                  $date=$r['date'];

                  $time=$r['time'];

                  $id=$r['id'];

                  $dataorg="assets/images/gallery/".$imagename;

                  ?>

                  <li class="wow fadeInUp">

                    <div data-alt="" data-description="<h3><?= $title ?></h3>" data-max-width="1800" data-max-height="1350">

                      <div data-src="<?= $dataorg ?>" data-min-width="1300"></div>

                      <div data-src="<?= $dataorg ?>" data-min-width="1000"></div>

                      <div data-src="<?= $dataorg ?>" data-min-width="700"></div>

                      <div data-src="<?= $dataorg ?>" data-min-width="300"></div>

                      <div data-src="<?= $dataorg ?>" data-min-width="200"></div>

                      <div data-src="<?= $dataorg ?>" data-min-width="140"></div>

                      <div data-src="<?= $dataorg ?>"></div>

                      <noscript>

                        <img src="<?= $dataorg ?>">

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



      </div><!--/main-->

    </div>





  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

  <!--  gallery -->

  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>-->

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

