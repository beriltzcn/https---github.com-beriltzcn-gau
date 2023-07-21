<?php 
include("connection.php");

if(!isset($_GET["code"])){
exit("Page expired try again");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($conn, "SELECT email FROM resetpasswords WHERE code='$code'");
$getname = mysqli_query($conn, "SELECT name FROM resetpasswords WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery) == 0){
 exit("Page expired try again");
}


if(isset($_POST["password"])){
$pw = $_POST["password"];

$row = mysqli_fetch_array($getEmailQuery);
$email = $row["email"];
$row = mysqli_fetch_array($getname);
$name1 = $row["name"];








$query = mysqli_query($conn, "INSERT INTO users(email, name) VALUES('$email','$name1')");



//CHANGE NEEDED DOWN HERE
$query = mysqli_query($conn, "UPDATE users SET password='$pw' WHERE email='$email'");



if($query){
    $query = mysqli_query($conn, "DELETE FROM resetpasswords WHERE code='$code'");
    exit("Password set successfully");
}
else{
    exit("Something went wrong");
}

}

?>



<form method="POST">

<input type="password" name="password" placeholder="New password">
<br>
<br>
<input type="submit" name="submit" value="Update password">

</form>