<!-- header part -->
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
<?php
// Opening Hours
$openingHours = new OpeningHours($connection);
$timingsForToday = $openingHours->getOpeningHoursForToday();

echo "<p class='text-light text-end p-2'> $timingsForToday</p>";
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
<div class="bg-light mb-5">
    <h3 class="text-center">GreenTan - Leather Bags</h3>
    <p class="text-center py-2">Eco Friendly Leather Bags</p>
</div>