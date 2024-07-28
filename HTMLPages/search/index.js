document.getElementById("searchButton").addEventListener("click", function () {
  const fromCountry = document.getElementById("fromCountryInput").value;
  const toCountry = document.getElementById("toCountryInput").value;

  fetch(`search.php?from_country=${fromCountry}&to_country=${toCountry}`)
    .then((response) => response.json())
    .then((data) => {
      // Handle the search results
      console.log(data);
      // Update the frontend with search results
      let resultsDiv = document.getElementById("results");
      resultsDiv.innerHTML = "";
      data.forEach((item) => {
        let div = document.createElement("div");
        div.innerHTML = `Booking ID: ${item.id}, From: ${item.from_country}, To: ${item.to_country}, Departure Date: ${item.departure_date}, Price: ${item.price}`;
        resultsDiv.appendChild(div);
      });
    })
    .catch((error) => console.error("Error:", error));
});
