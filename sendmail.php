<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Validate the form data (basic validation example)
    if (strlen($name) < 4 || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($subject) < 8 || empty($message)) {
        echo "All fields are required and must be valid.";
        exit;
    }

    // Your Mailgun API key and domain
    $api_key = 'your-mailgun-api-key';
    $domain = 'your-mailgun-domain';

    // The email you want to send the message to
    $to = "roharzan@gmail.com";  // Replace with your desired recipient's email

    // Message details
    $postData = [
        'from'    => "$name <$email>",
        'to'      => $to,
        'subject' => $subject,
        'text'    => $message
    ];

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, 'api:' . $api_key);
    curl_setopt($ch, CURLOPT_URL, "https://api.mailgun.net/v3/$domain/messages");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

    // Execute cURL and capture the response
    $result = curl_exec($ch);
    $httpStatus = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ($httpStatus == 200) {
        // Success message
        echo "Your message has been sent. Thank you!";
    } else {
        // Failure message
        echo "Failed to send your message. Please try again later.";
    }

    curl_close($ch);
}
?>
