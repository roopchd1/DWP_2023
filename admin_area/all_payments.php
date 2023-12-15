<h3 class="text-center text-dark">All Payments</h3>
<table style="width: 80%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <?php
            $get_payments="SELECT * FROM `user_payments`";
            $result=mysqli_query($connection,$get_payments);
            $row_count=mysqli_num_rows($result);
            

            if($row_count==0){
                echo "<h3 class='text-danger text-center mt-5'>No Payments Received Yet !<h3>";
            }else{
                echo "<tr>
                        <th class='bg-info text-dark text-center'>Sr.No.</th>
                        <th class='bg-info text-dark text-center'>Invoice No.</th>
                        <th class='bg-info text-dark text-center'>Amount</th>                        
                        <th class='bg-info text-dark text-center'>Payment Mode</th>
                        <th class='bg-info text-dark text-center'>Order Date</th>
                        <th class='bg-info text-dark text-center'>Delete</th>
                    </tr>
        </thead>
    <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $order_id=$row_data['order_id'];
                    $payment_id =$row_data['payment_id'];
                    $amount=$row_data['amount'];
                    $invoice_number=$row_data['invoice_number'];
                    $payment_mode=$row_data['payment_mode'];
                    $date=$row_data['date'];
                    $number++;
                    echo "<tr>
                            <td class='bg-secondary text-light text-center'>$number</td>
                            <td class='bg-secondary text-light text-center'>$invoice_number</td>
                            <td class='bg-secondary text-light text-center'>$amount kr.</td>
                            <td class='bg-secondary text-light text-center'>$payment_mode</td>
                            <td class='bg-secondary text-light text-center'>$date</td>
                            <td class='bg-secondary text-center'><a href='index.php?delete_orders=$order_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>";
                }
            }

        ?>        
        
    </tbody>
</table>