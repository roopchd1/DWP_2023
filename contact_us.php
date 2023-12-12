<?php
require("includes/connect.php");
//include("./globalfunctions/common_functions.php");
include("./globalfunctions/product_function.php");
include("./globalfunctions/sidenav_function.php");
include("./globalfunctions/search_function.php");
include("./globalfunctions/details_function.php");
include("./globalfunctions/cart_function.php");
include("./globalfunctions/getting_ip_function.php");
$connection=mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$connection){
    die("database error2222");

}
$db_select=mysqli_select_db($connection, DB_NAME);

if(!$db_select){
    die("database error3333:" . mysqli_error($connection));
}
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTan Artisan</title>
    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        
    </style>
</head>
<body class="bg-dark">
    <!-- navbar -->
<div class="container-fluid p-0">

  <!-- header part/first part/second part -->
        <?php
        include("./includes/header.php")
        ?>
        
        <div class="container-fluid m-4 text-light justify-content-center">
    <div class="row d-flex">
        <div class="col-lg-6 col-xl-4 m-5">
            <img src="./images/contact-us.png" alt="Contact_us" class="img-fluid">
        </div>
        <div class="col-lg-6 col-xl-5 mt-3 mb-5">
            <form action="send_email.php" method="post" autocomplete="off">
                <div class="form-group mb-3">
                    <label for="name" class="text-light">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required class="form-control p-2">
                </div>
                <div class="form-group mb-3">
                    <label for="email" class="text-light">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required class="form-control p-2">
                </div>
                <div class="form-group mb-3">
                    <label for="subject" name="subject" class="text-light">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Subject" required class="form-control p-2">
                </div>
                <div class="form-group mb-3">
                    <label for="message" class="text-light">Message</label>
                    <textarea id="message" name="message" placeholder="Enter your message" required class="form-control p-2"></textarea>
                </div>
                <div class="form-group mb-3">
                    <input type="submit" class="btn btn-primary" name="send" value="Send Message">
                </div>                
            </form>
        </div>
    </div>
</div>

      <!-- footer part -->
          
      <?php
      include("./includes/footer.php")
      ?>
</div>
 <!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

<?php

// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = preg_replace('/^[^0-9][A-z0-9_-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_-]+)*[.][A-z]{2,4}$/', '', $data); // Allow letters, numbers, @, dots, and spaces

    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate each input field
    $name = sanitizeInput($_POST['name']);
    $email = sanitizeInput($_POST['email']);
    $subject = sanitizeInput($_POST['subject']);
    $message = sanitizeInput($_POST['message']);

    /* echo "<script>alert('Message sent successfully!')</script>";
    echo "<script>window.open('./index.php','_self')</script>"; */
    exit();
}
?>
