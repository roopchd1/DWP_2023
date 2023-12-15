<?php
require("../includes/connect.php");
include("./user_functions/invoice_class.php");

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if (!$connection) {
    die("Database error: " . mysqli_connect_error());
}

$db_select = mysqli_select_db($connection, DB_NAME);

if (!$db_select) {
    die("Database error: " . mysqli_error($connection));
}

session_start();

$invoiceClass = new Invoice($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>

<div class="container mt-5">
    <?php
    $invoiceNumber = $_GET['invoice_number'] ?? '';
    $row_invoice = $invoiceClass->getInvoiceDetails($invoiceNumber);

    if (!$row_invoice || !isset($row_invoice['invoice_number'])) {
        echo "<h3 class='text-danger text-center'>Invoice not found!</h3>";
    } else {
        $invoice_number = $row_invoice['invoice_number'];
        $amount = $row_invoice['amount'];
        $payment_mode = $row_invoice['payment_mode'];
        $date = $row_invoice['date'];
        ?>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Invoice: <?php echo $invoice_number; ?></h4>
            </div>
            <div class="card-body">
                <p><strong>Amount:</strong> <?php echo $amount; ?> kr.</p>
                <p><strong>Payment Mode:</strong> <?php echo $payment_mode; ?></p>
                <p><strong>Order Date:</strong> <?php echo $date; ?></p>
            </div>
            <div class="card-footer text-end">
                <a href="profile.php?my_orders" class="btn btn-danger">Back</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
