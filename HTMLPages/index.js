document.addEventListener("DOMContentLoaded", () => {
  const loginSignupPopup = document.getElementById("loginSignupPopup");
  const toggleLoginSignup = document.getElementById("toggleLoginSignup");
  const closeBtn = document.querySelector(".close-btn");
  const showSignupForm = document.getElementById("showSignupForm");
  const showLoginForm = document.getElementById("showLoginForm");
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");
  const searchForm = document.getElementById("searchForm");
  const searchResults = document.getElementById("searchResults");

  // Toggle the popup when Login / Sign Up button is clicked
  toggleLoginSignup.addEventListener("click", () => {
    loginSignupPopup.style.display = "block";
    loginForm.style.display = "block";
    signupForm.style.display = "none";
  });

  // When the user clicks on <span> (x), close the modal
  closeBtn.addEventListener("click", () => {
    loginSignupPopup.style.display = "none";
  });

  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener("click", (event) => {
    if (event.target === loginSignupPopup) {
      loginSignupPopup.style.display = "none";
    }
  });

  // Switch to signup form
  showSignupForm.addEventListener("click", (event) => {
    event.preventDefault();
    loginForm.style.display = "none";
    signupForm.style.display = "block";
  });

  // Switch to login form
  showLoginForm.addEventListener("click", (event) => {
    event.preventDefault();
    signupForm.style.display = "none";
    loginForm.style.display = "block";
  });

  // Handle signup form submission
  signupForm.addEventListener("submit", async (event) => {
    event.preventDefault(); // Prevent default form submission

    try {
      const formData = new FormData(signupForm);
      const response = await fetch("../DatabaseValidation/signup.php", {
        method: "POST",
        body: formData,
      });

      if (!response.ok) {
        throw new Error("Sign up request failed.");
      }

      const data = await response.json();

      if (data.success) {
        // Show signup success message
        alert(
          "Sign up successful! You will now be redirected to the login form."
        );

        // Redirect to login form within the popup
        signupForm.style.display = "none";
        loginForm.style.display = "block";
      } else {
        // Handle signup failure
        alert(data.message || "Sign up failed. Please try again.");
      }
    } catch (error) {
      console.error("Error:", error);
      alert("An error occurred. Please try again later.");
    }
  });

  // New search form functionality
  searchForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    try {
      const formData = new FormData(searchForm);
      const location = formData.get("location");
      const date = formData.get("date");
      const people = formData.get("people");

      // Client-side validation or additional processing can be done here

      // Example: Fetch data from search.json (replace with actual backend API call)
      const response = await fetch("search.json");
      const results = await response.json();

      // Filter results based on search criteria
      const filteredResults = results.filter(
        (result) =>
          result.location.toLowerCase().includes(location.toLowerCase()) &&
          new Date(result.date) >= new Date(date) &&
          result.people >= people
      );

      // Display search results on the page
      displaySearchResults(filteredResults);
    } catch (error) {
      console.error("Error:", error);
      alert("An error occurred. Please try again later.");
    }
  });

  // Function to display search results dynamically
  function displaySearchResults(results) {
    searchResults.innerHTML = "";

    if (results.length > 0) {
      results.forEach((result) => {
        const resultCard = document.createElement("div");
        resultCard.className = "result-card";
        resultCard.innerHTML = `
                    <h3>${result.location}</h3>
                    <p>Date: ${result.date}</p>
                    <p>People: ${result.people}</p>
                    <p>Price: ${result.price}</p>
                `;
        searchResults.appendChild(resultCard);
      });
    } else {
      searchResults.innerHTML = "<p>Sorry, location not available.</p>";
    }
  }
});
///////////////////////
fetch("search.json")
  .then((response) => response.json())
  .then((data) => {
    // Process the data here
    console.log(data); // Example: logging the data to the console
  })
  .catch((error) => console.error("Error fetching search.json:", error));
//////////////////
document
  .getElementById("searchForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();

    const location = document
      .querySelector('input[name="location"]')
      .value.toLowerCase();
    const date = document.querySelector('input[name="date"]').value;
    const people = parseInt(
      document.querySelector('input[name="people"]').value,
      10
    );

    // Fetch and process search.json
    fetch("search.json")
      .then((response) => response.json())
      .then((data) => {
        const results = data.filter((item) => {
          return (
            item.location.toLowerCase() === location &&
            item.date === date &&
            item.people >= people
          );
        });

        if (results.length > 0) {
          // Display search results
          console.log("Search results:", results);
          // Example: Render results on the page
          renderSearchResults(results);
        } else {
          // No results found message
          console.log("No results found");
          // Example: Show a message on the page
          displayNoResultsMessage();
        }
      })
      .catch((error) => console.error("Error fetching search.json:", error));
  });

function renderSearchResults(results) {
  // Example: Rendering search results on the page
  const searchResultsContainer = document.getElementById("searchResults");
  searchResultsContainer.innerHTML = ""; // Clear previous results

  results.forEach((result) => {
    const resultElement = document.createElement("div");
    resultElement.textContent = `Location: ${result.location}, Date: ${result.date}, People: ${result.people}`;
    searchResultsContainer.appendChild(resultElement);
  });
}

function displayNoResultsMessage() {
  // Example: Display a message when no results are found
  const searchResultsContainer = document.getElementById("searchResults");
  searchResultsContainer.innerHTML = "<p>Sorry, no results found.</p>";
}
