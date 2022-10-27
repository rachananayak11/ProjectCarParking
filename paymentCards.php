<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/rstyle.css">
        </head>


    <body>
        <div id="rstyle">
        <form action="booking1.php" method="post">
            <h1>Accepted Cards</h1>
            <div class="icon-container">
              <img src="img/extra/moostercard.png"/> <img src="img/extra/vasa.png"/>              
            </div>

        <div  style="text-align: left;">
            <label for="cname">&nbsp; Name</label>
            <input type="text" id="cname" name="cardname" placeholder="Enter the name on the card... " required/>
        </div>

        <div style="text-align: left;">
            <label for="ccnum">&nbsp; Card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="xxxx-xxxx-xxxx-xxxx" required/>
        </div>
        
       <div style="text-align: left;">
            <label for="expmonth">&nbsp; Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder=" " required/>
        </div>

        <div style="text-align: left;">
            <label for="expyear">&nbsp; Exp Year</label>
            <input type="text" id="expyear" name="expyear" placeholder=" " required/>
        </div>

        <div style="text-align: left;">
            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder=" " required/>
        </div>

        <input type="submit" name="paid" value="Proceed">
        <input type="submit" value="Cancel" onclick="window.location.href='payment.php'">
        </form>
        </div>

    </body>

</html>