<?php      
    $host = "localhost";  
    $user = "root";  
    $password = "";  
    $db_name = "carspace";  
      
    $con = new mysqli($host, $user, $password, $db_name);
    $db = mysqli_select_db($con , $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  