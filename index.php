<?php
require("includes/connect.php");
//include("./globalfunctions/common_function.php");
// all functions separated
include("./globalfunctions/product_function.php");
include("./globalfunctions/sidenav_function.php");
include("./globalfunctions/search_function.php");
include("./globalfunctions/details_function.php");
include("./globalfunctions/cart_function.php");
include("./globalfunctions/getting_ip_function.php");
include("./globalfunctions/news_function.php");
include("./globalfunctions/offers._function.php");
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

      <!-- third part -->
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
          <?php
            include("./includes/side_nav.php")
          ?>
    </div>
      
    <!-- news section -->
            <div class="text-primary mt-5 mb-5">
                <h3 class="text-center">Latest in Leather Industry</h3>
                <p class="text-center text-light">News Section / Company Values</p>
            </div>
              <div class="row">
                  <?php getNews(); 
                  ?>
              </div>
            </div>

            
 

      <!-- footer part -->
          
      <?php
      include("./includes/footer.php")
      ?>

    
</div>
 '<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>