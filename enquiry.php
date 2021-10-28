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

  	.en {



	    padding-top: 4rem;

	    padding-bottom: 5rem;

	    background-color: #f1f4fa;

	}

	.en .wrap {

	    display: flex;

	    background: white;

	    padding: 1rem 1rem 1rem 1rem;

	    border-radius: 0.5rem;

	    box-shadow: 7px 7px 30px -5px rgba(0,0,0,0.1);

	    margin-bottom: 2rem;

	}



	.en .wrap:hover {

	    background: linear-gradient(135deg,#6394ff 0%,#0a193b 100%);

	    color: white;

	}



	.en .ico-wrap {

	    margin: auto;

	}



	.en .mbr-iconfont {

	    font-size: 4.5rem !important;

	    color: #313131;

	    margin: 1rem;

	    padding-right: 1rem;

	}

	.en .vcenter {

	    margin: auto;

	}



	.en .mbr-section-title3 {

	    text-align: left;

	}

	.en h2 {

	    margin-top: 0.5rem;

	    margin-bottom: 0.5rem;

	}

	.en .display-5 {

	    font-family: 'Source Sans Pro',sans-serif;

	    font-size: 1.4rem;

	}

	.en .mbr-bold {

	    font-weight: 700;

	}



	.en p {

	    padding-top: 0.5rem;

	    padding-bottom: 0.5rem;

	    line-height: 25px;

	}

	.en .display-6 {

	    font-family: 'Source Sans Pro',sans-serif;

	    font-size: 1re

	}

	

	/*enquiry*/

	#success-message {

		opacity: 0;

	}



	.col-xs-12.col-sm-12.col-md-12.col-lg-12 {

		padding: 0 20% 0 20%;

	}



	.margin-top-25 {

		margin-top: 25px;

	}



	.form-title {

		padding: 25px;

		font-size: 30px;

		font-weight: 300;

		font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;

	}



	.form-group .form-control {

	  -webkit-box-shadow: none;
		box-shadow: none;
	  border-bottom: 1px;

	  border-style: none none solid none;

	  border-radius:0; 

	  border-color: #000;

	}



	.form-group .form-control:focus {

		box-shadow: none;

	  border-width: 0 0 2px 0;

	  border-color: #000;

	  

	}



	textarea {

	  resize: none;

	}



	.btn-mod.btn-large {

	    height: auto;

	    padding: 13px 52px;

	    font-size: 15px;

	}



	.btn-mod.btn-border {

	    color: #000000;

	    border: 1px solid #000000;

	    background: transparent;

	}



	.btn-mod, a.btn-mod {

	    -webkit-box-sizing: border-box;

	    -moz-box-sizing: border-box;

	    box-sizing: border-box;

	    padding: 4px 13px;

	    color: #fff;

	    background: rgba(34,34,34, .9);

	    border: 1px solid transparent;

	    font-size: 11px;

	    font-weight: 400;

	    text-transform: uppercase;

	    text-decoration: none;

	    letter-spacing: 2px;

	    -webkit-border-radius: 0;

	    -moz-border-radius: 0;

	    border-radius: 0;

	    -webkit-box-shadow: none;

	    -moz-box-shadow: none;

	    box-shadow: none;

	    -webkit-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);

	    -moz-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);

	    -o-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);

	    -ms-transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);

	    transition: all 0.2s cubic-bezier(0.000, 0.000, 0.580, 1.000);

	}



	.btn-mod.btn-border:hover, .btn-mod.btn-border:active, .btn-mod.btn-border:focus, .btn-mod.btn-border:active:focus {

	    color: #fff;

	    border-color: #000;

	    background: #000;

	    outline: none;

	}



	@media only screen and (max-width: 500px) {

	    .btn-mod.btn-large {

	       padding: 6px 16px;

	       font-size: 11px;

	    }

	  

	    .form-title {

	        font-size: 20px;

	  }

	}

  </style>



   <style type="text/css">

    .bg-image-full

    {

      background-image: url('img/bg2.jpg');

    }

  </style>



  <script type="text/javascript">

  	function validateForm() {

    var n = document.getElementById('name').value;

    var e = document.getElementById('email').value;

    var s = document.getElementById('subject').value;

    var m = document.getElementById('message').value;

    var onlyLetters =/^[a-zA-Z\s]*$/; 

    var onlyEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    

    if(n == "" || n == null){

        document.getElementById('nameLabel').innerHTML = ('Please enter your name');

        document.getElementById('name').style.borderColor = "red";

        return false;

    }

  

    if (!n.match(onlyLetters)) {

        document.getElementById('nameLabel').innerHTML = ('Please enter only letters');

        document.getElementById('name').style.borderColor = "red";

        return false;

    }

  

    if(e == "" || e == null ){

          document.getElementById('emailLabel').innerHTML = ('Please enter your email');

          document.getElementById('email').style.borderColor = "red";

          return false;

      }

  

    if (!e.match(onlyEmail)) {

        document.getElementById('emailLabel').innerHTML = ('Please enter a valid email address');

        document.getElementById('email').style.borderColor = "red";

        return false;

    }

  

    if(s == "" || s == null ){

          document.getElementById('subjectLabel').innerHTML = ('Please enter your subject');

          document.getElementById('subject').style.borderColor = "red";

          return false;

      }

  

    if (!s.match(onlyLetters)) {

        document.getElementById('subjectLabel').innerHTML = ('Please enter only letters');

        document.getElementById('subject').style.borderColor = "red";

        return false;

    }

  

    if(m == "" || m == null){

        document.getElementById('messageLabel').innerHTML = ('Please enter your message');

        document.getElementById('message').style.borderColor = "red";

        return false;

    }

  

    else{

          return true;

      }

      

}

  </script>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <?php include('includes/slider.php'); ?>

  <main id="main">



<section class="en">

	<div class="container">

		<div class="row mbr-justify-content-center">

            <div class="col-lg-6 mbr-col-md-10">

                <div class="wrap">

                    <div class="ico-wrap">

                        <span class="mbr-iconfont fa-volume-up fa"></span>

                    </div>

                    <div class="text-wrap vcenter">

                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Stay <span>Successful</span></h2>

                        <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 mbr-col-md-10">

                <div class="wrap">

                    <div class="ico-wrap">

                        <span class="mbr-iconfont fa-calendar fa"></span>

                    </div>

                    <div class="text-wrap vcenter">

                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Create

                            <span>An Effective Team</span>

                        </h2>

                        <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 mbr-col-md-10">

                <div class="wrap">

                    <div class="ico-wrap">

                        <span class="mbr-iconfont fa-globe fa"></span>

                    </div>

                    <div class="text-wrap vcenter">

                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Launch

                            <span>A Unique Project</span>

                        </h2>

                        <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>

                    </div>

                </div>

            </div>

            <div class="col-lg-6 mbr-col-md-10">

                <div class="wrap">

                    <div class="ico-wrap">

                        <span class="mbr-iconfont fa-trophy fa"></span>

                    </div>

                    <div class="text-wrap vcenter">

                        <h2 class="mbr-fonts-style mbr-bold mbr-section-title3 display-5">Achieve <span>Your Targets</span></h2>

                        <p class="mbr-fonts-style text1 mbr-text display-6">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum</p>

                    </div>

                </div>

            </div>  

        </div>

	</div>

</section>





	<section>

		



		<div class="container">



	      <div class="row">

	          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">                        

	            <h2 class="form-title">Enquiry</h2>

	          </div>

	      </div>



	      <div class="row">

	      	  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

	      	  	

	      	  </div>

	          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">



	              <form id="contact-form" name="myForm" class="form" action="#" onsubmit="return validateForm()" method="POST" role="form">



	                  <div class="form-group">

	                      <label class="form-label" id="nameLabel" for="name"></label>

	                      <input type="text" class="form-control" id="name" name="name" placeholder="Your name" tabindex="1">

	                  </div>



	                  <div class="form-group">

	                      <label class="form-label" id="emailLabel" for="email"></label>

	                      <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" tabindex="2">

	                  </div>



	                  <div class="form-group">

	                      <label class="form-label" id="subjectLabel" for="sublect"></label>

	                      <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" tabindex="3">

	                  </div>



	                  <div class="form-group">

	                      <label class="form-label" id="messageLabel" for="message"></label>

	                      <textarea rows="6" cols="60" name="message" class="form-control" id="message" placeholder="Your message" tabindex="4"></textarea>                                 

	                  </div>



	                  <div class="text-center margin-top-25">

	                      <button type="submit" class="btn btn-mod btn-border btn-large">Send Message</button>

	                  </div>



	              </form><!-- End form -->

	            

	          </div><!-- End col -->



	      </div><!-- End row -->

	      

	    </div><!-- End container -->





	</section>





  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

