// Array.from(document.getElementsByTagName("input")).forEach((e, i) => {
//   e.addEventListener("keyup", (e1) => {
//     if (e.value.length > 0) {
//       document.getElementsByClassName("bi-caret-down-fill")[i].style.transform =
//         "rotate(180deg)";
//     } else {
//       document.getElementsByClassName("bi-caret-down-fill")[i].style.transform =
//         "rotate(0deg)";
//     }
//   });
// });

// code for popup login code

// script.js

// // Get the modal
// var loginPopup = document.getElementById("loginPopup");

// // Get the button that opens the modal
// var loginBtn = document.getElementById("loginBtn");

// // Get the <span> element that closes the modal
// var closeBtn = document.getElementsByClassName("close-btn")[0];

// // When the user clicks the button, open the modal
// loginBtn.onclick = function () {
//   loginPopup.style.display = "block";
// };

// // When the user clicks on <span> (x), close the modal
// closeBtn.onclick = function () {
//   loginPopup.style.display = "none";
// };

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function (event) {
//   if (event.target == loginPopup) {
//     loginPopup.style.display = "none";
//   }
// };

// script.js

// Get the modal
var loginPopup = document.getElementById("loginPopup");

// Get the button that opens the modal
var loginBtn = document.getElementById("loginBtn");

// Get the <span> element that closes the modal
var closeBtn = document.getElementsByClassName("close-btn")[0];

// When the user clicks the button, open the modal
loginBtn.onclick = function () {
  loginPopup.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
closeBtn.onclick = function () {
  loginPopup.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == loginPopup) {
    loginPopup.style.display = "none";
  }
};
