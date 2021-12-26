//programmer name: 55

const IMAGEPLACEHOLDERURL =
  "https://safe-escarpment-53756.herokuapp.com/images/image-placeholder.jpg";

//these are event listeners for any element that can be clicked
const navItems = document.querySelectorAll(".nav__item");
const containers = document.querySelectorAll(".container");
const filters = document.querySelectorAll(".trip-filter__item");
const newTrip = document.querySelectorAll(".newTripBtn");
const newBooking = document.querySelectorAll(".newBookingBtn");
const links = document.querySelectorAll(".link-arrow");
const tableLinks = document.querySelectorAll(".table-arrow");
const subtables = document.querySelectorAll(".subtable");
const deleteBooking = document.querySelectorAll(".deleteBooking");
const deleteTrip = document.querySelectorAll(".deleteTrip");
const tripTables = document.querySelectorAll(".tripTable");
const sortIcons = document.querySelectorAll(".icon--sort");
const editTrip = document.querySelectorAll(".editTrip");

editTrip.forEach((item) => {
  item.addEventListener("click", toggleEdit);
});

deleteBooking.forEach((item) => {
  item.addEventListener("click", handleDelete);
});

deleteTrip.forEach((item) => {
  item.addEventListener("click", handleTripDelete);
});

tableLinks.forEach((item) => {
  item.addEventListener("click", toggleSubtable);
});

links.forEach((item) => {
  item.addEventListener("click", togglePassengerBookings);
});

newBooking.forEach((item) => {
  item.addEventListener("click", toggleNewBooking);
});

navItems.forEach((item) => {
  item.addEventListener("click", toggleActiveNav);
});

filters.forEach((item) => {
  item.addEventListener("click", toggleActiveFilter);
});

newTrip.forEach((item) => {
  item.addEventListener("click", toggleNewTrip);
});

//validates form, then creates ajax request to the php server to create the new booking
function handleNewBooking() {
  if (!validateNewBookingForm()) {
    return false;
  }
  console.log();
  $.ajax({
    type: "POST",
    url: "create-new-booking.php",
    data:
      "newBookingPassengerID=" +
      document.forms["newBookingForm"]["newBookingPassengerID"].value +
      "&newBookingID=" +
      document.forms["newBookingForm"]["newBookingID"].value +
      "&newPrice=" +
      document.getElementById("newPrice").value,
    dataType: "html",
    complete: function (data) {
      //if request is successful, it will display a success message
      if (data.responseText === "success") {
        //trip created
        document.getElementById("bookingLoader").style.display = "block";
        document
          .getElementById("alertbox-success")
          .classList.toggle("alert--display");
        document.getElementById("bookingSubmit").style.display = "none";
        document.getElementById("alertbox-success").innerHTML =
          "Booking saved successfully. Updating database...";
        setTimeout(function () {
          window.location.replace("index.php");
          document
            .getElementById("alertbox--success")
            .classList.toggle("alert--display");
          document.getElementById("bookingLoader").style.display = "none";
          document.getElementById("bookingSubmit").style.display = "none";
        }, 2000);
        return true;
      } else {
        // booking already exists, displays error message

        document.getElementById("alertbox").innerHTML =
          "Error: This booking already exists in the table.";
        document.getElementById("alertbox").classList.toggle("alert--display");

        document
          .getElementById("bookingSubmit")
          .classList.toggle("animate__shakeX");
        document
          .getElementById("bookingSubmit")
          .classList.toggle("animate__animated");

        setTimeout(function () {
          document
            .getElementById("alertbox")
            .classList.toggle("alert--display");
          document
            .getElementById("bookingSubmit")
            .classList.remove("animate__shakeX");
          document
            .getElementById("bookingSubmit")
            .classList.remove("animate__animated");
        }, 5000);
        return false;
      }
    },
  });
}

//creates ajax request to create a new trip
function handleNewTrip() {
  if (!validateNewTripForm()) {
    return false;
  }
  $.ajax({
    type: "POST",
    url: "new-bus-trip.php",
    data:
      "newID=" +
      document.getElementById("newID").value +
      "&newName=" +
      document.getElementById("newName").value +
      "&newStart=" +
      document.getElementById("newStart").value +
      "&newEnd=" +
      document.getElementById("newEnd").value +
      "&newCountry=" +
      document.getElementById("newCountry").value +
      "&newImage=" +
      document.getElementById("newImage").value +
      "&newBus=" +
      document.getElementById("newBus").value,
    dataType: "html",
    complete: function (data) {
      if (data.responseText === "success") {
        //trip created
        document.getElementById("newLoader").style.display = "block";
        document
          .getElementById("alertbox-success")
          .classList.toggle("alert--display");
        document.getElementById("newSubmit").style.display = "none";
        document.getElementById("alertbox-success").innerHTML =
          "Trip saved successfully. Updating database...";
        setTimeout(function () {
          window.location.replace("index.php");
          document
            .getElementById("alertbox-success")
            .classList.toggle("alert--display");
          document.getElementById("newLoader").style.display = "none";
          document.getElementById("newSubmit").style.display = "none";
        }, 2000);
        return true;
      } else {
        //if the id already exists in the table, it will dislay a error message

        document.getElementById("alertbox").innerHTML =
          "Error: This ID already exists in the table.";
        document.getElementById("alertbox").classList.toggle("alert--display");

        document.getElementById("newID").classList.toggle("animate__shakeX");
        document.getElementById("newID").classList.toggle("animate__animated");

        setTimeout(function () {
          document
            .getElementById("alertbox")
            .classList.toggle("alert--display");
          document.getElementById("newID").classList.remove("animate__shakeX");
          document
            .getElementById("newID")
            .classList.remove("animate__animated");
        }, 5000);
        return false;
      }
    },
  });
}

// displays confirmation warning before calling an ajax request to delete the booking
function handleDelete() {
  //confirmation message uses sweet alert library
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#ff4545",
    cancelButtonColor: "#b1b1b1",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var row = this.name;
      $.ajax({
        type: "POST",
        url: "delete-bookings.php",
        data: "passengerID=" + this.value + "&tripID=" + this.id,
        dataType: "html",
        complete: function (data) {
          document.getElementById(row).classList.add("bg-danger");
          setTimeout(function () {
            document.getElementById(row).style.display = "none";
          }, 1000);
        },
      });
    }
  });
}

//source: https://www.w3schools.com/howto/howto_js_sort_table.asp
function sortTable(n, tableID) {
  sortIcons.forEach((item) => {
    if (item.id === "icon" + n) {
      if ((item.style.display = "inline")) {
        item.classList.toggle("icon--up");
      } else {
        item.style.display = "inline";
      }
    } else {
      item.style.display = "none";
    }
  });

  var table,
    rows,
    switching,
    i,
    x,
    y,
    shouldSwitch,
    dir,
    switchcount = 0;
  table = document.getElementById(tableID);
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc";
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    if (rows <= 1) {
      return;
    }
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < rows.length - 1; i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount++;
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}

//displays confirmation warning before deleting trip.
function handleTripDelete() {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#ff4545",
    cancelButtonColor: "#b1b1b1",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      var row = this.name;
      $.ajax({
        type: "POST",
        url: "delete-trips.php",
        data: "tripID=" + this.value,
        dataType: "html",
        complete: function (data) {
          const rows = document.querySelectorAll("." + row);
          console.log(rows);
          console.log(data.responseText);
          //selects the row to be deleted, if successful, it will display deletion animation
          // if not successful, then will display warning message
          rows.forEach((item) => {
            if (data.responseText === "success") {
              item.classList.add("bg-danger");
              setTimeout(function () {
                item.style.display = "none";
              }, 1000);
            } else if (data.responseText === "error") {
              item.classList.add("animate__animated");
              document.getElementById("alertbox").innerHTML =
                "Error: Cannot delete because this trip still has bookings.";
              document
                .getElementById("alertbox")
                .classList.toggle("alert--display");
              item.classList.add("animate__shakeX");
              setTimeout(function () {
                document
                  .getElementById("alertbox")
                  .classList.toggle("alert--display");
                item.classList.remove("animate__shakeX");
                item.classList.remove("animate__animated");
              }, 5000);
            }
          });
        },
      });
    }
  });
}

// displays passengers table when user selects nav option
function togglePassengerBookings() {
  containers.forEach((table) => {
    if (table.id + "Link" === this.id) {
      table.style.opacity = "1";
      table.style.height = "100%";
      table.style.zindex = "99";
      table.style.display = "grid";
      table.style.lineHeight = "1";
      table.style.overflow = "auto";
    } else {
      table.style.opacity = "0";
      table.style.height = "0";
      table.style.zIndex = "0";
      table.style.display = "block";
      table.style.lineHeight = "0";
      table.style.overflow = "hidden";
    }
  });
}

// displays new booking form when user selects new booking button

function toggleNewBooking() {
  containers.forEach((table) => {
    if (table.id + "Btn" === this.id) {
      table.style.opacity = "1";
      table.style.height = "100%";
      table.style.zindex = "99";
      table.style.display = "grid";
      table.style.lineHeight = "1";
      table.style.overflow = "auto";
    } else {
      table.style.opacity = "0";
      table.style.height = "0";
      table.style.zIndex = "0";
      table.style.display = "block";
      table.style.lineHeight = "0";
      table.style.overflow = "hidden";
    }
  });
}

// displays new trip form when user selects new trip btn
function toggleNewTrip() {
  containers.forEach((table) => {
    if (table.id + "Btn" === this.id) {
      table.style.opacity = "1";
      table.style.height = "100%";
      table.style.zindex = "99";
      table.style.display = "grid";
      table.style.lineHeight = "1";
      table.style.overflow = "auto";
    } else {
      table.style.opacity = "0";
      table.style.height = "0";
      table.style.zIndex = "0";
      table.style.display = "block";
      table.style.lineHeight = "0";
      table.style.overflow = "hidden";
    }
  });
}

// displays edit form when user selects edit btn
function toggleEdit() {
  containers.forEach((table) => {
    if (table.id === "edit") {
      table.style.opacity = "1";
      table.style.height = "100%";
      table.style.zindex = "99";
      table.style.display = "grid";
      table.style.lineHeight = "1";
      table.style.overflow = "auto";
      document.getElementById("editName").value = document.getElementById(
        this.value + "name"
      ).innerHTML;
      document.getElementById("editStart").value = document.getElementById(
        this.value + "start"
      ).innerHTML;
      document.getElementById("editEnd").value = document.getElementById(
        this.value + "end"
      ).innerHTML;

      if (
        document.getElementById(this.value + "image").value !=
        IMAGEPLACEHOLDERURL
      ) {
        document.getElementById("editImage").value = document.getElementById(
          this.value + "image"
        ).src;
      }

      document.getElementById("editID").value = this.value;
    } else {
      table.style.opacity = "0";
      table.style.height = "0";
      table.style.zIndex = "0";
      table.style.display = "block";
      table.style.lineHeight = "0";
      table.style.overflow = "hidden";
    }
  });
}

//highlights nav item after clicking it so use know which tab they are on
function toggleActiveNav() {
  navItems.forEach((item) => {
    if (item.classList.contains("active")) {
      item.classList.toggle("active");
    }
  });
  this.classList.add("active");
  containers.forEach((table) => {
    if ("nav" + table.id === this.id) {
      table.style.opacity = "1";
      table.style.height = "100%";
      table.style.zindex = "99";
      table.style.display = "grid";
      table.style.lineHeight = "1";
      table.style.overflow = "auto";
    } else {
      table.style.opacity = "0";
      table.style.height = "0";
      table.style.zIndex = "0";
      table.style.display = "block";
      table.style.lineHeight = "0";
      table.style.overflow = "hidden";
    }
  });
}

// display the correct table based on the filter the user selects
function toggleActiveFilter() {
  filters.forEach((item) => {
    if (item.classList.contains("active")) {
      item.classList.toggle("active");
    }
  });
  if (this.id !== "filter-") {
    tripTables.forEach((item) => {
      if (item.id === "trips" + this.id) {
        document.getElementById(item.id).style.display = "table";
      } else {
        document.getElementById(item.id).style.display = "none";
      }
    });
  }

  if (
    this.classList.contains("trip-filter__item") &&
    this.classList.contains("dropdown")
  ) {
    document.getElementById("icon").classList.toggle("icon--right");
    document.getElementById("countries").classList.toggle("expanded");
  }
  this.classList.add("active");
}

// displays the individual passenger bookings
function toggleSubtable() {
  subtables.forEach((item) => {
    if (item.id + "Link" === this.id) {
      document.getElementById("icon" + item.id).classList.toggle("icon--right");
      item.classList.toggle("expanded");
    }
  });
}

//checks to see if bus trip form is valid before sending request to php server
function validateBusTripForm() {
  const startd = new Date(document.forms["editTripForm"]["editStart"].value);
  const endd = new Date(document.forms["editTripForm"]["editEnd"].value);
  const imageUrl = document.forms["editTripForm"]["editImage"].value;

  //verifies the start and end dates are valid
  if (startd < endd) {
    //verifies the image url is valid
    if (
      imageUrl.endsWith(".jpg") ||
      imageUrl.endsWith(".png") ||
      imageUrl === ""
    ) {
      //displays success message
      document.getElementById("editLoader").style.display = "block";
      document
        .getElementById("alertbox-success")
        .classList.toggle("alert--display");
      document.getElementById("editSubmit").style.display = "none";
      document.getElementById("alertbox-success").innerHTML =
        "Trip saved successfully. Updating database...";
      setTimeout(function () {
        document
          .getElementById("alertbox-success")
          .classList.toggle("alert--display");
        document.getElementById("editLoader").style.display = "none";
        document.getElementById("editSubmit").style.display = "none";
      }, 3000);
      return true;
    } else {
      //displays error message if not valid
      document.getElementById("alertbox").innerHTML =
        "Error: Image URL must end with '.jpg' or '.png'.";
      document.getElementById("alertbox").classList.toggle("alert--display");

      document.getElementById("editImage").classList.toggle("animate__shakeX");
      document
        .getElementById("editImage")
        .classList.toggle("animate__animated");

      setTimeout(function () {
        document.getElementById("alertbox").classList.toggle("alert--display");
        document
          .getElementById("editImage")
          .classList.remove("animate__shakeX");
        document
          .getElementById("editImage")
          .classList.remove("animate__animated");
      }, 5000);

      return false;
    }
  } else {
    document.getElementById("editStart").classList.toggle("animate__shakeX");
    document.getElementById("editStart").classList.toggle("animate__animated");

    document.getElementById("editEnd").classList.toggle("animate__shakeX");
    document.getElementById("editEnd").classList.toggle("animate__animated");

    document.getElementById("alertbox").innerHTML =
      "Error: Start date must be before end date.";
    document.getElementById("alertbox").classList.toggle("alert--display");

    setTimeout(function () {
      document.getElementById("alertbox").classList.toggle("alert--display");
      document.getElementById("editEnd").classList.remove("animate__shakeX");
      document.getElementById("editEnd").classList.remove("animate__animated");
      document.getElementById("editStart").classList.remove("animate__shakeX");
      document
        .getElementById("editStart")
        .classList.remove("animate__animated");
    }, 5000);
    return false;
  }
}

function validateNewTripForm() {
  const startd = new Date(document.forms["newTripForm"]["newStart"].value);
  const endd = new Date(document.forms["newTripForm"]["newEnd"].value);
  const imageUrl = document.forms["newTripForm"]["newImage"].value;
  if (startd < endd) {
    if (
      imageUrl.endsWith(".jpg") ||
      imageUrl.endsWith(".png") ||
      imageUrl === ""
    ) {
      return true;
    } else {
      document.getElementById("alertbox").innerHTML =
        "Error: Image URL must end with '.jpg' or '.png'.";
      document.getElementById("alertbox").classList.toggle("alert--display");

      document.getElementById("newImage").classList.toggle("animate__shakeX");
      document.getElementById("newImage").classList.toggle("animate__animated");

      setTimeout(function () {
        document.getElementById("alertbox").classList.toggle("alert--display");
        document.getElementById("newImage").classList.remove("animate__shakeX");
        document
          .getElementById("newImage")
          .classList.remove("animate__animated");
      }, 5000);

      return false;
    }
  } else {
    document.getElementById("newStart").classList.toggle("animate__shakeX");
    document.getElementById("newStart").classList.toggle("animate__animated");

    document.getElementById("newEnd").classList.toggle("animate__shakeX");
    document.getElementById("newEnd").classList.toggle("animate__animated");

    document.getElementById("alertbox").innerHTML =
      "Error: Start date must be before end date.";
    document.getElementById("alertbox").classList.toggle("alert--display");

    setTimeout(function () {
      document.getElementById("alertbox").classList.toggle("alert--display");
      document.getElementById("newEnd").classList.remove("animate__shakeX");
      document.getElementById("newEnd").classList.remove("animate__animated");
      document.getElementById("newStart").classList.remove("animate__shakeX");
      document.getElementById("newStart").classList.remove("animate__animated");
    }, 5000);
    return false;
  }
}

function validateNewBookingForm() {
  let price = document.forms["newBookingForm"]["newPrice"].value;

  if (price <= 0) {
    document.getElementById("alertbox").innerHTML =
      "Error: Price must be greater than 0.";
    document.getElementById("alertbox").classList.toggle("alert--display");

    document.getElementById("newPrice").classList.toggle("animate__shakeX");
    document.getElementById("newPrice").classList.toggle("animate__animated");

    setTimeout(function () {
      document.getElementById("alertbox").classList.toggle("alert--display");
      document.getElementById("newPrice").classList.remove("animate__shakeX");
      document.getElementById("newPrice").classList.remove("animate__animated");
    }, 5000);

    return false;
  }
  return true;
}
