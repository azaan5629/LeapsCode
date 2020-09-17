


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

   if (isset($_POST['submit']))
{   
   $dur=$_GET['dur'];
   $tna=$_GET['tna'];
   $token=$_GET['token']; 
   $st=null;
    $link=mysqli_connect("localhost","root","","test");
    $qry="select * from `$tna` where token='$token'";
    $resultSet=mysqli_query($link,$qry);
    $rows=mysqli_fetch_array($resultSet, MYSQLI_ASSOC);
    $st=$rows['contest_time'];
   date_default_timezone_set("Asia/Calcutta");
    $time_in_sec=strtotime($st);
    $u=date("H:i:s");
    $time_in_sec2=strtotime($u);
    $diff=$time_in_sec2-$time_in_sec;
     if($diff>1800000000000000)
      { 
       header("location: Timeout.php");
      }
    else
   { 
    /*Initiating timer */ 
    $duration1=$dur/7;
    $duration2=$duration1/8;
   $_SESSION["duration"]=$duration2;
 $_SESSION["start_time"]=date("Y-m-d H:i:s");
 $end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
 $_SESSION["end_time"]=$end_time; 
  /*Timer initiated */
    
 $con= mysqli_connect('127.0.0.1','root','');


if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'test'))
{
	echo 'Database not selected';
}

$tname=$_GET['tna'];
 $tnamefinal=$tname."questions";
 $token=$_GET['token'];  
 
$sql = " SELECT * FROM `$tnamefinal` ORDER BY RAND()
LIMIT 3;";
$sqldata=mysqli_query($con, $sql) or die('Error');
$rows=mysqli_fetch_array($sqldata, MYSQLI_ASSOC);
$_SESSION["sql"]=$rows;
$rows2=mysqli_fetch_array($sqldata, MYSQLI_ASSOC);
$_SESSION["sql1"]=$rows2;
$rows3=mysqli_fetch_array($sqldata, MYSQLI_ASSOC);
$_SESSION["sql2"]=$rows3;
header("location: Contest IDE.php?token=".$token."&dur=".$dur."&tna=".$tna);
     }
   }
	 ?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Instructions | Contest</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Titleimage.png" rel="icon">
 

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  


  <!-- Template Main CSS File -->
  <link href="css/Style_Contest_IDE.css" rel="stylesheet">
  
</head>
<style>
.container1
{ height: 58em;
  display: flex;
  align-items: center;
  justify-content: center }
div.container6 p {
  margin: 0
  

}
.lowercontainer
{ text-align: center;
padding-bottom:30px;
}
.inner{
padding-top:50px;
padding-bottom:50px;
padding-left:100px;
padding-right:100px;
background-color:#ffff;
font-family: "Calibri";

font-size:18px;
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}

input.check-box { 
            
            width: 30px; 
            height: 20px; 
        } 
.h3{
color: #0489B1 }
</style>

<body>

 <!--  <!-- ======= Header ======= -->
  <!-- ======= Header ======= -->
  <nav class="navbar" id="header1">
    <div class="container d-flex align-items-center">


      <div class="logo mr-auto">

        <a href="https://www.nineleaps.com/" class="logo mc-auto"><img src="assets/img/nineleaps-logo.png" alt=""
            class="img-fluid"></a>

      </div>
      <span style="font-size:20px " class="h5  mr-auto"> Welcome to LeapsCode</span>

      <nav class="nav-menu d-none d-lg-block">
        <ul align="right">
        </ul>
      </nav><!-- .nav-menu -->
  </nav><!-- End Header -->
  <!-- ======= Main section ======= -->
  <br>
 
 <div class="container1">
 <div class="inner">
<h3 class="h3" align="center"><b>INSTRUCTIONS OF THE CONTEST</b></h3> <br>



<b>1.General </b> <br> <br>

• Every candidate is expected to ensure a proper internet connection during the contest in order to avoid any interruption/ failure.  <br>

• All the candidates should login into LeapsCode atleast 15 minutes prior to the contest. <br>

• Contestants are <b> not </b> allowed to open any other tab/window during the test. <br>

• Press the Submit Test button once you have finished taking the test. Once submitted you <b>cannot</b> retake this test. <br>

 <br>

  
  
  
  
<b>2. Programming Environment </b> <br> <br>

• Contestants may write their programs in the following languages-  <br>  (a) C  <br>(b) C++  <br>(c) Java  <br>(d) Python.  <br> <br>

<b>3. Evaluation of Contestants' Programs </b> <br> <br>

• Each problem will have some test cases – few <b>public</b> and few <b>private</b>. <br>


• Marks will be awarded on the basis of number of test cases passed. <br>•   Weightage of marks will be different for public and private test cases.</b> <br>  <br>
<br>
</div>
</div>
<div class="lowercontainer">
<form method="post" enctype="multipart/form-data">
<input type="checkbox" class="check-box" name="check"  required> </input> <button type="submit" name="submit" class="btn btn-info"> Accept and Continue</button> </form>


    

  </section><!-- End main section -->
    <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  
 
  
  

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
 

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>



</html>
 