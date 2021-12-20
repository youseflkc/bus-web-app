<!-- programmer name: 55
    displays form to create new trip
-->
<div class="container" id="newTrip">
    <a id="navbusTrips" class="nav__item link-arrow">Return</a>
    <form name="newTripForm" class="edit-trip new-trip">
        <input id="newID" name="newID" class="edit-trip__input" type="number" required placeholder="ID" />
        <input id="newName" name="newName" required class="edit-trip__input" type="text" placeholder="Trip Name..." />
        <label class="edit-trip__label" for="newStart">Start Date</label>
        <input id="newStart" name="newStart" required class="edit-trip__input" type="date" placeholder="Start Date..." />
        <label class="edit-trip__label" for="newEnd">End Date</label>
        <input id="newEnd" name="newEnd" required class="edit-trip__input" type="date" placeholder="End Date..." />
        <input id="newCountry" name="newCountry" required class="edit-trip__input" type="text" placeholder="Country Visited" />
        <select required class="edit-trip__input" name="newBus" id="newBus">
            <?php include 'get-buses.php'; ?>
        </select>
        <input id="newImage" name="newImage" class="edit-trip__input" type="text" placeholder="Image Url..." />
        <div id="newLoader" class="loader"></div>
    </form>
    <button id="newSubmit" style="width:50%; justify-self: center;" onclick="handleNewTrip()" class="btn btn--primary">Submit</button>
</div>