<?php
include('../includes/connect.php');
include('../globalfunctions/common_functions.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}

//getting total items and price
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address=?";
$stmt_cart_price = mysqli_prepare($connection, $cart_query_price);

// Bind parameter
mysqli_stmt_bind_param($stmt_cart_price, "s", $get_ip_address);

// Execute statement
mysqli_stmt_execute($stmt_cart_price);

// Get the result
$result_cart_price = mysqli_stmt_get_result($stmt_cart_price);

// Generate a random invoice number
$invoice_number = mt_rand();
$status = 'pending';

// Count the number of products in the cart
$count_products = mysqli_num_rows($result_cart_price);

while ($row_price = mysqli_fetch_assoc($result_cart_price)) {
    $product_id = $row_price['product_id'];

    // Use prepared statement for the product retrieval
    $select_product = "SELECT * FROM `products` WHERE product_id=?";
    $stmt_select_product = mysqli_prepare($connection, $select_product);

    // Bind parameter
    mysqli_stmt_bind_param($stmt_select_product, "i", $product_id);

    // Execute statement
    mysqli_stmt_execute($stmt_select_product);

    // Get the result
    $result_product_price = mysqli_stmt_get_result($stmt_select_product);

    while ($row_product_price = mysqli_fetch_array($result_product_price)) {
        $product_price = $row_product_price['product_price'];
        $total_price += $product_price;
    }

    // Close the statement for product retrieval
    mysqli_stmt_close($stmt_select_product);
}

// Close the statement for cart price
mysqli_stmt_close($stmt_cart_price);

// Calculate quantity and subtotal
$get_cart = "SELECT * FROM `cart_details`";
$run_cart = mysqli_query($connection, $get_cart);
$get_item_quantity = mysqli_fetch_array($run_cart);
$quantity = ($get_item_quantity['quantity'] == 0) ? 1 : $get_item_quantity['quantity'];
$subtotal = $total_price * $quantity;

// Prepare and execute the INSERT statement
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) VALUES (?, ?, ?, ?, NOW(), ?)";
$stmt = mysqli_prepare($connection, $insert_orders);

// Bind parameters
mysqli_stmt_bind_param($stmt, "idiss", $user_id, $subtotal, $invoice_number, $count_products, $status);

// Execute statement
$result_query = mysqli_stmt_execute($stmt);

// Close statement
mysqli_stmt_close($stmt);

// Check the result and display an alert
if ($result_query) {
    echo "<script>alert('Order placed successfully')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
} else {
    echo "<script>alert('Error placing order')</script>";
}

// Insert into orders_pending using prepared statement
$insert_pending_orders = "INSERT INTO `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) VALUES (?, ?, ?, ?, ?)";
$stmt_pending_orders = mysqli_prepare($connection, $insert_pending_orders);

// Bind parameters
mysqli_stmt_bind_param($stmt_pending_orders, "iisis", $user_id, $invoice_number, $product_id, $quantity, $status);

// Execute statement
$result_pending_orders = mysqli_stmt_execute($stmt_pending_orders);

// Close statement
mysqli_stmt_close($stmt_pending_orders);

// Check the result and display an alert
if ($result_pending_orders) {
    echo "<script>alert('Order placed successfully')</script>";
} else {
    echo "<script>alert('Error placing order')</script>";
}

// Delete items from cart using prepared statement
$empty_cart = "DELETE FROM `cart_details` WHERE ip_address=?";
$stmt_delete_cart = mysqli_prepare($connection, $empty_cart);

// Bind parameters
mysqli_stmt_bind_param($stmt_delete_cart, "s", $get_ip_address);

// Execute statement
$result_delete_cart = mysqli_stmt_execute($stmt_delete_cart);

// Close statement
mysqli_stmt_close($stmt_delete_cart);

?>