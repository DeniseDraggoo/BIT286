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
</head><br>
    
<body>
<div class="container">

<section class="header" id="header">
    <header>
        <h1>Duckie Land</h1>
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
</section>
    
    
<br><h2 class="text-center">Rubber duckies available for purchase</h2>
    
    
<!--------  CONNECT TO DATABASE FOR FLOWER DUCKIE  ---------->     
<?php
        include ("dbconnect.php");
        $query = "SELECT * FROM duckies WHERE duckie_name = 'Flower-Power'";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_row($result);    
?>  
    
    
<section class="content" id="duckie_list">
    <div class="row py-3">
        <div class="col-3 offset-1">
            <img src="images/duck_flowered.jpg" alt="Duckie with flowers on body">
        </div>
        <div class="col-4">
            
    <!----------  GETS PRICE FROM DATABASE    ----------> 
            <p class="index_duckie_text align-middle"><a href="flowerpower_duckie.php">Flower-Power Duckie </a><br> $<?php echo $row[2];?></p>
        </div>
    </div>
    
    
    
    <!----------  (same for subsequent duckies)   ----------> 
     
    <?php 
        $query = "SELECT * FROM duckies WHERE duckie_name = 'Graduate'";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_row($result); 
    ?>   
    <div class="row py-3">
        <div class="col-3 offset-1">
            <img src="images/duck_graduate.jpg" alt="Graduate duckie">
        </div>
        <div class="col-4">
            <p><a href="graduate_duckie.php">Graduate Duckie </a><br> $<?php echo $row[2];?></p>
        </div>
    </div>
    
    <?php 
        $query = "SELECT * FROM duckies WHERE duckie_name = 'Firefighter'";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_row($result); 
    ?>   
    
    <div class="row py-3">
        <div class="col-3 offset-1">
            <a href="firefighter_duckie.php"><img src="images/duck_firefighter.jpg" alt="Duckie with firefighter uniform"></a>
        </div>
        <div class="col-4">
            <p><a href="firefighter_duckie.php"> Firefighter Duckie</a><br>$<?php echo $row[2];?></p>
        </div>
    </div>
    
    <?php 
        $query = "SELECT * FROM duckies WHERE duckie_name = 'Surgeon_Nurse'";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_row($result); 
    ?>   
    
    <div class="row py-3">
        <div class="col-3 offset-1">
            <img src="images/duck_surgeon_nurse.jpg" alt="Surgeon and nurse duckies">
        </div>
        <div class="col-4">
            <p><a href="surgeonnurse_duckie.php">Surgeon and Nurse Duckies </a><br> $<?php echo $row[2];?></p>
        </div>
    </div>
    
    <?php 
        $query = "SELECT * FROM duckies WHERE duckie_name = 'Unicorn'";
        $result = mysqli_query($conn, $query); 
        $row = mysqli_fetch_row($result); 
    ?>   
    
    <div class="row py-3">
        <div class="col-3 offset-1">
            <img src="images/duck_unicorns.jpg" alt="Unicorn duckies">
        </div>
        <div class="col-4">
            <p><a href="unicorn_duckie.php">Unicorn Duckie </a><br> $<?php echo $row[2];?></p>
        </div>
    </div>
    

    
</section>

</div><!-- content container -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>
</html>