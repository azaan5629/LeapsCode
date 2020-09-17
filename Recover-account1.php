 <?php
 
 if(isset ($_POST['recovery']))
 {
 $EMAIL='leapscode.nineleaps@gmail.com';
 $PASS='Leapscode@team2';
 $con= mysqli_connect('127.0.0.1','root','');

if(!$con)
{
	echo "Not connected to database";
	
}
if(!mysqli_select_db($con, 'leapscode'))
{
	echo 'Database not selected';
}
#if(isset($_POST['submit'])) {
$email= $_POST['Emailname'];


$sql = "SELECT  * FROM `candidate` WHERE Email='$email' ";
$query1=mysqli_query($con, $sql);
if (!$con->query($sql) === TRUE) {
    
    echo "Error: " . $sql . "<br>" . $con->error;
}

$emailcount=mysqli_num_rows($query1);
if($emailcount==0){
	$error_msg='Account does not exist';
}
if($emailcount)
{
  $userdata=mysqli_fetch_array($query1);
  $username=$userdata['Username'];
  $token=$userdata['token'];
	require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $EMAIL;                 // SMTP username
$mail->Password = $PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($EMAIL, 'LeapsCode');
$mail->FromName = "LeapsCode";
$mail->addAddress($email);     // Add a recipient
// Name is optional
$mail->addReplyTo($EMAIL);


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Reset password';
$mail->Body    ='Hi '.$username.', '.'
	
	Click here to reset your password:
	
	http://localhost/LeapsCode/update_password1.php?token='.$token;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $success_msg='Password Reset link has been sent to your Email ID.';
}
}
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Recover Account | LeapsCode</title>
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
        		<h4 align="center" style="color:#000000" > Recover Account </h4><br>
        
       
         <div class="form-group">
          <label for="exampleInputEmail1" style="color: #000000">Enter your recovery mail here:</label>
          <input type="email" class="form-control"  name="Emailname" aria-describedby="emailHelp" id="emailid" placeholder="Enter Email">
          <?php if (isset($email_error)){?>
           <spam class="text-danger"> <?php echo $email_error; }?></spam>
          <span id="emailidspan" class=" text-danger"></span>
          <small id="emailHelp" class="form-text text-muted"></small>
         </div>
         
       
       <br>
       <div class="actn-btn">
       <center><button type="submit" class="btn btn-primary " name="recovery">Send recovery mail</button></div></center> <br>
       <?php if (isset($error_msg)){?>
                <spam class="text-danger"> <?php echo $error_msg;} ?></spam>
        <?php if (isset($success_msg)){?>
                <spam class="text-success"> <?php echo $success_msg;} ?></spam>
     </form> 


    </div>

</div>
</body>
</html>