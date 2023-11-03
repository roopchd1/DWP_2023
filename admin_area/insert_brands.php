<?php
include('../includes/connect.php');

if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];

  //select data from database
  $select_query="SELECT * FROM `brand` WHERE brand_title='$brand_title'";
  $result_select=mysqli_query($connection,$select_query);
  $number=mysqli_num_rows($result_select);
  if($number>0){
    echo "<script>alert('Brand already exist!')</script>";
  }else{
  $insert_query="INSERT INTO `brand` (brand_title) VALUES ('$brand_title')";

  $result=mysqli_query($connection,$insert_query);
  if($result){
    echo "<script>alert('Brand added successfully!');
    window.location = 'index.php?insert_brand';
    </script>";

  }


}}


?>


<h4 class="text-center">Insert Brand</h4>


<form action="" method="post" class="mb-2 mx-5">
<div class="input-group w-90 mb-2">
  <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="brand_title" placeholder="Insert brand" aria-label="brands" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10  mb-2 m-auto">
  
  <input type="submit" class="bg-info border-0 my-3 p-2" name="insert_brand" value="Insert Brand">
  
</div>
</form>