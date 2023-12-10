<?php

function getDailyOffers() {
    global $connection;

    $offers_query = "SELECT products.product_id, products.product_title, products.product_image1, daily_offers.offer_price FROM daily_offers
                 JOIN products ON daily_offers.product_id = products.product_id
                 WHERE CURDATE() BETWEEN daily_offers.start_date AND daily_offers.end_date AND daily_offers.status = 'Active'
                 LIMIT 3";


    $result_offers = mysqli_query($connection, $offers_query);

    if (!$result_offers) {
        die("Database query failed: " . mysqli_error($connection));
    }

    // Check if there are any daily offers
    if (mysqli_num_rows($result_offers) > 0) {
        echo '<div class="text-primary mt-5 mb-3">
                <h3 class="text-center">Daily Offers</h3>
                <p class="text-center text-light">Check out our daily specials</p>
              </div>';

        // Start a row for the offers
        echo '<div class="row">';

        while ($row = mysqli_fetch_assoc($result_offers)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_image = $row['product_image1'];
            $offer_price = $row['offer_price'];

            // Display each daily offer
            echo '<div class="col-md-12 mb-5">
                    <div class="card bg-dark text-light">
                        <h5 class="card-title text-center">' . $product_title . '</h5>
                        <img src="./admin_area/product_images/' . $product_image . '" class="card-img-top" alt="' . $product_title . '">
                        <div class="card-body">
                            <p class="card-text text-center">Offer Price: ' . $offer_price . 'kr.</p>
                            <!-- <a href="./product_details.php?product_id=' . $product_id . '" class="btn btn-primary">View More</a> -->
                        </div>
                    </div>
                </div>';
        }

        // End the row
        echo '</div>';
    } else {
        echo '<p class="text-center text-muted">No daily offers available at the moment.</p>';
    }

    // Free result set
    mysqli_free_result($result_offers);
}

?>
