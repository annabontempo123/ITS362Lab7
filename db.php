<?php
date_default_timezone_set("America/Chicago");
$date=date('F j, Y g:i:a');
/* Database connection start */
$servername = "localhost";
$username = "ystvgsdf_ITS362";
$password = "Dean123";
$dbname = "ystvgsdf_ITS362";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>