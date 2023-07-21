<?php

include("connection.php");


$email = $_SESSION['email'];


$view_msg = mysqli_query($conn, "SELECT * FROM messages WHERE from_user='$email'");
$row = mysqli_num_rows($view_msg);


if($row!=0){
    echo "
    <table class='table table-bordered table-hover table-striped w-100'>
    <tr>
    ";

    while($row = mysqli_fetch_assoc($view_msg)){
    
        $id = $row['id'];       
        $to_user = $row['to_user'];
        echo "<td>To: </td>";
        echo "<td>".$to = $row['to_user']."</td>";
        echo "<td>From: </td>";
        echo "<td>".$from = $row['from_user']."</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>Subject:    </td>";
        echo "<td>".$subject = $row['subject']."</td>";
        echo "</tr>";
        echo "<tr>";
      
        echo "<td>Message:</td>";
        echo "<td>".$message = $row['message']."</td>";
        
        echo "</tr>";
    }
    

echo "</table>";   
echo "<br>";
echo "<br>";
if($to_user==$email){
    $up = mysqli_query($conn, "UPDATE messages SET seen='1' WHERE id='$id'");
    }

}
else{
echo "You cant see the messages!";

}

?>