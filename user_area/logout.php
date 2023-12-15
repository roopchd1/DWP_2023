<?php

session_start();

// Unset all session variables
$_SESSION = array();

// Regenerate session ID to help prevent session fixation
session_regenerate_id();

// Destroy the session
session_destroy();

// Redirect to the index page
header("Location: ../index.php");
exit();

?>