<?php
// <!-- programmer name: 55
// gets all passengers and passport information from database
// -->

$query = "SELECT passenger.passengerID, firstName, lastName, passenger.passportNum,
 country, birthDate, expiryDate FROM passenger 
 INNER JOIN passport ON passport.passportNum = passenger.passportNum ORDER BY lastname";

$result = mysqli_query($connection, $query);
if (!$result) {
    die("databases query failed");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["passengerID"] . "</td>";
    echo "<td>" . $row["firstName"] . "</td>";
    echo "<td>" . $row["lastName"] . "</td>";
    echo "<td>" . $row["passportNum"] . "</td>";
    echo "<td>" . $row["country"] . "</td>";
    echo "<td>" . $row["birthDate"] . "</td>";
    echo "<td>" . $row["expiryDate"] . "</td>";
    $passengerID = $row["passengerID"];
    echo "<td><div id='" . $passengerID . "Link' class='table-arrow'>View Bookings<svg id='icon" . $passengerID . "' class='icon icon--primary icon--right'><use xlink:href='images/sprite.svg#chevron'></use></svg></div></td>";
    echo "</tr>";
    echo "<tr><td></td><td></td><td></td><td></td><td></td>";
    echo "<td colspan='3'><table id='" . $passengerID . "' class='subtable'>";
    $query2 = "SELECT booking.tripID, tripName, price FROM booking 
    INNER JOIN busTrip ON booking.tripID = busTrip.tripID WHERE booking.passengerID = $passengerID";
    $result2 = mysqli_query($connection, $query2);
    if (mysqli_num_rows($result2) == 0) {
        echo "<tr><td colspan='3'>This passenger does not have any bookings.</td></tr>";
    } else {
        echo "<thead><tr>";
        echo "<th>Trip ID</th>";
        echo "<th>Trip Name</th>";
        echo "<th>Price</th>";
        echo "</tr></thead>";
        while ($row = mysqli_fetch_assoc($result2)) {
            echo "<tr>";
            echo "<td>" . $row["tripID"] . "</td>";
            echo "<td>" . $row["tripName"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "</tr>";
        }
    }
    echo "</table></td></tr>";
}
mysqli_free_result($result);
mysqli_free_result($result2);
