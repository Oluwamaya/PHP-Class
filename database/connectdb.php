<?php 
$conn = mysqli_connect("localhost", "root", "", "users");

if ($conn) {
    
    echo"<h1>Database connected </h1>";
}else{
    echo"Connection error";

    echo mysqli_connect_error();
}
?>