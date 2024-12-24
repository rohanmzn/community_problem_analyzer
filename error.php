
<?php
include 'database/session.php';
if (empty($_SESSION['username'])) {
    // Redirect to login page if username is empty or not set
    header('Location: users/login.php');
    exit(); // Make sure no further code is executed
}
$username=$_SESSION["username"];
$error=$_SESSION['error'];
?><html><body>
    <p>Error while fetching from api</p>
    <?= $error ?>
</body></html>