<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = isset($_POST['name']) ? $_POST['name'] : 'No name provided';
    $email = isset($_POST['email']) ? $_POST['email'] : 'No email provided';
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email != 'No email provided') {
        echo "Invalid email format. Please go back and try again.";
        exit;
    }
    
    // Set recipient email
    $to = "hello@nischalshrestha.info.np";
    
    // Set email subject
    $subject = "New Subscription from Coming Soon Page";
    
    // Compose email content
    $message = "You have received a new subscription from your Coming Soon page:\n\n";
    $message .= "Name: " . $name . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Submitted on: " . date("Y-m-d H:i:s") . "\n";
    
    // Additional headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    
    // Send email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to thank you page or show thank you message
        header("Location: thank_you.html");
        exit;
    } else {
        echo "Sorry, there was an error sending your subscription. Please try again later.";
    }
} else {
    // Not a POST request, redirect to the home page
    header("Location: index.html");
    exit;
}
?>