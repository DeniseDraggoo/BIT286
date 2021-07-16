<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/image.css">
  <link rel="stylesheet" href="css/typography.css">
  <link rel="stylesheet" href="css/buttons.css">
  <link rel="stylesheet" href="css/container.css">
  <link rel="stylesheet" href="css/menu.css">

  <title>Duckie Land</title>
    
    
</head>
    
<body>
    <?php
        include ("dbconnect.php");
        $query = "SELECT * FROM duckies WHERE duckie_name = 'Flower-Power'";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_row($result);
    
        if (isset($_POST["flowerpower_quantity"])) {
            session_start();
            $_SESSION["flowerpower_quantity"] = $_POST["flowerpower_quantity"];
        }
    
    ?>
<div class="container">

<!-------------- HEADER AND CART BUTTON --------------->
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



<!------------------  CART BUTTON  ---------------->    
<section class="cart_button">
     <form action="cart.php" method="post">
            <input type="submit" value="Cart">
     </form> 
</section><br>
    
    
    
<h2>Flowerpower Duckie</h2>
    <div class="duckie_page">
        <img src="images/duck_flowered.jpg" alt="flowerpower duckie">
    </div>
    <div>
    <!-------------- PRICE TAKEN FROM DATABASE --------------->
        <p class="duckie_price">$<?php echo $row[2]; ?></p>
        <div class="addToCart_button">
            <form action="flowerpower_duckie.php" method="post">
                <select name="flowerpower_quantity">
                    <option value="">Choose quantity</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            <input type="submit" id="flowerpower_btn" value="Add to cart">
            </form>
        </div>
    </div>

</div><!-- content container -->
    
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/addToCart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>