
<?php     
  $link=mysqli_connect("localhost","root","","leapscode");
  if (isset($_POST['signin']))
    {
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $qry="select * from leapscode_admin where Username='$email' and Password='$pass'";
    $resultSet=mysqli_query($link,$qry);
    $count=mysqli_num_rows($resultSet);
    $n=mysqli_fetch_assoc($resultSet);
    if($count!=0)
    {
    
       $arr=array();
      session_start();
      $_SESSION['Email']=$n['Username'];
      header("location: Admin_Dashboard.php");
    }
    else
    {
      $error_msg="* Invalid Email ID or Password";
    }
  }

  ?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin Sign in | LeapsCode</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Titleimage.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

 <link href="css/cancss.css" type="text/css" rel="stylesheet">
</head>

<body style="background: #F3F7F7">
<div class="container-fluid bg" >
 <div class="row">
  <div class="col-md-4 col-sm-4 col-xs-12"></div>
  <div class="col-md-4 col-sm-4 col-xs-12">

   <form class="form-container" style="background-color: #FFFFFF" method="Post"  enctype="multipart/form-data" onsubmit="return validation()">
   <img style="margin-left: 168px"  src="assets/img/Titleimage.png" alt=""  height="80px" width="80px  class="img-fluid">>
   <h4 class="text-center" style="color:#000000"s class="">LeapsCode</h4>
   <div class="form-group">
    <h5 class="text-muted" class=font-weight-light" style="color: #000000">Admin Sign in</h5>
    <label for="exampleInputEmail1" style="color: #000000">Email Id</label>
     <input type="email" class="form-control" name="email" id="user"  placeholder="Enter Email Id">
           <span id="usernamespan" class="text-danger "></span>

     <small id="emailHelp" class="form-text text-muted"></small>
    </div>
    <div class="form-group">
     <label for="exampleInputPassword1" style="color: #000000">Password</label>
     <input type="password" class="form-control" name="password" id="pass" placeholder="Enter Password">
           <span id="passspan" class="text-danger "></span>

    </div>
  
  <br>
  <button type="submit" class="btn btn-primary btn-block" name="signin">Log in</button>
  <br>
  <?php if (isset($error_msg)){?>
                <spam class="text-danger"> <?php echo $error_msg; }?></spam>
</form> 
  
  
  </div>
  <div class="col-md-4 col-sm-4 col-xs-12"></div>
 </div>
</div>
 <script type="text/javascript">
    

    function validation(){

      var user = document.getElementById('user').value;
      var pass = document.getElementById('pass').value;

       if(user == ""){
        document.getElementById('usernamespan').innerHTML ="* Please enter the email id";
        return false;
      }
       if(pass == ""){
        document.getElementById('passspan').innerHTML ="* Please enter the password";
        return false;
      }
    }
    </script>
</body>
</html>


