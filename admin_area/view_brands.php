<h3 class="text-center text-dark">All Brands</h3>
<table style="width: 90%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <tr class="text-center">
            <th>Sr.No.</th>
            <th>Brand Title</th>
            <th>Edit Brand</th>
            <th>Delete Brand</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $get_brands="SELECT * FROM `brand`";
        $result=mysqli_query($connection,$get_brands);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        ?>
        <tr class='text-center'>
            <td><?php echo $number; ?></td>
            <td><?php echo $brand_title; ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-dark'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-dark'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>