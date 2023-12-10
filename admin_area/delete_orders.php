<?php
if(isset($_GET['delete_orders'])){
    $order_id = $_GET['delete_orders']; // Use a different variable name
    echo $order_id;
    
    // delete query
    $delete_order = "DELETE FROM `user_orders` WHERE order_id=$order_id";
    $result_query = mysqli_query($connection, $delete_order);
    
    //var_dump($delete_order);
    
    if($result_query){
        echo "<script>alert('Order deleted successfully!')</script>";
        echo "<script>window.open('./index.php?all_orders','_self')</script>";
    }else{
        echo "<script>alert('Order cannot be deleted!')</script>";
    }
}
?>
