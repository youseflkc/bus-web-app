<?php
// <!-- programmer name: 55
//     connects to the database
// -->

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs3319";
$dbname = "55_assign2db";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    die("database connection failed :" .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")");
}
?>