<!-- programmer name: 55
    displays booking table
-->

<div class="container" id="bookings">
    <button style="width: 40%; justify-self: center;" class="btn btn--primary newBookingBtn" id="newBookingBtn">
        New Booking
    </button>
    <table id="bookingsTable" class="maintable">
        <thead>
            <tr>
                <th>Trip ID</th>
                <th>Trip Name</th>
                <th>Passenger ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get-bookings.php'; ?>
        </tbody>
    </table>
</div>