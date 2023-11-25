<?php
require("../includes/connect.php");
include("../globalfunctions/common_functions.php");
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
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
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
        .profile_img{
          width: 100%;
          height: 100%;
          margin: auto;
          display: block;
        }
        .edit_profile_img{
          width: 120px;
          height: 150px;
          display: block;
        }
    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first part -->
        <nav class="navbar sticky-top navbar-expand-lg bg-dark navbar-dark">
  <div class="container-fluid">
    <img src="../images/logo_greentan_white.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact_us.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_qty(); ?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php">Total Price: <?php total_cart_price();?>kr.</a>
        </li>
      </ul>
      <form class="d-flex" role="search" action="../search_product.php">
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
          <a class='nav-link' href='logout.php'>Logout</a>
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
<div class="row">
  <div class="col-md-2">
    <ul class="navbar-nav bg-secondary text-center text-light" style="height: 100vh;">
      <li class="nav-item bg-primary">
          <a class="nav-link" href="#"><h4>My Profile</h4></a>
      </li>
      <?php
      $username=$_SESSION['username'];
      $user_image = "SELECT * FROM `user_table` WHERE user_name='$username'";
      $user_image=mysqli_query($connection,$user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item my-3 mx-5'>
            <img src='./user_images/$user_image' class='profile_img' alt=''>
            </li>";

      ?>

      
      <li class="nav-item">
          <a class="nav-link" href="profile.php">Pending Orders</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="profile.php?edit_profile">Edit Profile</a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="profile.php?my_orders">My Orders</a>
      <li class="nav-item">
          <a class="nav-link" href="profile.php?delete_account">Delete Account</a>
      </li></h4></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
      </li>
      
    </ul>

  </div>
  <div class="col-md-10 text-center">
    <?php get_user_orders_details();
    if(isset($_GET['edit_profile'])){
      include('edit_profile.php');
    }
    if(isset($_GET['my_orders'])){
      include('user_orders.php');
    }
    if(isset($_GET['delete_account'])){
      include('delete_account.php');
    }
    ?>
  </div>
</div>



<!-- footer part -->
    
<?php
include("../includes/footer.php")
?>
    
    </div>
    




    
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>