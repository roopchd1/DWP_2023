<h3 class="text-center text-dark">All Categories</h3>
<table style="width: 90%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <tr class="text-center">
            <th class='bg-info text-dark text-center'>Sr.No.</th>
            <th class='bg-info text-dark text-center'>Category Title</th>
            <th class='bg-info text-dark text-center'>Edit Category</th>
            <th class='bg-info text-dark text-center'>Delete Category</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $get_categories="SELECT * FROM `category`";
        $result=mysqli_query($connection,$get_categories);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        ?>
        <tr class='text-center'>
            <td class='bg-secondary text-light text-center'><?php echo $number; ?></td>
            <td class='bg-secondary text-light text-center'><?php echo $category_title; ?></td>
            <td class='bg-secondary text-light text-center'><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
            <td class='bg-secondary text-light text-center'><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>