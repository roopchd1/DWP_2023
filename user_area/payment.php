<?php
include('../includes/connect.php');
//include('../globalfunctions/common_functions.php');
//include("../globalfunctions/product_function.php");
//include("../globalfunctions/sidenav_function.php");
include("../globalfunctions/search_function.php");
//include("../globalfunctions/details_function.php");
include("../globalfunctions/cart_function.php");
include("../globalfunctions/getting_ip_function.php");
//include("../globalfunctions/news_function.php");
//include("../globalfunctions/offers._function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTan - Payment Page</title>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .payment_img{
            width: 30%;
            margin: auto;
            display: block;
        }
        body{
            
            margin-bottom: 0;
        }
    </style>

</head>
<body>
    <!-- access user id for payment options -->
    <?php
        $user_ip=getIPAddress();
        $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
        $result=mysqli_query($connection, $get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];


    ?>
    <div class="container">
        <h2 class="text-center text-dark">Payment Options</h2>
        <div class="row display-flex align-items-center">
            <div class="col-md-8">
            <a href="https://www.paypal.com" target="_blank"><img src="../img/paypal-784404_1280.png" alt="" class="payment_img"></a>
            </div>
            <div class="col-md-4">
            <a href="order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none text-success"><h3>MobilePay</h3></a>
            </div>
            
        </div>
    </div>
</body>
</html>