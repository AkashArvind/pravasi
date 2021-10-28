<?php

session_start();

$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];

include_once("connection/conection.php");



$path = dirname($_SERVER['PHP_SELF']);





if(!isset($_GET['data']))

{

  header('Location:index.php');

}



$blogId=$_GET['data'];



$table_nme = 'blog';   

$result="SELECT * FROM $table_nme WHERE id=$blogId AND status=1";

$q1=mysqli_query($db,$result);

if (mysqli_num_rows($q1) == 0) 

{



} 

else 

{

  if($r = mysqli_fetch_array($q1)) 

  { 

    $title=$r["title"];

    $catagory=$r["catagory"];

    $author=$r["author"];

    $date=$r["date"];

    $image1=$r["image1"];

    $image1desc=$r["image1desc"];

    $image1title=$r["image1title"];

    $videolink=$r["videolink"];

    $videotitle=$r["videotitle"];

    $image2=$r["image2"];

    $image2desc=$r["image2desc"];

    $image2title=$r["image2title"];

    $blogid=$r["id"];



    $table_nme11 = "blogcontent";

    $result11="SELECT content FROM $table_nme11 WHERE blog_id = $blogid";

    $q111=mysqli_query($db,$result11);

    if(mysqli_num_rows($q111) == 0) 

    {

       

    } 

    else 

    {

        if($r11 = mysqli_fetch_array($q111)) 

        {

          $blogdescription=$r11["content"];

        }

    }

  }

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <?php include('includes/head.php'); ?>

   <style type="text/css">

    .card-footer

    {

      background-color: #b91c20;

      color: black;

    }

    .card

    {

      border-color: #b91c20 !important;

    }

    .card-title

    {

      font-size: 20px;

      color: #b91c20;

    }

    .cardDesc

    {

      font-weight: 100;

    }

    .btitle

    {

      font-size: 30px;

      color: #b91c20;

    }

    .img1Text

    {

      border-bottom-left-radius: calc(.25rem - 1px);

      border-bottom-right-radius: calc(.25rem - 1px);

      width:100%;

      padding:10px 10px 10px 10px;

      background-color: #e08989;

    }

    .videoframe

    {

      border-bottom-left-radius: calc(.25rem - 1px);

      border-bottom-right-radius: calc(.25rem - 1px);

      border-top-left-radius: calc(.25rem - 1px);

      border-top-right-radius: calc(.25rem - 1px);

    }

    .justifyText 

    {

      word-break: break-all;

      text-align: justify;

    }

  </style>

</head>

<body>



  <div id="fb-root"></div>

  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=1732591393688925"></script>



  <?php include('includes/header.php'); ?>

  <?php include('includes/slider.php'); ?>
	
  <main id="main">





    <!-- Page Content -->

  <div class="container">



    <div class="row">



      <!-- Post Content Column -->

      <div class="col-lg-12">



        <!-- Title -->

        <h1 class="mt-4 mlText btitle"><?= $title ?></h1>



        <!-- Author -->

        <p class="lead">

          By

          <a  class="mlText"><?= $author ?></a> | Posted on <?= $date ?>

        </p>

        <hr>





         <!--<div class="embed-responsive embed-responsive-16by9 videoframe">

          <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>

        </div>

        <hr>-->





        <?php

        if($image1!=''||$image1!=null)

        {

          if(file_exists('assets/images/blog/'.$image1))

          {

            ?>

            <img class="card-img-top" src="assets/images/blog/<?=$image1?>">

            <?php

          }

        }

        ?>



        <?php

        if($image1desc!=""||$image1desc!=null)

        {

        ?>

        <div class="img1Text mlText">

          <p style="margin: 0px"><?= $image1desc ?></p>

        </div>

        <?php

        }

        ?>



        <hr>

        <!-- Post Content -->

        <div id="content" class="mlText justifyText">

            <?= $blogdescription ?>

        </div>

       

        <?php

        if($image2!=''||$image2!=null)

        {

          if(file_exists('assets/images/blog/'.$image2))

          {

            ?>

            <hr>

            <img class="card-img-top" src="assets/images/blog/<?=$image2?>">

            <?php

          }

        }

        ?>



        <?php

        if($image2desc!=""||$image2desc!=null)

        {

        ?>

        <div class="img1Text mlText">

          <p style="margin: 0px"><?= $image2desc ?></p>

        </div>

        <?php

        }

        ?>

        <hr>

        <?php

        $Img1path='http://localhost/'.$path.'/assets/images/blog/'.$image1;

        $Sharepath='http://localhost/'.$path.'/blogView.php?data='.$blogId;

        ?>

        <!--<div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>-->



      </div>



      



    </div>

    <!-- /.row -->



  </div>

  <!-- /.container -->





























   



  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

