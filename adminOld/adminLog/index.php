<?php
ob_start();
session_start();
//include("../phpfiles/include.php");

require_once("../include/connection/functions_log.php");
if (login_check()) 
{ 
  header("Location:../pages/index.php");
}
$salt ='photos1234567890';
function simple_encrypt($text)
{
    global $salt;
    return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}
if (isset($_POST['log_user_nme'], $_POST['log_password'])) 
{
  include_once('../include/connection/process.php');
  $user_nme= $_POST['log_user_nme'];
  $password = $_POST['log_password']; // The hashed password.
  $password = simple_encrypt($password);
  checkTime($user_nme,$password);
}
?>
<html> 
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin login</title>
    <!-- Bootstrap core CSS-->
    <link href="../bootstrap-4.0.0/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
      body
      {
        background-color: #ffff;
      }
      .inputStyle
      {
        border-radius: 36px 36px 36px 36px;
        -moz-border-radius: 36px 36px 36px 36px;
        -webkit-border-radius: 36px 36px 36px 36px;
        border: 1px solid #a13995;
        color: #b62790 !important;
      }
      .login{
        margin-top: 8%;
        background-color:#ffff;
        color: white;
        padding: 20px;
      }
      .card{
       background-color:#99ccff;
      }
      form{
         margin-top:5%;
        margin-left: 10%;
        margin-right: 10%;
      }
      .button {
      
      background: rgba(243,122,36,1);
      background: -moz-linear-gradient(left, rgba(243,122,36,1) 0%, rgba(225,29,94,1) 44%, rgba(142,63,152,1) 100%);
      background: -webkit-gradient(left top, right top, color-stop(0%, rgba(243,122,36,1)), color-stop(44%, rgba(225,29,94,1)), color-stop(100%, rgba(142,63,152,1)));
      background: -webkit-linear-gradient(left, rgba(243,122,36,1) 0%, rgba(225,29,94,1) 44%, rgba(142,63,152,1) 100%);
      background: -o-linear-gradient(left, rgba(243,122,36,1) 0%, rgba(225,29,94,1) 44%, rgba(142,63,152,1) 100%);
      background: -ms-linear-gradient(left, rgba(243,122,36,1) 0%, rgba(225,29,94,1) 44%, rgba(142,63,152,1) 100%);
      background: linear-gradient(to right, rgba(243,122,36,1) 0%, rgba(225,29,94,1) 44%, rgba(142,63,152,1) 100%);
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f37a24', endColorstr='#8e3f98', GradientType=1 );

      border-radius: 36px 36px 36px 36px;
      -moz-border-radius: 36px 36px 36px 36px;
      -webkit-border-radius: 36px 36px 36px 36px;
      border: 0px solid #000000;



        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
    }
    .c1
    {
      color: #455aa9;
    }
    .c2
    {
      color: #5e4da1;
    }
    .c3
    {
      color: #983e98;
    }
    .c4
    {
      color: #c42185;
    }
    .c5
    {
      color: #e71d57;
    }
    .c6
    {
      color: #ed322f;
    }
    .c7
    {
      color: #f27627;
    }
    .c8
    {
      color: #fbaf40;
    }
    .c9
    {
      color: #fdcf68;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 login">  
          <div class="text-center">
            <h4 class="card-title">
              <span class="c1">L</span>
              <span class="c1">o</span>
              <span class="c1">g</span>
              <span class="c2">i</span>
              <span class="c2">n</span>
              <span>&nbsp;</span>
              <span class="c2">t</span>
              <span class="c3">o</span>
              <span>&nbsp;</span>
              <span class="c3">a</span>
              <span class="c3">c</span>
              <span class="c4">c</span>
              <span class="c4">e</span>
              <span class="c4">s</span>
              <span class="c5">s</span>
              <span>&nbsp;</span> 
              <span class="c5">y</span>
              <span class="c5">o</span>
              <span class="c6">u</span>
              <span class="c6">r</span>
              <span>&nbsp;</span>
              <span class="c6">a</span>
              <span class="c7">c</span>
              <span class="c7">c</span>
              <span class="c7">o</span>
              <span class="c8">u</span>
              <span class="c8">n</span>
              <span class="c9">t</span>
            </h4>
          </div>  
          <form method="post" action="#">
            <div class="form-group">
               <label for="username">Username</label>
               <input type="text" name="log_user_nme" class="form-control inputStyle" id="username"  placeholder="Enter username">
            </div>
            <div class="form-group">
               <label for="Password">Password</label>
               <input type="password"  name="log_password" class="form-control inputStyle" id="Password" placeholder="Password">
            </div>
            <br>
            <div class="text-center">
              <button type="submit" name="submit" class="button">Login</button>
            </div>
          </form>
      </div>  
    </div>
    


  </body>
</html>