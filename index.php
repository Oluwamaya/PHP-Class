<?php

include("database/connectdb.php");
echo "welcome to php class <br>" ;
$text = "wy are we having errors <br>" ;
echo($text);
$name = "maya";
$allName = ["Daniel", "Sammy", "Vic"];
$myAge = 10 ;

$data = "SELECT * FROM phpclass";
$rez = mysqli_query($conn, $data);
$user = mysqli_fetch_all($rez, MYSQLI_ASSOC);


print_r($user);



$man = "besty";
var_dump($man);
 

for ($i=0; $i < count($allName) ; $i++) { 
    echo( "<br>" . $allName[$i] . "<br>");
}
//CASTING
//Implicit casting
$ss = 20;
$ww = "10";

$result = $ss + $ww;
echo($result);

//Explicit casting
$cow = "ram";
echo($cow);

$bem = "3.00";
$conVert = (float)$bem;
echo($conVert);

$ss = 50;
$ww = "10";

$result = $ss + (int)$ww;
echo($result);
include("app.php");

include("component/footer.php");
//STRING METHODS
//FOR LOOP
?>
<?php 
$color = "red";
$fontSize = "20px";
$fontSize2 = "40px";
$color2 = "green";
$color3 = "blue";
$listStyle= "none"

?>

<?php 
$dimention = [
    ["Daniel"=>"Rice","Samuel", "Beans"],
    ["Victor"=>"water", "David", "Juice"]
];


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
<h1>my name is <?php echo $name ?>  and age is <?php echo $myAge?></h1>
       <ul>
        <li style="color: <?php echo($color)?>; font-size: <?php echo($fontSize)?>; list-style: <?php echo($listStyle)?>"> My tutor name is Dev <?php echo($allName[0]) ?></li>
        <li style="color :<?php echo($color2)?>;font-size: <?php echo($fontSize2)?>"> My veryGoodMan name is  <?php echo($allName[1]) ?></li>
        <li style="color :<?php echo($color3)?>;font-size: <?php echo($fontSize)?>"> My gee name is Dev <?php echo($allName[2]) ?></li>

       </ul>;
<?php for ($i=0; $i < count($allName) ; $i++) { 
    echo($allName[$i]);
} ?>;
   <?php foreach($dimention[1] as $el){ ?>
        <p><?php echo $el ?></p>
        <?php } ?>;
<?php include("app.php")?>
     <form method="POST" action="data.php">

     <input  name="username" type="text">
     <button type="submit">send</button>
     </form>

   
       <?php  include("component/footer.php")?>

       <h1>my name is <?php echo(substr($text, 3 ,6))?></h1>


       <center>
       <form class="p-3 rounded mt-3 mx-auto shadow border w-50 " action="data.php" method="POST">
        <h3 class="items-center flex">    Register User</h3>
        <input type="text" placeholder="Enter ur username" class="form-control my-2 " name="username"><br>
        <input type="email" class="form-control my-2" placeholder="Enter yout email" name="email"><br>
        <button type="submit" name="submitme" class="btn btn-primary">click me</button>

       </form>

       </center>
       <table>
        <thead>
            <tr>
                <td>No</td>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Created_At</td>
                <td>Delete</td>
                <td>Edit</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach($user as $ind => $el){?>
                <tr>
                    <td><?php echo $ind + 1 ?></td>
                    <td><?php echo $el["id"];?></td>
                    <td><?php echo $el["name"];?></td>
                    <td><?php echo $el["email"];?></td>
                    <td><?php echo $el["created_at"];?></td>
                    <td><button><a href="processDel.php?id=<?php echo $el['id']?>">Del</a></button></td>
                    <td><button><a href="processEdit.php?id=<?php echo $el['id']?>">Edit</a></button></td>
                </tr>
                <?php } ?>

        </tbody>
       </table>

</body>
</html>