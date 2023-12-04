<?php
    if(isset($_GET['edit_brand'])){
        $edit_brand = $_GET['edit_brand'];
        $get_brand = "SELECT * FROM `brand` WHERE brand_id='$edit_brand'";
        $result = mysqli_query($connection, $get_brand);
        $row = mysqli_fetch_assoc($result);
        $brand_title=$row['brand_title'];
        //echo $brand_title;
    }
    if(isset($_POST['edit_brand'])){
        $brand_title=$_POST['brand_title'];
        $update_brand="UPDATE `brand` SET brand_title='$brand_title' WHERE brand_id='$edit_brand' ";
        $result_brand=mysqli_query($connection, $update_brand);
        if($result_brand){
            echo "<script>alert('Brand Updated Successfully!')</script>";
            echo "<script>window.open('./index.php?view_brands','_self')</script>";
        }else{
            echo "<script>alert('Brand not updated!')</script>";
        }
    }



?>
<div class="container-mt-4">
    <h3 class="text-center">Edit Brand</h3>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Brand Title</label>
            <input type="text" name="brand_title" id="brand_title" class="form-control" required value="<?php echo $brand_title; ?>">
        </div>
        <input type="submit" value="Update Brand" class="btn btn-primary px-3 mb-3" name="edit_brand">
    </form>
</div>