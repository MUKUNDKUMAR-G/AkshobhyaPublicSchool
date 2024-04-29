<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email recipient
    $to = "naveenani2005@gmail.com";

    // Email subject
    $email_subject = "$subject: $name";

    // Email body
    $email_body = "You have received a new message from your website contact form.\n\n" .
        "Here are the details:\n\nName: $name\n\nEmail: $email\n\nSubject: $subject\n\nMessage: $message";

    // Email headers
    $headers = "From: $email" . "\r\n" .
        "Reply-To: $email" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'message' => 'Failed to send email'));
    }
} else {
    // Not a POST request
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
}
?>
