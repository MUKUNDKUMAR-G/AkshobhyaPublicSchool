// Define a function to initialize form validation
function initFormValidation() {
  // Select the form element
  const form = document.getElementById("emailForm");

  // Add event listener to the form for form submission
  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    // Get form data
    const formData = new FormData(this);

    // Send form data using fetch
    fetch("send_email.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => {
        if (!response.ok) {
          throw new Error("Failed to send email");
        }
        return response.json();
      })
      .then((data) => {
        console.log("Email sent successfully", data);
        // Optionally, display a success message to the user
      })
      .catch((error) => {
        console.error("Error sending email:", error);
        // Optionally, display an error message to the user
      });
  });
}

// Call the initFormValidation function to initialize form validation when the document is ready
document.addEventListener("DOMContentLoaded", function () {
  initFormValidation();
});
