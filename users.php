<?php
session_start();
require 'config.php';
if(isset($_POST["register"])){
$name=$_POST['names'];
$email=$_POST['email'];
$password=$_POST['password'];
$confirm=$_POST['confirm'];
$role=$_POST['role'];

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);

if ($uppercase && $lowercase && $number && strlen($password) >= 8) 
{
  if ($password==$confirm) {
    if ($role=='Student') {
      $sql = $conn->prepare("INSERT INTO user(username,email,password,role,reg_date) VALUES
    ('$name','$email','$password','$role',NOW())");
    $sql->execute();
    header('Location: students.php');
    exit();
    }elseif ($role='Admin') {
     $sql1="SELECT username,email FROM user WHERE username='$name' OR email='$email'";
     $result=$conn->prepare($sql1);
     $result->execute();
     if($row = $result->fetch(PDO::FETCH_ASSOC)){
      header('Location: index.php?error=usename or email aready exists!');
     }else{
      $sql = $conn->prepare("INSERT INTO user(username,email,password,role,reg_date) VALUES
      ('$name','$email','$password','$role',NOW())");
      $sql->execute();
      header('Location: viewstudents.php');
     }
    }
    

  }else {
    header('Location: index.php?error=Passwords do not match');
  }
 }else{
  header('Location: index.php?error=password does not meet requirements');
 }

}

if(isset($_POST["login"])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT email,password,role FROM user WHERE email='$email' and password='$password'";
    $result=$conn->prepare($sql);
    $result->execute();

    if($row = $result->fetch(PDO::FETCH_ASSOC)){
        if ($row['role']=='Admin') {
          header('Location: viewstudents.php');
          exit();
        }elseif ($row['role']=='Student') {
          header('Location: students.php');
        }
      } else{
      $_SESSION['error']="Incorrect Credentials";
      header('Location: login.php');
      }
       
      if (isset($_POST['remember']) ) {
        setcookie ("username",$email,time()+ 3600);
       }
       else {
        setcookie("username","");
      }
  }

  if(isset($_REQUEST['action'])=='Logout'){
    session_start();
    session_unset();
    session_destroy();
    header('Location: index.php');
  }
?>
