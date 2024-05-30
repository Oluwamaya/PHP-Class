<?php

include("./database/connectdb.php");
session_start();
$message = false;
$is_success;

if (isset($_GET["message"])) {
    // echo $_GET["message"];
    $message = true;
    $is_success = $_GET['message'];
    // $email = $_POST["email"];
    // $password = $_POST["password"];
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo $password;
    $sql = "SELECT * FROM  users WHERE email = '$email'";
    $res = mysqli_query($conn , $sql);
    $query = mysqli_fetch_assoc($res) ;
    if ($query) {
        // print_r($query);
    if (password_verify($password , $query['password'])) {
        $message = true;
        echo'i am here';
        // $is_success = true;
        $_SESSION['user_id'] = $query['id'];
        // $_SESSION['user_email'] = $query['email'];
        header('Location: dashboard.php?message=Login successful');
        // header("Location : dashboard.php?message=Login successful");
    }else{
        $message = "Invalid credentials.";
        echo "Invalid credentials";
        header('Location: login.php?message=Invalid Credentials');
        // $is_success = false;
    }
}else{
    echo "User Not found" . mysqli_error($conn);
    header('Location: login.php?message=Invalid Credentials');
}
  mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="bg-success text-light p-2 ">
      <?php
          if ($message) {
            echo $is_success;
          }
      ?>

    </div>

    <br>
    <br>
     <form action="login.php" method="post" class="form-group bg-secondary text-light p-4 col-6 ">
     <div class="form-group ">
        <label for="email" class="form-label">Email:</label>
        <input class="form-control  bg-dark text-light " type="email" name="email" id="email">

     </div>
     <div class="form-group">
        <label for="password" class="form-label">Password:</label>
        <input class="form-control bg-dark text-light" type="password" name="password" id="password">

        <button name="login">Login</button>

     </div>


     </form>
</body>
</html>