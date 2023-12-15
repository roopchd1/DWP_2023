<?php
require("../includes/connect.php");

$connection=mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$connection){
    die("database error2222");

}
$db_select=mysqli_select_db($connection, DB_NAME);

if(!$db_select){
    die("database error3333:" . mysqli_error($connection));
}

session_start();

// Check if the user is not logged in and redirect to login page
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    <style>
        body{
            overflow-x: hidden;
        }
        .admin_image{
    width:100px;
    object-fit: contain;
        }
        .footer{
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .product_img{
            width: 80px;
            object-fit: contain;
        }
        .class-container{
            margin-bottom: 100px;
        }
        .list_image, .news_image{
            width: 80px;
            object-fit: contain;
        }
    </style>
    
    

</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        
        <!-- first part -->

        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <img src="../images/logo_greentan_white.png" alt="" class="logo">

                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                    <?php 
                            if(!isset($_SESSION['admin_username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='#'>Welcome Guest</a>
                            </li>";
                            }else{
                                echo "<li class='nav-item'>
                                <a class='nav-link text-light' href='#'>Welcome ".$_SESSION['admin_username']."</a>
                            </li>";
                            }

                        if(!isset($_SESSION['admin_username'])){
                            echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='admin_login.php'>Login</a>
                        </li>";
                            }else{
                                echo "<li class='nav-item'>
                            <a class='nav-link text-light' href='admin_logout.php'>Logout</a>
                        </li>";
                            }
                    ?>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- seocnd part -->
        <div class="bg-light">
            <h3 class="text-center p-2">Admin Dashboard</h3>
        </div>

        <!-- third part -->
        <div class="row">
            <div class="col-md-12 bg-secondary d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/site favicon.png" alt="" class="admin_image mb-3"></a>
                    <?php 
                    if(isset($_SESSION['admin_username'])) {
                        echo "<p class='text-light text-center'>Admin: " . $_SESSION['admin_username'] . "</p>";
                    } else {
                        echo "<p class='text-light text-center'>Admin Name</p>";
                    }
                    ?>
                </div>

                <div class="dropdown">
                    <button class="btn btn  rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Categories
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?insert_category" class="nav-link text-light bg-info m-1 p-2">Insert Categories</a></li>
                        <li><a class="dropdown-item" href="index.php?view_categories" class="nav-link text-light bg-info m-1 p-2">View Categories</a></li>
                    </ul>
                </div>

                <button class="btn  rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Products
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="insert_product.php?insert_product" class="nav-link text-light bg-info m-1 p-2">Insert Products</a></li>
                        <li><a class="dropdown-item" href="index.php?view_products" class="nav-link text-light bg-info m-1 p-2">View Products</a></li>
                    </ul>


                    <button class="btn rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Brands
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?insert_brand" class="nav-link text-light bg-info m-1 p-2">Insert Brands</a></li>
                        <li><a class="dropdown-item" href="index.php?view_brands" class="nav-link text-light bg-info m-1 p-2">View Brands</a></li>
                    </ul>

                    <div class="dropdown">
                    <button class="btn btn  rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    News
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?insert_news" class="nav-link text-light bg-info m-1 p-2">Insert News</a></li>
                        <li><a class="dropdown-item" href="index.php?all_news" class="nav-link text-light bg-info m-1 p-2">All News</a></li>
                    </ul>
                </div>

                    <div><button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button"><a href="index.php?all_orders" class="text-decoration-none text-light">All Orders</a></button></div>
                    
                    <div><button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button"><a href="index.php?all_payments" class="text-decoration-none text-light">All Payments</a></button></div>
                    
                    <div><button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button"><a href="index.php?list_users" class="text-decoration-none text-light">List Users</a></button></div>

                    <div><button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button"><a href="index.php?daily_offers" class="text-decoration-none text-light">Offers</a></button></div>

                    <div><button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button"><a href="index.php?store_timings" class="text-decoration-none text-light">Timings</a></button></div>
                    
            </div>
        </div>


        <!-- fourth part -->
        <div class="class-container mt-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
            if(isset($_GET['view_products'])){
                include('view_products.php');
            }
            if(isset($_GET['edit_products'])){
                include('edit_products.php');
            }
            if(isset($_GET['delete_product'])){
                include('delete_product.php');
            }
            if(isset($_GET['view_categories'])){
                include('view_categories.php');
            }
            if(isset($_GET['view_brands'])){
                include('view_brands.php');
            }
            if(isset($_GET['edit_category'])){
                include('edit_category.php');
            }
            if(isset($_GET['edit_brand'])){
                include('edit_brand.php');
            }
            if(isset($_GET['delete_category'])){
                include('delete_category.php');
            }
            if(isset($_GET['delete_brand'])){
                include('delete_brand.php');
            }
            if(isset($_GET['all_orders'])){
                include('all_orders.php');
            }
            if(isset($_GET['delete_orders'])){
                include('delete_orders.php');
            }
            if(isset($_GET['all_payments'])){
                include('all_payments.php');
            }
            if(isset($_GET['list_users'])){
                include('list_users.php');
            }
            if(isset($_GET['delete_users'])){
                include('delete_users.php');
            }
            if(isset($_GET['insert_news'])){
                include('insert_news.php');
            }
            if(isset($_GET['daily_offers'])){
                include('daily_offers.php');
            }
            if(isset($_GET['all_news'])){
                include('all_news.php');
            }
            if(isset($_GET['delete_news'])){
                include('delete_news.php');
            }
            if(isset($_GET['store_timings'])){
                include('store_timings.php');
            }
        ?>
        </div>


        <!-- footer part -->
    
        <div class="bg-primary p-2 text-center text-white footer">
            <p>All rights reserved @Rupinder - DWP Assignment</p>
        </div>

    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>