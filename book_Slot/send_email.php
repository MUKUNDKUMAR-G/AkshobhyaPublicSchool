<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize input
    $name = trim($_POST["name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phoneNo = $_POST["phone"];
    $selectedClass = $_POST["class"];

    // Validate name (non-empty)
    if (empty($name)) {
        echo "Please provide a valid name.";
        exit;
    }

    // Validate email (valid format)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please provide a valid email address.";
        exit;
    }

    // Validate class (not empty and not the default value)
    if (empty($selectedClass) || $selectedClass === "Select A Class") {
        echo "Please select a valid class.";
        exit;
    }

    // Send email (you can customize this part)
    $to = "naveenani2005@gmail.com";
    $subject = "New Booking Request";
    $message = "Name: $name\nEmail: $email\nPhone No : $phoneNo\nClass: $selectedClass";

    mail($to, $subject, $message);

    // Display a custom thank-you message
    echo "<h2>Thank you for your booking request, $name!</h2>";
}
?>