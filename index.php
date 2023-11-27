<?php
require("includes/connect.php");
include("./globalfunctions/common_functions.php");
$connection=mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$connection){
    die("database error2222");

}
$db_select=mysqli_select_db($connection, DB_NAME);

if(!$db_select){
    die("database error3333:" . mysqli_error($connection));
}

session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTan Artisan</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first part -->
        <nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <img src="./images/logo_greentan_white.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <?php
        if(isset($_SESSION['username'])){
          echo '<li class="nav-item">
          <a class="nav-link" href="./user_area/profile.php">My Account</a>
        </li>';
        }else{
          echo '<li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>';
        }

        ?>
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_qty(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Total Price: <?php total_cart_price();?>kr.</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="search_product.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
      </form>
    </div>
  </div>
</nav>

<!-- calling cart function -->

<?php
  cart();

?>

<!-- second part -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark">
    <ul class="navbar-nav me-auto">
    

        <?php 
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
        </li>";
          }else{
            echo "<li class='nav-item'>
            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
          }

       if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='user_area/user_login.php'>Login</a>
    </li>";
          }else{
            echo "<li class='nav-item'>
          <a class='nav-link' href='user_area/logout.php'>Logout</a>
    </li>";
          }?>
    </ul>
</nav>

<!-- third part -->
<div class="bg-light">
    <h3 class="text-center">GreenTan - Leather Bags</h3>
    <p class="text-center">Eco Friendly Leather Bags</p>
</div>


<!-- fourth part -->
<div class="row px-1">


    <div class="col-md-10">
        <!-- products -->
        
        <div class="row">

          <!-- fething products -->
      <?php
        // calling function
        getproducts();
        get_unique_category();
        get_unique_brand();
        /* $ip = getIPAddress();  
    echo 'User Real IP Address - '.$ip; */
        
      ?>
          
      <!-- end of row -->      
        </div>
      <!-- end of column -->
    </div>

    <!-- sidenav -->

    <div class="col-md-2 bg-dark p-0">
      <!-- Offers -->

      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light"><h5>Shop Categories</h5></a>
        </li>

      <?php

        getcategory();

      ?>
      </ul>

      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light"><h5>Branded Bags</h5></a>
        </li>

        <?php

        getbrand();

      ?>
        
      </ul>

      <!-- news section -->

      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light"><h5>Latest News</h5></a>
        </li>

      <!-- <?php

        getcategory();

      ?> -->
      </ul>

      <!-- news section -->

      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-success">
          <a href="#" class="nav-link text-light"><h5>Special Offer</h5></a>
        </li>

      <!-- <?php

        getcategory();

      ?>
      </ul> -->
        
    </div>
</div>


<!-- footer part -->
    
<?php
include("./includes/footer.php")
?>
    
    </div>
    




    
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>