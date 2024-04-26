<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class'];

// Email details
$to = "naveenani2005@gmail.com"; // Enter your email address here
$subject = "New Booking";
$message = "Name: $name\n";
$message .= "Email: $email\n";
$message .= "Class: $class\n";

// Send email
$headers = "From: $name <$email>";
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(array("success" => true));
} else {
    echo json_encode(array("success" => false));
}
?>