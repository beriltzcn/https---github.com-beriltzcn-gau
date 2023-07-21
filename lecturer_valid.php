<?php

session_start(); 
include "connection.php";

$username = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password']; 



$query = mysqli_query($conn, "INSERT INTO users(email, password, name) VALUES('$email','$password','$username')");


echo"<b>New lecturer is created successfully.</b>";



?>