<?php
// <!-- programmer name: 55
//     gets list of only passenger names and id
// -->

$query = "SELECT firstName, lastName, passengerID FROM passenger";

$result = mysqli_query($connection, $query);

if (!$result) {
    die("databases query failed");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['passengerID'] . "'>"
        . $row['lastName'] . ", " . $row['firstName'] . ", " . $row['passengerID'] .
        "</option>";
}
