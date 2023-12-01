<?php
// Define variables and set to empty values
$name = $email = $subject = $message = '';
$errors = [];

// Function to sanitize and validate input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate name
    if (empty($_POST['name'])) {
        $errors['name'] = 'Name is required';
    } else {
        $name = test_input($_POST['name']);
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required';
    } else {
        $email = test_input($_POST['email']);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid email format';
        }
    }

    // Validate subject
    if (empty($_POST['subject'])) {
        $errors['subject'] = 'Subject is required';
    } else {
        $subject = test_input($_POST['subject']);
    }

    // Validate message
    if (empty($_POST['message'])) {
        $errors['message'] = 'Message is required';
    } else {
        $message = test_input($_POST['message']);
    }

    // If no errors, process the form
    if (empty($errors)) {
        // You can add code here to send the email or save the form data to a database
        // For demonstration purposes, we'll just display the submitted data
        echo "<h2>Your Message:</h2>";
        echo "<p>Name: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Subject: $subject</p>";
        echo "<p>Message: $message</p>";
    }
}
?>we