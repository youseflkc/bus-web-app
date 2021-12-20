<?php
// <!-- programmer name: 55
// creates a new booking in the database
// -->

include 'connectdb.php';

$query = 'INSERT INTO booking 
VALUES(' . $_POST['newBookingPassengerID'] . ',' . $_POST['newBookingID'] . ',' . $_POST['newPrice'] . ')';

$result = mysqli_query($connection, $query);

if (mysqli_error($connection)) {
    echo "failure";
    echo $query;
    exit();
} else {
    echo "success";
    exit();
}

mysqli_free_result($result);
