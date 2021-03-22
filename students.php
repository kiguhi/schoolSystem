<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>School</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script scr="js/style.js"></script>
  <link href="css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-success text-white fixed-top"> 
    <div class="container">
      <a class="navbar-brand" href="projects.php"><span class="text-white"><img src="images/logo.png">BugTracker</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto"> 
          <li class="nav-item">
          <a class="nav-link text-white" href="users.php?action=Logout">Sign Out</a>
          </li>
        </ul>
      </div>
    </div> 
  </nav>

<div class="container">
  <div class="card" style="margin-top: 10px">
    <div class="card-header text-success bg-white text-center"><h3>Student Registration</h3></div>
    <div class="text-danger text-center">* Please insert all fields*</div>

    <div class="card-body">
           <img src="images/logo.webp" class="mx-auto d-block" >
           <div class="text-danger text-center"><?php echo $_GET['error']?></div>
           <form action="student_reg.php" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Enter Student Name" name="stu_name">
           </div>
           <div class="col">
            <input type="text" class="form-control" placeholder="Enter Student Email" name="stu_email">
          </div>
          </div>
          <div class="row" style="margin-top:20px">
            <div class="col">
              <input type="text" class="form-control" placeholder="Enter Student Phone Number" name="stu_phone">
           </div>
           <div class="col">
           <div class="input-group mb-3 input-group-sm">
           <div class="input-group-prepend">
            <span class="input-group-text">Select Gender</span>
            </div>
             <select class="form-control" id="sel1" name="stu_gender">
            <option>Male</option>
             <option>Female</option>
            </select>
           </div>
          </div>
          </div>
          <div class="row">
            <div class="col">
              <input type="text" class="form-control" placeholder="Enter Student age" name="stu_age">
           </div>
           <div class="col">
           <div class="custom-file">
             <input type="file" class="custom-file-input" id="customFile" name="file">
             <label class="custom-file-label" for="customFile">Choose file</label>
           </div>
          </div>
          </div>
          <div class="row">
          <div class="col-sm-6">
          <input type="submit" class="btn btn-success" style="margin-top: 10px;width: 100%;" value="Register Student" name="register"/>
         </div>
          </div>
        </form>
    </div>
  </div>
</div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
</html>
