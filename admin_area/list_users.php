<h3 class="text-center text-dark">All Users</h3>
<table style="width: 80%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <?php
            $get_users="SELECT * FROM `user_table`";
            $result=mysqli_query($connection,$get_users);
            $row_count=mysqli_num_rows($result);
            

            if($row_count==0){
                echo "<h3 class='text-danger text-center mt-5'>No Users Yet !<h3>";
            }else{
                echo "<tr>
                        <th class='bg-info text-dark text-center'>Sr.No.</th>
                        <th class='bg-info text-dark text-center'>Username</th>
                        <th class='bg-info text-dark text-center'>User email</th>                        
                        <th class='bg-info text-dark text-center'>User Image</th>
                        <th class='bg-info text-dark text-center'>User Address</th>
                        <th class='bg-info text-dark text-center'>User Mobile</th>
                        <th class='bg-info text-dark text-center'>Delete</th>
                    </tr>
        </thead>
    <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $user_id=$row_data['user_id'];
                    $user_name =$row_data['user_name'];
                    $user_email=$row_data['user_email'];
                    $user_image=$row_data['user_image'];
                    $user_address=$row_data['user_address'];
                    $user_phone=$row_data['user_phone'];
                    $number++;
                    echo "<tr>
                            <td class='bg-secondary text-light text-center'>$number</td>
                            <td class='bg-secondary text-light text-center'>$user_name</td>
                            <td class='bg-secondary text-light text-center'>$user_email</td>
                            <td class='bg-secondary text-light text-center'><img src='../user_area/user_images/$user_image' alt='$user_name' class='list_image'/></td>
                            <td class='bg-secondary text-light text-center'>$user_address</td>
                            <td class='bg-secondary text-light text-center'>$user_phone</td>
                            <td class='bg-secondary text-center'><a href='index.php?delete_users=$user_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>";
                }
            }

        ?>        
        
    </tbody>
</table>