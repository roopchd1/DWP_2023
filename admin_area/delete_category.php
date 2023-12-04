<?php
if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];
    //echo $delete_id;
    // delete query
    $delete_category="DELETE FROM `category` WHERE category_id=$delete_id";
    $result_query=mysqli_query($connection,$delete_category);
    if($result_query){
        echo "<script>alert('Category deleted successfully!')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }else{
        echo "<script>alert('Category not deleted!')</script>";
    }
}

?>