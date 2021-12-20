<!-- programmer name: 55
    displays form to create new booking
 -->
<div class="container" id="newBooking">
    <a id="navbookings" class="nav__item link-arrow">Return</a>
    <form name="newBookingForm" class="edit-trip">
        <select name="newBookingPassengerID" id="newBookingPassengerID" required class="edit-trip__input" placeholder="Passenger">
            <?php include 'get-passengers-list.php'; ?>
        </select>
        <select name="newBookingID" id="newBookingId" required class="edit-trip__input" placeholder="Trip">
            <?php include 'get-trips-list.php'; ?>
        </select>
        <input name="newPrice" id="newPrice" required class="edit-trip__input" type="number" placeholder="Price" />
        <div id="bookingLoader" class="loader"></div>
    </form>
    <button id="bookingSubmit" style="width:50%; justify-self: center;" onclick="handleNewBooking()" class="btn btn--primary">Submit</button>
</div>