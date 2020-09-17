<?php
extract($_POST);
session_start();

if(isset($_SESSION['Email']))
{
$A=1;
} 
else
{
  header("location:Login_candidate.php");
}
?>



<?php
 if (isset($_POST['end']))
{
  unset($_SESSION['Email']);
  session_destroy();
  header("location:index.php");
}
?>


  
<?php 
extract($_POST);

$semail=$_SESSION['Email'];
$name=null;
$email=null;
$college=null;
$link=mysqli_connect("localhost","root","","leapscode");
  $qry="select * from candidate where Email='$semail'";
  
  $resultSet=mysqli_query($link,$qry);
while ($r=mysqli_fetch_assoc($resultSet))
{
    $name=$r['Username'];
    $email=$r['Email'];
    $college=$r['College'];
  }
?>


<?php     
  $link=mysqli_connect("localhost","root","","leapscode");
  if (isset($_POST['confirm']))
    {
    $tna=$_GET['tna'];
    $token=$_GET['token'];
    $dur=$_GET['dur'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $college=$_POST['college'];
    $sql="update candidate set Username='$username', College='$college' where Email='$email'";   
    mysqli_query($link, $sql);
    header("location: Instructions.php?token=".$token."&dur=".$dur."&tna=".$tna);
  }
    ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Confirm your details | Contest</title>
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
  <link href="css/Style_Contest_IDE.css" rel="stylesheet">
  
  <!-- =======================================================
  * Template Name: Vesperr - v2.0.0
  * Template URL: https://bootstrapmade.com/vesperr-free-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<style>
.container1
{ padding-left:320px;
  padding-right:300px;
  padding-top:100px;
  padding-bottom:30px;
  text-align:justify;

  

}
.lowercontainer
{ text-align: center;
padding-bottom:30px;
}
.inner{
padding-top:35px;
padding-bottom:50px;
padding-left:200px;
padding-right:200px;
background-color:#ffff;


font-size:18px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}

input.check-box { 
            
            width: 30px; 
            height: 20px; 
        } 
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <a href="index.html"><img src="assets/img/nineleaps-logo.png" alt="" class="img-fluid"></a>
      </div>
      
	  	<span class="h5 mr-auto">Welcome to LeapsCode</span>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          
         <li class="get-started ml-auto"><a href="#" data-toggle="modal" data-target="#exampleModal">
              Log Out </a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <!-- ======= Main section ======= -->
  <br>
 
 <div class="container1" >
 <div class="inner" id="dtls">
<h3 align="center">Confirm your details</h3> <br>
<form class="form-container" method="post" enctype="multipart/form-data" onsubmit="return validation()" >
  
  <div class="form-group">
   <label for="exampleInputEmail1">Contestant Name</label>
   <input type="text" class="form-control" id="user" name="username" value="<?php echo $name; ?>" >
   <span id="usernamespan" class="text-danger "></span>
   <small id="emailHelp" class="form-text text-muted"></small>
  </div><br>
  <div class="form-group">
   <label for="exampleInputPassword1">Contestant Email-ID</label>
   <input type="email" class="form-control" id="emailid" name="email" value="<?php echo $email; ?>" readonly>
   <span id="emailidspan" class="text-danger "></span>
  </div><br>

  <div class="form-group">
    <label for="exampleInputPassword1">Contestant College Name</label>
    <input type="text" class="form-control" id="clg" name="college" value="<?php echo $college; ?>">
    <span id="clgspan" class="text-danger "></span>
   </div><br>


<div> 
<center><button type="submit"  id="mybtn"  name="confirm"  class="btn btn-info ">Confirm details</button></center></div>
</form> 

<br>

</div>
</div>  

  </section><!-- End main section -->




  <script type="text/javascript">
    

    function validation(){

      var user = document.getElementById('user').value;
      var emails = document.getElementById('emailid').value;
      var clg= document.getElementById('clg').value;


      if(user == ""){
        document.getElementById('usernamespan').innerHTML ="* Please enter the username";
        return false;
      }
       if(emails == ""){
        document.getElementById('emailidspan').innerHTML ="* Please enter the Email Id";
        return false;
      }
       if(clg == "")
      {
        document.getElementById('clgspan').innerHTML="* Please enter your college name";
        return false;
      }
      }
    </script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <!-- Submit pop up-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post"  enctype="multipart/form-data"> 
      <div class="modal-body">
      <center><h5> Do you want to log out?</h5>
      <h5> You will not be allowed to give the test again.</h5></center>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button name="end" type="submit" class="btn btn-info">Yes, log out</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--Submit pop up ends-->
  
  
  
  

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
<!--style.css would be changed a little:
#header .logo img {
  padding-bottom: 8px;
  margin: 0;
  max-height: 30px;
} -->


</html>