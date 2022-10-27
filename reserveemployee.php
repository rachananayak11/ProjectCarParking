<?php session_start()?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/reserve.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/templatemo-hexashop.css">
    <link rel="stylesheet" href="css/header.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css"></link>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" style="background-color: #4EA1D3; width: 100%; height:100%; ">
  <div class="row">
    <div class="col-sm-10" style="font : 200px ; color: white;"><h1>CAR PARKING MANAGEMENT</h1></div>
    <div class="col-sm-2">  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">USER
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="logout.php">LOGOUT</a></li>
    </ul>
  </div>
</div>
  </div>
</div>

  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
            <div class="card">
                <form class="form-card" action = "booking.php" method = "post">

                  <div class="row justify-content-between text-left">
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
                    <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">BOOKING ID</label>
                          <?php echo $_SESSION['ORDERREF']?> </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">LOCATION NAME</label>
                        <?php
                        include('connection.php'); 
                        $id =  (int)$_SESSION['lid'];
                        $sql = "select * from location where locationid = '$id' ";  
                        $result = mysqli_query($con, $sql);  
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        ?>
                        <?php echo $row["locationname"]; ?></div>

                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">SPACE AVAILABLE</label> <?php echo $row["spacelot"]; ?></div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-2 flex-column d-flex"> <label class="form-control-label px-3">CAR NUMBER</label>  </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> <input type="text" id="carnumber" name="carnumber" placeholder="ENTER CAR NUMBER IN CAPS" pattern="^[A-Za-z]{2}[0-9]{1,2}[A-Za-z]{1,2}[0-9]{1,4}$" required/> </div>
                    </div>

                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">CHECK-IN</label>
                          <?php date_default_timezone_set('Asia/Kolkata'); $date = date('h:i');echo $date; ?> </div>
                    </div>
            
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> <button type="submit" class="btn-block btn-primary" name="save">RESERVE</button> </div>
                    </div>
                </form>
            </div>
        </div>
  <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
  <table border="2">
      <tr>
          <th style="background-color:#4EA1D3;color:white;text-align:center;">BOOKING ID</th>
          <th style="background-color:#4EA1D3;color:white;text-align:center;">CAR NUMBER</th>
          <th style="background-color:#4EA1D3;color:white;text-align:center;">CHECK-IN TIME</th>
      </tr>
      <tr>
        <?php
        include('connection.php');

        $id =  (int)$_SESSION['lid'];

        $sql = "SELECT bookingid , carnum , checkin from reserve where reservationstatus = 'RESERVED' and locationid = '$id'";
        $result = $con-> query($sql);

        if($result-> num_rows > 0){
          while ($row = $result-> fetch_assoc()){
            echo "<tr><td>".$row["bookingid"]."</td><td>".$row["carnum"]."</td><td>".$row["checkin"]."</td></tr>";
          }
          echo "</table>";
        }
        else{
          echo "0 result";
        }

        ?>
  </table>
</div>
</div>
</div>
  <div class="container-fluid px-1 py-5 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
          <div class="card">
          <form class="form-card" action="pay.php"  method="post">
            <div class="row justify-content-between text-left">
              <div class="form-group col-sm-2 flex-column d-flex"><label class="form-control-label px-3">CAR NUMBER</label></div>
              <div class="form-group col-sm-6 flex-column d-flex"><input type="text" id="cnum" name="cnum" placeholder="ENTER CAR NUMBER IN CAPS" pattern="^[A-Z]{2}[0-9]{1,2}[A-Z]{1,2}[0-9]{1,4}$" required/></div>
              <div class="form-group col-sm-3 flex-column d-flex"><button type="submit" class="btn btn-primary" name="unreserve">UNRESERVE</buttton></div>
            </div>
          </form>
        </div></div></div></div>
</body>
</html>