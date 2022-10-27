<?php session_start()?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/rstyle.css">
    </head>


    <body>
        <div id="rstyle">
            <form action="booking1.php" method="post">
            <h1>Payment - GPay</h1>
            <div class="icon-container">
              <img src="img/extra/gpoi.png"  />              
            </div>

        <div  style="text-align: center;">
            <label for="cname">&nbsp; UPI ID :</label>
            <label>&nbsp; luciferstrider@oksbi</label>
        </div>

        <div style="text-align: center;">
            <label for="cnum">&nbsp; QR Code :</label>
            <br>
            <img src="img/extra/qrcode.jpeg" width="300px" height="300px" />
        </div>
        <input type="submit" name="paid" value="paid">
    </form>
    </div>
    </body>

</html>