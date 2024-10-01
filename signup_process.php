<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullName = $_POST['fullName'];
    $emailAddress = $_POST['emailAddress'];
    $loginPassword = $_POST['loginPassword']; // Usually, the password shouldn't be included in emails

    // You should validate and sanitize the inputs before using them
    // Example: sanitize email
    $emailAddress = filter_var($emailAddress, FILTER_SANITIZE_EMAIL);

    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    // Send confirmation email with user details
    $to = $emailAddress;
    $subject = "Sign Up Confirmation";

    // Email content (including the details entered by the user)
    $message = "
    <html>
    <head>
    <title>Welcome to Our Service</title>
    </head>
    <body>
    <h1>Thank you for signing up, $fullName!</h1>
    <p>Your account details are as follows:</p>
    <ul>
      <li><strong>Full Name:</strong> $fullName</li>
      <li><strong>Email Address:</strong> $emailAddress</li>
    </ul>
    <p>Your account has been created successfully. If you have any questions, feel free to reply to this email (honey1432koushik@gmail.com).</p>
    </body>
    </html>
    ";

    // Set content-type header for sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // Additional headers
    $headers .= "From: honey1432koushik@gmail.com" . "\r\n"; // The email address used in the "noreply" part

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Sign up successful! A confirmation email has been sent to $emailAddress.";
    } else {
        echo "Failed to send confirmation email.";
    }
}
?>
