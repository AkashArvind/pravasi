<?php
session_start();
ob_start();
include_once('../include/connection/functions_log.php');
if (login_check()) 
{ 
include_once('../include/connection/db_connect.php');  
if(isset($_GET['event']))
{
    $table_nme="events";
    $id=base64_decode(urldecode($_GET['event']));
    $result="SELECT title,discription,link,place,date,image FROM $table_nme WHERE  event_id = $id;";
    $q1=mysql_query($result);
    if($r=mysql_fetch_array($q1))
    {
      $title = $r['title'];
      $description = $r['discription'];
      $link = $r['link'];
    
      $place = $r['place'];
      $edate = $r['date'];
      $year=date('Y',strtotime($edate));
      $month=date('m',strtotime($edate));
      $day=date('d',strtotime($edate));
      $ndate=$day."/".$month."/".$year;
       $photo=$r['image'];
      if($photo=="") 
      {
        $dataorg="../../assets/images/news/dummy.png";
      } 
      else
      {
         $dataorg="../../assets/images/events/".$photo;
      }
     
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
            <h4>Edit Details of  Event : <?=$title." [ "?> 
               
                    <a href="<?= $dataorg?>" style="text-decoration: none;" data-title="<?=$photo?>" class="text-center btn ntn-success btn-xs" data-lightbox="images">ചിത്രം</a>
                 <?=" ]"?>
                <span style="float:right"><a href="event.php" class="btn btn-info btn-sm">Back</a></span></h4>
            <hr>
                  
                          
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
                                      <td>ശീർഷകം</td>
                                      <td colspan="3">
                                         <div class="form-group">
                                          <input type="text" class="form-control input-sm" name="title" placeholder="Event title"required="required" value="<?=$title?>">
                                         </div>
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>ഇവന്റ് തീയതി</td>
                                      <td colspan="3">
                                        <div class='input-group date' id='datepicker'>
               
                                          <input type='text' class="form-control"  name="edate" required placeholder="Enter Event date" value="<?=$ndate?>" />
                                          <span class="input-group-addon">
                                              <span class="glyphicon glyphicon-calendar"></span>
                                        </div>
                            
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>ഇവന്റ് സ്ഥലം</td>
                                      <td colspan="3">
                                          <div class="form-group">
                                             <input type="text" name="place" class="form-control" id="alplace"  placeholder="Enter the place" value="<?=$place?>">
                                          </div>
                                  
                                  <tr>
                                    <td>വിവരണം</td>
                                      <td colspan="3">
                                      <textarea class="form-control input-sm" name="description" required="required"><?=$description?></textarea>
                                      </td> 
                                  </tr>
                                  <tr>
                                    <td>Link</td>
                                      <td colspan="3">
                                      <input type="url" class="form-control input-sm" name="link" value="<?=$link?>">
                                      </td>
                                      
                                  </tr>
                                  <tr>
                                    <td>ചിത്രം</td>
                                      <td colspan="3">
                                      <input type="file" class="form-control input-sm" id="file" name="Image_up" >
                                      </td>
                                      
                                  </tr>
                                  
                                <tr>
                                    
                                    <td colspan="4">
                                      <button type="submit" name="event" value="<?php echo $id;?>" class="btn btn-info btn-sm">Submit</button> 
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