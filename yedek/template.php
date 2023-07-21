<?php

session_start();
$_SESSION['name'] = "Beril Tezcan";
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <script src="js/jq.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/7098157216.js"></script>
</head>
<body>

    <nav class="navbar shadow-lg navbar-expand-lg navbar-light" style="background: linear-gradient(0deg, rgba(255,255,255,1) 0%, rgba(51,51,51,1) 100%);">
        <a class="navbar-brand" href="#">
            <img src="https://www.gau.edu.tr/storage//uploads/0/0/0/logotr-1580914525.png?vs=1" style="height:70px" />
        </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse  navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
       
       <li class="nav-item dropdown " style="margin-right:50px">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-lg fa-globe"></i>
        </a>
        <div class="dropdown-menu shadow-lg dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-lg fa-language"></i> Türkçe</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="fas fa-lg fa-language"></i> English</a>
        </div>
      </li>
       
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-lg fa-user-circle"></i> <?=$_SESSION['name'];?>
        </a>
        <div class="dropdown-menu shadow-lg dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#"><i class="fa fa-key fa-lg"></i> Change Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#"><i class="fa fa-lg fa-sign-out-alt"></i> Log Out</a>
        </div>
      </li>
     
    </ul>
    
  </div>
</nav>
    
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12">
            
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-light"><b>Messages</b></div>
                <div class="card-body">
                    
                    <button type="button" class="mb-2 btn btn-dark shadow" data-toggle="modal" data-target="#composeModal"><i class="fas fa-lg fa-scroll"></i> Compose</button>
                    
                    <table class="table   table-bordered table-hover table-striped w-100">
                        <thead class="bg-secondary text-light">
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">From</th>
                                <th class="text-left">Message</th>
                                <th class="text-center">Option</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                           <tr>
                                <td style="vertical-align:middle" class="text-center">123</td>
                                <td style="vertical-align:middle" class="text-center">27.05.2021</td>
                                <td style="vertical-align:middle" class="text-center">General</td>
                                <td style="vertical-align:middle" class="text-center">İbrahim Erşan</td>
                                <td style="vertical-align:middle" class="text-left">There is a class today. </td>
                                <td class="text-center">
                                    <button class="btn btn-success"><i class="fas fa-lg fa-reply"></i> Answer</button> | <button class="btn btn-danger"><i class="fa fa-lg fa-trash-o"></i> Delete</button>
                                </td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
    
    

<!-- MODAL -->

<div class="modal fade" id="composeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-dark text-light">
        <h5 class="modal-title" id="exampleModalLabel">Compose Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
              <div class="col-6">
                  <b>Select Recipent</b>
                  <select class="form-control mt-2 ">
                      <option value="1">İbrahim Erşan</option>
                      <option value="2">Ali Haydar</option>
                  </select>
              </div>
              <div class="col-6">
                  <b>Select Category</b>
                  <select class="form-control mt-2 ">
                      <option value="1">About Exams</option>
                      <option value="2">About Course</option>
                  </select>
              </div>
          </div>
          
          <div class="row mt-2">
              <div class="col-12">
                  <textarea class="form-control" rows="10" placeholder="Enter Your Message Here"></textarea>
              </div>
          </div>
      </div>
        
      <div class="modal-footer bg-light " style="">
        
        <button type="button" class="btn btn-success  shadow-lg"><i class="fa fa-fw fa-lg fa-paper-plane"></i> SEND</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL -->

</body>
</html>


 