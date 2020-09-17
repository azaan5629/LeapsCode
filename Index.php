<?php
$con= mysqli_connect('127.0.0.1','root','');

if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'leapscode'))
{
	echo 'Database not selected';
}
if(isset($_POST['submit'])) {

$name=$_POST['name'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$sql = " INSERT INTO `contact_admin` VALUE('$name','$email','$subject','$message');";
if (!$con->query($sql) === TRUE) {
    
     echo "Error: " . $sql . "<br>" . $con->error;
}
else{
 $success_msg="Your message has been sent !";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>LeapsCode</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Titleimage.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Vesperr - v2.0.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
#header1{
	box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}
#logo1{
	height:50px;
}
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header1" style="background:#ffff;" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">

      <a href="index.php" class="logo mr-auto"><img id="logo1" src="assets/img/Titleimage.png" alt="" class="img-fluid"><span class="h5"> LeapsCode</span></a>

        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#header">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Features</a></li>
		  <li><a href="#blogs">Blogs</a></li>
          <li><a href="#contact">Contact</a></li>
		  
          <li class="get-started"><a href="Online Compiler.php">Use our Compiler</a></li>
          <li class="get-started"><a href="Signup.php">Sign up</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Showcase your programming skills</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Get a chance to be a part of Nineleaps !</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="Signup.php" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p align="justify">
              NineLeaps began by taking a step into the world of product development. With our unrelenting focus and drive to make an impact through tech innovations, that step became a giant leap.
            </p>
            <ul>
		
              <li align="justify"><i class="ri-check-double-line"></i> Our superheroes take the product ideas to fruition by working in a close-knit network to help clients.</li>
              <li align="justify"><i class="ri-check-double-line"></i> We work in the areas of mobile, web, analytics and Big Data promoting experimentation with new technology and techniques.</li>

            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            
			<p align="justify"> LeapsCode is an interactive coding platform by NineLeaps that allows progarmmers from around the world to practise programming and solve company-specific problem statements along with providing internship/ job opportunities to deserving candidates.
			</p>
            <a href="https://www.nineleaps.com/ " class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-simple-smile"></i>
                    <p><strong>Happy Programmers</strong> that love solving real life problems. </p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-document-folder"></i>
                    
                    <p><strong>Solve </strong> problem statements that challenge your creativity.</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-clock-time"></i>
                    <p><strong> 24 Hours</strong> coding platform where evaluation never stops.</p>
                    
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-award"></i>
                    <p><strong> Win</strong> the contest and get a chance to work with us.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>FEATURES</h2>
          
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Direct Recruitment Platform</a></h4>
              <p class="description" align="left">One stop destination to be a part of Nineleaps</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Company specific problem statements</a></h4>
              <p class="description">Solve real life and company specific problem statements and be a leap ahead.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Showcase your skills</a></h4>
              <p class="description">Display your programming skills and let everyone know who you are.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Get Internship and Job opportunities</a></h4>
              <p class="description">Exceptional performers get a chance to work with NineLeaps.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= More Services Section ======= -->
    <section id="more-services" class="more-services">
      <div class="container">

        <div class="row">
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card" style='background-image: url("assets/img/more-services-1.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><a href="">Passionate employees</a></h5>
                <p class="card-text">NineLeaps is a team of passionate people who are dedicated to deliver only the best for the clients.</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="card" style='background-image: url("assets/img/more-services-2.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title"><a href="">Happy Clients</a></h5>
                <p class="card-text">NineLeaps work in close-knit network with the clients, satisfying all their needs and requirements.</p>
                
              </div>
            </div>

          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image: url("assets/img/more-services-3.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><a href="">A Leap ahead in technology</a></h5>
                <p class="card-text">We work in latest areas of mobile, web, analytics, Big Data and love open source platforms as they breed innovation and ingenuity.</p>
                
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image: url("assets/img/more-services-4.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title"><a href="">Effective team work</a></h5>
                <p class="card-text">We believe that teamwork and new technology go hand in hand and love to see the magic that is unvelied.</p>
                
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End More Services Section -->
	<section id="blogs" class="team">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Blogs</h2>
          <p>A glimpse of the technical world !</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in">
              <div class="pic"><a href="./Blog1.html"><img src="assets/img/Blog1.jpg" class="img-fluid" alt=""></a></div>
              <div class="member-info">
                <h4><a href="./Blog1.html">AI Is Getting More Creative. But Who Should Own the Art It Produces?</a></h4>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><a href="./Blog2.html"><img style='height:233px;'src="assets/img/Blog2.jpg" class="img-fluid" alt=""></a></div>
              <div class="member-info">
                <h4><a href="./Blog2.html">AI in the Time of Coronavirus: Diagnosis, Analytics, and Prediction </a></h4>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><a href="./Blog3.html"><img style='height:233px;'src="assets/img/Blog3.jpg" class="img-fluid" alt=""></a></div>
              <div class="member-info">
                <h4><a href="./Blog3.html">Big Data Making Massive Strides On COVID-19 Battle</a></h4>
                
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Blogs Section -->


 

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>A WELCOME NOTE</h3>
              <p>We would like to hear from you. If we get a chance to work together,
be assured that we will create impactful products.</p>
              <div class="social-links">
                <a href="https://twitter.com/nineleaps?lang=en" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="https://www.facebook.com/nineleaps/" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="https://www.instagram.com/nineleaps_tech/?hl=en" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="https://www.linkedin.com/company/nineleaps/?originalSubdomain=in" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>1025 & 1030, 80 Feet Road,<br>Koramangala 1st Block<br>Bangalore 560034<br></p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>contact@nineleaps.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>PH:+91 (80) 4172 3826</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form method="post" >
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="text-center"><button name="submit" class="btn btn-info" type="submit">Send Message</button></div>
              <br>
              <?php if (isset($success_msg)){?>
           <spam class="text-success"> <?php echo $success_msg; }?></spam>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>NineLeaps</strong>. All Rights Reserved
          </div>
         
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="index.php" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>