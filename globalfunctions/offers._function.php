<?php

class OfferManager
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getDailyOffers()
    {
        try {
            $offersData = $this->fetchDailyOffersFromDatabase();

            if (!empty($offersData)) {
                $this->renderDailyOffers($offersData);
            } else {
                echo '<p class="text-center text-muted">No daily offers available at the moment.</p>';
            }
        } catch (Exception $e) {
            echo '<p class="text-center text-danger">Error fetching daily offers: ' . $e->getMessage() . '</p>';
        }
    }

    private function fetchDailyOffersFromDatabase()
    {
        $offersQuery = "SELECT products.product_id, products.product_title, products.product_image1, daily_offers.offer_price 
                        FROM daily_offers
                        JOIN products ON daily_offers.product_id = products.product_id
                        WHERE CURDATE() BETWEEN daily_offers.start_date AND daily_offers.end_date AND daily_offers.status = 'Active'
                        LIMIT 3";

        $resultOffers = mysqli_query($this->connection, $offersQuery);

        if (!$resultOffers) {
            throw new Exception(mysqli_error($this->connection));
        }

        $offersData = [];

        while ($row = mysqli_fetch_assoc($resultOffers)) {
            $offersData[] = [
                'product_id' => $row['product_id'],
                'product_title' => $row['product_title'],
                'product_image' => $row['product_image1'],
                'offer_price' => $row['offer_price'],
            ];
        }

        mysqli_free_result($resultOffers);

        return $offersData;
    }

    private function renderDailyOffers($offersData)
    {
        echo '<div class="text-primary mt-5 mb-3">
                <h3 class="text-center">Daily Offers</h3>
                <p class="text-center text-light">Check out our daily specials</p>
              </div>';

        echo '<div class="row">';

        foreach ($offersData as $offer) {
            $productId = $offer['product_id'];
            $productTitle = $offer['product_title'];
            $productImage = $offer['product_image'];
            $offerPrice = $offer['offer_price'];

            echo '<div class="col-md-12 mb-5">
                    <div class="card bg-dark text-light">
                        <h5 class="card-title text-center">' . $productTitle . '</h5>
                        <img src="./admin_area/product_images/' . $productImage . '" class="card-img-top" alt="' . $productTitle . '">
                        <div class="card-body">
                            <p class="card-text text-center">Offer Price: ' . $offerPrice . 'kr.</p>
                        </div>
                    </div>
                </div>';
        }

        echo '</div>';
    }
}

?>
