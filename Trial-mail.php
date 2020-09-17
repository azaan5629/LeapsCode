<?php require 'PHPMailerAutoload.php';
$EMAIL='leapscode.nineleaps@gmail.com';
 $PASS='Leapscode@team2';
 $email='azaan5629@gmail.com';
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
$mail->Body    = '<div style="borger:2px solid red;" >Hi, $username. 
	
	Click here to reset your password:
	
	http://localhost:8080/LeapsCode%20Login/update_password.php </div>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mail successfully sent !';
}

?>