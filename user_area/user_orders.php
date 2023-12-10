<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTan Artisan - User Orders</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
</head>
<body>
<?php
$username = $_SESSION['username'];

// Using a prepared statement for user retrieval
$get_user = "SELECT * FROM `user_table` WHERE user_name=?";
$stmt_get_user = mysqli_prepare($connection, $get_user);

// Bind parameter
mysqli_stmt_bind_param($stmt_get_user, "s", $username);

// Execute statement
mysqli_stmt_execute($stmt_get_user);

// Get the result
$result = mysqli_stmt_get_result($stmt_get_user);

// Fetch the data
$row_fetch = mysqli_fetch_assoc($result);

// Close the statement
mysqli_stmt_close($stmt_get_user);

// Access user_id
$user_id = ($row_fetch) ? $row_fetch['user_id'] : null;
?>

<h3 class="text-primary">All my orders</h3>
<table class="table table-bordered mt-5 bg-primary">
    <thead class="bg-secondary">
        <tr>
            <th class="bg-info text-dark">Sr.No.</th>
            <th class="bg-info text-dark">Amount Due</th>
            <th class="bg-info text-dark">Total Products</th>
            <th class="bg-info text-dark">Invoice Number</th>
            <th class="bg-info text-dark">Date</th>
            <th class="bg-info text-dark">Complete/Incomplete</th>
            <th class="bg-info text-dark">Status</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        // Using a prepared statement for getting user orders
        $get_order_details = "SELECT * FROM `user_orders` WHERE user_id=?";
        $stmt_get_orders = mysqli_prepare($connection, $get_order_details);

        // Bind parameter
        mysqli_stmt_bind_param($stmt_get_orders, "i", $user_id);

        // Execute statement
        mysqli_stmt_execute($stmt_get_orders);

        // Get the result
        $result_orders = mysqli_stmt_get_result($stmt_get_orders);

        $number = 1;
        while ($row_orders = mysqli_fetch_assoc($result_orders)) {
            $order_id = $row_orders['order_id'];
            $amount_due = $row_orders['amount_due'];
            $total_products = $row_orders['total_products'];
            $invoice_number = $row_orders['invoice_number'];
            $order_date = $row_orders['order_date'];
            $order_status = $row_orders['order_status'];

            // Use a ternary operator to check and set order status
            $order_status = ($order_status == 'pending') ? 'Incomplete' : 'Complete';

            echo "<tr>
                    <td class='bg-secondary text-light'>$number</td>
                    <td class='bg-secondary text-light'>$amount_due</td>
                    <td class='bg-secondary text-light'>$total_products</td>
                    <td class='bg-secondary text-light'>$invoice_number</td>
                    <td class='bg-secondary text-light'>$order_date</td>
                    <td class='bg-secondary text-light'>$order_status</td>";

            if ($order_status == 'Complete') {
                echo "<td class='bg-secondary text-light'>Paid</td>";
            } else {
                echo "<td class='bg-secondary text-light'><a href='confirm_payment.php?order_id=$order_id' class='text-light text-decoration-none'>Confirm</a></td>";
            }

            echo "</tr>";

            $number++;
        }

        // Close the statement
        mysqli_stmt_close($stmt_get_orders);
        ?>
    </tbody>
</table>

</body>
</html>