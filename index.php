<?php
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Issue Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="card" style="margin-top: 40px;width:50%;margin-left:25%;">
    <div class="card-header text-success bg-white text-center"><h3>Issue Tracking System | Login</h3></div>
    <div class="card-body">
           <img src="images/logo.webp" class="mx-auto d-block">
          <form action="users.php" method="post">
            <div class="form-group">
            <h5><?php
            echo $_SESSION['error'];
            session_destroy();?></h5>
              <label for="email"></label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd"></label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
            </div>
            <div class="form-group form-check" style="margin-top: 10px;">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" > Remember me
              </label>
            </div>
            <input type="submit" class="btn border border-success " style="margin-top: 10px;width: 100%;" value="Log in" name="login"/>
            <p style="margin-top: 20px;">Don't have an account?
                <a href="register.php" style="margin-top: 10px;"><span>Register here</span></a><br>
                <a href="forgotpass.php">Forgot Password?</a></p>
          </form>
    </div>
  </div>
</div>
      <script type="text/javascript">
        window.history.forward(1);
      </script>
</body>
</html>
