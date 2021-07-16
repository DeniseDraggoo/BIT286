<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/image.css">
  <link rel="stylesheet" href="css/typography.css">
  <link rel="stylesheet" href="css/buttons.css">
  <link rel="stylesheet" href="css/container.css">
  <link rel="stylesheet" href="css/menu.css">
  <title>Duckie Land</title>
</head>
<body>
<div class="container">

<section class="header" id="header">
    <header>
        <h1><a href="index.php">Duckie Land</a></h1>
    </header>
</section>
    
<nav class="navbar navbar-expand-sm bg-dark justify-content-center">
    <ul class="nav navbar-nav topnav topnav-centered">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="flowerpower_duckie.php">Flower-Power</a></li>
      <li><a href="graduate_duckie.php">Graduate</a></li>
      <li><a href="firefighter_duckie.php">Firefighter</a></li>
      <li><a href="surgeonnurse_duckie.php">Surgeon/Nurse</a></li>
      <li><a href="unicorn_duckie.php">Unicorn</a></li>
      <li><a href="credits.php">Credits</a></li>
    </ul>
</nav>
    
    
<h2>Checkout</h2>
    <?php 
    
//CONFIRMATION OF PLACED ORDER
        if (isset($_POST["submit"])) {
            echo "Your order has been placed. Thank you for shopping at Duckie Land.";
            include ("dbconnect.php");
            session_start();
            
//FLOWER POWER UPDATE CART QUANTITY
            if ($_SESSION["flowerpower_quantity"] > 0) 
            {
                $query = "SELECT * FROM duckies WHERE duckie_name = 'Flower-Power'";
                $result = mysqli_query($conn, $query); 
                $row = mysqli_fetch_row($result);
                $quantity = $row[3];
                $quantity -= $_SESSION["flowerpower_quantity"];
                
                $query = "UPDATE duckies set duckie_quantity = $quantity WHERE duckie_name = 'Flower-Power'";
                $result = mysqli_query($conn, $query); 
            }
            
//GRADUATE UPDATE CART QUANTITY
             if ($_SESSION["graduate_quantity"] > 0) {
                $query = "SELECT * FROM duckies WHERE duckie_name = 'Graduate'";
                $result = mysqli_query($conn, $query); 
                $row = mysqli_fetch_row($result);
                $quantity = $row[3];
                $quantity -= $_SESSION["graduate_quantity"]; 
                
                $query = "UPDATE duckies set duckie_quantity = $quantity WHERE duckie_name = 'Graduate'";
                $result = mysqli_query($conn, $query); 
            }
            
//FIREFIGHTER UPDATE CART QUANTITY
             if ($_SESSION["firefighter_quantity"] > 0) {
                $query = "SELECT * FROM duckies WHERE duckie_name = 'Firefighter'";
                $result = mysqli_query($conn, $query); 
                $row = mysqli_fetch_row($result);
                $quantity = $row[3];
                $quantity -= $_SESSION["firefighter_quantity"]; 
                
                $query = "UPDATE duckies set duckie_quantity = $quantity WHERE duckie_name = 'Firefighter'";
                $result = mysqli_query($conn, $query); 
            }
            
//SURGEON NURSE UPDATE CART QUANTITY
             if ($_SESSION["surgeonnurse_quantity"] > 0) {
                $query = "SELECT * FROM duckies WHERE duckie_name = 'Surgeon_Nurse'";
                $result = mysqli_query($conn, $query); 
                $row = mysqli_fetch_row($result);
                $quantity = $row[3];
                $quantity -= $_SESSION["surgeonnurse_quantity"]; 
                
                $query = "UPDATE duckies set duckie_quantity = $quantity WHERE duckie_name = 'Surgeon_Nurse'";
                $result = mysqli_query($conn, $query); 
            }
            
//UNICORN  UPDATE CART QUANTITY
             if ($_SESSION["unicorn_quantity"] > 0) {
                $query = "SELECT * FROM duckies WHERE duckie_name = 'Unicorn'";
                $result = mysqli_query($conn, $query); 
                $row = mysqli_fetch_row($result);
                $quantity = $row[3];
                $quantity -= $_SESSION["unicorn_quantity"]; 
                
                $query = "UPDATE duckies set duckie_quantity = $quantity WHERE duckie_name = 'Unicorn'";
                $result = mysqli_query($conn, $query); 
            }
            
        }
    
// CURRENCY CONVERTER
        else {
            session_start();
            echo "<h3>Total: $" . number_format($_SESSION["price"], 2);
            if ($_POST["currency"] != "") {
                $currency = $_POST["currency"];
                // set API Endpoint and API key 
                $endpoint = 'latest';
                $access_key = 'API_KEY';

                // Initialize CURL:
                $ch = curl_init('http://data.fixer.io/api/'.$endpoint.'?access_key=07da728c58624fae0d1ba138ad5acf88');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                // Store the data:
                $json = curl_exec($ch);
                curl_close($ch);

                // Decode JSON response:
                $exchangeRates = json_decode($json, true);

                // Access the exchange rate values, e.g. GBP:
                echo " (" . number_format ($_SESSION["price"] * $exchangeRates['rates'][$currency] / $exchangeRates['rates']["USD"], 2) . " " . $currency . ")";    
            }
            echo "</h3><br>";
    ?>
    
    <!-------------- CREDIT CARD INFORMATION --------------->
    <form action="checkout.php" method="post">
        <fieldset>
            <legend>Credit Card Information</legend>
            <p>
                Credit card type: 
                <input type="radio" name="cardtype" value="MasterCard"> MasterCard
                <input type="radio" name="cardtype" value="Visa" checked> Visa
                <input type="radio" name="cardtype" value="AmericanExpress"> American Express
            </p>
            <p>
                Card Number:
                <input type="text" name="cardnumber" size="20" maxlength="16" pattern="[0-9]{16}" required>
            </p>
            <p>
                Card Security Code:
                <input type="text" name="securitycode" size="4" maxlength="4" pattern="[0-9]{3,4}" required>
            </p>
            <p>
                <fieldset> 
                    <legend>Expiration Date: </legend>
                    Month:
                    <select name="month">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">6</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    Year:
                    <select name="year">
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </fieldset>
            </p>
        </fieldset>
    
    <!-------------- BILLING ADDRESS INFORMATION --------------->
        <fieldset>
            <legend>Billing Address:</legend>
            <p>
                Card Holder's Name:
                <input type="text" name="name" size="50" required>
            </p>
            <p>
                Street Address:
                <input type="text" name="street" size="50" required>
            </p>
            <p>
                City:
                <input type="text" name="city" required>
            </p>
            <p>
                State:
                <select name="state">
                    <option value="CA">CA</option>
                    <option value="ID">ID</option>
                    <option value="OR">OR</option>
                    <option value="WA">WA</option>
                </select>
            </p>
            <p>
                Zip Code:
                <input type="text" name="zipcode" size="5" maxlength="5" pattern="[0-9]{5}" required>
            </p>
        </fieldset>
        <input type="submit" name="submit" value="Place Order">
    </form>
    <?php
         }
    ?>
    
</div><!-- content container -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>