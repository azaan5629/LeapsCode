 <?php
 if(isset ($_POST['update'])){
 $con= mysqli_connect('127.0.0.1','root','');

if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'leapscode'))
{
	echo 'Database not selected';
}
$token=$_GET['token'];
$sql = "SELECT  * FROM `candidate` WHERE token='$token'";
$query1=mysqli_query($con, $sql);
if (!$con->query($sql) === TRUE) {
    
    echo "Error: " . $sql . "<br>" . $con->error;
}

$emailcount=mysqli_num_rows($query1);
if($emailcount==0){
	$match_error='* No such account exists.';
}
if($emailcount)
{

$pass= $_POST['new-password'];
$confirmpass= $_POST['confirm-password'];

if($pass == $confirmpass){
  $password=md5($pass);
	$sql = "UPDATE candidate
SET Password = '$password'
WHERE token='$token'";
$success_msg='Password updated successfully';
if (!$con->query($sql) === TRUE) {
    
    echo "Error: " . $sql . "<br>" . $con->error;
}
	
}
else{
	$match_error='* Password do not match';
}
}
 }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Change Password | LeapsCode</title>
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

<body style="background: rgb(245, 248, 248)" >
<div class="container-fluid bg" >
     <div class="cnge">
    <form class="form-container" style="background-color: #FFFFFF" method="post" enctype="multipart/form-data" method="post" >
        <center><img src="assets/img/Titleimage.png" alt=""  height="80px" width="80px  class="img-fluid"></center>
		<h4 align="center" style="color:#000000" > Change Password </h4><br>
        
       
        
		 <div class="form-group">
          <label for="exampleInputEmail1" style="color: #000000">Enter your password:</label>
          <input type="text" class="form-control"  name="new-password" aria-describedby="emailHelp" id="emailid" placeholder="New Password">
          <?php if (isset($email_error)){?>
           <spam class="text-danger"> <?php echo $email_error; }?></spam>
          <span id="emailidspan" class=" text-danger"></span>
          <small id="emailHelp" class="form-text text-muted"></small>
         </div>
		 <div class="form-group">
          <label for="exampleInputEmail1" style="color: #000000">Confirm password:</label>
          <input type="text" class="form-control"  name="confirm-password" aria-describedby="emailHelp" id="emailid" placeholder="Confirm Password">
          <?php if (isset($email_error)){?>
           <spam class="text-danger"> <?php echo $email_error; }?></spam>
          <span id="emailidspan" class=" text-danger"></span>
          <small id="emailHelp" class="form-text text-muted"></small>
         </div>
         
       
       <br>
       <div class="actn-btn">
       <button type="submit" class="btn btn-primary " name="update">Update Password</button></div> <br>
        <?php if (isset($match_error)){?>
                <spam class="text-danger"> <?php echo $match_error;} ?></spam>
        <?php if (isset($success_msg)){?>
                <spam class="text-success"> <?php echo $success_msg;} ?></spam>
     </form> 


    </div>

</div>
</body>
</html>