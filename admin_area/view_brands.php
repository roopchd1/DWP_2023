<h3 class="text-center text-dark">All Brands</h3>
<table style="width: 80%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <?php
                $get_orders="SELECT * FROM `user_orders`";
                $result=mysqli_query($connection,$get_orders);
                $row_count=mysqli_num_rows($result);
                echo "<tr class='text-center'>
                        <th class='bg-info text-dark text-center'>Sr.No.</th>
                        <th class='bg-info text-dark text-center'>Brand Title</th>
                        <th class='bg-info text-dark text-center'>Edit Brand</th>
                        <th class='bg-info text-dark text-center'>Delete Brand</th>
                        </tr>
                </thead>
                <tbody>";

                if($row_count==0){
                    //echo "<h4 class='bg-danger text-center mt-5'>No Orders Yet!</h2>";
                }else{
                    $number=0;
                    while($row_data=mysqli_fetch_assoc($result)){
                        $order_id=$row_data['order_id'];
                        $user_id=$row_data['user_id'];
                        $amount_due=$row_data['amount_due'];
                        $invoice_number=$row_data['invoice_number'];
                        $total_products=$row_data['total_products'];
                        $order_date=$row_data['order_date'];
                        $order_status=$row_data['order_status'];
                        $number++;
                    }
                }
        ?>
        
    <?php
        $get_brands="SELECT * FROM `brand`";
        $result=mysqli_query($connection,$get_brands);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        ?>
        <tr class='text-center'>
            <td class='bg-secondary text-light'><?php echo $number; ?></td>
            <td class='bg-secondary text-light'><?php echo $brand_title; ?></td>
            <td class='bg-secondary text-light'><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light'><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>