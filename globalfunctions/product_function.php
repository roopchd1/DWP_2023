<?php
    function getproducts(){
        global $connection;

        //condition to check if the isset or not

        if(!isset($_GET['category'])){
            if(!isset($_GET['brand'])){

        $select_query="SELECT * FROM `products` ORDER BY rand()";
        $result_query=mysqli_query($connection, $select_query);
        //$row=mysqli_fetch_assoc($result_query);
        //echo $row['product_title'];
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          //$product_description=$row['product_description']; <p class='card-text'>$product_description</p>
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          $product_image1=$row['product_image1'];
          $product_price=$row['product_price'];
          echo " <div class='col-md-4 mb-3'>
          <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  
                  <p class='card-text'>Price: $product_price</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
          </div>
      </div>";
        }
    }
    }
    }

    //displaying unique category

    function get_unique_category(){
        global $connection;

        
        //condition to check if the isset or not

        if(isset($_GET['category'])){
            $category_id=$_GET['category'];
            
        $select_query="SELECT * FROM `products` WHERE category_id=$category_id";
        $result_query=mysqli_query($connection, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h3 class='text-center text-danger'>No stock for this category!</h3>";
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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
          </div>
      </div>";
        }
    }
    }



    //displaying unique brand

    function get_unique_brand(){
        global $connection;

        
        //condition to check if the isset or not

        if(isset($_GET['brand'])){
            $brand_id=$_GET['brand'];
            
        $select_query="SELECT * FROM `products` WHERE brand_id=$brand_id";
        $result_query=mysqli_query($connection, $select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<h3 class='text-center text-danger'>No stock for this brand!</h3>";
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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
          </div>
      </div>";
        }
    }
    }
    

    ?>