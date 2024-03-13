<?php

include("database/connectdb.php");
 if(isset($_POST['submitme'])){
 $email = mysqli_escape_string($conn, $_POST['email']);
 $name = mysqli_escape_string($conn, $_POST['username']);
 $sql = "INSERT INTO phpclass (name, email, created_at)
 VALUES ('$name', '$email', NOW())";

 if(mysqli_query($conn, $sql)){
    echo "Data saved";
    header("Location: index.php");
 }else{
    echo "Cannot save data";
    
 }
 }
?>;


