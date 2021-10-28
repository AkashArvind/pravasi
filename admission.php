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
  .form-elements
  {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border-color: #3e8fa2;
  border-width: 1px;
  outline: none;
  color: #b12519;
  }
  .btn-form1
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
  .btn-form1:hover
  {
  color: white;
  background-color: #3e8fa2;
  } 	
  </style>

</head>

<body>

  <?php include('includes/header.php'); ?>

  <!-- Header - set the background image for the header in the line below -->

	<?php include('includes/slider.php'); ?>

  <main id="main">


      <section>

      <div class="container">

        <div class="row">

          <div class="col-md-12">

            <header class="headT"> 

              <?php
              if($ln=='en')
              {
                ?>
                <h1 class="ml-dyuthi" style="line-height: 22px">Admission<span style="margin-top: 10px;color: #c0282c">Khetrakala akademi has been conducting many courses, workshops and events related to temple art forms.</span></h1>
                <?php
              }
              else
              {
                ?>
                <h1 class="ml-dyuthi" style="line-height: 22px;">രജിസ്‌ട്രേഷൻ<span style="margin-top: 10px;color: #c0282c">ക്ഷേത്രകല അക്കാദമിയിൽ   ക്ഷേത്ര കലാരൂപങ്ങളുമായി ബന്ധപ്പെട്ട നിരവധി കോഴ്‌സുകൾ, വർക്ക്‌ഷോപ്പുകൾ, ഇവന്റുകൾ എന്നിവ  നടത്തിവരുന്നു.</span></h1>
                <?php
              }
              ?>

            </header>

          </div>

        </div>

      </div>

    </section>


    <section>
      <div class="container">
        <div class="col-md-12">
          <form role="form" method="post" action="mail/admission.php">
            <div class="row">
              <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-elements" id="Inputapplicantname" aria-describedby="applicantname" placeholder="Name" name="applicantname">
                    <small id="applicantname" class="form-text text-muted">Applicant name</small>
                  </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="Inputgender" aria-describedby="gender" placeholder="Gender" name="gender">
                    <small id="gender" class="form-text text-muted">Male/Female</small>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="Inputcourse" aria-describedby="course" placeholder="Course Name" name="course">
                    <small id="course" class="form-text text-muted">Preferred course.</small>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="Inputgname" aria-describedby="gname" placeholder="Parent/Guardian name" name="gname">
                    <small id="gname" class="form-text text-muted">Parent/Guardian name</small>
                  </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="Inputrelationship" aria-describedby="relationship" placeholder="Relationship" name="relationship">
                    <small id="relationship" class="form-text text-muted">Relationship with applicant</small>
                  </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="Inputphone" aria-describedby="phone" placeholder="Phone" name="phone">
                    <small id="phone" class="form-text text-muted">Phone number</small>
                  </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="dob" aria-describedby="dob" placeholder="DOB" name="dob">
                    <small id="dob" class="form-text text-muted">Date of birth</small>
                  </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-elements" id="Inputclass" aria-describedby="class" placeholder="School name and class" name="class">
                    <small id="class" class="form-text text-muted">School name and class</small>
                  </div>
              </div>
            </div>

              <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea class="form-elements" id="address" rows="3" name="address"></textarea>
                </div>
                </div>
              </div>
              <div>
                <button type="submit" class="btn-form1" name="sendmail">Submit</button>
              </div>
          </form>
        </div>
      </div>
    </section>



    

  

   



  </main>

  <?php include('includes/footer.php'); ?>

  <?php include('includes/backtotop.php'); ?>

  <?php include('includes/js.php'); ?>

  <?php include('includes/main.php'); ?>

</body>

</html>

