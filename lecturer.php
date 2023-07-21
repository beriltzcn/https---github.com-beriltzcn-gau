<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="lecturer.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lecturer</title>
</head>
<body>
	<div class="lecturer-form">
    <h1>Form</h1>
<form action="lecturer_valid.php" method="post">
	 <p>Name</p>
    <input type="name" name="name"  placeholder="Enter name" required />
     <p>Email</p>
    <input type="email" name="email" placeholder="Enter email" required />
     <p>Password</p>
    <input type="password" name="password" placeholder="Enter password" required />
    <button type="submit">Create</button>
</form>
</div>
</body>
</html>