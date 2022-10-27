<?php
	session_start();

	if(isset($_POST['pay']))
        {
        function payment(){
            if($_POST){
            $dur = $_POST['duration'];
            $lid = $_POST['location'];

            include('connection.php');

            $sql = "SELECT cost from location where locationid = '$lid'";
            $result = $con-> query($sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $amount = (int)$dur * $row['cost'] ; 

            $_SESSION['amt']=$amount;
        }
        }
        

        $lid = $_POST['location'];
        $_SESSION['lid'] = $lid;
        $cno = $_POST['carnumber'];
        $checkin = $_POST['appt']; 
        $duration = $_POST['duration'];     

        date_default_timezone_set('Asia/Kolkata'); 

        $date1 = date('Y/m/d h:i' , strtotime($checkin));
        $adddate = strtotime($checkin) + $duration*3600 ;
        $checkout = date('Y/m/d h:i', $adddate);

        $status = "RESERVED";
        $bid = $_SESSION['ORDERREF'];

        include('connection.php');

        $sql = "INSERT into reserve (checkin,bookingid,carnum,reservationstatus,locationid,checkout) VALUES('$date1','$bid','$cno','$status','$lid','$checkout')"; 
        $sql1 = "UPDATE location SET spacelot = spacelot-1 WHERE locationid='$lid'";
        if($con->query($sql) === TRUE) {

        if($con->query($sql1) === TRUE){

        payment();
        header("Location: payment.php"); }

        else{echo "Error: " . $sql1 . "<br>" . $con->error;}
        }
        else{echo "Error: " . $sql . "<br>" . $con->error;}
    	}

        if(isset($_POST['paid'])){
        include('connection.php');

        $amt = $_SESSION['amt'];
        $bid = $_SESSION['ORDERREF'];
        $sql = "UPDATE reserve set payment = '$amt' , paymentstatus = 'YES' where bookingid = '$bid'";
        if($con->query($sql) === TRUE) {
            header("Location: invoiceprint.php");
         } 
        else{
            header("Location: payment.php"); }
        }
        
?>