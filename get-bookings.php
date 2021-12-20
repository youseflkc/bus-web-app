<?php
// <!-- programmer name: 55
// gets all the bookings and passenger name and bustrip name from the database 
// -->

$query = "SELECT * FROM booking
 INNER JOIN passenger ON booking.passengerID = passenger.passengerID 
 INNER JOIN busTrip ON booking.tripID = busTrip.tripID";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("databases query failed");
}

$index = 1;
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr id='" . $index . "booking'>";
    echo "<td>" . $row["tripID"] . "</td>";
    echo "<td>" . $row["tripName"] . "</td>";
    echo "<td>" . $row["passengerID"] . "</td>";
    echo "<td>" . $row["firstName"] . "</td>";
    echo "<td>" . $row["lastName"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>";
    echo "<button name='" . $index . "booking' id='" . $row["tripID"] . "' value='" .  $row["passengerID"] . "' class='btn btn--danger deleteBooking'>Delete</button>";
    echo "</td>";
    echo "</tr>";
    $index++;
}

mysqli_free_result($result);
