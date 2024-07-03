// document
//   .getElementById("contactForm")
//   .addEventListener("submit", function (event) {
//     event.preventDefault();

//     const formData = new FormData(this);

//     fetch("contactustestandcss.php", {
//       method: "POST",
//       body: formData,
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         document.getElementById("response").innerText = data.message;
//         if (data.success) {
//           document.getElementById("response").style.color = "green";
//           this.reset();
//         } else {
//           document.getElementById("response").style.color = "red";
//         }
//       })
//       .catch((error) => {
//         document.getElementById("response").innerText =
//           "An error occurred. Please try again.";
//         document.getElementById("response").style.color = "red";
//         console.error("Error:", error);
//       });
//   });
