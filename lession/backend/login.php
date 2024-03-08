<?php
include "connection.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
 
  $email=$_POST['user-email'];
  $password=$_POST['user-pass'];


  $sql="SELECT * FROM `users` WHERE email = '$email' ";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result);
  if($num==1){
  $data=mysqli_fetch_assoc($result);

  if($data["password"]== "$password"){
 
    session_start();
    $_SESSION["name"]=$data["name"];
    $_SESSION["email"]=$data["email"];
     header("Location: http://localhost/lession/welcome.php");  
   

  }else{
    echo "Invalid Email or Password.";
  }

 
 
}else{
    echo "account doesn't exits with this email! Please Sign Up.";
}
}
?>