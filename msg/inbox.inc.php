<?php

include("connection.php");

$email = $_SESSION['email'];




$view_msg = mysqli_query($conn, "SELECT * FROM messages WHERE to_user='$email'");



$row = mysqli_num_rows($view_msg);





if($row!=0)
{
  echo"<table class='table table-bordered table-hover table-striped w-100'>";
  echo"<tr>";
  echo "<td>&nbsp; ";
  echo "</td>";
  echo "<td> From: </td>";
  echo "<td>Subject: </td>";
  echo "<td>Date:</td>";
  echo "</tr>";

    while($rows = mysqli_fetch_assoc($view_msg)){
        $id = $rows['id'];
     echo "<tr>";
     echo "<td>&nbsp;</td>";
     echo "<td>".$from = $rows['from_user']."</td>";
     echo "<td><a href='home.php?id=read&mid=$id'>".$subject = $rows['subject']."</a></td>";
     echo "<td>".$date = $rows['date']."</td>";
     
    echo "</tr>";
    }


}
else
{
echo "<table  class='table table-bordered table-hover table-striped w-100'><tr><td>&nbsp;</td><td>From: &nbsp;&nbsp;&nbsp;&nbsp;</td><td>Subject:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </td><td>Date: </td></tr><tr><th>You Didn't receive any messages!</th></tr></table>";
}
echo "</table>";
?>