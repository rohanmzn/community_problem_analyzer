<?php
require 'admin_session.php';
include "../database/db.php";

// Check if 'phone' parameter is passed in the URL
if (isset($_GET['phone'])) {
    $phone = $_GET['phone'];

    // Query to get the organization details based on phone
    $sql = "SELECT * FROM organization_list WHERE phone = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        die("Organization not found.");
    }

    // Fetch the result
    $organization = $result->fetch_assoc();
} else {
    die("Invalid request.");
}

// Check if the form is submitted for updating
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the new data from the form
    $category = $_POST['category'];
    $organization_name = $_POST['organization_name'];
    $new_phone = $_POST['phone']; // Use new phone as input to allow updates
    $address = $_POST['address'];
    $link = $_POST['link'];
    $recommended_action = $_POST['recommended_action'];

    // Query to update the organization
    $update_sql = "UPDATE organization_list SET 
                    category = ?, 
                    organization_name = ?, 
                    phone = ?, 
                    address = ?, 
                    link = ?, 
                    recommended_action = ? 
                    WHERE phone = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssss", $category, $organization_name, $new_phone, $address, $link, $recommended_action, $phone);

    if ($stmt->execute()) {
        // Redirect to the admin dashboard page after updating
        header("Location: view-organization.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Organization</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Override the default button styles for the updateorg button */
        #updateorg {
            background-color: #21865f;
            /* Set background color to green */
            color: white;
            /* Set text color to white */
            border: 1px solid darkgreen;
            /* Set border color */
        }

        #updateorg:hover {
            background-color:rgb(26, 108, 76);
            /* Darker green on hover */
            border-color: green;
            /* Keep the border color when hovered */
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="my-4">Edit Organization</h2>

        <form method="POST">
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($organization['category']); ?>" required>
            </div>
            <div class="form-group">
                <label for="organization_name">Organization Name</label>
                <input type="text" class="form-control" id="organization_name" name="organization_name" value="<?php echo htmlspecialchars($organization['organization_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($organization['phone']); ?>" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($organization['address']); ?>" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" class="form-control" id="link" name="link" value="<?php echo htmlspecialchars($organization['link']); ?>" required>
            </div>
            <div class="form-group">
                <label for="recommended_action">Recommended Action</label>
                <input type="text" class="form-control" id="recommended_action" name="recommended_action" value="<?php echo htmlspecialchars($organization['recommended_action']); ?>" required>
            </div>
            <button type="submit" id="updateorg" class="btn btn-primary">Update Organization</button>
            <a href="view-organization.php" id="cancel" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>