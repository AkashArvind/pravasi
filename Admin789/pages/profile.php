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
          <h3 align="center">Password</h3>
          <hr>
          
          <?php
          if(isset($_GET['msg']))
          {
            ?>
            <div class="alert alert-warning"> 
              <a href="#" class="close" data-dismiss="alert">&times;</a> 
              <strong>error!  </strong> <?=$_GET['msg']?>
            </div>
            <?php
          }
          ?>
          <form action="php/loginedit.php" method="post">
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
                    <td>Oldpassword</td>
                    <td colspan="3">
                        <input type="password" class="form-control input-sm" name="oldpassword" required="required">
                    </td>
                  </tr>
                  <tr>
                      <td>Newpassword</td>
                      <td colspan="3">
                        <input type="password" class="form-control input-sm" name="newpassword" required="required">
                      </td>
                
                  </tr>
                  <tr>
                      <td>Retype-Newpassword</td>
                      <td colspan="3">
                        <input type="password" class="form-control input-sm" name="retypepassword" required="required">
                      </td>
                
                  </tr>
                 <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="text-right">
                        <button type="submit" name="login"  class="btn btn-calander btn-sm">Submit</button>
                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                    </td>
                 </tr>
            
                </table>
              </div>
            </form>
          
       </div>      
    </div>
      <!-- end of content-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
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
  </div>
</body>
<script>
    $(document).ready(function() {
      $('#example').DataTable({
        "order":[[0,'desc']]
      });
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