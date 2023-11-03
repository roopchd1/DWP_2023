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
        .admin_image{
    width:100px;
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
                        <li class="nav-iem">
                            <a href="" class="nav-link">Welcome guest</a>
                        </li>
                    </ul>
                
                </nav>
            </div>
        </nav>

        <!-- seocnd part -->
        <div class="bg-light">
            <h4 class="text-center p-2">Manage Details</h4>
        </div>

        <!-- third part -->
        <div class="row">
            <div class="col-md-12 bg-secondary d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/site favicon.png" alt="" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>



                <div class="dropdown">
  <button class="btn btn  rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Categories
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="index.php?insert_category" class="nav-link text-light bg-info m-1 p-2">Insert Categories</a></li>
    <li><a class="dropdown-item" href="" class="nav-link text-light bg-info m-1 p-2">View Categories</a></li>
    <li><a class="dropdown-item" href="" class="nav-link text-light bg-info m-1 p-2">Edit Categories</a></li>
  </ul>
</div>


<button class="btn  rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Products
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="insert_product.php?insert_product" class="nav-link text-light bg-info m-1 p-2">Insert Products</a></li>
    <li><a class="dropdown-item" href="" class="nav-link text-light bg-info m-1 p-2">View Products</a></li>
    <li><a class="dropdown-item" href="" class="nav-link text-light bg-info m-1 p-2">Edit Products</a></li>
  </ul>


  <button class="btn rounded-0 text-light bg-info m-3 p-6 dropdown-toggle border border-5" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  Brands
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="index.php?insert_brand" class="nav-link text-light bg-info m-1 p-2">Insert Brands</a></li>
    <li><a class="dropdown-item" href="" class="nav-link text-light bg-info m-1 p-2">View Brands</a></li>
    <li><a class="dropdown-item" href="" class="nav-link text-light bg-info m-1 p-2">Edit Brands</a></li>
  </ul>

  <button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button">View Orders</button>
  <button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button">View Payments</button>
  <button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button">List Users</button>
  <button class="btn rounded-0 text-light bg-info m-3 p-6 border border-5" type="button">Logout</button>
</div>




                <!-- <div class="button text-center">
                    <button class="my-3"><a href="index.php?insert_category" class="nav-link text-light bg-info m-1 p-2">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">View Categories</a></button>
                    <button><a href="insert_product.php" class="nav-link text-light bg-info m-1 p-2">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">View Products</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info m-1 p-2">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-2">Logout</a></button>

                
                </div> -->

            </div>
        </div>


        <!-- fourth part -->
        <div class="class-container my-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
        ?>
        </div>


        <!-- footer part -->
    
<div class="bg-primary p-2 text-center text-white">
    <p>All rights reserved @Rupinder - DWP Assignment</p>


</div>

    </div>



    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>