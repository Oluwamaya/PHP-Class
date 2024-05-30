<?php
 include ("./database/connectdb.php");
 session_start();
 $message =false;
 $is_success;
 if (isset($_GET["message"])) {
    // echo $_GET["message"];
    $message = true;
    $is_success = $_GET['message'];
    // $email = $_POST["email"];
    // $password = $_POST["password"];
}
 $user;
 if (isset($_SESSION['user_id'])) {
      echo "There is a user";
      $id = $_SESSION['user_id'];
      $query = "SELECT * FROM users WHERE id='$id' ";

      $info = mysqli_query($conn , $query);
      $user = mysqli_fetch_assoc($info);
    //   print_r($user);
    }else{
        echo "user not validated";
        header('Location : login.php?message=Please Login');
    }


 if (isset($_POST['logOut'])) {
    session_destroy();
    // $message =true;
    header('Location: login.php?message=Na you logOut');

 }

mysqli_close($conn)
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
     <div class="bg-secondary text-light">
      <?php
          if ($message) {
            echo $is_success;
          }else{
            echo"checking";
          }
      ?>

    </div>

    <br>
    <br>
    <main class="container-fluid col-5 text-center shadow shadow-danger shadow-lg">
        <h2>Welcome to dashboard <?php echo $user["firstname"]." ". $user["lastname"] ?> </h2>
        <form action="dashboard.php" method="post">

            <button class="btn btn-dark my-2 " name="logOut">LogOut</button>
        </form>
    </main>
</body>
</html>