<?php
  
// view details product-wise
    function view_details(){
        global $connection;

        //condition to check if the isset or not

    if(isset($_GET['product_id'])){

        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){
                $product_id=$_GET['product_id'];

        $select_query="SELECT * FROM `products` WHERE product_id=$product_id";
        $result_query=mysqli_query($connection, $select_query);
        while($row=mysqli_fetch_assoc($result_query)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_description=$row['product_description'];
            $category_id=$row['category_id'];
            $brand_id=$row['brand_id'];
            $product_image1=$row['product_image1'];
            $product_image2=$row['product_image2'];
            $product_image3=$row['product_image3'];
            $product_price=$row['product_price'];
            echo " 
            
                <div class='container'>
                    <div class='row'>
                        <!-- Product Card -->
                        <div class='col-md-4 mb-4 mx-5'>
                            <div class='card'>
                                <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description.</p>
                                    <p class='card-text'>Price: $product_price</p>
                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                </div>
                            </div>
                        </div>

                        <!-- Related Products -->
                        <div class='col-md-4 mb-4'>
                            <div class='card'>
                                <div class='card-body'>
                                    <h3 class='text-center text-success mb-5'>Related Products</h3>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$product_image2' alt='$product_title' class='img-fluid'>
                                        </div>
                                        <div class='col-md-6'>
                                            <img src='./admin_area/product_images/$product_image3' alt='$product_title' class='img-fluid'>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
            }
         }
        }
      }
    }
    
?>