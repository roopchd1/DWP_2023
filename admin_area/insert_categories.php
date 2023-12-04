<?php
//include('../includes/connect.php');

if(isset($_POST['insert_cat'])){
  $category_title = $_POST['cat_title'];

  // Select data from database
  $select_query = "SELECT * FROM `category` WHERE category_title='$category_title'";
  $result_select = mysqli_query($connection, $select_query);
  $number = mysqli_num_rows($result_select);
  
  if($number > 0){
    echo "<script>alert('Category already exists!')</script>";
  } else {
    $insert_query = "INSERT INTO `category` (category_title) VALUES ('$category_title')";
    $result = mysqli_query($connection, $insert_query);
    
    if($result){
      echo "<script>alert('Category added successfully!');
      window.location = 'index.php?insert_category';
      </script>";
    }
  }
}
?>



<h4 class="text-center">Insert Category</h4>

<form action="" method="post" class="mb-2 mx-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert category" aria-label="categories" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10  mb-2 m-auto">
  
  <input type="submit" class="bg-info border-0 my-3 p-2" name="insert_cat" value="Insert Category">
  
</div>
</form>