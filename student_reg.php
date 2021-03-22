<?php
session_start();
require 'config.php';
if(isset($_POST["register"])){
$name=$_POST['stu_name'];
$email=$_POST['stu_email'];
$phone=$_POST['stu_phone'];
$gender=$_POST['stu_gender'];
$age=$_POST['stu_age'];

$statusMsg = '';
// File upload path
$maxsize=104857600;
$targetDir = "StudentImages/";
$fileName = $_FILES["file"]["name"];
$targetFilePath = $targetDir . $_FILES["file"]["name"];
$fileType =strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
// Allow certain file formats
$allowTypes = array('jpg','png','jpeg','gif','pdf','mp4','avi','3gp','mov','mpeg');
if(in_array($fileType, $allowTypes)){
    // Upload file to server
    if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
        // Insert image file name into database
       
        $sql1="SELECT email FROM students WHERE email='$email'";
       $result=$conn->prepare($sql1);
       $result->execute();
     if($row = $result->fetch(PDO::FETCH_ASSOC)){
      header('Location: students.php?error=student aready exists!');
     }else{
        $sql=$conn->prepare("INSERT INTO students(studentName,email,phoneNumber,gender,age,studentImage,reg_date) VALUES
        ('$name','$email','$phone','$gender','$age','".$targetFilePath."',NOW())");  
         $sql->execute();
         header('Location: students.php');
         exit();  
     }  
        }  
        else{
          header('Location: students.php?error=Sorry, there was an error uploading your file');
         exit();  
      }       
}
else{
    header('Location: students.php?error=Invalid file extention');
    exit();  
  } 
}

if (isset($_POST["update"])) {
    $name=$_POST['edt_name'];
    $email=$_POST['edt_email'];
    $phone=$_POST['edt_phone'];
    $age=$_POST['edt_age'];
    $student=$_POST['student'];
    $statusMsg = '';
    // File upload path
    $maxsize=104857600;
    $targetDir = "StudentImages/";
    $fileName = $_FILES["file"]["name"];
    $targetFilePath = $targetDir . $_FILES["file"]["name"];
    $fileType =strtolower(pathinfo($targetFilePath,PATHINFO_EXTENSION));
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','mp4','avi','3gp','mov','mpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
            // Insert image file name into database
           
            $sql2="UPDATE students SET studentName='$name',email='$email', phoneNumber='$phone', age='$age',studentImage='$targetFilePath'
            WHERE id=$student";
            $stm=$conn->prepare($sql2);
            $stm->execute();
            header('Location:viewstudents.php'); 
            }  
            else{
              header('Location: viewstudents.php?error=Sorry, there was an error uploading your file');
             exit();  
          }       
    }
    else{
        header('Location: viewstudents.php?error=Invalid file extention');
        exit();  
      } 
  }

?>