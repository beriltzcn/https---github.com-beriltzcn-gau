<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING ^ E_DEPRECATED);

include "connection.php";


$subject = $_REQUEST['subject'];

$email = $_SESSION['email'];



$submit = $_POST['submit'];
$to_user = $_POST['to_user'];
$subject = $_POST['subject'];
$message = $_POST['message'];


$date = date("Y/m/d");



if($submit){


    if(!$to_user){
        echo"<b>Please enter a user to mail!</b>";
    }
    if(!$subject){
        echo"<b>Please enter a subject!</b>";
    }
    if(!$message){
        echo"<b>Please enter your message!</b>";
    }
    




if($to_user&&$subject&&$message){
$query = mysqli_query($conn, "INSERT INTO messages(id, from_user, to_user, subject, message, date, seen) VALUES('','$email','$to_user','$subject','$message','$date','0')");


echo"<b>Your message has been successfully sent.</b>";

}

else{
    echo"<b>Please fill the required information</b>";
}

}

echo"
<form action='' method='POST'>
<table class='w-100'>
<tr>
<td>To:</td>
<td><input type='text' class='form-control mb-2 shadow' name='to_user' value='$to_user'/></td>
</tr>
<tr>
<td>Subject</td>
<td>
<select id='subject' name='subject' value='$subject'>
  <option value='Registration'>Registration</option>
  <option value='Academic Advisory'>Academic Advisory</option>
  <option value='Course Questions'>Course Questions</option>
  <option value='university'>University Related</option>
  <option value='confidential'>Confidential</option>
</select>


</tr>
<tr>
<td>Message:</td>
<td><textarea name='message' class='form-control shadow' cols='50' rows='10'></textarea></td>
</tr>
<tr>

<td colspan='2' class='text-right'><input type='submit' name='submit' class='btn mt-3 btn-success shadow' value='Send Message' /></td>
</tr>
</table>
</form>
";


?>