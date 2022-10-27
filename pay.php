<?php

session_start();

if(isset($_POST['unreserve'])){

			$cnum = $_POST['cnum'];

			include('connection.php');

			$sql1 = "SELECT * FROM reserve WHERE carnum = '$cnum'";
			$result1 = $con-> query($sql1);
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC); 

            $_SESSION['BOOKINGID'] = $row1['bookingid'];

            $checkin = $row1['checkin'];
            $lid = $row1['locationid'];
            date_default_timezone_set('Asia/Kolkata'); 
            $checkout = date('Y/m/d h:i');

            $sql2 = "SELECT * FROM location WHERE locationid='$lid'";
            $result2 = $con-> query($sql2);
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

            $cost = $row2['cost'];

            if(row1['paymentstatus'] == 'YES'){

            $t1 = strtotime($checkin); 
            $t2 = strtotime($checkout);

            $dur = round(abs($t2 - $t1)/3600,1);

            $amt = (int)$cost * $dur;

            $_SESSION['AMOUNT'] = $amt - $row1['payment'];

            }
            else{

            $t1 = strtotime($checkin); 
            $t2 = strtotime($checkout);

            $dur = round(abs($t2 - $t1)/3600,1);

            $amt = (int)$cost * $dur;

            $_SESSION['AMOUNT'] = $amt;
            }

			header("Location: payemplyee.php");
}
?>