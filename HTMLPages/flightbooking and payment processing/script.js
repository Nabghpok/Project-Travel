// script.js
document.addEventListener("DOMContentLoaded", function () {
  const ticketType = document.getElementById("ticketType");
  const priceDisplay = document.getElementById("priceDisplay");
  const priceSpan = document.getElementById("price");
  const bookingForm = document.getElementById("bookingForm");

  const basePrice = 100;
  const prices = {
    economy: basePrice,
    premiumEconomy: basePrice + 50,
    business: basePrice + 100,
  };

  ticketType.addEventListener("change", function () {
    const selectedType = ticketType.value;
    priceSpan.textContent = prices[selectedType];
    priceDisplay.style.display = "block";
  });

  bookingForm.addEventListener("submit", function (event) {
    event.preventDefault();
    const fromCountry = document.getElementById("fromCountry").value;
    const toCountry = document.getElementById("toCountry").value;
    const selectedType = ticketType.value;
    const price = prices[selectedType];
    window.location.href = `payment.html?fromCountry=${fromCountry}&toCountry=${toCountry}&ticketType=${selectedType}&price=${price}`;
  });
});
document.addEventListener("DOMContentLoaded", () => {
  const ticketTypeSelect = document.getElementById("ticketType");
  const priceDisplay = document.getElementById("priceDisplay");
  const priceSpan = document.getElementById("price");

  const prices = {
    economy: 100,
    premiumEconomy: 150,
    business: 200,
  };

  ticketTypeSelect.addEventListener("change", () => {
    const selectedType = ticketTypeSelect.value;
    if (selectedType) {
      priceSpan.textContent = prices[selectedType];
      priceDisplay.style.display = "block";
    } else {
      priceDisplay.style.display = "none";
    }
  });
});
