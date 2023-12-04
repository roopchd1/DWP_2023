<?php
    //include('includes/connect.php');

    //getting products dynamically

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

?>