<?php
if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    //echo $delete_id;
    // delete query
    $delete_brand="DELETE FROM `brand` WHERE brand_id=$delete_id";
    $result_query=mysqli_query($connection,$delete_brand);
    if($result_query){
        echo "<script>alert('Brand deleted successfully!')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }else{
        echo "<script>alert('Brand not deleted!')</script>";
    }
}

?>