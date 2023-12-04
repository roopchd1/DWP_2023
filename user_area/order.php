<?php
include('../includes/connect.php');
include('../globalfunctions/common_functions.php');

// Check if user_id is set in the GET parameters
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
}

// Get the user's IP address
$get_ip_address = getIPAddress();

// Initialize total price
$total_price = 0;

// Query to get items in the cart
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_address'";
$result_cart_price = mysqli_query($connection, $cart_query_price);

// Generate a unique invoice number and set order status to 'pending'
$invoice_number = mt_rand();
$status = 'pending';

// Count the number of products in the cart
$count_products = mysqli_num_rows($result_cart_price);

// Calculate total price
while ($row_price = mysqli_fetch_array($result_cart_price)) {
    $product_id = $row_price['product_id'];
    $select_product = "SELECT * FROM `products` WHERE product_id=$product_id";
    $run_price = mysqli_query($connection, $select_product);
    while ($row_product_price = mysqli_fetch_array($run_price)) {
        $product_price = array($row_product_price['product_price']);
        $product_values = array_sum($product_price);
        $total_price += $product_values;
    }
}

// Calculate quantity and subtotal
        $get_cart = "SELECT * FROM `cart_details`";
        $run_cart = mysqli_query($connection, $get_cart);
        $get_item_quantity = mysqli_fetch_array($run_cart);
        $quantity = $get_item_quantity['quantity'];
        if($quantity == 0) {
            $quantity = 1;
            $subtotal = $total_price;
        } else {
            $quantity = $quantity;
            $subtotal = $total_price * $quantity;
        }

// Insert order into user_orders table
        $insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES ('$user_id', '$subtotal', '$invoice_number', '$count_products', NOW(), '$status')";
        $result_query = mysqli_query($connection, $insert_orders);

        // Check if the order was inserted successfully
        if ($result_query) {
            echo "<script>alert('Order placed successfully')</script>";
            echo "<script>window.open('profile.php','_self')</script>";
        } else {
            echo "<script>alert('Error placing order')</script>";
        }

// Get the order_id from the inserted user_orders record
        $order_id = mysqli_insert_id($connection);

// Insert into orders_pending using the obtained order_id
        $insert_pending_orders = "INSERT INTO `orders_pending` (order_id, user_id, invoice_number, product_id, quantity, order_status) VALUES ('$order_id', '$user_id', '$invoice_number', '$product_id', '$quantity', '$status')";
        $result_pending_orders = mysqli_query($connection, $insert_pending_orders);

// empty cart after successful order placing
        $empty_cart = "DELETE FROM `cart_details` WHERE ip_address='$get_ip_address'";
        $result_delete_cart = mysqli_query($connection, $empty_cart);

?>
