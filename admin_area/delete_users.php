<?php
if(isset($_GET['delete_users'])){
    $user_id = $_GET['delete_users'];
    echo $user_id;
    
    // delete query
    $delete_user = "DELETE FROM `user_table` WHERE user_id=$user_id";
    $result_query = mysqli_query($connection, $delete_user);
    
    //var_dump($delete_user);
    
    if($result_query){
        echo "<script>alert('User deleted successfully!')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }else{
        echo "<script>alert('User cannot be deleted!')</script>";
    }
}
?>