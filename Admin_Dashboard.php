
<?php
extract($_POST);
session_start();

if(isset($_SESSION['Email']))
{
$A=1;
} 
else
{
  header("location:admin_login.php");
}
?>



<?php
 if (isset($_POST['end']))
{
  unset($_SESSION['Email']);
  session_destroy();
  header("location:admin_login.php");
}
?>




<?php     
  $link=mysqli_connect("localhost","root","","leapscode");
  if (isset($_POST['add_subadmin']))
    {
    $email=$_POST['email'];
    $token_gen=random_bytes(15);
    $token=bin2hex($token_gen);
    $empid=$_POST['empid'];
    $name=$_POST['username'];
    $pass=$_POST['password'];
    $password=md5($pass);
   
    $sql2="select * from leapscode_subadmin where Email='$email'";
    $que1=mysqli_query($link, $sql2);
    $res1=mysqli_num_rows($que1);
    if($res1>0)
    {
      $email_error="* This email id is already registered.";
    }
    else
    {
    $sql="insert into leapscode_subadmin (Username, Email, Password, Employee_id, token) values('$name','$email', '$password', '$empid', '$token')";    
    mysqli_query($link, $sql);
    $success_msg="Sub-Admin added successfully.";
  }
}
?>



<?php     
  $link=mysqli_connect("localhost","root","","leapscode");
  if (isset($_POST['remove_subadmin']))
    {
    $email1=$_POST['email1'];
    $sql2="select * from leapscode_subadmin where Email='$email1'";
    $que1=mysqli_query($link, $sql2);
    $res1=mysqli_num_rows($que1);
    if($res1<1)
    {
      $email_error="* No such Sub-Admin exists.";
    }
    else
    {
    $sql="delete from leapscode_subadmin where Email='$email1'";    
    mysqli_query($link, $sql);
    $success_msg="Sub-Admin removed successfully.";
  }
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard | LeapsCode</title>
    <!-- Favicons -->
    <link href="assets/img/Titleimage.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Admin_Dashboard_Css.css">
</head>

<body>

  <!-- nav header starts-->

  <div class="container-fluid1">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid1">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <form method="post">
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Admin Dashboard </a>
        </div>
        <ul class="nav navbar-nav navbar-right">
      <li > <button type="submit" name="end" class="btn btn-link">Log Out</button></li>
      </ul>
             &nbsp;&nbsp;</a>
        </form>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>

  <!--nav header ends-->

  <!--sidebar starts-->
  <div id="sidebar">
    <div class="toggle-btn" onclick="toggleSidebar()">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <ul>
      <li class="active"><a data-toggle="tab" href="#home"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Add
          Sub-Admin</a></li>
      <li><a data-toggle="tab" href="#menu1"><span class="glyphicon glyphicon-minus"></span>&nbsp;&nbsp;Remove
          Sub-Admin</a></li>
      <li><a data-toggle="tab" href="#menu2"><span class="glyphicon glyphicon-eye-open"></span>&nbsp;&nbsp;View
          Sub-Admin(s)</a></li>
      <li><a data-toggle="tab" href="#menumsg"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;View Messages(s)</a></li>


    </ul>
  </div>

  <!--sidebar ends-->
  <!--ADD sub admin subsection trial  starts -->
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div class="container-fluid">

        <h2> Add Sub-Admin</h2>
        <br>

        <div>
          <form method="post" enctype="multipart/form-data" onsubmit="return validation()">
            <label for="fname">E-Mail ID</label>
            <input type="email" id="email" name="email" pattern="[a-z0-9._%+-]+@nineleaps.com"
              placeholder="Official E-Mail ID..">
              <span id="emailspan" class=" text-danger"></span>
              <br>
              <br>
            <label for="lname">Employee ID </label>
            <input type="text" id="eid" name="empid"
              placeholder="Offical Employee ID..">
              <span id="empidspan" class=" text-danger"></span>
              <br>
              <br>
            <label for="lname">Name</label>
            <input type="text" id="name" name="username" placeholder="Your name..">
            <span id="namespan" class=" text-danger"></span>
            <br>
            <br>
            <label for="lname">Password </label>
            <input type="password" id="pswrd" name="password" minlength="6" maxlength="14" placeholder="Your Password..">
            <span id="passwordspan" class=" text-danger"></span>
            <br><br>


            <input type="submit" name="add_subadmin" value="Add"><br>
             <?php if (isset($success_msg)){?>
                <spam class="text-success"> <?php echo $success_msg;} ?></spam>
          </form>
        </div>

      </div>
    </div>
    <!--add sub-admin section ends here-->
    <!-- view sub-admin section starts here-->
    <div id="menu1" class="tab-pane fade">
      <div class="container-fluid">
        <h2> Remove Sub-Admin</h2> <br><br>
        <form method="post" enctype="multipart/form-data" onsubmit="return validation1()" >
        <label for="fname">E-Mail ID</label>
        <input type="email" id="email1" name="email1" pattern="[a-z0-9._%+-]+@nineleaps.com"
          placeholder="Official E-Mail ID.."><br>
           <span id="emailspan1" class=" text-danger"></span>
        <input type="submit" value="Remove" name="remove_subadmin">
        <br>
         <?php if (isset($remove_msg)){?>
                <spam class="text-success"> <?php echo $remove_msg;} ?></spam>
          </form>
      </form>

      </div>
    </div>
    <!-- remove sub-admin section starts here-->
    <div id="menu2" class="tab-pane fade">
      <div class="container-fluid">
        <h2> View Sub-Admin(s)</h2> <br><br>
        <table >
         <?php 
        extract($_POST);
        $link=mysqli_connect("localhost","root","","leapscode");
        $qry="select * from leapscode_subadmin";
  
        $resultSet=mysqli_query($link,$qry);
        $tab=<<<demo
        <table class="abc" id="ert">
       <thead>
       <tr bgcolor="#4CAF50">
        <td align='center'><b>Name</b></td>
        <td align='center'><b>Email ID</b></td>
        <td align='center'><b>Employee ID</b></td>
       </tr>
       </thead>
demo;
  
  while ($r=mysqli_fetch_assoc($resultSet))
   {
      $tab.="<tr><td align='center'>$r[Username]</td><td align='center'>$r[Email]</td><td align='center'>$r[Employee_id]</td>" ;     
     }  
$tab.="</table>";
echo $tab;



?>


      </div>

    </div>
    <!-- remove sub-admin section ends here-->

    
 <!-- Contest 1 section starts here-->
 <div id="menumsg" class="tab-pane fade">
	
	<div class="container-fluid">
    
<h2>MESSAGES</h2><br><br>
<table>
<?php
 extract($_POST);
 $link=mysqli_connect("localhost","root","","leapscode");
 $qry="select * from contact_admin";
	$resultSet=mysqli_query($link,$qry);
	$tab=<<<demo
 	<table class="abc" id="ert">
	<thead>
	<tr bgcolor="#4CAF50">
	 <td align='center'><b>Name</b></td>
 	<td align='center'><b>Email ID</b></td>
 	<td align='center'><b>Subject</b></td>
 	<td align='center'><b>Message</b></td>
	</tr>
    </thead>
demo;


while ($r=mysqli_fetch_assoc($resultSet))
{
   $tab.="<tr><td align='center'>$r[name]</td><td align='center'>$r[email]</td><td align='center'>$r[subject]</td><td align='center'>$r[message]</td>" ;     
  }  
$tab.="</table>";
echo $tab;



?>
  
	</form>
	 </div>



  </div>


  <script type="text/javascript">
    

    function validation(){

      var email = document.getElementById('email').value;
      var empid = document.getElementById('eid').value;
      var name = document.getElementById('name').value;
      var pwd= document.getElementById('pswrd').value;





      if(email == ""){
        document.getElementById('emailspan').innerHTML ="* Please enter the Sub-Admin Email Id";
        return false;
      }

      if(empid == ""){
        document.getElementById('empidspan').innerHTML ="*Please enter the Employee-id";
        return false;
      }
   
      if(name == ""){
        document.getElementById('namespan').innerHTML ="*Please enter the Sub-Admin Name";
        return false;
      }

      if(pwd == ""){
        document.getElementById('passwordspan').innerHTML ="*Please enter the password";
        return false;
      }
      if((pwd.length <= 8) || (pass.length > 20)) {
        document.getElementById('passwordspan').innerHTML ="*Passwords lenght must be between  8 and 20";
        return false; 
      }
    }

  </script>

  <script type="text/javascript">
    
    function validation1()
    {
        var email1 = document.getElementById('email1').value;


      if(email1 == ""){
        document.getElementById('emailspan1').innerHTML ="* Please enter the Sub-Admin Email Id";
        return false;
      }
    }
  </script>


  <script src="css/Admin_DashboardJS.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>

</html>