<header id="header" class="fixed-top">

    <div class="container">

      <div class="logo float-left">

        <!--<h1 class="text-light"><a href="#header"><span>KSHETHRAKALA AKADEMI</span></a></h1>-->

        <a href="index.php" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a>

      </div>

      <nav class="main-nav float-right d-none d-lg-block">

        <ul>

         

			<li><a href="index.php">Home</a></li>

			<li><a href="about.php">Our Profile</a></li>


      <li class="drop-down"><a href="">Gallery</a>

            <ul>

              <li><a href="gallery.php">Photo Gallery</a></li>

              <li><a href="videoGallery.php">Video Gallery</a></li>

            </ul>

      </li>

			<li class="drop-down"><a href="">Kshethrakala academy</a>

            <ul>

              <li><a href="about.php">More About us</a></li>

              <li class="drop-down"><a href="courses.php">Courses</a>

                

                <ul>

                  <?php

                  $table_nme = 'courses';   

                  $result="SELECT * FROM $table_nme ORDER BY id ASC";

                  $q1=mysql_query($result);

                  if (mysql_num_rows($q1) == 0) 

                  {



                  } 

                  else 

                  {
                    $i = 0;
                    while ($r = mysql_fetch_array($q1)) 
                    {
                      $CourseName1234=$r["name"];
                      $CourseEName1234=$r["e_name"];
                      $description1234=$r["description"];
                      $id1234=$r['id'];
                      ?>
                      <li><a href="courseMore.php?id=<?= $id1234 ?>"><?= $CourseEName1234 ?></a></li>
                      <?php
                    }
                  }
                  ?>
                  <li><a href="courses.php">Courses at a glance</a></li>
                </ul>

              </li>

              <li><a href="timeline.php">Timeline</a></li>
              <li><a href="events.php">Events</a></li>
              <!--<li><a href="activities.php">Activities</a></li>-->

            </ul>

          </li>

          <li class="drop-down"><a href="">Downloads</a>

            <ul>

              <!--<li><a href="e-brouchers.php">Course E-Brouchers</a></li>-->

              <li><a href="applicationforms.php">Application Forms</a></li>

            </ul>

          </li>

          <li><a href="blog.php">Blog</a></li>

          <li><a href="contact.php">Contact Us</a></li>

        </ul>

      </nav><!-- .main-nav -->

    </div>

</header><!-- #header -->