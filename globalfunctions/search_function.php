<?php
    //include('includes/connect.php');

    //getting products dynamically

    // searching products
function search_product(){

    global $connection;
        if(isset($_GET['search_data_product'])){
            $search_data_value=$_GET['search_data'];
        $search_query="SELECT * FROM `products` WHERE product_keywords LIKE '%$search_data_value%'";
        $result_query=mysqli_query($connection, $search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h3 class='text-center text-danger'>No products for this search!</h3>";
        }

        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          echo " <div class='col-md-4 mb-3'>
          <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description.</p>
                  <p class='card-text'>Price: $product_price</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
          </div>
      </div>";
        }
    }
    }

?>