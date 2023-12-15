<?php

class RecommendationSystem
{
    private $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function getRecommendations($category, $limit = 2)
    {
        // Use prepared statements to prevent SQL injection
        $select_query = "SELECT * FROM `products` 
                         JOIN `category` ON products.category_id = category.category_id
                         WHERE category.category_title = ? 
                         ORDER BY RAND() LIMIT ?";

        // Prepare the statement
        $statement = mysqli_prepare($this->connection, $select_query);

        // Bind parameters
        mysqli_stmt_bind_param($statement, "si", $category, $limit);

        // Execute the statement
        mysqli_stmt_execute($statement);

        // Get the result
        $result_query = mysqli_stmt_get_result($statement);

        //var_dump($select_query); // Optional: for debugging

        while ($row = mysqli_fetch_assoc($result_query)) {
            $this->displayProduct($row);
        }
    }

    private function displayProduct($product, $columnHeading = false)
    {
        if ($columnHeading) {
            echo "<div class='col-md-12 mb-3'>
                    <h5 class='text-light text-center'>yes</h5>
                </div>";
        }

        echo "<div class='col-md-6 mb-0'>
                <h5 class='card-title text-light bg-secondary text-center pb-1'>" . $product['product_title'] . "</h5>
                    <img src='./admin_area/product_images/" . $product['product_image1'] . "' class='card-img-top' alt='" . $product['product_title'] . "'>
                    <p class='card-text text-light text-center recomend-price'>Price: " . $product['product_price'] . "</p>        
            </div>";
    }
}
?>
