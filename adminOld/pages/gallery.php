<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include('../include/connection/db_connect.php');  
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
            <h2>Gallery</h2>
            <hr>
          <a href="" class="btn btn-info btn-sm text-right" href="#" data-toggle="modal" data-target="#addnewcategory" style="float:right">Add New Category</a><br><br>
          <div class="modal fade" id="addnewcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4  class="modal-title" id="exampleModalLabel">Add New Category</h4>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form action="php/add.php" method="post">
                    <div class="form-row">
                     <label for="Name" class="col-sm-4">Category</label>
                      <div class="col-sm-8">
                       <input type="text" name="category" required class="form-control">
                              
                    </div>
                  </div>                 
                  
                   
                
                  
                 
                  <div class="modal-footer">
                    <button class="btn btn-info" type="submit" name="addgallerycategory">Submit</button>
                  
                  </div>
                  </form>
                </div>
              </div>
            </div>
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
          <div class="col-md-12 " id="details"> 
            
                <form action="php/delete.inc.php" method="post" name="checkboxFormPhotos" id="checkboxFormPhotos" onsubmit="return confirm('Delete selected items?');"> 
                <div class="col-md-12">
                  <a  style="margin-top: 10px;"class="btn  btn-sm btn-info"><input type="checkbox" id="checkAll" title="Check all"  onchange="selectall()"><label  style="margin-bottom:0px;color:white;" for="checkAll">Select all</label></a>
                  <input style="margin-top: 10px" type="submit" class="btn  btn-sm btn-danger" name="gallerytypedel"value="Delete item" id="photobtn" disabled="disabled">
                  <br><br>
                </div>
                  <?php
                  if(isset($_GLOBALS['message']))
                  {
                    echo '<h3 class="text-warning">'.$_GLOBALS['message'].'</h3>';
                  }
                 
                 
                    
                    $num_rec_per_page=10;
                    
                    $table_nme ='gallerycategory';      
                    $arr=array();
                    
                    $result="SELECT id,category FROM $table_nme ORDER BY id DESC ";
                    $q1=mysql_query($result);

                    
                    if (mysql_num_rows($q1) == 0) 
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
                                 
                                  <th>Category</th>
                                  <th>Manage</th>
                                  <th>Edit</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php
                          while ($r = mysql_fetch_array($q1)) 
                          {
                             
                             $i = $i + 1;  
                             $type=$r["category"];
                             $id=$r['id']; 
                             
                                                
                           ?>   
                           <tr>
                              <td>
                                <input type="checkbox" class="" value="<?=$id?>" name="photo<?=$i?>">
                                <?=$i?>
                                  
                              </td>
                              
                              <td><?=$type?></td>
                              
                              
                              
                              <td>
                                
                                  <a  class="btn ntn-success btn-xs" href="managegallery.php?id=<?=urlencode(base64_encode($id))?>">Gallery</a>
                                  
                               
                              </td>
                             <td>
                              <a href="editcategory.php?id=<?=urlencode(base64_encode($id))?>" ><span class="icon fa fa-edit fa-2x"></span></a>
                          </td>
                             
                           </tr>
                        <?php
                        }
                  ?>
                       
                        
                        
                      
                      
                      
                       
                      </tbody>                     
                     </table>
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