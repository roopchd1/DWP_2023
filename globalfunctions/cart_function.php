<?php
    // cart function
    function cart(){
        if(isset($_GET['add_to_cart'])){
            global $connection;
            $get_product_id = $_GET['add_to_cart'];
            $get_ip_add = getIPAddress();
            $select_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add' AND product_id=$get_product_id";
            $product_qty=1;
            $result_query=mysqli_query($connection, $select_query);
            $num_of_rows=mysqli_num_rows($result_query);
            if($num_of_rows>0){
                echo "<script>alert('This item is already present in the Cart!')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
            else{
                $insert_query="INSERT INTO `cart_details` (product_id, ip_address, quantity) VALUES ($get_product_id,'$get_ip_add',$product_qty)";
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