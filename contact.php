<?php
session_start();
$_SESSION['sit_visitr_web_'] = $_SERVER['HTTP_USER_AGENT'];
include_once("connection/conection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head.php'); ?>

  <style type="text/css">
  .gmap-wrapper
  {
    margin-top: 23px;
    border: 1px solid #e8e8e8;
    position: relative;
    padding-bottom: 20%;
    height: 0;
    overflow: hidden;
  }
  .gmap-wrapper iframe
  {
    position: absolute;
    top: 0;
    left: 0;
    width: 100% !important;
    height: 100% !important;
  }
  .contact-elements {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border-color: #3e8fa2;
    border-width: 1px;
    outline: none;
    color: #b12519;
}
.btn-contact
{
    background-color: white;
  box-sizing: border-box;
    border-color: #3e8fa2;
    border-width: 1px;
    color: #3e8fa2;
    padding: 8px 35px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-style: solid;
}
.btn-contact:hover
{
  color: white;
  background-color: #3e8fa2;
}	

  </style>
</head>
<body>
  <?php include('includes/header.php'); ?>
  <!-- Header - set the background image for the header in the line below -->
  <main id="main">

    <!-- End Header Area -->
    <div class="gmap-wrapper" id="map"> 
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1160.668688947088!2d75.26168171823353!3d12.03445734557152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba414b19c1f58ab%3A0xd1bbcf11b6923f0d!2sKshethrakala+Acadamy!5e0!3m2!1sen!2sin!4v1559643333713!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
    </div>

    <section class="" style="margin-top: 40px">
      <div class="container">
        <div class="row" style="margin-top: 15px;margin-bottom: 15px">
          <div class="col-md-12">
            <?php
            if(isset($_GET['success']))
            {
              ?>
              <h3 class="text-success text-center">Hi <?= $_GET['success'] ?>, thanks for filling out our form!</h3>
              <?php
            }
            ?>            
            <h1 class="text-blue text-center">Contact Us</h1>
            <p class="text-center">
              "Thank you for visiting our website Please submit the form below, so we can provide quick and efficient service. If this is an urgent matter please contact our office."
            </p>
            <div class="text-center">
              <h4>
                <span class="text-red">Kshethrakala</span> <span class="text-blue">Akademi</span>
              </h4> 
              <h5>Malabar Devaswom Board</h5>
              <p class="address">
                Madayikkavu PO <br> Payangadi Kannur 670303
              </p>
            </div>  
          </div>
        </div>
        
        <!--<div class="row">
          <div class="col-md-4 offset-md-2 text-center">
            <i class="fas fa-phone fa-2x"></i>
            <p>
              
            </p>
          </div>
          <div class="col-md-4 text-center">
            <i class="fas fa-envelope fa-2x"></i>
            <p>
              
            </p>
          </div>
        </div>-->

        <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Sent your message successfully!</h3> </div>
         <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div>


        <div class="row">
          <div class="col-md-8 offset-md-2">
            <form role="form" method="post" id="reused_form" action="contact/contact.php">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="contact-elements" id="name" aria-describedby="nameHelp" placeholder="Name" name="name">
                      <small id="nameHelp" class="form-text text-muted">Plase Enter your full name.</small>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <input type="email" class="contact-elements" id="InputEmail1" aria-describedby="emailHelp" placeholder="Email" name="email">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="InputPhone">Your Phone</label>
                    <input type="number" class="contact-elements" id="InputPhone" aria-describedby="phoneHelp" placeholder="Phone Number" name="phone">
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Your Message</label>
                    <textarea class="contact-elements" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                  </div>
                  </div>
                </div>
                <div>
                  <button type="submit" class="btn-contact" name="sendmail">Submit</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </main>

  <script type="text/javascript">
    /* ======= Contact Form ======= */
    $('#reused_form').on('submit',function(e){

        e.preventDefault();

        var $action = $(this).prop('action');
        var $data = $(this).serialize();
        var $this = $(this);

        $this.prevAll('.alert').remove();

        $.post( $action, $data, function( data ) {

            if( data.response=='error' ){

                $this.before( '<div class="alert alert-danger">'+data.message+'</div>' );
            }

            if( data.response=='success' ){

                $this.before( '<div class="alert alert-success">'+data.message+'</div>' );
                $this.find('input, textarea').val('');
            }

        }, "json");
    });
  </script>


  <?php include('includes/footer.php'); ?>
  <?php include('includes/backtotop.php'); ?>
  <?php include('includes/js.php'); ?>
  <?php include('includes/main.php'); ?>
</body>

</html>

