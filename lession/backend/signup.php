<?php
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $name=$_POST['user-name'];
  $email=$_POST['user-email'];
  $password=$_POST['user-pass'];
  $cpassword=$_POST['cpass'];

  $sql="SELECT * FROM `users` WHERE email = '$email' ";
  $result=mysqli_query($conn,$sql);
 
  $num=mysqli_num_rows($result);
  if($num> 0){
    echo"this email has already account";
    }else{
        if($password==$cpassword){

            $sql1="INSERT INTO `users`( `name`, `email`, `password`) VALUES ('$name','$email','$password') ";
            $result1=mysqli_query($conn,$sql1);
            if($result1){
                echo "inserted sucessfully";
                header("Location:http://localhost/lession/login.php");
            }
        }else{
            echo"Password comfirm password donot matched";
        }
       
    }
}
?>