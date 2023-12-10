<?php
//require("includes/connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch a random product ID from the products table
    $product_query = "SELECT product_id FROM `products` ORDER BY RAND() LIMIT 1";
    $product_result = mysqli_query($connection, $product_query);

    if (!$product_result) {
        die("Error fetching product ID: " . mysqli_error($connection));
    }

    $product_row = mysqli_fetch_assoc($product_result);
    $product_id = $product_row['product_id'];

    // Collect other form data
    $offer_price = $_POST['offer_price'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $status = $_POST['status'];

    // Insert into daily_offers table
    $insert_query = "INSERT INTO daily_offers (product_id, offer_price, start_date, end_date, status)
                     VALUES ('$product_id', '$offer_price', '$start_date', '$end_date', '$status')";

    $result = mysqli_query($connection, $insert_query);

    if ($result) {
        echo "<script>alert('Offer inserted successfully.');
            window.location = 'index.php?daily_offers';
            </script>";
    } else {
        echo "<script>alert('Error inserting offer.');</script>";
    }

    // Free the result set
    mysqli_free_result($product_result);
}

mysqli_close($connection);
?>


<div class="container mt-5">
    <h3 class="mb-4 text-center">Offers Available</h3>
    <form action="" method="post">
        <div class="form-group pb-3">
            <label for="offer_price">Offer Price:</label>
            <input type="text" class="form-control" id="offer_price" name="offer_price" required>
        </div>
        <div class="form-group pb-3">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group pb-3">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>
        <div class="form-group pb-3">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Offer</button>
    </form>
</div>