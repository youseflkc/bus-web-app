<?php
// <!-- programmer name: 55
//     gets list of all the buses
// -->

$query = 'SELECT licenseNum FROM bus;';

$result = mysqli_query($connection, $query);

if (!$result) {
    die("databases query failed");
}

while ($row = mysqli_fetch_assoc($result)) {
    echo "<option value='" . $row['licenseNum'] . "'>" . $row['licenseNum'] . "</option>";
}
