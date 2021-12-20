<?php
// <!-- programmer name: 55
// update trip in database
// -->

include 'connectdb.php';

$query = 'UPDATE busTrip
SET tripName = "' . $_POST["editName"] . '",
startDate = DATE "' . $_POST["editStart"] . '",
endDate = DATE "' . $_POST["editEnd"] . '",
imageUrl = "' . $_POST["editImage"] . '" WHERE tripID = ' . $_POST["editID"];

$result = mysqli_query($connection, $query);

if (!$result) {
    echo "<script>console.log(" . $_POST["editID"] . ");</script>";
    echo $query;
    die("database query failed");
}

header("Location: index.php");
die();
