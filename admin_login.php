<?php
session_start(); 
include "connection.php";


$username = $_POST['username'];
$password = $_POST['password'];
$sql = mysqli_query($conn, "select * from admin where ausername = '$username' && password = '$password'");
$numrows = mysqli_num_rows($sql);
if($numrows > 0)
   {
    header('location:admin_home.php');
   }
else
   {
    header('location:admin.php');
   }

?>