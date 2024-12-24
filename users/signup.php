<?php
include "../database/db.php";

// Validate if the form was submitted
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid form submission. <a href="signup.html">Try again</a>');
}

// Retrieve and sanitize input data from the form
$full_name = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$address = isset($_POST['address']) ? trim($_POST['address']) : '';
$contact_no = isset($_POST['contact_no']) ? trim($_POST['contact_no']) : '';

// Check for empty fields
if (empty($full_name) || empty($username) || empty($password) || empty($confirm_password) || empty($email) || empty($address) || empty($contact_no)) {
    die('All fields are required. <a href="signup.html">Try again</a>');
}

// Check if passwords match
if ($password !== $confirm_password) {
    die('Passwords do not match. <a href="signup.html">Try again</a>');
}

// Password validation
if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*]/', $password)) {
    die('Password must be at least 8 characters long and include one uppercase letter, one number, and one special character. <a href="signup.html">Try again</a>');
}

// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Check if email is valid
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email format. <a href="signup.html">Try again</a>');
}

// Individual checks for username, email, and contact number

// Check if the username exists
$check_username_query = $conn->prepare("SELECT id FROM users WHERE username = ?");
if (!$check_username_query) {
    die('Database error: ' . $conn->error . '. <a href="signup.html">Try again</a>');
}
$check_username_query->bind_param("s", $username);
$check_username_query->execute();
$check_username_query->store_result();
if ($check_username_query->num_rows > 0) {
    $check_username_query->close();
    die('Username already exists. <a href="signup.html">Try again</a>');
}
$check_username_query->close();

// Check if the email exists
$check_email_query = $conn->prepare("SELECT id FROM users WHERE email = ?");
if (!$check_email_query) {
    die('Database error: ' . $conn->error . '. <a href="signup.html">Try again</a>');
}
$check_email_query->bind_param("s", $email);
$check_email_query->execute();
$check_email_query->store_result();
if ($check_email_query->num_rows > 0) {
    $check_email_query->close();
    die('Email already exists. <a href="signup.html">Try again</a>');
}
$check_email_query->close();

// Check if the contact number exists
$check_contact_no_query = $conn->prepare("SELECT id FROM users WHERE contact_no = ?");
if (!$check_contact_no_query) {
    die('Database error: ' . $conn->error . '. <a href="signup.html">Try again</a>');
}
$check_contact_no_query->bind_param("s", $contact_no);
$check_contact_no_query->execute();
$check_contact_no_query->store_result();
if ($check_contact_no_query->num_rows > 0) {
    $check_contact_no_query->close();
    die('Contact number already exists. <a href="signup.html">Try again</a>');
}
$check_contact_no_query->close();

// Insert user into the database
$stmt = $conn->prepare("INSERT INTO users (full_name, username, password, email, address, contact_no) VALUES (?, ?, ?, ?, ?, ?)");
if (!$stmt) {
    die('Database error: ' . $conn->error . '. <a href="signup.html">Try again</a>');
}

$stmt->bind_param("ssssss", $full_name, $username, $hashed_password, $email, $address, $contact_no);

if ($stmt->execute()) {
    echo 'Signup successful. <a href="login.php">Login here</a>';
} else {
    echo 'Error during signup: ' . $conn->error . '. <a href="signup.html">Try again</a>';
}

// Close resources
$stmt->close();
$conn->close();
?>
