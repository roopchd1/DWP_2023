
    <h3 class="text-primary my-3">Delete Your Account</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 bg-danger text-light m-auto" name="delete" value="Delete Account">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 bg-success text-light m-auto" name="dont_delete" value="Don't Delete Account">
        </div>
    </form>

    <?php
$username_session = $_SESSION['username'];

if (isset($_POST['delete'])) {
    echo "Delete button clicked!";

    $delete_query = "DELETE FROM `user_table` WHERE user_name=?";
    $stmt = mysqli_prepare($connection, $delete_query);

    if ($stmt === false) {
        die('Error preparing delete statement: ' . mysqli_error($connection));
    }

    mysqli_stmt_bind_param($stmt, "s", $username_session);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        unset($_SESSION['username']);
        echo "<script>alert('Account Deleted Successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    } else {
        echo "<script>alert('Failed to delete account. Error: " . mysqli_error($connection) . "')</script>";
        error_log('Error executing delete statement: ' . mysqli_error($connection));
    }
}

if (isset($_POST['dont_delete'])) {
    echo "<script>window.open('profile.php','_self')</script>";
}

?>
