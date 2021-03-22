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
  <script>
    function checkPasswordMatch() {
    var password = $("#txtNewPassword").val();
    var confirmPassword = $("#txtConfirmPassword").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Passwords do not match!").addClass('text-danger').removeClass('text-success');

    else
        $("#divCheckPasswordMatch").html("Passwords match.").addClass('text-success').removeClass('text-danger');
}
function test_str() { 
    var res; 
    var str = $("#txtNewPassword").val(); 
    if (str.match(/[a-z]/g) && str.match( 
            /[A-Z]/g) && str.match( 
            /[0-9]/g)&& str.length >= 8) 
    { $("#divValidatepass").html("Password Okay.").addClass('text-success').removeClass('text-danger'); }
    else {$("#divValidatepass").html("Password must have Uppercase letter,number a minimum of 8 characters!").addClass('text-danger').removeClass('text-success');}
} 
  </script>
</head>
<body>

<div class="container">
  <div class="card" style="margin-top: 40px;width:50%;margin-left:25%;">
    <div class="card-header text-success bg-white text-center"><h3>Registration</h3></div>
    <div class="text-danger text-center">* Please insert all fields*</div>

    <div class="card-body">
           <img src="images/logo.webp" class="mx-auto d-block" >
          <form action="users.php" method="post">
          <div class="text-danger text-center"><?php echo $_GET['error']?></div>
            <div class="form-group">
                <label for="names"></label>
                <input type="text" class="form-control" id="names" placeholder="Enter Full Name" name="names" required>
              </div>
              <div class="form-group">
              <label for="sel1">Select Role:</label>
              <select class="form-control" id="sel1" name="role">
               <option>Admin</option>
               <option>Student</option>
              </select>
             </div>
            <div class="form-group">
              <label for="email"></label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
            </div>
            <div class="form-group">
              <label for="pwd"></label>
              <input type="password" class="form-control" placeholder="Enter password" name="password" id="txtNewPassword" required onkeyup="test_str();">
              <div class="registrationFormAlert" id="divValidatepass"></div>
            </div>
            <div class="form-group">
              <label for="pwd"></label>
              <input type="password" class="form-control" placeholder="Confirm password" name="confirm" required id="txtConfirmPassword" onkeyup="checkPasswordMatch();">
            </div>
            <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
            <div class="form-group form-check" style="margin-top: 10px;">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" > Remember me
              </label>
            </div>
            <input type="submit" class="btn border border-success" style="margin-top: 10px;width: 100%;" value="Register" name="register"/>
            <p style="margin-top: 20px;">Already have an account?
                <a href="index.php" style="margin-top: 10px;"><span>Log in</span></a><br>
          </form>
    </div>
  </div>
</div>
</body>
</html>
