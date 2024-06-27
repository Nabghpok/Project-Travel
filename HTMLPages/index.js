// document.addEventListener("DOMContentLoaded", () => {
//   const loginSignupPopup = document.getElementById("loginSignupPopup");
//   const toggleLoginSignup = document.getElementById("toggleLoginSignup");
//   const closeBtn = document.getElementsByClassName("close-btn")[0];
//   const showSignupForm = document.getElementById("showSignupForm");
//   const showLoginForm = document.getElementById("showLoginForm");
//   const loginForm = document.getElementById("loginForm");
//   const signupForm = document.getElementById("signupForm");

//   // Toggle the popup when Login / Sign Up button is clicked
//   toggleLoginSignup.onclick = function () {
//     loginSignupPopup.style.display = "block";
//     loginForm.style.display = "block";
//     signupForm.style.display = "none";
//   };

//   // When the user clicks on <span> (x), close the modal
//   closeBtn.onclick = function () {
//     loginSignupPopup.style.display = "none";
//   };

//   // When the user clicks anywhere outside of the modal, close it
//   window.onclick = function (event) {
//     if (event.target == loginSignupPopup) {
//       loginSignupPopup.style.display = "none";
//     }
//   };

//   // Switch to signup form
//   showSignupForm.onclick = function (event) {
//     event.preventDefault();
//     loginForm.style.display = "none";
//     signupForm.style.display = "block";
//   };

//   // Switch to login form
//   showsignupForm.onclick = function (event) {
//     event.preventDefault();
//     signupForm.style.display = "none";
//     loginForm.style.display = "block";
//   };

//   // Switch to login form
//   showSignupForm.onclick = function (event) {
//     event.preventDefault();
//     showSignupForm.style.display = "none";
//     showSignupForm.style.display = "block";
//   };

//   // Function to handle form submission and show success message
//   signupForm.onsubmit = function (event) {
//     event.preventDefault(); // Prevent default form submission

//     // Example AJAX request using fetch API
//     fetch("../DatabaseValidation/signup.php", {
//       method: "POST",
//       body: new FormData(signupForm),
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         if (data.success) {
//           console.log("signup success");
//           // Show signup success message
//           alert(
//             "Sign up successful! You will now be redirected to the login page."
//           );

//           // Redirect to login page
//           window.location.href = "../DatabaseValidation/login.php"; // Replace with actual login page URL
//         } else {
//           // Handle signup failure if needed
//           alert("Sign up failed. Please try again.");
//         }
//       })
//       // .catch((error) => {
//       //   console.error("Error:", error);
//       //   alert("An error occurred. Please try again later.");
//       // });
//       .catch((Error) => {
//         console.log(error);
//       });
//   };
// });
document.addEventListener("DOMContentLoaded", () => {
  const loginSignupPopup = document.getElementById("loginSignupPopup");
  const toggleLoginSignup = document.getElementById("toggleLoginSignup");
  const closeBtn = document.getElementsByClassName("close-btn")[0];
  const showSignupForm = document.getElementById("showSignupForm");
  const showLoginForm = document.getElementById("showLoginForm");
  const loginForm = document.getElementById("loginForm");
  const signupForm = document.getElementById("signupForm");

  // Toggle the popup when Login / Sign Up button is clicked
  toggleLoginSignup.onclick = function () {
    loginSignupPopup.style.display = "block";
    loginForm.style.display = "block";
    signupForm.style.display = "none";
  };

  // When the user clicks on <span> (x), close the modal
  closeBtn.onclick = function () {
    loginSignupPopup.style.display = "none";
  };

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == loginSignupPopup) {
      loginSignupPopup.style.display = "none";
    }
  };

  // Switch to signup form
  showSignupForm.onclick = function (event) {
    event.preventDefault();
    loginForm.style.display = "none";
    signupForm.style.display = "block";
  };

  // Switch to login form
  showLoginForm.onclick = function (event) {
    event.preventDefault();
    signupForm.style.display = "none";
    loginForm.style.display = "block";
  };

  // Handle signup form submission
  signupForm.onsubmit = function (event) {
    event.preventDefault(); // Prevent default form submission

    // Example AJAX request using fetch API
    fetch("../DatabaseValidation/signup.php", {
      method: "POST",
      body: new FormData(signupForm),
    })
      .then((response) => response.json())
      .then((data) => {
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
      })
      .catch((error) => {
        console.error("Error:", error);
        alert("An error occurred. Please try again later.");
      });
  };
});
