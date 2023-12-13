<?php
if(isset($_GET['delete_news'])){
    $news_id = $_GET['delete_news'];
    echo $news_id;
    
    // delete query
    $delete_news = "DELETE FROM `news_section` WHERE news_id=$news_id";
    $result_query = mysqli_query($connection, $delete_news);
    
    //var_dump($delete_user);
    
    if($result_query){
        echo "<script>alert('News deleted successfully!')</script>";
        echo "<script>window.open('./index.php?all_news','_self')</script>";
    }else{
        echo "<script>alert('News cannot be deleted!')</script>";
    }
}
?>