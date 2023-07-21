<html>
<head>
	<title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
</head>
<body>
<div class="container">
    <div class="row mt-3 justify-content-center">
        <div class="col-6">
            <form action="login.php" method="post">
            <div class="card">
                <div class="card-header bg-dark text-light"><b>Login</b></div>
                <div class="card-body">
                    
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>
                
                    <label>E-Mail</label>
                    <input class="form-control mt-2" type="text" name="email" placeholder="email"><br>

                    <label>Password</label>
                    <input class="form-control mt-2" type="password" name="password" placeholder="Password"><br>
                </div>
                <div class="card-footer text-right bg-light">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </div>
            </form>
            <br>
            <div class="text-center d-grid gap-2">
                <a href="signup.php" class="btn btn-secondary btn-block" role="button">Click Here To Create Account</a>
            </div>
            <br>
            <div class="text-center d-grid gap-2">
                <a href="admin.php" class="btn btn-secondary btn-block" role="button">Admin Login</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>