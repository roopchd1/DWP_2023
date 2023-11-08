<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2><br/>
        <div class="row d-flex align-item-center justify-content-center">
            <div class="lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user-username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- user email field -->
                    <div class="form-outline mb-4">
                        <label for="user_email" class="form-label">Email</label>
                        <input type="email" id="user-email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_email">
                    </div>
                    <!-- user image -->
                    <div class="form-outline mb-4">
                        <label for="user_image" class="form-label">User Image</label>
                        <input type="file" id="user_image" class="form-control" required="required" name="user_image">
                    </div>
                    <!-- user password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user-password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <!-- confirm password field -->
                    <div class="form-outline mb-4">
                        <label for="conf_user_password" class="form-label">Confirm Password</label>
                        <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm password" autocomplete="off" required="required" name="conf_user_password">
                    </div>
                    <!-- user address field -->
                    <div class="form-outline mb-4">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address">
                    </div>
                    <!-- user contact field -->
                    <div class="form-outline mb-4">
                        <label for="user_contact" class="form-label">Address</label>
                        <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="button" value="Register" class="bg-success text-light py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-1 pt-1">Already have an account? <a href="user_login.php" class="text-danger">  Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>