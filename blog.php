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

  .blogContent
  {
    max-height: 1050px;
    overflow: auto;
  }

  .blogContent::-webkit-scrollbar { width: 0 !important }

  </style>

  <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">-->

  <!-- font-family: 'Open Sans Condensed', sans-serif; -->

</head>

<body>

  <div id="fb-root"></div>

  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.3&appId=1732591393688925"></script>



  

  <?php include('includes/header.php'); ?>



  <?php include('includes/slider.php'); ?> 
  
	<!--<header class="py-5 bg-image-full baner">

	    <h1>Our Blog</h1>

	</header>-->

  <main id="main">

    



   

    <!-- Page Content -->

  <div class="container">



    <div class="row" style="margin-top: 60px">



      <!-- Blog Entries Column -->

      <div class="col-md-8 blogContent">

        <br>

        

        <?php

        $num_rec_per_page=4;

        if (isset($_GET["page"]))

        {

          $page  = $_GET["page"];

        } 

        else 

        {

          $page=1;

        }; 

        $start_from = ($page-1) * $num_rec_per_page; 









        $table_nme = 'blog';   

        $result="SELECT * FROM $table_nme WHERE status=1  ORDER BY id ASC LIMIT $start_from, $num_rec_per_page;";

        $q1=mysqli_query($db,$result);

        if (mysqli_num_rows($q1) == 0) 

        {

           

        } 

        else 

        {

            while ($r = mysqli_fetch_array($q1)) 

            { 

              $title=$r["title"];

              $author=$r["author"];

              $date=$r["date"];

              $image1=$r["image1"];

              $blogid=$r["id"];

              $image1=$r["image1"];



              $table_nme11 = "blogcontent";

              $result11="SELECT content FROM $table_nme11 WHERE blog_id = $blogid";

              $q111=mysqli_query($db,$result11);

              if (mysqli_num_rows($q111) == 0) 

              {

                 

              } 

              else 

              {

                  while ($r11 = mysqli_fetch_array($q111)) 

                  { 

                    $blogdescription=$r11["content"];

                    $blogdescription=strip_tags($blogdescription);



                    $charLenghth=strlen($blogdescription);

                    

                    

                    if($charLenghth>250)

                    {

                      $i=250;

                      while($i<$charLenghth)

                      {

                        if($blogdescription[$i]==' ')

                        {

                          $blogdescription = substr($blogdescription,0, $i);

                          break;

                        }

                        $i=$i+1;

                      }

                    }

                    

                  }

              }

              ?>

                <!-- Blog Post -->

                <div class="card mb-4">

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

                  <div class="card-body">

                    <h3 class="card-title mlText" style=""><?= $title ?></h3>

                    <p class="cardDesc mlText"><?= $blogdescription ?></p>

                    <a href="blogView.php?data=<?= $blogid ?>" class="btn btn-primary">Read More &rarr;</a>

                  </div>

                  <div class="card-footer">

                    Posted on <?= $date ?>, 

                    <a class="mlText" style="color: white"> By <?= $author ?></a>

                  </div>

                </div>

              <?php

            }

          }

        ?>

        <?php

        $table='blog';   

        $sql = "SELECT * FROM $table WHERE status=1 ORDER BY id ASC;"; 

        $rs_result = mysqli_query($db,$sql); //run the query

        $total_records = mysqli_num_rows($rs_result);  //count number of records

        $total_pages = ceil($total_records / $num_rec_per_page);   

        ?>

            <nav aria-label="...">

              <ul class="pagination pagination-sm">

              <?php

              for ($i=1; $i<=$total_pages; $i++) 

              {

                if($page==$i)

                {

                  ?>

                  <li class="page-item active" aria-current="page">

                    <span class="page-link">

                      1

                      <span class="sr-only">(current)</span>

                    </span>

                  </li>

                  <?php

                }

                else

                {

                  ?>

                  <li class="page-item"><a class="page-link" href="blog.php?page=<?= $i ?>"><?= $i ?></a></li>

                  <?php

                }

              }

              ?>

              </ul>

            </nav>
	      <?php



	      ?>
      </div>



      <!-- Sidebar Widgets Column -->

      <div class="col-md-4">



        <!-- Search Widget -->

        <div class="card my-4">

          <h5 class="card-header">Search</h5>

          <div class="card-body">

            <div class="input-group">

              <input type="text" class="form-control" placeholder="Search for...">

              <span class="input-group-btn">

                <button class="btn btn-secondary" type="button">Go!</button>

              </span>

            </div>

          </div>

        </div>



        



        <!-- Side Widget -->

        <div class="card my-4">

          <h5 class="card-header">Facebook Page</h5>

          <div class="card-body">

            <div class="fb-page" data-href="https://www.facebook.com/kshethrakalaakademi/" data-tabs="timeline" data-width="" data-height="800" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/kshethrakalaakademi/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/kshethrakalaakademi/">Kshethrakala Akademi</a></blockquote></div>

          </div>

        </div>



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

