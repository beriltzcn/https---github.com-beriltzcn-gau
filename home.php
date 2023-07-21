<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
</head>
<body>
<div class="container">
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-4 pt-1">
                            <span style="font-size:1.25rem;font-weight:bold">Hello, <?php echo $_SESSION['name']; ?></span>
                        </div> 
                        <div class="col-2 text-right">
                            <a class="btn btn-block shadow btn-dark" href='home.php?id=compose'>Compose</a>
                        </div>
                        <div class="col-2 text-right">
                           <a class="btn btn-block shadow btn-dark" href='home.php?id=inbox'>Inbox</a>
                        </div>
                        
                        <div class="col-2 text-right">
                            <a class="btn btn-block shadow btn-dark" href='home.php?id=sent'>Sent</a>
                        </div>
                        
                        <div class="col-2 text-right">
                            <a class="btn btn-block shadow btn-dark" href="logout.php">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-2">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                        <?php
                            $pages_dir = 'msg';
                            if(!empty($_GET['id']))
                            {
                                 $pages = scandir($pages_dir,0);
                                 unset($pages[0],$pages[1]);

                                 $id = $_GET['id'];
                                 if(in_array($id.'.inc.php', $pages))
                                 {
                                      include($pages_dir.'/'.$id.'.inc.php');
                                 }
                                 else
                                 {
                                      echo "PAGE NOT FOUND!";
                                 }
                            } 

                            else
                            {
                               include($pages_dir.'/inbox.inc.php');
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>

</body>
</html>

<?php 
}
else
{
    header("Location: index.php");
    exit();
}
 ?>
 