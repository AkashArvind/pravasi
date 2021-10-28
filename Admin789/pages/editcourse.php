<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include_once('../include/connection/db_connect.php');  
if(isset($_GET['course']))
{
    $courseid=base64_decode(urldecode($_GET['course']));
    $table_name="courses";
    $sql="select name,description,image,type,subheading from ".$table_name." where id='".$courseid."'";
    $q=mysql_query($sql);
    if($row=mysql_fetch_array($q))
    {
      $name =$row['name'];
      $subheading=$row['subheading'];
      $description=$row['description'];
      
      $photo=$row['image'];
      $type=$row['type'];
      
      $dataorg="../../assets/images/courses/".$photo;
     
    }
}
else
{
 header('Location:courses.php');
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
            <h4>Edit Course : <?=$name."["
            ?><a href="<?= $dataorg?>" style="text-decoration: none;" data-title="<?=$photo?>" class="text-center btn ntn-success" data-lightbox="images">ചിത്രം</a><?="]"?>
            <span style="float:right"><a href="courses.php" class="btn btn-info btn-sm">Back</a></span></h4>
            <form action="php/operation.php" method="post" enctype="multipart/form-data">
            <div class="table-responsive">
                <table class="table">
                  <tr class="info">
                      <th colspan="4">Edit Details</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>കോഴ്സിന്റെ പേര്</td>
                        <td colspan="3">
                       

                          <input type="text" class="form-control input-sm" name="name" required="required" value="<?=$name?>">
                          <input type="hidden" name="id" value="<?=$courseid?>">
                        </td>
                    </tr>
                     <tr>
                      <td>ഉപ തലക്കെട്ട്</td>
                       <td colspan="3">
                          <textarea name="subheading" rows="" cols="40"  class="form-control input-sm"  required><?=$subheading?></textarea>
                       
                      </td>
                    </tr>
                    
                    <tr>
                      <td>വിഭാഗം</td>
                       <td colspan="3">
                         <input type="text" class="form-control input-sm" name="category" required="required" value="<?=$type?>">
                      </td>
                    </tr>
                    
                    <tr>
                      <td>വിവരണം</td>
                        <td colspan="3">
                        <textarea name="description" rows="7" cols="40"  class="form-control input-sm"  required><?=$description?></textarea>
                        
                        </td>
                        
                    </tr>
                    <tr>
                      <td>ചിത്രം</td>
                       <td colspan="3">
                        <input type="hidden" name="oldphoto" value="<?=$photo?>">
                       <input type="file" class="form-control input-sm" id="photo" name="photo" accept="image/png,image/jpg,image/jpeg">
                       <label class="text-muted">Alowed File Type :png</label>
                        </td>
                      
                    </tr>
                    <tr>  
                        <td colspan="4">
                          <button type="submit" name="editcourse" class="btn btn-info btn-sm">Submit</button> 
                        </td>
                    </tr>
                   
                </table>
            </div>
            </form>
          
          
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
        "order":[[0,'desc']]
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