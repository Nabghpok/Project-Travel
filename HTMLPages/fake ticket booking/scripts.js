document.getElementById("bookingForm").addEventListener("submit", function (e) {
  e.preventDefault();

  const fromCountry = document.getElementById("fromCountry").value;
  const toCountry = document.getElementById("toCountry").value;
  const ticketType = document.getElementById("ticketType").value;
  const departureDate = document.getElementById("departureDate").value;
  const price = calculatePrice(ticketType);

  const form = document.createElement("form");
  form.method = "POST";
  form.action = "payment.php";

  const fields = [
    { name: "fromCountry", value: fromCountry },
    { name: "toCountry", value: toCountry },
    { name: "ticketType", value: ticketType },
    { name: "departureDate", value: departureDate },
    { name: "price", value: price },
  ];

  fields.forEach((field) => {
    const input = document.createElement("input");
    input.type = "hidden";
    input.name = field.name;
    input.value = field.value;
    form.appendChild(input);
  });

  document.body.appendChild(form);
  form.submit();
});

document.getElementById("ticketType").addEventListener("change", function () {
  const ticketType = this.value;
  const price = calculatePrice(ticketType);
  document.getElementById(
    "priceDisplay"
  ).textContent = `Price for ${ticketType}: $${price.toFixed(2)}`;
});

function calculatePrice(ticketType) {
  const basePrice = 100;
  const priceIncrements = {
    Economy: 0,
    "Premium Economy": 50,
    Business: 100,
  };
  return basePrice + priceIncrements[ticketType];
}
