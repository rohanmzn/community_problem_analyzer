<?php
session_start(); // Start the session to access session variables

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect the user to the homepage or login page after logout
header("Location: index.php"); 
exit();
?>
