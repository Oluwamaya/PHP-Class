<?php

include("database/connectdb.php");


if (empty($_POST['firstname'])) {
   die('Username cannot be empty');
}
if (empty($_POST['lastname'])) {
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
if (!preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).+$/",$_POST['password'])) {
   die("password must contain Capital letter  and Numbers");  
}
if($_POST['password'] !== $_POST['c_password']){
   die('password did not match');

}

$pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

   $is_success;
   $message = false;


 if(isset($_POST['submitme'])){
 $email = mysqli_escape_string($conn, $_POST['email']);
 $firstname = mysqli_escape_string($conn, $_POST['firstname']);
 $lastname = mysqli_escape_string($conn, $_POST['lastname']);
 $sql = "INSERT INTO users (firstname, lastname, email, password)
 VALUES ('$firstname', '$lastname', '$email', '$pass_hash')";

 if(mysqli_query($conn, $sql)){
    echo "Data saved";
    $message = true;
    header("Location: login.php?message=Registration Succesful");
 }else{
   echo "Cannot save data";
   echo mysqli_errno($conn);

   
   if(mysqli_errno($conn) === 1062 ){
      die("Email already taken");
   }
 }
 }
?>;


