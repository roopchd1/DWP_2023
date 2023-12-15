<h3 class="text-center text-dark">All Orders</h3>
<table style="width: 80%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <?php
            $get_orders="SELECT * FROM `user_orders`";
            $result=mysqli_query($connection,$get_orders);
            $row_count=mysqli_num_rows($result);
            

            if($row_count==0){
                echo "<h3 class='text-danger text-center mt-5'>No Orders Yet !<h3>";
            }else{
                echo "<tr>
                        <th class='bg-info text-dark text-center'>Sr.No.</th>
                        <th class='bg-info text-dark text-center'>Amount Due</th>
                        <th class='bg-info text-dark text-center'>Invoice No.</th>
                        <th class='bg-info text-dark text-center'>Total Products</th>
                        <th class='bg-info text-dark text-center'>Order Date</th>
                        <th class='bg-info text-dark text-center'>Status</th>
                        <th class='bg-info text-dark text-center'>Delete</th>
                    </tr>
        </thead>
    <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $order_id=$row_data['order_id'];
                    $user_id =$row_data['user_id'];
                    $amount_due=$row_data['amount_due'];
                    $invoice_number=$row_data['invoice_number'];
                    $total_products=$row_data['total_products'];
                    $order_date=$row_data['order_date'];
                    $order_status=$row_data['order_status'];
                    $number++;
                    echo "<tr>
                            <td class='bg-secondary text-light text-center'>$number</td>
                            <td class='bg-secondary text-light text-center'>$amount_due kr.</td>
                            <td class='bg-secondary text-light text-center'>$invoice_number</td>
                            <td class='bg-secondary text-light text-center'>$total_products</td>
                            <td class='bg-secondary text-light text-center'>$order_date</td>
                            <td class='bg-secondary text-light text-center'>$order_status</td>
                            <td class='bg-secondary text-center'><a href='index.php?delete_orders=$order_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>";
                }
            }

        ?>        
        
    </tbody>
</table>