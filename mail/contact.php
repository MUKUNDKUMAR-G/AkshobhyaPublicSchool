<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  echo "Please fill out all required fields and provide a valid email address.";
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "naveenani2005@gmail.com";
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n" .
    "Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email" . "\r\n" .
    "Reply-To: $email" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

if (mail($to, $subject, $body, $header)) {
    http_response_code(200); // OK
    echo "Your message has been sent successfully.";
} else {
    http_response_code(500); // Internal Server Error
    echo "Oops! Something went wrong. Please try again later.";
}
?>
