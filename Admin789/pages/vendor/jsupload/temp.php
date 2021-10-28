<?php
ob_start();
session_start();
require_once("../include/connection/config.php");
require_once("../class/tblOp.php");
foreach($_GET as $loc=>$item)
{
  $_GET[$loc] = urldecode(base64_decode($item));
}
$path = dirname($_SERVER['PHP_SELF']);
$position = strrpos($path,'/') + 1;
$curentFolder = substr($path,$position);
$mainSectionUrlvalue =  $curentFolder;
$objurl= new tblOp("custom_url");
$objclient= new tblop('tbl_client');
$objph= new tblop("client_ph");
$objabt= new tblop("tbl_about");
$getdata= $objurl->getRowByid("url_key = '$mainSectionUrlvalue'");
if($getdata)
{  
  foreach($getdata as $data){
    $client_id=$data['client_id'];

  }
}
  $fname="";
  $lname="";
  $address="";
  $mail="";
  $about="";
  $instagram="";
  $facebook="";
  $twitter="";
  $linkdin="";
$getdetails= $objabt->getRowByid("client_id = '$client_id'");
if($getdetails){
  foreach($getdetails as $row){
    $fname=$row['fname'];
    $lname=$row['lname'];
    $address=$row['address'];
    $mail=$row['mail'];
    $about=$row['about'];
    $instagram=$row['instagram'];
    $facebook=$row['facebook'];
    $twitter=$row['twitter'];
    $linkdin=$row['linkdin'];
  }
}
$getdataph= $objph->getRowByid("client_id = '$client_id'");
foreach($getdataph as $dataph){
    $profileph=$dataph['profileph'];
    if($profileph==""){
      $prophoto="../admin/client/images/user.png";

    }else
    $prophoto="../admin/client/images/".$profileph;
}
function getPlanId($client_id)
{
  $objclient = new tblOp("tbl_client");

  $getclient =$objclient->  getAll("client_id='$client_id'");
  if($getclient)
  {
    foreach($getclient as $client)
    {
      $clientplanid=$client['planId'];
    }
  }
  return $clientplanid;
}
function hasProfileWebsite($userid)
{
  $objplan= new tblOp("tbl_plan");
  $objclient= new tblOp("tbl_client");

  $clientplanid = getPlanId($userid);

  $getplan = $objplan->  getAll("planid='$clientplanid'");
  if($getplan)
  {
    foreach($getplan as $plan)
    {
      $webpage=$plan['webpage'];
      if($webpage==1)
      {
        return true;
      }
      else
      {
        
        //check in add on
        $getclient = $objclient->  getAll("client_id='$userid'");
      if($getclient)
      {
        foreach($getclient as $addon)
        {
          $addon=$addon['pw'];
          if($addon==1)
          {
            return true;
          }
          else
          {
            return false;
          }
          }
      }

      }
    }
  }
}
function hasYoutubeVideoGallery($userid)
{

  $objplan= new tblOp("tbl_plan");
  $objclient= new tblOp("tbl_client");

  $clientplanid = getPlanId($userid);

  $getplan = $objplan->  getAll("planid='$clientplanid'");
  if($getplan)
  {
    foreach($getplan as $plan)
    {
      $youtubevideo=$plan['youtubevideo'];
      if($youtubevideo==1)
      {
        return true;
      }
      else
      {
        
        //check in add on
        $getclient = $objclient->  getAll("client_id='$userid'");
      if($getclient)
      {
        foreach($getclient as $addon)
        {
          $addon=$addon['yvg'];
          if($addon==1)
          {
            return true;
          }
          else
          {
            return false;
          }
          }
      }

      } 
    }
  } 
}
$plan_check_client_id=$client_id;
if(hasProfileWebsite($plan_check_client_id)){
?>
    <!DOCTYPE html>
    <html lang="en">

      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Photography</title>

        <!-- Bootstrap core CSS -->
        <link href="../pvt_template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="../pvt_template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../pvt_template/vendor/devicons/css/devicons.min.css" rel="stylesheet">
        <link href="../pvt_template/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../pvt_template/css/resume.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>       
        <script src="../pvt_template/gallery/images-grid.js"></script>
        <link rel="stylesheet" href="../pvt_template/gallery/images-grid.css">


      </head>

      <body id="page-top">
        <?php
        $objinterest= new tblOp("tbl_color");
        $getData =$objinterest->getRowByid("client_id=$client_id");
        if($getData)
        { foreach ($getData as $value) {
          $colorcode=$value['colorCode'];
        }
        }
          
        else{
          $colorcode="#bd5d38";
        }
        
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top"  style="background-color:<?=$colorcode?> !important" id="sideNav">
          <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Start Bootstrap</span>
            <span class="d-none d-lg-block">
              <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="<?=$prophoto?>" alt="">
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#experience">Experience</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#vgallery">Video Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#skills">Skills</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#interests">Interests</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#awards">Awards</a>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid p-0">

          <section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
            <div class="my-auto">
              <h1 class="mb-0"><?=$fname?>
                <span class="text-primary" style="color:<?=$colorcode?>!important"><?=$lname?></span>
              </h1>
              <div class="subheading mb-5"><?=$address?>·
                <a href="<?=$mail?>" style="text-transform: lowercase;color:<?=$colorcode?>!important "><?=$mail?></a>
              </div>
              <p class="mb-5"><?=$about?></p>
              <ul class="list-inline list-social-icons mb-0">
                <style>
                  .list-inline-item a:hover{
                    color:<?=$colorcode?>;
                  }
                </style>
                <li class="list-inline-item">
                  <a  href="<?=$facebook?>">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="<?=$twitter?>">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="<?=$linkdin?>">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="<?=$instagram?>">
                    <span class="fa-stack fa-lg">
                      <i class="fa fa-circle fa-stack-2x"></i>
                      <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </li>
              </ul>
            </div>
          </section>

          <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="experience">
            <div class="my-auto">
              <h2 class="mb-5">Experience</h2>
              <?php
              $objexp= new tblOp("tbl_experiene");
              $getData =$objexp->getAll("client_id=$client_id");
              if($getData){
                foreach($getData as $getal){
                 $id=$getal['id'];
                 $designation=$getal['designation'];
                 $note=$getal['brief_note'];
                 $company=$getal['company'];
                 $fromdate = $getal['from_date'];
                 $fromdate = date('F, Y', strtotime($fromdate));
                 $todate   = $getal['to_date'];
                 if($todate!=''){
                    $todate = date('F, Y', strtotime($todate));
                 }else{$todate="present";}
              ?>
                  <div class="resume-item d-flex flex-column flex-md-row mb-5">
                    <div class="resume-content mr-auto">
                      <h3 class="mb-0"><?=$designation?></h3>
                      <div class="subheading mb-3"><?=$company?></div>
                      <p><?=$note?></p>
                    </div>
                    <div class="resume-date text-md-right">
                      <span class="text-primary" style="color:<?=$colorcode?>!important"><?=$fromdate?> - <?=$todate?></span>
                    </div>
                  </div>
              <?php
                  }
              }   
              ?>

            </div>

          </section>

          <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="gallery">
            <div class="my-auto">
              <h2 class="mb-5">Gallery</h2>
               
            <style type="text/css">
              .imgs-grid-modal
              {
                background-color: <?php echo '#'.''.str_replace('#','',$colorcode); ?>;
              }
            </style>
            <div id="galleryview" class="galleryviewarea"></div>

            <script>
               /* $(function() {

                    $('#galleryview').imagesGrid({
                        images: [
                            'https://unsplash.it/660/440?image=875',
                    'https://unsplash.it/660/990?image=874',
                    'https://unsplash.it/660/440?image=872',
                    'https://unsplash.it/750/500?image=868',
                    'https://unsplash.it/660/990?image=839',
                    'https://unsplash.it/660/455?image=838'
                        ],
                        align: true,
                        getViewAllText: function(imgsCount) { return 'View all' }
                    });

                });*/

                $(function() {

                    $('#galleryview').imagesGrid({
                        images: [
                        <?php
                        $objgallery=new tblop("gallery");
                        $getgallery=$objgallery->getAll("client_id='$client_id'","id desc");
                        if($getgallery)
                        {
                        $count=0;
                        foreach($getgallery as $data)
                        {
                        ?>
                            '../admin/client/images/<?=$client_id?>/gallery/<?=$data['imagename']?>',
                        <?php
                          $count++;
                          }
                        }
                        ?>    
                        ],
                        align: true,
                        getViewAllText: function(imgsCount) { return 'View all' }
                    });

                });

            </script>

            </div>
          </section>
          <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="vgallery">
            <div class="my-auto">
              <h2 class="mb-5">Video Gallery</h2>
              <div class="row">
                <?php
                 $plan_check_client_id=$client_id;
                 if(hasYoutubeVideoGallery($plan_check_client_id)){    
                  $i=1;
                  $objvideo=new tblop("tbl_video");
                  $getgallery=$objvideo->getAll("client_id='$client_id'","id desc");
                  if($getgallery)
                  {
                    foreach($getgallery as $data)
                    {
                      ?>
                      <div class="col-md-12 " style="margin-bottom: 2%">
                        <div class="embed-responsive embed-responsive-21by9">
                          <iframe class="embed-responsive-item" src="<?=$data['videoLink']?>" allowfullscreen></iframe>
                        </div>
                      </div>
                      <?php
                      $i++;
                      if($i > 2){
                        ?>
                        <a id="newcu" data-toggle="modal" data-target="#create" href="">View all</a>
                        <?php
                         break;
                      }
                      
                    }
                  }
                }
                
                ?>
                <!-- model -->
                <div class="modal fade" id="create"  role="dialog" aria-labelledby="eLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title text-logo-color">Video Gallery of <h4 class="mb-0"><?=$fname?>
                <span class="text-primary" style="color:<?=$colorcode?>!important"><?=$lname?></span>
              </h4> </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body ">
                          
                          <div class="row">
                            <?php
                            $limit=1;
                            foreach($getgallery as $data){
                            ?>
                            <div class="col-md-12 " style="margin-bottom: 2%">
                                <div class="embed-responsive embed-responsive-21by9">
                                    <iframe class="embed-responsive-item" src="<?=$data['videoLink']?>" allowfullscreen></iframe>
                                </div>
                            </div>
                          
                            <?php
                             $limit++;
                             if($limit>10){
                              break;
                             }
                            }
                             ?>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <!-- end of  create album-->
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <!-- end of model.... -->
              </div>
               </div>
          </section>
          <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="skills">
            <div class="my-auto">
              <h2 class="mb-5">Skills</h2>
              <div class="subheading mb-3">Workflow</div>
              <ul class="fa-ul mb-0">
                <?php
                $objskills= new tblOp("tbl_skills");
                $getData =$objskills->getAll("client_id=$client_id");
                  if($getData)
                  {
                    foreach($getData as $getal){
                     $id=$getal['id'];
                     $work=$getal['workflow'];
                     ?>
                     <li>
                        <i class="fa-li fa fa-check"></i>
                        <?= $work?></li>
                     <?php
                    }
                  }
                ?>
              </ul>
            </div>
          </section>

          <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="interests">
            <div class="my-auto">
              <h2 class="mb-5">Interests</h2>
              <!--<p>Apart from being a web developer, I enjoy most of my time being outdoors. In the winter, I am an avid skiier and novice ice climber. During the warmer months here in Colorado, I enjoy mountain biking, free climbing, and kayaking.</p>
              <p class="mb-0">When forced indoors, I follow a number of sci-fi and fantasy genre movies and television shows, I am an aspiring chef, and I spend a large amount of my free time exploring the latest technolgy advancements in the front-end web development world.</p>-->
              <?php
              $objinterest= new tblOp("tbl_interest");
              $getData =$objinterest->getRowByid("client_id=$client_id");
              if($getData)
              { foreach ($getData as $value) {
                    $interest=$value['content'];
                }
              }
              else{
                $interest="";
              }
              ?>
              <p><?=$interest?></p>
            </div>
          </section>

          <section class="resume-section p-3 p-lg-5 d-flex flex-column" id="awards">
            <div class="my-auto">
              <h2 class="mb-5">Awards &amp; Certifications</h2>
              <ul class="fa-ul mb-0">
                <?php
                 $objawards= new tblOp("tbl_awards");
                 $getData =$objawards->getAll("client_id=$client_id");
                 if($getData)
                  {
                    foreach($getData as $getal){
                      ?>
                      <li>
                         <i class="fa-li fa fa-trophy text-warning"></i>
                          <?=$getal['awards']?></li>
                      <?php
                    }
                  }
                ?>
                
              </ul>
            </div>
          </section>

        </div>

        <!-- Bootstrap core JavaScript -->
        
        <script src="../pvt_template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="../pvt_template/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="../pvt_template/js/resume.min.js"></script>
     
     
      
      </body>

      </body>

    </html>
<?php
}
else
{
  ?>
  <h3>
    <center style="">You dont enabled this add-on pack<br>To add this pack please contact customer care</center>
  </h3>
  <?php
}
?> 
