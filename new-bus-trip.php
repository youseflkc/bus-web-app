<?php
// <!-- programmer name: 55
// creates new trip in database
// -->

include 'connectdb.php';

$query = 'INSERT INTO busTrip VALUES("' . $_POST['newID'] . '","' . $_POST['newStart'] . '","'
    . $_POST['newEnd']    . '","' . $_POST['newCountry'] . '","' . $_POST['newName'] . '","' .
    $_POST['newBus'] . '","' . $_POST['newImage'] . '")';

$result = mysqli_query($connection, $query);

if (mysqli_error($connection)) {
    echo "failure";
    exit();
} else {
    echo "success";
    exit();
}
mysqli_free_result($result);
