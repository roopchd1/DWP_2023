<?php
require("../includes/connect.php");
include("../globalfunctions/common_functions.php");
$connection=mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$connection){
    die("database error2222");

}
$db_select=mysqli_select_db($connection, DB_NAME);

if(!$db_select){
    die("database error3333:" . mysqli_error($connection));
}

session_start();
?>

<h3 class="text-center text-primary">All Products</h3>
<table style="width: 90%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <tr class="text-center">
            <th>Product ID</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $get_products="SELECT * FROM `products`";
        $result=mysqli_query($connection,$get_products);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            $number++;
        ?>
        <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $product_title; ?></td>
            <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img'/></td>
            <td><?php echo $product_price; ?></td>
            <td><?php
            $get_count="SELECT * FROM `orders_pending` WHERE product_id=$product_id";
            $result_count=mysqli_query($connection,$get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo $rows_count;

            ?></td>
            <td><?php echo $status; ?></td>
            <td><a href='' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>
