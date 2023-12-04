<?php
include('../includes/connect.php');
//include('../globalfunctions/common_functions.php');
include("../globalfunctions/product_function.php");
include("../globalfunctions/sidenav_function.php");
include("../globalfunctions/search_function.php");
include("../globalfunctions/details_function.php");
include("../globalfunctions/cart_function.php");
include("../globalfunctions/getting_ip_function.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.css">
    
    
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
          <a class="nav-link" href="user_registration.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../contact_us.php">Contact</a>
        </li>
        </ul>
     <!-- <form class="d-flex" role="search" action="search_product.php">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
         <button class="btn btn-outline-light" type="submit">Search</button> 
        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product"> -->
      </form>
    </div>
  </div>
</nav>


    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2><br/>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user-username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- user email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user-email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- user image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                    <!-- user password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user-password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!-- user address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!-- user contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Contact Number</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-success text-light py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-1 pt-1">Already have an account? <a href="user_login.php" class="text-danger">  Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- footer part -->
    
<?php
include("../includes/footer.php")
?>
    
    </div>
</body>
</html>

<!-- session -->

<?php

if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_tmp=$_FILES['user_image']['tmp_name'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password, PASSWORD_DEFAULT);
    $user_confirm_password=$_POST['conf_user_password'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();

// select query
$select_query = "SELECT * FROM user_table WHERE user_name='$user_username' AND user_email='$user_email' AND user_phone='$user_contact' ";
$result=mysqli_query($connection, $select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username, Email or Mobile number already exist')</script>";
}else if($user_password!=$user_confirm_password){
    echo "<script>alert('Password and Confirm Password does not match')</script>";
}else{


    // insert_query
    /* move_uploaded_file($user_image_tmp, "./user_images/$user_image");
    $insert_query="INSERT INTO `user_table` (user_name, user_email, user_password, user_image, user_ip, user_address, user_phone) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
    $sql_execute=mysqli_query($connection, $insert_query); */

// insert_query with prepared statement
move_uploaded_file($user_image_tmp, "./user_images/$user_image");
$insert_query = "INSERT INTO `user_table` (user_name, user_email, user_password, user_image, user_ip, user_address, user_phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connection, $insert_query);

// Bind parameters
mysqli_stmt_bind_param($stmt, "sssssss", $user_username, $user_email, $hash_password, $user_image, $user_ip, $user_address, $user_contact);

// Execute statement
$sql_execute = mysqli_stmt_execute($stmt);

// Close statement
mysqli_stmt_close($stmt);









    
    if($sql_execute){
        echo "<script>alert('Registration Successful');
        window.location = '../index.php';
        </script>";
    } else {
        die(mysqli_error($connection));
    }
}
// selecting cart items
    $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address=?";
    $stmt_cart = mysqli_prepare($connection, $select_cart_items);
    mysqli_stmt_bind_param($stmt_cart, "s", $user_ip);
    mysqli_stmt_execute($stmt_cart);
    mysqli_stmt_store_result($stmt_cart);
    $rows_count_cart = mysqli_stmt_num_rows($stmt_cart);
    mysqli_stmt_close($stmt_cart);

    if ($rows_count_cart > 0) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('You have items in your cart')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
    }

}


?>