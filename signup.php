<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'mailer/src/Exception.php';
require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require 'connection.php';


if(isset($_POST["email"])){
   $emailTo=$_POST["email"];
   
  
$code = uniqid(true);

$name=$_POST["name"];


$checkIfEmailExistsQuery = mysqli_query($conn, "SELECT email FROM users WHERE email='$emailTo'");
if(mysqli_num_rows($checkIfEmailExistsQuery) > 0){
    exit("This user already exists, please contact an adminstrator.");
   }




$query = mysqli_query($conn, "INSERT INTO resetpasswords(code, email, name) VALUES('$code', '$emailTo', '$name')");
if(!$query){
    exit("Error");
    
    }


//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "lectgauproject@gmail.com";                     //SMTP username
    $mail->Password   = "lectgauproject";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom("lectgauproject@gmail.com", "LECT");
    $mail->addAddress("$emailTo");     //Add a recipient
    $mail->addReplyTo("no-reply@gmail.com", "no-reply");
  


    //Content
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/setpassword.php?code=$code";
    $mail->isHTML(true);                                  
    $mail->Subject = 'GAU LECT PASSWORD';
    $mail->Body    = "<h1>You Requested to set a Password</h1>
                          Click <a href='$url'>This link</a> to set your password";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Password has been sent';
    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
</head>
<body>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-6">
<form method="POST">
<div class="card">
<div class="card-header bg-dark text-light"><b>Signup</b></div>
                <div class="card-body">
<input type="text" name="email" placeholder="Email" autocomplete="off">
<br>
<br>
<input type="text" name="name" placeholder="Name" autocomplete="off">
<br>
<br>
<input type="text" name="student-ID" placeholder="student-ID" autocomplete="off">
<br>
<br>
<input type="submit" name="submit" value="Send Link" >
</div>
</form>

