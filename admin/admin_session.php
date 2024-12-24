<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start(); // Start the session only if it hasn't been started already
}
// Check if the admin is logged in and if the username contains 'admin'
if (!isset($_SESSION['username']) || strpos($_SESSION['username'], 'admin') === false) {
    // Redirect to login page if not logged in or username does not contain 'admin'
    header("Location: admin_login.php");
    exit();
} ?>