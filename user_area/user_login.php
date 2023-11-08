<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>

    <!-- bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User Login</h2><br/>
        <div class="row d-flex align-item-center justify-content-center mt-5">
            <div class="lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- username field -->
                    <div class="form-outline mb-4">
                        <label for="user_username" class="form-label">Username</label>
                        <input type="text" id="user-username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username">
                    </div>
                    <!-- user password field -->
                    <div class="form-outline mb-4">
                        <label for="user_password" class="form-label">Password</label>
                        <input type="password" id="user-password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="button" value="Login" class="bg-success text-light py-2 px-3 border-0" name="user_login">
                        <p class="small fw-bold mt-1 pt-1">Don't have an account? <a href="user_registration.php" class="text-danger">  Register</a></p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>

</body>
</html>