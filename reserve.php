<?php session_start();?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/rstyle.css">
</head>

<body background="img/bg.jpg">
    <div id="body">
        <form id="rstyle" action="booking1.php" method="post">
            <div>
                <h1>RESERVE</h1>
            </div>
            <br><br>
                    <?php
                    function generate_order(){
                    $order_ref="";
                    $char=array('O','T','R','S','A','C','B','E');
                    $num=rand(11,99);
                    $num2=rand(12,89);
                    $num3=rand(13,92);
                    shuffle($char);
          
                    $order_ref=$char[0].$char[3].$num.$char[1].$num2.$char[2].$num3.$char[4];
      
                    $_SESSION['ORDERREF']=$order_ref;
                    }
                    generate_order();
                    ?>
        <label for="orderid">BOOKING ID</label>
        <?php echo $_SESSION['ORDERREF']?>  <br><br>     
      
        <label for="location">Location</label>
        <select id="location" name="location"> 
            <?php 
            include('connection.php'); 
            $sql = "SELECT * FROM location";
            $all_categories = mysqli_query($con,$sql);
            while ($location = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):; 
            ?>
            <option value="<?php echo $location["locationid"];?>">
                    <?php echo $location["locationname"];
                    ?>
                </option>
            <?php 
                endwhile; 
            ?>
        </select>

          <br><br>
    
          <label for="carnumber">Car number</label>
          <input type="text" id="carnumber" name="carnumber" pattern="^[A-Z]{2}[0-9]{1,2}[A-Z]{1,2}[0-9]{1,4}$" placeholder="ENTER CAR NUMBER IN CAPS" required/>

          <br><br>
    
            <label for="appt">Select a time:</label>
            <input type="time" id="appt" name="appt" required/>

            <br><br>

            
      
          <label for="duration">Duration</label>
          <select id="duration" name="duration">
            <option value="1">1 hr</option>
            <option value="2">2 hrs</option>
            <option value="3">3 hrs</option>
            <option value="4">4 hrs</option>
            <option value="6">6 hrs</option>
            <option value="10">10 hrs</option>
          </select>
      
          <br><br>
    
          <input type="submit" name="pay" value="pay">
          <input type="submit" value="cancel" onclick="window.location.href='admin.php'">
      
        </form>
    </body>
</html>  