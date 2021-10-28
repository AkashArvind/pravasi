<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include_once('../include/connection/db_connect.php');
if(isset($_GET['artist']))
{
   $artistid=base64_decode(urldecode($_GET['artist']));
   $table_name="artists";
    $sql="select name,workexperience,qualification,image,profiledescription,facebookid,websiteid from ".$table_name." where id='".$artistid."'";
    $q=mysql_query($sql);
    if($row=mysql_fetch_array($q))
    {
      $name =$row['name'];
      $profiledescription=$row['profiledescription'];
      $facebookid=$row['facebookid'];
      $websiteid=$row['websiteid'];
      $workexperience=$row['workexperience'];
      $qualification = $row['qualification'];
      $photo=$row['image'];
      $dataorg="../../assets/images/artists/".$photo;
     
    }
}
else
{
 header('Location:artistprofiles.php');
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
            <h4>Edit Details of  Artist : <?=$name." ["?>
            <a href="<?= $dataorg?>" style="text-decoration: none;" data-title="<?=$photo?>" class="text-center btn ntn-success" data-lightbox="images">View Photo</a><?="]"?>
            <span style="float:right"><a href="artistprofiles.php" class="btn btn-info btn-sm">Back</a></span></h4>
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
                        <td>Name</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="name" required="required" value="<?=$name?>">
                          <input type="hidden" name="id" value="<?=$artistid?>">
                        </td>
                    </tr>
                    
                    <tr>
                      <td>Qualifications</td>
                        <td colspan="3">
                        <input type="text" class="form-control input-sm" name="qualification" value="<?=$qualification?>" required>
                        </td>
                        
                    </tr>
                    <tr>
                      <td>Work Experiences</td>
                        <td colspan="3">
                        <textarea name="workexperience" class="form-control input-sm" required><?=$workexperience?></textarea>                        
                        </td>
                        
                    </tr>
                    <tr>
                      <td>Profile Description</td>
                        <td colspan="3">
                        <textarea class="form-control input-sm" name="profiledescription" id="profiledescription" required="required"><?=$profiledescription?></textarea>
                        </td> 
                    </tr>
                    <tr>
                      <td>Photo</td>
                       <td colspan="3">
                       <input type="hidden" class="form-control input-sm" name="oldphoto" value="<?=$photo?>">
                       <input type="file" class="form-control input-sm" id="photo" name="photo" accept="image/*" >
                        <label class="text-muted">Alowed File Type : jpg/jpeg/png</label>
                        </td>
                      
                    </tr>
                     <tr>
                      <td>Facebook Id</td>
                        <td colspan="3">
                        <input type="text" class="form-control input-sm" name="fbid" value="<?=$facebookid?>">
                        </td>
                    </tr>
                     <tr>
                      <td>Website Id</td>
                        <td colspan="3">
                        <input type="text" class="form-control input-sm" name="webid" value="<?=$websiteid?>">
                        </td>
                    </tr>
                    <tr>  
                        <td colspan="4">
                          <button type="submit" name="editartist" class="btn btn-info btn-sm" >Submit</button> 
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
<script src="vendor/ckeditor/ckeditor.js"></script>
  </div>
</body>

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
     <script>
 // Replace the <textarea id="editor1"> with a CKEditor
 // instance, using default configuration.
 CKEDITOR.replace('profiledescription' );


</script>
</html>
<?php
}
else 
{
    header("Location:../adminLog/index.php");
}
?>