<?php

session_start();

include('connection.php');

$rstatus = 'UNRESERVED';
$pstatus ='YES';

$paid = $_SESSION['AMOUNT'];
$checkout = date('Y/m/d h:i');

$carn = $_SESSION['BOOKINGID'];
$id = $_SESSION['lid'];

$sql1 = "UPDATE reserve SET reservationstatus='$rstatus' , paymentstatus='$pstatus' , payment='$paid' , checkout='$checkout' WHERE bookingid='$carn'";

$sql2 = "UPDATE location SET spacelot = spacelot + 1 WHERE locationid = '$id'";

if($con->query($sql1) === TRUE){

    if($con->query($sql2) === TRUE){
        header("Location: reserveemployee.php");
         }

    else{
            echo "Error: " . $sql1 . "<br>" . $con->error;}
        }

else{
      echo "Error: " . $sql2 . "<br>" . $con->error;
      }
?>