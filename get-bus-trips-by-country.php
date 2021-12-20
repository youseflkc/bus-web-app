<?php
// <!-- programmer name: 55
// gets bus trips grouped by each individual country
// -->

$query = 'SELECT countryVisited FROM busTrip GROUP BY countryVisited';

$result = mysqli_query($connection, $query);

if (!$result) {
    die("databases query failed");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<table class='maintable tripTable' id='trips" . $row['countryVisited'] . "'>";
    echo "<thead>
        <tr>
            <th></th>
            <th id='sort1' onclick='sortTable(1, " . '"trips' . $row['countryVisited'] . '")' . "'>Trip ID
            <svg id='icon1' class='icon icon--primary icon--sort'>
                <use xlink:href='images/sprite.svg#chevron'></use>
            </svg>
            </th>
            <th id='sort2' onclick='sortTable(2," . '"trips' . $row['countryVisited'] . '")' . "'>Trip Name
            <svg id='icon2' class='icon icon--primary icon--sort'>
                <use xlink:href='images/sprite.svg#chevron'></use>
            </svg>
            </th>
            <th id='sort3' onclick='sortTable(3, " . '"trips' . $row['countryVisited'] . '")' . "'>Start Date
            <svg id='icon3' class='icon icon--primary icon--sort'>
                <use xlink:href='images/sprite.svg#chevron'></use>
            </svg>
            </th>
            <th id='sort4' onclick='sortTable(4," . '"trips' . $row['countryVisited'] . '")' . "'>End Date
            <svg id='icon4' class='icon icon--primary icon--sort'>
                <use xlink:href='images/sprite.svg#chevron'></use>
            </svg>
            </th>
            <th id='sort5' onclick='sortTable(5, " . '"trips' . $row['countryVisited'] . '")' . "'>Country Visited
            <svg id='icon5' class='icon icon--primary icon--sort'>
                <use xlink:href='images/sprite.svg#chevron'></use>
            </svg>
            </th>
            <th id='sort6' onclick='sortTable(6, " . '"trips' . $row['countryVisited'] . '")' . "'>Assigned Bus #
            <svg id='icon6' class='icon icon--primary icon--sort'>
                <use xlink:href='images/sprite.svg#chevron'></use>
            </svg>
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>";
    $query2 = "SELECT * FROM busTrip WHERE countryVisited = '" . $row['countryVisited'] . "'";
    $result2 = mysqli_query($connection, $query2);
    if (mysqli_num_rows($result) === 0) {
        echo "<tr><td colspan='8'>There are no trips to show.</td></tr>";
    } else {
        while ($row = mysqli_fetch_assoc($result2)) {
            echo "<tr class='trip" . $row['tripID'] . "'>";
            echo "<td><img id='" . $row["tripID"] . "image' class='tripImg' src='" . $row["imageUrl"] . "' onerror='this.src=" . '"images/image-placeholder.jpg"' . "'/></td>";
            echo "<td>" . $row["tripID"] . "</td>";
            echo "<td id='" . $row["tripID"] . "name'>" . $row["tripName"] . "</td>";
            echo "<td id='" . $row["tripID"] . "start'>" . $row["startDate"] . "</td>";
            echo "<td id='" . $row["tripID"] . "end'>" . $row["endDate"] . "</td>";
            echo "<td id='" . $row["tripID"] . "country'>" . $row["countryVisited"] . "</td>";
            echo "<td id='" . $row["tripID"] . "busID'>" . $row["busID"] . "</td>";
            echo "<td><button name='trip" . $row['tripID'] . "' value='" . $row["tripID"] . "' class='btn btn--primary editTrip'>Edit</button></td>";
            echo "<td><button name='trip" . $row['tripID'] . "' value='" . $row["tripID"] . "' class='btn btn--danger deleteTrip'>Delete</button></td>";
            echo "</tr>";
            $index++;
        }
    }
    echo "</tbody></table>";
}

mysqli_free_result($result);
mysqli_free_result($result2);
