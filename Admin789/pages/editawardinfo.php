<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include_once('../include/connection/db_connect.php');  
if(isset($_GET['id']))
{
    $id=base64_decode(urldecode($_GET['id']));
    $table_name="boarddirectorawards";
    $table_name2="boardofdirectors";
    $sql="select boardofdirectors.name,boardofdirectors.position,boarddirectorawards.filename,boarddirectorawards.directorid,boarddirectorawards.title,boarddirectorawards.description from ".$table_name." inner join ".$table_name2." on boardofdirectors.id=boarddirectorawards.directorid where boarddirectorawards.id='".$id."'";
    $q=mysql_query($sql);
    if($row=mysql_fetch_array($q))
    {
      $filename =$row['filename'];
      $name=$row['name'];
      $title=$row['title'];
      $description=$row['description'];
      $position=$row['position'];
      $directorid=urlencode(base64_encode($row['directorid']));
      $dataorg="../../assets/images/boarddirectorawards/".$filename;
      
      
    
     
    }
}
else
{
 header('Location:manageawards.php?board='.$directorid);
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
            <h4>Edit Details of Award :
               <?php
                $info = pathinfo($filename);
                if ($info["extension"] == "pdf")
                {?>
                  <a href="../../assets/images/boarddirectorawards/<?= $filename ?>" target="_blank" class="text-center btn ntn-success btn-xs"><?=$filename?></a>
                 <?php
                }
                else
                {?>
                    <a href="<?= $dataorg?>" style="text-decoration: none;" data-title="<?=$filename?>" class="text-center btn ntn-success btn-xs" data-lightbox="images"><?=$filename?></a>
                  <?php

                }
                ?>
             
              <span style="float:right"><a href="manageawards.php?board=<?=$directorid?>" class="btn btn-info btn-sm">Back</a></span></h4>
            <form action="php/operation.php" method="post">
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
                        <td>Board Director Name</td>
                        <td colspan="4">
                          <input type="text" class="form-control input-sm" name="name" required="required" value="<?=$name?>" disabled>
                          <input type="hidden" name="id" value="<?=$id?>">
                          <input type="hidden" name="board" value="<?=$directorid?>">
                        </td>
                    </tr>
                    
                    <tr>
                      <td>Board Director Position</td>
                        <td colspan="4">
                         <input type="text" class="form-control input-sm" name="name" required="required" value="<?=$position?>" disabled>
                        
                        </td>
                        
                    </tr>
                    <tr>
                      <td>Title</td>
                       <td colspan="4">
                         <input type="text" class="form-control input-sm" name="title" required="required" value="<?=$title?>">
                        </td>
                      
                    </tr>
                    <tr>
                      <td>Description</td>
                       <td colspan="4">
                        <textarea class="form-control input-sm" name="description" required="required"><?=$description?></textarea>
                         
                        </td>
                      
                    </tr>
                    <tr>  
                        <td colspan="4">
                          <button type="submit" name="addinfoawards" class="btn btn-info btn-sm">Submit</button> 
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