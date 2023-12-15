<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract opening hours data from the form
    $openingHours = array(
        'Monday'    => array($_POST['monday_opening_time'], $_POST['monday_closing_time']),
        'Tuesday'   => array($_POST['tuesday_opening_time'], $_POST['tuesday_closing_time']),
        'Wednesday' => array($_POST['wednesday_opening_time'], $_POST['wednesday_closing_time']),
        'Thursday'  => array($_POST['thursday_opening_time'], $_POST['thursday_closing_time']),
        'Friday'    => array($_POST['friday_opening_time'], $_POST['friday_closing_time']),
        'Saturday'  => array($_POST['saturday_opening_time'], $_POST['saturday_closing_time']),
        'Sunday'    => array($_POST['sunday_opening_time'], $_POST['sunday_closing_time'])
    );

    // Validate and sanitize the data as needed

    // Perform database update
    //$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

    if (!$connection) {
        die("Database connection error: " . mysqli_error($connection));
    }

    $success = true;

    foreach ($openingHours as $day => $times) {
        // Check if both opening and closing times are set
        if (!empty($times[0]) && !empty($times[1])) {
            $openingTime = mysqli_real_escape_string($connection, $times[0]);
            $closingTime = mysqli_real_escape_string($connection, $times[1]);

            $query = "INSERT INTO opening_hours (day, opening_time, closing_time)
                      VALUES ('$day', '$openingTime', '$closingTime')
                      ON DUPLICATE KEY UPDATE opening_time = '$openingTime', closing_time = '$closingTime'";

            $result_query = mysqli_query($connection, $query);

            if (!$result_query) {
                $success = false;
                echo "Database query error: " . mysqli_error($connection);
            }
        }
    }

    // Close the database connection
    mysqli_close($connection);

    // Redirect to the form or another page after processing
    if ($success) {
        echo "<script>alert('Hours added successfully.'); window.location = 'index.php';</script>";
    } else {
        echo "<script>alert('Hours cannot be updated.')</script>";
    }
    exit();
}
?>


<div class="container mt-5 w-50">
    <h3 class="mb-4 text-center">Insert Timings</h3>

    <form action="" method="post">
        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th class="bg-primary text-light">Day</th>
                    <th class="bg-primary text-light">Opening Time</th>
                    <th class="bg-primary text-light">Closing Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="bg-secondary text-light">Monday</td>
                    <td class="bg-secondary text-light"><input type="time" name="monday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="monday_closing_time" class="form-control w-50"></td>
                </tr>
                <tr>
                    <td class="bg-secondary text-light">Tuesday</td>
                    <td class="bg-secondary text-light"><input type="time" name="tuesday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="tuesday_closing_time" class="form-control w-50"></td>
                </tr>
                <tr>
                    <td class="bg-secondary text-light">Wednesday</td>
                    <td class="bg-secondary text-light"><input type="time" name="wednesday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="wednesday_closing_time" class="form-control w-50"></td>
                </tr>
                <tr>
                    <td class="bg-secondary text-light">Thursday</td>
                    <td class="bg-secondary text-light"><input type="time" name="thursday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="thursday_closing_time" class="form-control w-50"></td>
                </tr>
                <tr>
                    <td class="bg-secondary text-light">Friday</td>
                    <td class="bg-secondary text-light"><input type="time" name="friday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="friday_closing_time" class="form-control w-50"></td>
                </tr>
                <tr>
                    <td class="bg-secondary text-light">Saturday</td>
                    <td class="bg-secondary text-light"><input type="time" name="saturday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="saturday_closing_time" class="form-control w-50"></td>
                </tr>
                <tr>
                    <td class="bg-secondary text-light">Sunday</td>
                    <td class="bg-secondary text-light"><input type="time" name="sunday_opening_time" class="form-control w-50"></td>
                    <td class="bg-secondary text-light"><input type="time" name="sunday_closing_time" class="form-control w-50"></td>
                </tr>
            </tbody>
        </table>

        <br>

        <button type="submit" class="btn btn-primary">Submit Timings</button>
    </form>
</div>
