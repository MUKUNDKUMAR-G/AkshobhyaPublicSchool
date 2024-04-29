$(document).ready(function () {
  // Validate and submit the form
  $("#contactForm").submit(function (event) {
    // Prevent the form from submitting by default
    event.preventDefault();

    // Get the form data
    var formData = $(this).serialize();

    // Perform client-side validation
    if (validateForm()) {
      // Send the form data to the server
      $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: formData,
        success: function (response) {
          // Handle successful form submission
          console.log("Form submitted successfully:", response);
          // Optionally, display a success message to the user
        },
        error: function (xhr, status, error) {
          // Handle errors during form submission
          console.error("Error submitting form:", error);
          // Optionally, display an error message to the user
        },
      });
    }
  });

  // Client-side form validation
  function validateForm() {
    var valid = true;

    // Reset validation messages
    $("#contactForm .help-block").text("");

    // Validate name field
    var name = $("#name").val();
    if (!name) {
      $("#name").next(".help-block").text("Please enter your name");
      valid = false;
    }

    // Validate email field
    var email = $("#email").val();
    if (!email || !isValidEmail(email)) {
      $("#email")
        .next(".help-block")
        .text("Please enter a valid email address");
      valid = false;
    }

    // Validate subject field
    var subject = $("#subject").val();
    if (!subject) {
      $("#subject").next(".help-block").text("Please enter a subject");
      valid = false;
    }

    // Validate message field
    var message = $("#message").val();
    if (!message || message.length < 10) {
      $("#message")
        .next(".help-block")
        .text("Please enter a message with at least 10 characters");
      valid = false;
    }

    return valid;
  }

  // Helper function to validate email format
  function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }
});
