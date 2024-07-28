// payment.js
document.addEventListener("DOMContentLoaded", function () {
  const paymentForm = document.getElementById("paymentForm");

  paymentForm.addEventListener("submit", function (event) {
    event.preventDefault();

    const cardType = document.getElementById("cardType").value;
    const cardNumber = document.getElementById("cardNumber").value;
    const expiryDate = new Date(document.getElementById("expiryDate").value);
    const cvv = document.getElementById("cvv").value;

    const isCardValid = validateCard(cardType, cardNumber, expiryDate, cvv);
    if (isCardValid) {
      alert("Your flight is booked for the selected date.");
      // Redirect to confirmation page or backend processing
    } else {
      alert("Invalid card details. Please check and try again.");
    }
  });

  function validateCard(cardType, cardNumber, expiryDate, cvv) {
    const currentDate = new Date();
    if (expiryDate <= currentDate) {
      return false;
    }

    const cardNumberPattern = {
      masterCard: /^5[0-9]{15}$/,
      visa: /^4[0-9]{15}$/,
      discover: /^6[0-9]{15}$/,
    };

    if (!cardNumberPattern[cardType].test(cardNumber)) {
      return false;
    }

    return true;
  }
});
