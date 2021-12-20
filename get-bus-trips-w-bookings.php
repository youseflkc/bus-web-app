<?php
// <!-- programmer name: 55
// gets all the bus trips without bookings from the database
// -->

$query = "SELECT busTrip.tripID, tripName, startDate, endDate, countryVisited, busID
FROM busTrip LEFT JOIN booking ON busTrip.tripID = booking.tripID
WHERE passengerID IS NOT NULL GROUP BY tripID;";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("databases query failed");
}

if (mysqli_num_rows($result) === 0) {
    echo "<tr><td colspan='8'>There are no trips to show.</td></tr>";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='trip" . $row['tripID'] . "'>";
        echo "<td><img class='tripImg' src='" . $row["imageUrl"] . "' onerror='this.src=" . '"images/image-placeholder.jpg"' . "'/></td>";
        echo "<td>" . $row["tripID"] . "</td>";
        echo "<td>" . $row["tripName"] . "</td>";
        echo "<td>" . $row["startDate"] . "</td>";
        echo "<td>" . $row["endDate"] . "</td>";
        echo "<td>" . $row["countryVisited"] . "</td>";
        echo "<td>" . $row["busID"] . "</td>";
        echo "<td><button name='trip" . $row['tripID'] . "' value='" . $row["tripID"] . "' class='btn btn--primary editTrip'>Edit</button></td>";
        echo "<td><button name='trip" . $row['tripID'] . "' value='" . $row["tripID"] . "' class='btn btn--danger deleteTrip'>Delete</button></td>";
        echo "</tr>";
        $index++;
    }
}
mysqli_free_result($result);
