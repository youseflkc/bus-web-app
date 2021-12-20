
<?php include 'connectdb.php';
// <!-- programmer name: 55
// deletes a booking from the database
// -->

$query = "DELETE FROM booking WHERE tripID = " . (int)$_POST["tripID"] . " AND passengerID = " . (int)$_POST["passengerID"];
$result = mysqli_query($connection, $query);

if (mysqli_error($connection)) {
    echo "error";
    exit;
} else {
    echo "success";
    exit;
}

mysqli_free_result($result);
