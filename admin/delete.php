
// $delephone = $_GET['phone'];
// $deledata = "Delete from organization_list where phone='$delephone'";
// $delExe = mysqli_query($conn,$deledata);
// header('location:AdminDashboard.php');
<!-- include "db.php"; -->
<?php
require 'admin_session.php';
include "../database/db.php";

// Check if 'phone' is passed in the URL
if (isset($_GET['phone']) && !empty($_GET['phone'])) {
    $delephone = $_GET['phone'];

    // Sanitize input to prevent malicious input
    $delephone = htmlspecialchars($delephone);

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM organization_list WHERE phone = ?");
    $stmt->bind_param("s", $delephone);  // "s" means string

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the admin dashboard after successful deletion
        header("Location: view-organization.php");
        exit();
    } else {
        // Redirect to the admin dashboard with an error message if deletion failed
        header("Location: view-organization.php");
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    // If phone is not provided, redirect with an error
    header("Location: view-organization.php");
    exit();
}

// Close the database connection
$conn->close();
?>

 ?>