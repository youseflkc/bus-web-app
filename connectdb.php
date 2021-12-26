<?php
// <!-- programmer name: 55
//     connects to the database
// -->

$dbhost = "busdb.cmkhedrzsfor.us-east-2.rds.amazonaws.com";
$dbuser = "admin";
$dbpass = "Z8Ph82JeHInTxoR9pmKA";
$dbname = "55_assign2db";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    die("database connection failed :" .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")");
}
?>