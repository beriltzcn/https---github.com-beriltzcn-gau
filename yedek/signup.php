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
    exit("This user already exists, please contact and adminstrator.");
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
<html>
    <head>
        <title>SIGN UP</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <script src="js/jq.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        
        <div class="container-fluid">
    <div class="row mt-5 justify-content-center">
        <div class="col-12 mb-3 text-center">
            <img src="https://www.gau.edu.tr/storage//uploads/0/0/0/logotr-1580914525.png?vs=1" style="width:300px" />
        </div>
        
        <div class="col-lg-4 col-md-6 col-12">
            <form action="login.php" method="post">
            <div class="card shadow-lg">
                
                <div class="card-header bg-dark text-light"><b>SIGN UP</b></div>
                <div class="card-body">
                    
                    <b>E-Mail (*)</b>
                    <input type="text" data-toggle="tooltip" title="This Field Is Required" class="form-control mt-2 mb-3 shadow" name="email" placeholder="Enter Your E-Mail Address" required />
                    
                    <b>Name (*)</b>
                    <input type="text" data-toggle="tooltip" title="This Field Is Required" class="form-control mt-2 mb-3 shadow" name="name" placeholder="Enter Your Name" required />
                    
                    <b>Studen ID (*)</b>
                    <input type="text" data-toggle="tooltip" title="This Field Is Required" class="form-control mt-2 mb-3 shadow" name="student-ID" placeholder="Enter Your Student ID" required />

                </div>
                <div class="card-footer text-right" style="background:#eeeeee">
                    <button class="btn btn-lg shadow btn-success" type="submit">Sign Up</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
    </body>
</html>

<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

</script>

