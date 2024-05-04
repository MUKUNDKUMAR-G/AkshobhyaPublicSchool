<?php

// Receive data from AJAX request
$data = json_decode(file_get_contents("php://input"), true);

// Validate received data (you can add more validation as per your requirements)
if (!isset($data['name']) || !isset($data['email']) || !isset($data['rating']) || !isset($data['comments'])) {
    http_response_code(400);
    echo json_encode(array("message" => "Incomplete data received"));
    exit();
}

// Extract data
$name = $data['name'];
$email = $data['email'];
$rating = $data['rating'];
$comments = $data['comments'];

// Send email (you need to configure your mail settings for this)
$to = "naveenani2005@gmail.com"; 
$subject = "New Feedback Received";
$body = "Name: $name\nEmail: $email\nRating: $rating\nComments: $comments";
$header = "From: $email" . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $body, $header)) {
    // Email sent successfully
    http_response_code(200);
    echo json_encode(array("message" => "Feedback submitted successfully"));
} else {
    // Failed to send email
    http_response_code(500);
    echo json_encode(array("message" => "Failed to submit feedback"));
}

?>
