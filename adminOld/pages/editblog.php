<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include_once('../include/connection/db_connect.php');  
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
            <h4>Edit Blog<span style="float:right"><a href="blog.php" class="btn btn-info btn-sm">Back</a></span></h4>
            <?php
            $id=$_GET['blog'];
            $title ="";
            $videolink = "";
            $videotitle="";
            $author = "";
            $date = "";
            $image1title="";
            $image1description="";
            $image2title="";
            $image2description="";
            $statusvalue="";
            $description="";
            $image1="";
            $image2="";
            $sql="select * from blog where id='".$id."'";
            $q=mysql_query($sql);
            if($data=mysql_fetch_array($q)){
              $title =$data['title'];
              $videolink = $data['videolink'];
              $videotitle=$data['videotitle'];
              $author = $data['author'];
              $date = $data['date'];
              $year=date('Y',strtotime($date));
              $month=date('m',strtotime($date));
              $day=date('d',strtotime($date));
              $ndate=$day."/".$month."/".$year;
              $image1title=$data['image1title'];
              $image1description=$data['image1desc'];
              $image2title=$data['image2title'];
              $image2description=$data['image2desc'];
              $statusvalue=$data['status'];
              $image1=$data['image1'];
              $image2=$data['image2'];
            }
            $sql2="select * from blogcontent where blog_id='".$id."'";
            $quer2=mysql_query( $sql2);
            if($data2=mysql_fetch_array($quer2)){

             $description = $data2['content'];
            }
            ?>
            <form action="php/operation.php" method="post" enctype="multipart/form-data">
            <div class="table-responsive">
                <table class="table">
                  <tr class="info">
                      <th colspan="4">Enter Details</th>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="title" required="required" value="<?=$title?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td colspan="3">
                               <div class='input-group date' id='datepicker'>
               
                                  <input type='text' class="form-control"  name="edate" required value="<?=$ndate?>" />
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                               
                        </td>
                    </tr>
                    <tr>
                        <td>Author</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="author" required="required"value="<?=$author?>">
                        </td>
                    </tr>
                    <tr>
                      <td>content</td>
                        <td colspan="3">
                        <textarea class="form-control input-sm" name="description" id="description" required="required"><?=$description?></textarea>
                        </td> 
                    </tr>
                     <tr>
                      <td>Image1</td>
                        <td colspan="3">
                        <input type="file" class="form-control" id="file" name="Image">
                        <?php if($image1!=""){?>
                        <div class="col-sm-2 col-md-2">
                        <img src="../../assets/images/blog/<?=$image1?>" class="img-fluid">
                        </div>
                        <?php }?>
                        </td>                        
                    </tr>
                    <tr>
                        <td>Image1 title</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="image1title" value="<?=$image1title?>">
                        </td>
                    </tr>
                    <tr>
                      <td>image1 description</td>
                        <td colspan="3">
                        <textarea class="form-control input-sm" name="image1description" id="image1description" ><?=$image1description?></textarea>
                        </td> 
                    </tr>
                     <tr>
                      <td>Image2</td>
                        <td colspan="3">
                        <input type="file" class="form-control" id="file" name="Image2">
                        <?php if($image2!=""){?>
                        <div class="col-sm-2 col-md-2">
                        <img src="../../assets/images/blog/<?=$image2?>" class="img-fluid">
                        </div>
                        <?php }?>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>Image2 title</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="image2title" value="<?=$image2title?>">
                        </td>
                    </tr>
                    <tr>
                      <td>image2 description</td>
                        <td colspan="3">
                        <textarea class="form-control input-sm" name="image2description" id="image2description" ><?=$image2description?></textarea>
                      </td> 
                    </tr>
                    <tr>
                        <td>Video  title</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="videotitle" value="<?=$videotitle?>">
                        </td>
                    </tr>
                    <tr>
                        <td>Video  link</td>
                        <td colspan="3">
                          <input type="text" class="form-control input-sm" name="videolink" value="<?=$videolink?>">
                        </td>
                    </tr>
                    <tr>
                      <td>Status</td>
                        <td colspan="3">
                        <select id="statusvalue" name='statusvalue' class='form-control input-sm'>
                          <option value="1">Publish Now</option>
                          <option value="2">Suspend</option>
                        </select>
                        </td>
                        
                    </tr>
                  
                    <tr>  
                        <td colspan="4">
                          <button type="submit" name="blog"  value="<?=$id?>"class="btn btn-info btn-sm">Submit</button> 
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
   
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="vendor/datepicker/bootstrap-datepicker.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
   
    <!-- lightbox -->
    <script type="text/javascript" src="vendor/lightbox/js/lightbox.min.js"></script>  
    <script src="../../bootstrap-datepicker-master/js/bootstrap-datepicker.js"></script>
    <script src="../../bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>

<script src="vendor/ckeditor/ckeditor.js"></script>
  </div>
</body>
<script>
    $(document).ready(function() {
      $('#example').DataTable({
        "order":[[0,'desc']]
      });
    });
    </script>
 <script>
 // Replace the <textarea id="editor1"> with a CKEditor
 // instance, using default configuration.
 CKEDITOR.replace('description' );


</script>
<script type="text/javascript">
    $("#datepicker").datepicker({
        format: "dd/mm/yyyy"
    });
</script>
</html>
<?php
}
else 
{
    header("Location:../adminLog/index.php");
}
?>