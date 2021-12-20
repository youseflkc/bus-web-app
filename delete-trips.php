<?php
// <!-- programmer name: 55
//     deletes a trip from the database -->
include 'connectdb.php';
$query = "DELETE FROM busTrip WHERE tripID = " . (int)$_POST["tripID"];
$result = mysqli_query($connection, $query);
//check for error in deletion;
if ($error = mysqli_error($connection)) {
    echo 'error';
    exit;
} else {
    echo 'success';
    exit;
}

mysqli_free_result($result);
