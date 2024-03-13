<?php 
echo $_GET['id'];
$id =  $_GET['id'];

include("database/connectdb.php");

if ($id) {
    $sqi = "DELETE FROM phpclass WHERE id =$id";
    $res = mysqli_query($conn , $sqi);
    if ($res) {
        echo"DELETED";
        header("Location: index.php");

    }else {
        die("can't be deleted". mysqli_error($conn));
    }
}
?>