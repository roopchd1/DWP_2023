<?php
include('../includes/connect.php');
//include('../globalfunctions/common_functions.php');
include("../globalfunctions/product_function.php");
include("../globalfunctions/sidenav_function.php");
include("../globalfunctions/search_function.php");
include("../globalfunctions/details_function.php");
include("../globalfunctions/cart_function.php");
include("../globalfunctions/getting_ip_function.php");
@session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTan - Admin Login</title>

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
        <h2 class="text-center mb-3">Admin Login</h2>
        <div class="row d-flex justify-centent-center">
            <div class="col-lg-6 col-xl-4 m-5">
                <img src="../images/admin_login.jpg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-5 mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your username" required class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-primary text-light py-2 px-4 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't have an account yet? <a href="admin_registration.php" class="text-danger text-decoration-none">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php

if (isset($_POST['admin_login'])) {
    $admin_username = sanitize_input($_POST['username']);
    $admin_password = sanitize_input($_POST['password']);

    // Select query using prepared statement
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name = ?";
    $stmt = mysqli_prepare($connection, $select_query);

    // Check for query preparation errors
    if (!$stmt) {
        die("Error in SQL query preparation: " . mysqli_error($connection));
    }

    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "s", $admin_username);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);

    // Check for query execution errors
    if (!$result) {
        die("Error in SQL query execution: " . mysqli_error($connection));
    }

    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Verify the password
        if (password_verify($admin_password, $row['admin_password'])) {
            // Password is correct, set session or redirect to admin dashboard
            session_start();
            $_SESSION['admin_username'] = $admin_username;
            header("Location:index.php");
            exit();
        } else {
            echo "<script>alert('Incorrect Password')</script>";
        }
    } else {
        echo "<script>alert('Admin not found')</script>";
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Function to sanitize input
function sanitize_input($data) {
    global $connection;
    $data = trim($data);
    $data = mysqli_real_escape_string($connection, $data);
    return $data;
}
?>