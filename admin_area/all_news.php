<h3 class="text-center text-dark">All News</h3>
<table style="width: 90%; margin: auto;" class="table table-hover table-bordered mt-4">
    <thead>
        <?php
            $get_news="SELECT * FROM `news_section`";
            $result=mysqli_query($connection,$get_news);
            $row_count=mysqli_num_rows($result);
            

            if($row_count==0){
                echo "<h3 class='text-danger text-center mt-5'>No News Yet !<h3>";
            }else{
                echo "<tr>
                        <th class='bg-info text-dark text-center'>Sr.No.</th>
                        <th class='bg-info text-dark text-center'>News Title</th>
                        <th class='bg-info text-dark text-center'>News Image</th>
                        <th class='bg-info text-dark text-center'>Editor Name</th>
                        <th class='bg-info text-dark text-center'>News Date</th>
                        <th class='bg-info text-dark text-center'>News Content</th>
                        <th class='bg-info text-dark text-center'>Delete</th>
                    </tr>
        </thead>
    <tbody>";
                $number=0;
                while($row_data=mysqli_fetch_assoc($result)){
                    $news_id=$row_data['news_id'];
                    $news_title =$row_data['news_title'];
                    $news_image=$row_data['news_image'];
                    $editor_name=$row_data['editor_name'];
                    $date=$row_data['date'];
                    $news_content=$row_data['news_content'];
                    $number++;
                    echo "<tr>
                            <td class='bg-secondary text-light text-center'>$number</td>
                            
                            <td class='bg-secondary text-light text-center'>$news_title</td>
                            <td class='bg-secondary text-light text-center'><img src='../admin_area/news_image/$news_image' alt='$news_title' class='news_image'/></td>
                            <td class='bg-secondary text-light text-center'>$editor_name</td>
                            <td class='bg-secondary text-light text-center'>$date</td>
                            <td class='bg-secondary text-light text-center'>$news_content</td>
                            <td class='bg-secondary text-center'><a href='index.php?delete_news=$news_id' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
                        </tr>";
                }
            }

        ?>
        
    </tbody>
</table>