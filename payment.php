<?php session_start()?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/rstyle.css">
    </head>
    <body background="img/bg.jpg">
        <div id="rstyle">
    
            <h3>Amount to be paid : Rs<?php echo $_SESSION['amt']; ?></h3>
            <div>
                <h1>Pay via:</h1>
            </div>

            <br><br>

            <div class="icon-container">
                <button class="round-corner-gpay" onclick="window.location.href='paymentGPay.php'"><img src="img/extra/gpoi.png"/></button>
            </div>

            <br><br>

            <div class="icon-container">
                <button class="round-corner-cards" onclick="window.location.href='paymentCards.php'"><h4>Credit/Debit Cards</h4></button>
            </div>

            <br><br>
            <input type="submit" value="Cancel" onclick="window.location.href='reserve.php'">
        </div>
    </body>
</html>