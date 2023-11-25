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
    <title>GreenTan Artisan - Cart Details</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .cart_img{
    width: 100px;
    height: 100px;
    object-fit: contain;
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
        <li class="nav-item">
          <a class="nav-link" href="./user_area/user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact_us.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_qty(); ?></sup></a>
        </li>
        </ul>
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
                  <a class='nav-link' href='user_login.php'>Login</a>
            </li>";
              }else{
                echo "<li class='nav-item'>
                <a class='nav-link' href='user_area/logout.php'>Logout</a>
                </li>";
        }
    ?>
    </ul>
</nav>

<!-- third part -->
<div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Eco Friendly Lether Bags</p>
</div>


<!-- fourth part -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            
            
                
            <!-- getting dynamic data for all fields -->

            <?php

                        $get_ip_add = getIPAddress();
                        $total_price=0;
                        $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                        $result=mysqli_query($connection, $cart_query);
                        $result_count=mysqli_num_rows($result); /* if cart is empty */
                        if($result_count>0){
                            echo "<thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th colspan='2'>Operations</th>
                                    </tr>
                                </thead>
                                <tbody>";

                        while($row=mysqli_fetch_array($result)){
                            $product_id = $row['product_id'];
                            $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
                            $result_product=mysqli_query($connection, $select_product);
                            while($row_product_price=mysqli_fetch_array($result_product)){
                                $product_price = array($row_product_price['product_price']);
                                $price_table=$row_product_price['product_price'];
                                $product_title=$row_product_price['product_title'];
                                $product_image1=$row_product_price['product_image1'];
                                $product_values=array_sum($product_price);   
                                $total_price+=$product_values;
            ?>


                <tr>
                    <td><?php echo $product_title ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                        $get_ip_add = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="UPDATE `cart_details` SET quantity=$quantities WHERE ip_address='$get_ip_add'";
                            $result_product_qty=mysqli_query($connection, $update_cart);
                            $total_price=$total_price*$quantities;

                        }

                    ?>
                    <td><?php echo $price_table?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php  echo $product_id  ?>"></td>
                    <td>
                        <!-- <button class="bg-success text-light px-3 py-1 border-0 mx-3">Update</button> -->
                        <input type="submit" value="Update Cart" class="bg-success text-light px-3 py-1 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-danger text-light px-3 py-1 border-0 mx-3">Remove</button> -->
                        <input type="submit" value="Remove" class="bg-success text-light px-3 py-1 border-0 mx-3" name="remove_item">
                    </td>
                </tr>

                <?php     }
                        }
                    }
                    else {
                        echo "<h3 class='text-center text-danger'>The cart is empty</h3></br></br>";
                    }
                        ?>
            </tbody>
        </table>
        
        <!-- sub total -->
        <div class="d-flex mb-5">
            <?php
                $get_ip_add = getIPAddress();
                $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
                $result=mysqli_query($connection, $cart_query);
                $result_count=mysqli_num_rows($result); /* if cart is empty */
                if($result_count>0){
                    echo "<h5 class='px-3'>Subtotal: <strong class='text-danger'>$total_price kr.</strong> </h5>
                    <input type='submit' value='Continue Shopping' class='bg-success text-light px-3 py-1 border-0 mx-3' name='continue_shopping'>
                    <button class='bg-secondary text-light px-3 py-2 border-0'><a href='./user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";

                }else{
                    echo "<input type='submit' value='Continue Shopping' class='bg-success text-light px-3 py-1 border-0 mx-3' name='continue_shopping'>";
                }
                if(isset($_POST['continue_shopping'])){
                    header("Location: index.php");
                }
            ?>
            <!-- <h5 class="px-3">Subtotal: <strong class="text-danger"><?php echo $total_price?>kr.</strong> </h5>
            
            <a href="#"><button class="bg-secondary text-light px-3 py-2 border-0">Checkout</button></a> -->

        </div>

    </div>

</div>
</form>

<!-- remove cart item -->
<?php
    function remove_cart_item(){
        global $connection;
        if(isset($_POST['remove_item'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query="DELETE FROM `cart_details` WHERE product_id=$remove_id";
                $run_delete=mysqli_query($connection, $delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }

    }
    echo $remove_item=remove_cart_item();

?>

<!-- footer part -->
    
<?php
include("./includes/footer.php")
?>
    
    </div>

<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>