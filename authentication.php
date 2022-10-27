<?php   
    session_start();
    include('connection.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from login where userid = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
        $count = mysqli_num_rows($result);   
        if($count == 1){   
            $_SESSION['lid']=$row["locationid"];
            header("Location: reserveemployee.php");  
        }  
        else{
            header("Location: admin.php");
        }      
?>  