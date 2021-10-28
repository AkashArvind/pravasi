<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include('../include/connection/db_connect.php');
if(isset($_GET['event']))
{
    $eventid=base64_decode(urldecode($_GET['event']));
    $table_name="events";
    $sql="select title,date,discription,place from ".$table_name." where event_id='".$eventid."'";
    $q=mysql_query($sql);
    if($row=mysql_fetch_array($q))
    {
      $title =$row['title'];
      $date = $row['date'];
      $year=date('Y',strtotime($date));
      $month=date('m',strtotime($date));
      $day=date('d',strtotime($date));
      $ndate=$day."/".$month."/".$year;
      $place=$row['place'];
    }
}
else
{
 header('Location:event.php');
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
            <h2>Upload More Images of Event<span style="float:right"><a href="event.php" class="btn btn-info btn-sm">Back</a></span></h2>
             <hr>                                                                
            <div class="card-header">
                <i class="fa fa-table"></i> Upload More Images of Event Title: <?=$title." ,Date : ".$ndate?></div>
                <div class="card-body"></div>

            <div class="col-md-12">

             
            <!--   create galley-->              
              <form action="php/add.php" method="post" enctype="multipart/form-data">
                  <div class="form-row"> 
                    <input type="hidden" name="id" value="<?=$eventid?>">
                    <input type="file" class="form-control col-md-3" name="newupload[]" required  multiple=""/>&nbsp;
                     <button type="submit" name="uploadeventphotos" class="btn btn-info">Upload Multiple Images</button>
                  </div>
                  <label class="text-muted">Alowed File Type : jpg/jpeg/png</label>

                </form>
               
             <hr>
          </div> 
            <?php
            if(isset($_GET['msg'])){
              ?>
              <div class="alert alert-success"> 
                <a href="#" class="close" data-dismiss="alert">&times;</a> 
                 <?=$_GET['msg']?>
              </div>
              <?php
            }?>
            <!-- end of   create galley-->
          <div class="col-md-12 " id="details"> 
           
                <form action="php/delete.inc.php" method="post" name="checkboxFormPhotos" id="checkboxFormPhotos" onsubmit="return confirm('Delete selected photos?');">
                <input type="hidden" name="enid" value="<?=$_GET['event']?>"> 
                <div class="col-md-12">
                  <a  style="margin-top: 10px;"class="btn  btn-sm btn-info"><input type="checkbox" id="checkAll" title="Check all"  onchange="selectall()"><label  style="margin-bottom:0px;color:white;" for="checkAll">Select all</label></a>
                  <input style="margin-top: 10px" type="submit" class="btn  btn-sm btn-danger" name="eventphotoddel"value="Delete photo" id="photobtn" disabled="disabled">
                  <br><br>
                </div>
                  <?php
                  if(isset($_GLOBALS['message']))
                  {
                    echo '<h3 class="text-warning">'.$_GLOBALS['message'].'</h3>';
                  }
                  ?>
                  <?php 
                    
                    $num_rec_per_page=10;
                    
                    $table_nme = 'eventphotos';      
                   
                    
                    $result="SELECT id,filename FROM $table_nme WHERE eventid='$eventid'";
                    $q1=mysql_query($result);

                    
                    if (mysql_num_rows($q1) == 0) 
                    {
                        echo "<br><h3 class='text-warning text-center'>No Item Found..!</h3>";
                    } 
                    else 
                    {
                        $i = 0;

                    
                  ?>
                    <div class="table-responsive ">
                      <table class="table table-striped" id="example" cellspacing="0" width="100%">
                          <thead>
                              <tr>
                                  <th>Id</th>
                                  <th>File Name</th>
                                  <th>Image</th>
                                  <!--th>Info</th-->
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          while ($r = mysql_fetch_array($q1)) 
                          {
                            $i = $i + 1;  
                            $imagename=$r["filename"];
                           
                            $id=$r['id']; 
                            $dataorg="../../assets/images/events/".$imagename;
                                                
                           ?>   
                           <tr>
                              <td>
                                <input type="checkbox" class="" value="<?=$id?>" name="photo<?=$i?>">
                                <?=$i?>
                                  
                                </td>
                              <td><?=$imagename?></td>
                              <td>
                              
                                
                                   <a href="<?= $dataorg?>" data-lightbox="images" data-title="<?=$imagename?>" class="text-center btn ntn-success btn-xs" >View</a>
                                  
                               
                              </td>
                              <!--td>
                                <?php
                                /*if($r['title']==""&&$r['description']=="")
                                {?>
                                  <a  class="btn ntn-success btn-xs" href="add_eventinfo.php?id=<?=urlencode(base64_encode($id))?>">Add</a>
                                  
                               
                                <?php

                                }
                                else
                                {?>
                                <a  class="btn ntn-success btn-xs" href="editeventinfo.php?id=<?=urlencode(base64_encode($id))?>">Edit/View</a>
                                 <?php
                                }*/
                                ?>
                              </td-->
                             
                           </tr>
                        <?php
                        }
                  ?>
                       
                        
                        
                      
                      
                      
                        </tr>
                      </tbody>                     
                     </table>
                   </div>
                  <?php
                  }
                  ?>
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