<?php

include('connection.php'); 

$rate = $_POST['rating'];
$message = $_POST['message'];

$result = mysqli_query($con,"INSERT INTO contactform(rating, message) VALUES('$rate' , '$message')");  

if($result){
    header("Location: admin.php");
}
?>
