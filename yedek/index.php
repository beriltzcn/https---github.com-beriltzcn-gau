<html>
<head>
    <title>LOGIN</title>
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
                
                <div class="card-header bg-dark text-light"><b>LOGIN</b></div>
                <div class="card-body">
                    <?php if (isset($_GET['error'])) { ?>
                    <div class="alert alert-danger shadow text-center"><?=$_GET['error'];?></div>
                    <?php } ?>  
                            
                    <b>E-Mail (*)</b>
                    <input data-toggle="tooltip" title="This Field Is Required" type="email" class="form-control mt-2 mb-3 shadow" name="email" placeholder="Enter Your E-Mail Address" required />

                    <b>Password (*)</b>
                    <input data-toggle="tooltip" title="This Field Is Required" type="password" class="form-control mt-2 mb-3 shadow" name="password" placeholder="Enter Your Password" required />
                </div>
                <div class="card-footer text-right" style="background:#eeeeee">
                    <button name="studenLogin" class="btn btn-lg shadow btn-success" type="submit">Student Login</button>
                </div>
            </div>
            </form>
            <br>
            <div class="text-center">
                <a href="signup.php">Create Account</a>
            </div>
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
