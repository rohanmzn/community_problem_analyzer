<?php
// Include your database connection file
include '../database/db.php';

// Check if 'id' is passed in the query string
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Sanitize the ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $id);

    // Update query to set username to 'admin' for the given uf_id
    $sql = "UPDATE user_form SET username = 'admin' WHERE uf_id = '$id'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Redirect to a success page or back to the main page
        // Redirect to the desired URL
        header("Location: /team15/index.php");

        exit();
    } else {
        // Handle errors
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    // If 'id' is not set, redirect or show an error message
    header("Location: users_list.php?message=error");
    exit();
}
