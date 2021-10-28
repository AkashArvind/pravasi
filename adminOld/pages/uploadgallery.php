<?php

session_start();

ob_start();

include_once('../include/connection/functions_log.php');

if (login_check()) 

{ 

include('../include/connection/db_connect.php');

if(isset($_GET['id']))

{



    $id=base64_decode(urldecode($_GET['id']));

    $table_name1="gallerysubcategory";

    $table_name2="gallery";

    $table_name3="gallerycategory";

    

    $query1="select name,categoryid from ".$table_name1." where id='".$id."'";

    $q1=mysqli_query($db,$query1);

    if($row=mysqli_fetch_array($q1))

    {

       $name=$row['name'];

       $categoryid=$row['categoryid'];

       $rq=mysqli_query("select category from ".$table_name3." where id='".$categoryid."'");

       if($rrq=mysqli_fetch_array($rq))

       {

        $category=$rrq['category'];

        $ctgry="_".$category;

       }

       $enid=urlencode(base64_encode($categoryid));

    }

    

}

else

{

 header('Location:gallery.php');

}    

?>

<!DOCTYPE html>

<html lang="en">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="">

  <meta name="author" content="">

  <title>Admin</title>

<head>

  <?php

    require("include/header.php");

  ?>

</head>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">

  <!-- Navigation-->

  <?php

    require("include/nav.php");

    require_once("../include/server_date.php");

  ?>

  <div class="content-wrapper">

    <div class="container-fluid">

      <!-- Breadcrumbs-->

      <ol class="breadcrumb">

        <li class="breadcrumb-item">

          <a href="#">Dashboard</a>

        </li>

        <li class="breadcrumb-item active">My Dashboard</li>

      </ol>

      <!-- content-->

        <div class="row">

          <div class="col-md-12">

            <h4>Upload Images of <?=$name." [Category : ".$category."]"?><span style="float:right"><a href="managegallery.php?id=<?=$enid?>" class="btn btn-info btn-sm">Back</a></span></h4>

            <hr>

            

           <div class="col-md-12">  

            <!--   create galley-->              

              <form action="php/add.php" method="post" enctype="multipart/form-data">

                  

                   <div class="form-row">

                    <div class="col-md-4">

                      <input type="hidden" name="id" value="<?=$id?>">

                      <input type="hidden" name="name" value="<?=$name?>">

                      <input type="hidden" name="category" value="<?=$category?>">

                       <input type="file" class="form-control input-sm" name="newupload[]" accept="image/jpeg,image/png" required="required" multiple="">

                       

                       <label class="text-muted">Alowed Image Type : jpg/jpeg/png</label>

                    </div>

                    <div class="col-md-2">

                      <button type="submit" name="uploadgallery" class="btn btn-info btn-md">Submit</button> 

                    </div>

                     

                   </div> 

                  

                 

                 

              </form>

                

             

             </div>

             <hr>

          </div> 

           

          <div class="col-md-12 " id="details"> 

            <?php

            if(isset($_GET['msg'])){

              ?>

              <div class="alert alert-success"> 

                <a href="#" class="close" data-dismiss="alert">&times;</a> 

                 <?=$_GET['msg']?>

              </div>

              <?php

            }?>

                

                    <form action="php/delete.inc.php" method="post" name="checkboxFormPhotos" id="checkboxFormPhotos" onsubmit="return confirm('Delete selected items?');"> 

                      <div class="col-md-12">

                        <a  style="margin-top: 10px;"class="btn  btn-sm btn-info"><input type="checkbox" id="checkAll" title="Check all"  onchange="selectall()"><label  style="margin-bottom:0px;color:white;" for="checkAll">Select all</label></a>

                        <input style="margin-top: 10px" type="submit" class="btn  btn-sm btn-danger" name="photodel"value="Delete photo" id="photobtn" disabled="disabled">

                        <br><br>

                        <input type="hidden" name="enid" value="<?=$_GET['id']?>">

                        

                      </div>

                      <?php

                      if(isset($_GLOBALS['message']))

                      {

                        echo '<h3 class="text-warning">'.$_GLOBALS['message'].'</h3>';

                      }

                       

                        

                        $num_rec_per_page=10;

                        $query2="select id,title,description,imagename from ".$table_name2." where subcategoryid='".$id."'";

                        $q2=mysqli_query($query2);

                        if(mysqli_num_rows($q2)==0)

                        {

                              echo "<br><h3 class='text-warning text-center'>No Item Found..!</h3>";

                        }

                        else

                        {

                       

                          $i = 0;



                        

                          ?>



                          <table class="table table-striped" id="example" cellspacing="0" width="100%">

                              <thead>

                                  <tr>

                                      <th>&nbsp;</th>

                                     

                                      <th>File Name</th>

                                      <th>View</th>

                                      <th>Info</th>

                                  </tr>

                              </thead>

                              <tbody>

                              <?php

                              while ($r = mysqli_fetch_array($q2)) 

                              {

                                $i = $i + 1;  

                                $imagename=$r["imagename"];

                               

                                $imageid=$r['id']; 

                                $dataorg="../../assets/images/gallery/".$imagename;

                                                    

                               ?>   

                               <tr>

                                  <td>

                                    

                                    <input type="checkbox" class="" value="<?=$imageid?>" name="photo<?=$i?>">

                                    <?=$i?>

                                      

                                  </td>

                                  

                                  <td><?=$imagename?></td>

                                  <td>

                                   <a href="<?= $dataorg?>" data-lightbox="images" data-title="<?=$imagename?>" class="text-center btn ntn-success btn-xs" >View</a>

                                  </td>

                                  

                                  

                                  <td>

                                    

                                   <?php

                                  if($r['title']==""&&$r['description']=="")

                                  {?>

                                    <a  class="btn ntn-success btn-xs" href="add_galleryinfo.php?id=<?=urlencode(base64_encode($imageid))?>">Add</a>

                                    

                                 

                                  <?php



                                  }

                                  else

                                  {?>

                                  <a  class="btn ntn-success btn-xs" href="editgalleryinfo.php?id=<?=urlencode(base64_encode($imageid))?>">Edit/View</a>

                                   <?php

                                  }

                                  ?>

                                      

                                   

                                  </td>

                                 

                               </tr>

                              <?php

                              }

                        }

                         ?>

                    

                          </tbody>                     

                         </table>

                      

                    </form> 

                    

                

              </div>







               </div>

            </div>



      <!-- end of content-->

    </div>

    <!-- container-fluid-->

    <!-- content-wrapper-->

    

    <?php

require("include/footer.php");

?>

    <!-- Bootstrap core JavaScript-->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->

    <script src="vendor/chart.js/Chart.min.js"></script>

    <script src="vendor/datatables/jquery.dataTables.js"></script>

    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->

    <script src="js/sb-admin.min.js"></script>

    <!-- Custom scripts for this page-->

    <script src="js/sb-admin-datatables.min.js"></script>

    <script src="js/sb-admin-charts.min.js"></script>

    <!-- lightbox -->

    <script type="text/javascript" src="vendor/lightbox/js/lightbox.min.js"></script>  

<!-- gallery-->

<script src="vendor/jsupload/exif.js"></script>

<script src="vendor/jsupload/vendor/canvas-to-blob.min.js"></script>

<script src="vendor/jsupload/resize.js"></script>

<script src="vendor/jsupload/appgallery.js"></script>



  </div>

</body>

<script>

    $(document).ready(function() {

      $('#example').DataTable({

       

      });

    });

    </script>

    <script type="text/javascript">

      var chk1 = [];

      getBoxes1();

      function getBoxes1() {

        var form1 = document.getElementById("checkboxFormPhotos");

        var inputs1 = form1.getElementsByTagName("input");

        

        for (var i = 0, len = inputs1.length; i < len; i++) {

          if (inputs1[i].type == "checkbox") chk1.push(inputs1[i]);

        inputs1[i].onclick = checkBoxes;

        }

      }



      function checkBoxes() {

        for (var i = 0, len = chk1.length; i < len; i++) {

          if (chk1[i].checked) {

            document.getElementById("photobtn").disabled = false;   

          return;

        }

        }

        

        document.getElementById("photobtn").disabled = true;

      }

      function selectall(){

        var check=document.getElementById("checkAll");

        var form2 = document.getElementById("checkboxFormPhotos");

        var inputs2 = form2.getElementsByTagName("input");

        if(check.checked){ 

            for (var i = 0, len = inputs2.length; i < len; i++) { 

              if (inputs2[i].type == "checkbox"){

                 inputs2[i].checked = true; 

              }

            }

        }

        else{

            for (var i = 0, len = inputs2.length; i < len; i++) {

              if (inputs2[i].type == "checkbox"){

                 inputs2[i].checked=false;

              }

            }

            document.getElementById("photobtn").disabled = true;

        }

      } 

      

    </script>

</html>

<?php

}

else 

{

    header("Location:../adminLog/index.php");

}

?>