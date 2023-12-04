<?php
    if(isset($_GET['edit_category'])){
        $edit_category = $_GET['edit_category'];
        $get_category = "SELECT * FROM `category` WHERE category_id='$edit_category'";
        $result = mysqli_query($connection, $get_category);
        $row = mysqli_fetch_assoc($result);
        $category_title=$row['category_title'];
        //echo $category_title;
    }
    if(isset($_POST['edit_cat'])){
        $cat_title=$_POST['category_title'];
        $update_category="UPDATE `category` SET category_title='$cat_title' WHERE category_id='$edit_category' ";
        $result_cat=mysqli_query($connection, $update_category);
        if($result_cat){
            echo "<script>alert('Category Updated Successfully!')</script>";
            echo "<script>window.open('./index.php?view_categories','_self')</script>";
        }else{
            echo "<script>alert('Category not updated!')</script>";
        }
    }



?>
<div class="container-mt-4">
    <h3 class="text-center">Edit Category</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" name="category_title" id="category_title" class="form-control" required value="<?php echo $category_title; ?>">
        </div>
        <input type="submit" value="Update Category" class="btn btn-primary px-3 mb-3" name="edit_cat">
    </form>
</div>