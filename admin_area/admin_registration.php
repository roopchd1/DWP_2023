<?php
include('../includes/connect.php');
//include('../globalfunctions/common_functions.php');
include("../globalfunctions/product_function.php");
include("../globalfunctions/sidenav_function.php");
include("../globalfunctions/search_function.php");
include("../globalfunctions/details_function.php");
include("../globalfunctions/cart_function.php");
include("../globalfunctions/getting_ip_function.php");

// Allowed email addresses for admin registration
$allowedEmails = ['maxi@gmail.com', 'roxy@gmail.com'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTan - Admin Registration</title>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-4">
        <h2 class="text-center mb-3">Admin Registration</h2>
        <div class="row d-flex justify-centent-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/admin_registration.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" required class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-primary text-light py-2 px-4 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="admin_login.php" class="text-danger text-decoration-none">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<!-- session -->

<?php

if (isset($_POST['admin_registration'])) {
    $admin_username = $_POST['username'];
    $admin_email = $_POST['email'];
    $admin_password = $_POST['password'];
    $admin_confirm_password = $_POST['confirm_password'];

    // Check if the provided email is in the allowed list
    if (!in_array($admin_email, $allowedEmails)) {
        echo "<script>alert('Registration not allowed for this email address.')</script>";
        echo "<script>window.open('./admin_registration.php','_self')</script>";
    }

    // Select query
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name=? OR admin_email=?";
    
    // prepared statement
    $stmt = mysqli_stmt_init($connection);

    if ($stmt) {
        
        mysqli_stmt_prepare($stmt, $select_query);
        mysqli_stmt_bind_param($stmt, "ss", $admin_username, $admin_email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (!$result) {
            die("Error in SQL query: " . mysqli_error($connection));
        }

        $rows_count = mysqli_num_rows($result);

        if ($rows_count > 0) {
            echo "<script>alert('Username or Email already exist')</script>";
        } elseif ($admin_password != $admin_confirm_password) {
            echo "<script>alert('Password and Confirm Password do not match')</script>";
        } else {
            // Close the statement
            mysqli_stmt_close($stmt);

            // prepared statement for insertion
            $insert_stmt = mysqli_stmt_init($connection);

            if ($insert_stmt) {
                // Prepare the SQL statement for insertion
                $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES (?, ?, ?)";
                mysqli_stmt_prepare($insert_stmt, $insert_query);

                // Hash the password
                $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);

                // Bind parameters for insertion
                mysqli_stmt_bind_param($insert_stmt, "sss", $admin_username, $admin_email, $hash_password);

                // Execute the insertion statement
                $sql_execute = mysqli_stmt_execute($insert_stmt);

                // Check for execution errors
                if (!$sql_execute) {
                    die("Error in SQL statement execution: " . mysqli_stmt_error($insert_stmt));
                }

                // Close the insertion statement
                mysqli_stmt_close($insert_stmt);

                echo "<script>alert('Registration Successful');
                    window.location = 'admin_login.php';
                    </script>";
            } else {
                echo "Failed to prepare the insertion statement.";
            }
        }
    } else {
        echo "Failed to initialize statement.";
    }
}
?>