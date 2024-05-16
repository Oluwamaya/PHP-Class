<?php

// include("database/connectdb.php");


if (empty($_POST['username'])) {
   die('Username cannot be empty');
}
if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
   die("Not a valid Email");
}
if(strlen($_POST['password']) < 8){
   die('password cannot be a lesser than 8');
}
if (!preg_match("/[a-z]/i",$_POST['password'])) {
   die("password must contain letters");  
}
if (!preg_match("/[0-9]/",$_POST['password'])) {
   die("password must contain NUMBERS");  
}
if($_POST['password'] !== $_POST['c_password']){
   die('password did not match');

}

$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);




 if(isset($_POST['submitme'])){
 $email = mysqli_escape_string($conn, $_POST['email']);
 $name = mysqli_escape_string($conn, $_POST['username']);
 $sql = "INSERT INTO authentication (name, email, password)
 VALUES ('$name', '$email', '$pass_hash')";

 if(mysqli_query($conn, $sql)){
    echo "Data saved";
    header("Location: index.php");
 }else{
   echo "Cannot save data";
   echo mysqli_errno($conn);
   
   if(mysqli_errno($conn) === 1062 ){
      die("Email already taken");
   }
 }
 }
?>;


