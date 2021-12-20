<?php
// <!-- programmer name: 55
//     gets list of just the distinct trip countries
// -->

$query = 'SELECT countryVisited FROM busTrip GROUP BY countryVisited;';

$result = mysqli_query($connection, $query);

if (!$result) {
    die("databases query failed");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<li id='" . $row['countryVisited'] . "' class='trip-filter__item'>" . $row['countryVisited'] . "</li>";
}
