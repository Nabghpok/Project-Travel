document.addEventListener("DOMContentLoaded", function () {
  const ticketTypeSelect = document.getElementById("ticketType");
  const priceDisplay = document.getElementById("priceDisplay");
  const priceSpan = document.getElementById("price");
  const bookingForm = document.getElementById("bookingForm");

  const basePrice = 100;
  const prices = {
    economy: basePrice,
    premiumEconomy: basePrice + 50,
    business: basePrice + 100,
  };

  ticketTypeSelect.addEventListener("change", function () {
    const selectedType = ticketTypeSelect.value;
    const selectedPrice = prices[selectedType] || 0;
    priceSpan.textContent = selectedPrice;
    priceDisplay.style.display = "block";

    // Update hidden inputs
    document.getElementById("hiddenFromCountry").value =
      document.getElementById("fromCountry").value;
    document.getElementById("hiddenToCountry").value =
      document.getElementById("toCountry").value;
    document.getElementById("hiddenTicketType").value = selectedType;
    document.getElementById("hiddenDepartureDate").value =
      document.getElementById("departureDate").value;
    document.getElementById("hiddenPrice").value = selectedPrice;
  });

  // Pre-fill hidden fields on page load if any previous value
  if (ticketTypeSelect.value) {
    ticketTypeSelect.dispatchEvent(new Event("change"));
  }

  // Function to fetch and display previous bookings
  function fetchBookings() {
    fetch("getBookings.php")
      .then((response) => response.json())
      .then((data) => {
        const bookingsList = document.getElementById("bookingsList");
        bookingsList.innerHTML = "";
        data.forEach((booking) => {
          const bookingItem = document.createElement("div");
          bookingItem.classList.add("booking-item");
          bookingItem.innerHTML = `
                    <p>From: ${booking.from_country}</p>
                    <p>To: ${booking.to_country}</p>
                    <p>Ticket Type: ${booking.ticket_type}</p>
                    <p>Price: $${booking.price}</p>
                    <p>Departure Date: ${booking.departure_date}</p>
                    <p>Booking Date: ${booking.booking_date}</p>
                `;
          bookingsList.appendChild(bookingItem);
        });
      })
      .catch((error) => console.error("Error:", error));
  }

  fetchBookings();
});
