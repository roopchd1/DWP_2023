<?php
require("constants.php");
$connection=mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

if(!$connection){
    die("database error2222");

}
$db_select=mysqli_select_db($connection, DB_NAME);

if(!$db_select){
    die("database error3333:" . mysqli_error($connection));
}



?>