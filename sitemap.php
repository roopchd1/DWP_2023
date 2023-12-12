<?php
require("includes/connect.php");
//include("./globalfunctions/common_functions.php");
include("./globalfunctions/product_function.php");
include("./globalfunctions/sidenav_function.php");
include("./globalfunctions/search_function.php");
include("./globalfunctions/details_function.php");
include("./globalfunctions/cart_function.php");
include("./globalfunctions/getting_ip_function.php");
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
<body class="bg-dark">
    <!-- navbar -->
<div class="container-fluid p-0">

  <!-- header part/first part/second part -->
        <?php
        include("./includes/header.php")
        ?>
        
        <div class="container-fluid m-5 text-light decoration-none">
            <h3 class="text-primary">Sitemap</h3>
        <ul>
            <li><a href="index.php" class="text-decoration-none text-light">Home</a></li>
            <li><a href="display_all.php" class="text-decoration-none text-light">Products</a></li>
            <li>
                <a href="" class="text-decoration-none text-light">Shop Categories</a>
                <ul>
                    <li><a href="index.php?category=1" class="text-decoration-none text-light">Women Bags</a></li>
                    <li><a href="index.php?category=2" class="text-decoration-none text-light">Men Bags</a></li>
                    <li><a href="index.php?category=3" class="text-decoration-none text-light">Accessories & Gift Items</a></li>
                    
                </ul>
            </li>
            <li>
                <a href="" class="text-decoration-none text-light">Branded Bags</a>
                <ul>
                    <li><a href="index.php?brand=1" class="text-decoration-none text-light">GreenTan Bags</a></li>
                    <li><a href="index.php?brand=2" class="text-decoration-none text-light">Gucci Bags</a></li>
                    <li><a href="index.php?brand=3" class="text-decoration-none text-light">Prada Bags</a></li>
                    <li><a href="index.php?brand=4" class="text-decoration-none text-light">GreenTan Accessories</a></li>
                    
                </ul>
            </li>
            <li><a href="index.php" class="text-decoration-none text-light">Offers</a></li>
            <li><a href="index.php" class="text-decoration-none text-light">News</a></li>
            <li><a href="contact_us.php" class="text-decoration-none text-light">Contact Us</a></li>
            <li><a href="user_area/user_registration.php" class="text-decoration-none text-light">User Registration</a></li>
        </ul>
</div>

      <!-- footer part -->
          
      <?php
      include("./includes/footer.php")
      ?>
</div>
</body>
</html>