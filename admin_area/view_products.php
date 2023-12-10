

<h3 class="text-center text-primary">All Products</h3>
<table style="width: 90%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <tr class="text-center">
            <th class='bg-info text-dark text-center'>Product ID</th>
            <th class='bg-info text-dark text-center'>Product Title</th>
            <th class='bg-info text-dark text-center'>Product Image</th>
            <th class='bg-info text-dark text-center'>Product Price</th>
            <th class='bg-info text-dark text-center'>Total Sold</th>
            <th class='bg-info text-dark text-center'>Status</th>
            <th class='bg-info text-dark text-center'>Edit</th>
            <th class='bg-info text-dark text-center'>Delete</th>
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
            <td class='bg-secondary text-light'><?php echo $number; ?></td>
            <td class='bg-secondary text-light'><?php echo $product_title; ?></td>
            <td class='bg-secondary text-light'><img src='./product_images/<?php echo $product_image1; ?>' class='product_img'/></td>
            <td class='bg-secondary text-light'><?php echo $product_price; ?></td>
            <td class='bg-secondary text-light'><?php
            $get_count="SELECT * FROM `orders_pending` WHERE product_id=$product_id";
            $result_count=mysqli_query($connection,$get_count);
            $rows_count=mysqli_num_rows($result_count);
            echo $rows_count;

            ?></td>
            <td class='bg-secondary text-light'><?php echo $status; ?></td>
            <td class='bg-secondary'><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary'><a href='index.php?delete_product=<?php echo $product_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>
