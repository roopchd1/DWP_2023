<?php
    //include('includes/connect.php');

    //get user order details
        function get_user_orders_details(){
            global $connection;
            $username=$_SESSION['username'];
            $get_details="SELECT * FROM `user_table` WHERE user_name='$username'";
            $result_query=mysqli_query($connection,$get_details);
            while ($row_query=mysqli_fetch_array($result_query)) {
                $user_id=$row_query['user_id'];
                if(!isset($_GET['edit_profile'])){
                    if(!isset($_GET['my_orders'])){
                        if (!isset($_GET['delete_account'])) {
                            $get_orders="SELECT * FROM `user_orders` WHERE user_id=$user_id AND order_status='pending'";
                            $result_orders_query=mysqli_query($connection,$get_orders);
                            $row_count=mysqli_num_rows($result_orders_query);
                            if($row_count>0){
                                echo "<h4 class='text-center mt-5 mb-3'>You have <span class='text-danger'>$row_count</span> pending orders!</h4>
                                <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                            }else{
                                echo "<h4 class='text-center mt-5 mb-3'>You have NO pending orders!</h4>
                                <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                            }
                        
                        }
                    }
                }
            }
        }
?>