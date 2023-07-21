<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="login-form">
    <h1>Admin Login</h1>
<form name="myForm" action="admin_login.php" onsubmit="return validateForm()" method="post">
        <p>Username</p>
        <input type="text" name="username" placeholder="Enter Username">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <button type="submit">Login</button>  
</form>
</div>
<script>
function validateForm() {
  var name = document.forms["myForm"]["username"].value;
  var pass = document.forms["myForm"]["password"].value;
  if (name == "" || pass == "") {
    alert("Name and password must be filled out");
    return false;
  }
}
</script>
</body>
</html>
