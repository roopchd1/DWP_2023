<?php
function getNews()
{
    global $connection;

    if (!isset($_GET['latest_news'])) {

        $select_query = "SELECT * FROM `news_section` ORDER BY date DESC LIMIT 3";
        $result_query = mysqli_query($connection, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $news_id = $row['news_id'];
            $news_title = $row['news_title'];
            $news_image = $row['news_image'];
            $editor_name = $row['editor_name'];
            $date = $row['date'];
            $news_content=$row['news_content'];

            // Output HTML with Bootstrap styling
            echo "<div class='col-md-4 mb-3 d-flex'>
                    <div class='card bg-dark text-light border-1 border-light pt-3 mb-5'>
                        <h5 class='card-title text-primary text-center pb-2'>$news_title</h5>
                        <img src='./admin_area/news_image/$news_image' class='card-img-top' alt='$news_image'>
                        <div class='card-body'>                            
                            <p class='card-text'>Editor: $editor_name</p>
                            <p class='card-text'>Date: $date</p>
                            <p class='card-text  h-50 overflow-hidden'>$news_content</p>
                            
                        </div>
                    </div>
                </div>";
        }
    }
}
?>
