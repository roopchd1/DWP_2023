<?php
    //include('includes/connect.php');

    //getting products dynamically

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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
              </div>
          </div>
      </div>";
        }
    }
    }
    




    // displaying the side bar brand

    function getbrand(){
        global $connection;

            $select_brand="SELECT * FROM `brand`";
            $result_brand=mysqli_query($connection,$select_brand);
            while($row_data=mysqli_fetch_assoc($result_brand)){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            echo "<li class='nav-item'>
            <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
            </li>";
        }
    }

    // displaying the side bar category

    function getcategory(){
        global $connection;

            $select_category="SELECT * FROM `category`";
            $result_category=mysqli_query($connection,$select_category);
            while($row_data=mysqli_fetch_assoc($result_category)){
            $category_title=$row_data['category_title'];
            $category_id=$row_data['category_id'];
            echo "<li class='nav-item'>
            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
            </li>";
        }
    }

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
                        <div class='col-md-4 mb-4'>
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
    

    //getting IP address of the user

    function getIPAddress() {  
        //whether ip is from the share internet  
         if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                    $ip = $_SERVER['HTTP_CLIENT_IP'];  
            }  
        //whether ip is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
         }  
    //whether ip is from the remote address  
        else{  
                 $ip = $_SERVER['REMOTE_ADDR'];  
         }  
         return $ip;  
    }  
    /* $ip = getIPAddress();  
    echo 'User Real IP Address - '.$ip; */ 


    // cart function
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $connection;
            $get_product_id = $_GET['add_to_cart'];
            $get_ip_add = getIPAddress();
            $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
            $result_query=mysqli_query($connection, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0){
                echo "<script>alert('This item is already present in the Cart!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                $insert_query="INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id,'$get_ip_add',0)";
                $result_query=mysqli_query($connection, $insert_query);
                echo "<script>alert('Item added to the Cart!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }

        }

    }

    // get cart quantity
    function cart_qty(){
        if(isset($_GET['add_to_cart'])){
            global $connection;
            $get_ip_add = getIPAddress();
            $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
            $result_query=mysqli_query($connection, $select_query);
            $count_cart_items=mysqli_num_rows($result_query);
            }
            else{
                global $connection;
            $get_ip_add = getIPAddress();
            $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
            $result_query=mysqli_query($connection, $select_query);
            $count_cart_items=mysqli_num_rows($result_query);
            }
            echo $count_cart_items;

        }

        // function to get total cart price
        function total_cart_price(){
            global $connection;
            $get_ip_add = getIPAddress();
            $total_price=0;
            $cart_query = "SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
            $result=mysqli_query($connection, $cart_query);
            while($row=mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $select_product = "SELECT * FROM `products` WHERE product_id='$product_id'";
                $result_product=mysqli_query($connection, $select_product);
                while($row_product_price=mysqli_fetch_array($result_product)){
                    $product_price = array($row_product_price['product_price']);
                    $product_values=array_sum($product_price);   
                    $total_price+=$product_values;
                }
            }
            echo $total_price;
        }

?>