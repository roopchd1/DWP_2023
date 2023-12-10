<?php
//include('../includes/connect.php');

if(isset($_POST['insert_news'])){
    $news_title = $_POST['news_title'];
    $editor_name = $_POST['editor_name'];
    $news_content = $_POST['news_content'];
    
    /* accessing image */
    $news_image = $_FILES['news_image']['name'];
    
    /* accessing image temp name */
    $temp_news_image = $_FILES['news_image']['tmp_name'];
    
    //check if fields are empty
    if($news_title == '' || $editor_name == '' || $news_content == '' || $news_image == ''){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_news_image, "news_image/$news_image");
        
        /* insert query */
        $insert_news = "INSERT INTO `news_section` (news_title, news_image, editor_name, date, news_content) VALUES ('$news_title', '$news_image', '$editor_name', NOW(), '$news_content')";

        //var_dump($insert_news);

        $result_query = mysqli_query($connection, $insert_news);
        

        if($result_query){
            echo "<script>alert('News added successfully.'); window.location = 'index.php?insert_news';</script>";
        } else {
            echo "<script>alert('News cannot be updated.')</script>";
        }
    }
}
?>



<div class="container mt-5">
    <h2 class="mb-4 text-center">Enter News Details</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="news_title" class="form-label">News Title</label>
            <input type="text" class="form-control" id="news_title" name="news_title" required>
        </div>
        <div class="mb-3">
            <label for="editor_name" class="form-label">Editor Name</label>
            <input type="text" class="form-control" id="editor_name" name="editor_name" required>
        </div>
        <div class="mb-3">
            <label for="news_content" class="form-label">News Content</label>
            <textarea class="form-control" id="news_content" name="news_content" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label for="news_image" class="form-label">News Image</label>
            <input type="file" class="form-control" id="news_image" name="news_image" required>
        </div>
        <button type="submit" class="btn btn-primary" name="insert_news">Insert News</button>
    </form>
</div>

