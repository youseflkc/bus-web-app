<!-- programmer name: 55
    displays the form the edit a current trip
-->

<div class="container" id="edit">
    <a id="navbusTrips" class="nav__item link-arrow">Return</a>
    <form name="editTripForm" class="edit-trip" onsubmit="return validateBusTripForm()" method="post" action="update-bus-trips.php">
        <input readonly onclick="return false;" class="edit-trip__input no-edit" type="text" name="editID" id="editID" />
        <input required name="editName" id="editName" class="edit-trip__input" type="text" placeholder="Trip Name..." />
        <label class="edit-trip__label" for="editStart">Start Date</label>
        <input required name="editStart" id="editStart" class="edit-trip__input" type="date" placeholder="Start Date..." />
        <label class="edit-trip__label" for="editEnd">End Date</label>
        <input required name="editEnd" id="editEnd" class="edit-trip__input" type="date" placeholder="End Date..." />
        <input name="editImage" id="editImage" class="edit-trip__input" type="text" placeholder="Image Url (Must end with .jpg or .png)..." />
        <input id="editSubmit" class="btn btn--primary" type="submit" />
        <div id="editLoader" class="loader"></div>
    </form>
</div>