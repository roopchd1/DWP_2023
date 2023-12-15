
<?php

class OpeningHours {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getOpeningHoursForToday() {
        $currentDay = date('l');
        $sql = "SELECT opening_time, closing_time FROM `opening_hours` WHERE day = '$currentDay'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $openingTime = $row["opening_time"];
            $closingTime = $row["closing_time"];
            return "Today's Opening Hours: $openingTime - $closingTime";
        } else {
            return "Timings not available for today. Current day: $currentDay";
        }
    }
}

// Instantiate OpeningHours class
$openingHours = new OpeningHours($connection); // Replace $yourDbConnection with your actual database connection object

// Usage:
$timingsForToday = $openingHours->getOpeningHoursForToday();

// Debugging statement
//echo "<p class='text-light'>Debug: $timingsForToday</p>";
?>
