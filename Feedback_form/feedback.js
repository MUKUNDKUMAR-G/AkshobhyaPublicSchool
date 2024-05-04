$(document).ready(function () {
  $("#feedback-form").submit(function (e) {
    e.preventDefault(); // Prevent form submission

    // Get form data
    var formData = {
      name: $("#name").val(),
      email: $("#email").val(),
      rating: $('input[name="rate"]:checked').val(),
      comments: $("#comments").val(),
    };

    // Send data to PHP script using AJAX
    $.ajax({
      type: "POST",
      url: "submit_feedback.php",
      data: JSON.stringify(formData),
      contentType: "application/json",
      success: function (response) {
        // Show success message or handle response
        alert(response.message);
        // Reset form
        $("#feedback-form")[0].reset();
      },
      error: function (xhr, status, error) {
        // Handle errors
        console.error(xhr.responseText);
        alert("Error submitting feedback. Please try again later.");
      },
    });
  });
});
