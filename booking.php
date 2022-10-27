<?php
	session_start();

    if(isset($_POST['save'])){

    include('connection.php');

    $carno = $_POST['carnumber'];

    $checkcode = mysqli_query($con,"SELECT carnum FROM reserve WHERE carnum='$carno' and reservationstatus='RESERVED'" );  
    if((!$checkcode) || (mysqli_num_rows($checkcode) >0))
    { 

    echo  "carnumber already exists!!.";     

    }    
    else{
    
   	date_default_timezone_set('Asia/Kolkata'); 

    $checkin = date('Y/m/d h:i');

    $status = "RESERVED";
    $pstatus ="NO";

    $bid = $_SESSION['ORDERREF'];
    $id = $_SESSION['lid'];


    $sql = "INSERT into reserve (checkin,bookingid,carnum,reservationstatus,locationid,paymentstatus) VALUES('$checkin','$bid','$carno','$status','$id','$pstatus')"; 
    $sql1 = "UPDATE location SET spacelot = spacelot-1 WHERE locationid='$id'";
    if($con->query($sql) === TRUE){

        if($con->query($sql1) === TRUE){
        header("Location: invoiceprint.php");
         }

        else{
            echo "Error: " . $sql1 . "<br>" . $con->error;}
    }

    else{
        echo "Error: " . $sql1 . "<br>" . $con->error;
        }
    }
    }
    
?> 