<!-- programmer name: 55
    displays passenger table
-->

<div class="container" id="passengers">
    <table class="maintable passengersTable">
        <thead>
            <tr>
                <th>Passenger ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Passport #</th>
                <th>Country</th>
                <th>Birth Date</th>
                <th>Expiry Date</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get-passengers.php'; ?>
        </tbody>
    </table>
</div>