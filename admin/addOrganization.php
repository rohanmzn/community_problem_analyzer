<?php
// Connect to the database
include "../database/db.php";
require 'admin_session.php';
require 'admin_navbar.php';
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $category = isset($_POST['category']) ? htmlspecialchars($_POST['category']) : '';
    $organization_name = isset($_POST['organization_name']) ? htmlspecialchars($_POST['organization_name']) : '';
    $phone = isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '';
    $address = isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '';
    $link = isset($_POST['link']) ? htmlspecialchars($_POST['link']) : '';
    $recommended_action = isset($_POST['recommended_action']) ? htmlspecialchars($_POST['recommended_action']) : '';

    // Validate mandatory fields
    if (empty($category) || empty($organization_name) || empty($phone) || empty($address)) {
        die("All required fields must be filled out.");
    }

    // Insert data into the database
    $sql = "INSERT INTO organization_list (category, organization_name, phone, address, link, recommended_action) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ssssss", $category, $organization_name, $phone, $address, $link, $recommended_action);

        if ($stmt->execute()) {
            // Redirect to Admin Dashboard after successful insertion
            header('Location: view-organization.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
