<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session only if it hasn't been started already
}

$servername = "localhost";
$username = "root";
$password = "";
$db = "communityproblemanalyzer";
$conn = mysqli_connect($servername,$username,$password,$db) or die(mysqli_connect_error());
?>