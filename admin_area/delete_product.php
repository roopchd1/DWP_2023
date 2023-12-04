<?php
if(isset($_GET['delete_product'])){
    $delete_id=$_GET['delete_product'];
    //echo $delete_id;
    // delete query
    $delete_product="DELETE FROM `products` WHERE product_id=$delete_id";
    $result_query=mysqli_query($connection,$delete_product);
    if($result_query){
        echo "<script>alert('Product deleted successfully!')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }else{
        echo "<script>alert('Product not deleted!')</script>";
    }
}

?>