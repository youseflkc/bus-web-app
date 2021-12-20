<?php
// <!-- programmer name: 55
// gets list of bus trips from database
// -->

$query = "SELECT tripName, tripID FROM busTrip";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("databases query failed");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['tripID'] . "'>"
        . $row['tripName'] . ", " . $row['tripID'] . "</option>";
}
