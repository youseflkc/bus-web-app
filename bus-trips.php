<!-- programmer name: 55
    displays all the bustrip tables
-->

<div class="container busTrips--container" id="busTrips">
    <!-- this div displays the menu that lets you filter by country or by bookings -->
    <div class="side-menu">
        <button class="btn btn--primary newTripBtn" id="newTripBtn">
            New Trip
        </button>
        <div class="trip-filter">
            <ul class="trip-filter__list">
                <li id="All" class="trip-filter__item active">All Trips</li>
                <li id="WithBookings" class="trip-filter__item">Trips w/ Bookings</li>
                <li id="WithoutBookings" class="trip-filter__item">Trips w/o Bookings</li>
                <li id="filter-" class="trip-filter__item dropdown">
                    Trips by Country
                    <svg id="icon" class="icon icon--primary icon--right">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </li>
                <ul id="countries" class="trip-filter__list collapsible">
                    <?php include 'get-countries.php'; ?>
                </ul>
            </ul>
        </div>
    </div>
    <!-- each filter has its own table below that is displayed dynamically based on what the user selects -->
    <table class="maintable tripTable" id="tripsAll">
        <thead>
            <tr>
                <th></th>
                <th id="sort1" onclick="sortTable(1, 'tripsAll')">Trip ID
                    <svg id="icon1" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort2" onclick="sortTable(2, 'tripsAll')">Trip Name
                    <svg id="icon2" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort3" onclick="sortTable(3, 'tripsAll')">Start Date
                    <svg id="icon3" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort4" onclick="sortTable(4, 'tripsAll')">End Date
                    <svg id="icon4" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort5" onclick="sortTable(5, 'tripsAll')">Country Visited
                    <svg id="icon5" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort6" onclick="sortTable(6, 'tripsAll')">Assigned Bus #
                    <svg id="icon6" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get-bus-trips.php'; ?>
        </tbody>
    </table>

    <table class="maintable tripTable" id="tripsWithBookings">
        <thead>
            <tr>
                <th></th>
                <th id="sort1" onclick="sortTable(1, 'tripsWithBookings')">Trip ID
                    <svg id="icon1" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort2" onclick="sortTable(2, 'tripsWithBookings')">Trip Name
                    <svg id="icon2" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort3" onclick="sortTable(3, 'tripsWithBookings')">Start Date
                    <svg id="icon3" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort4" onclick="sortTable(4, 'tripsWithBookings')">End Date
                    <svg id="icon4" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort5" onclick="sortTable(5, 'tripsWithBookings')">Country Visited
                    <svg id="icon5" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort6" onclick="sortTable(6, 'tripsWithBookings')">Assigned Bus #
                    <svg id="icon6" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get-bus-trips-w-bookings.php'; ?>
        </tbody>
    </table>

    <table class="maintable tripTable" id="tripsWithoutBookings">
        <thead>
            <tr>
                <th></th>
                <th id="sort1" onclick="sortTable(1, 'tripsWithoutBookings')">Trip ID
                    <svg id="icon1" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort2" onclick="sortTable(2, 'tripsWithoutBookings')">Trip Name
                    <svg id="icon2" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort3" onclick="sortTable(3, 'tripsWithoutBookings')">Start Date
                    <svg id="icon3" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort4" onclick="sortTable(4, 'tripsWithoutBookings')">End Date
                    <svg id="icon4" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort5" onclick="sortTable(5, 'tripsWithoutBookings')">Country Visited
                    <svg id="icon5" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th id="sort6" onclick="sortTable(6, 'tripsWithoutBookings')">Assigned Bus #
                    <svg id="icon6" class="icon icon--primary icon--sort">
                        <use xlink:href="images/sprite.svg#chevron"></use>
                    </svg>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php include 'get-bus-trips-wo-bookings.php'; ?>
        </tbody>
    </table>
    <?php include 'get-bus-trips-by-country.php'; ?>
</div>