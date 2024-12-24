<?php
// Connect to the database
include "../database/db.php";
require 'admin_session.php';
require 'admin_navbar.php';
// Fetch distinct categories from the database
// $categoryQuery = "SELECT DISTINCT category FROM organization_list";
// $categoryResult = $conn->query($categoryQuery);

// // Check for query errors
// if (!$categoryResult) {
//     die("Error fetching categories: " . $conn->error);
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Organization</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Add New Organization</h2>
        <form action="addOrganization.php" method="POST">
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                    <option id="unknown_not_listed" value="unknown_not_listed" >Others</option>
                    <option id="domestic_violence" value="domestic_violence" selected>Domestic Violence</option>
                    <option id="animal_abuse" value="animal_abuse">Animal Abuse</option>
                    <option id="child_abuse" value="child_abuse">Child Abuse</option>
                    <option id="sexual_harassment" value="sexual_harassment">Sexual Harassment</option>
                    <option id="physical_verbal_abuse" value="physical_verbal_abuse">Physical/Verbal Abuse</option>
                    <option id="da" value="digital_abuse">Digital Abuse</option>
                    <option id="digital_abuse" value="addiction">Addiction</option>
                    <option id="mental_health_stigma" value="mental_health_stigma">Mental Health Stigma</option>
                    <?php
                    // Populate dropdown with categories
                    // while ($row = $categoryResult->fetch_assoc()) {
                    //     echo "<option value='" . htmlspecialchars($row['category']) . "'>" . htmlspecialchars($row['category']) . "</option>";
                    // }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="organization_name">Organization Name</label>
                <input type="text" class="form-control" id="organization_name" name="organization_name" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="url" class="form-control" id="link" name="link">
            </div>
            <div class="form-group">
                <label for="recommended_action">Recommended Action</label>
                <input type="text" class="form-control" id="recommended_action" name="recommended_action">
            </div>
            <button type="submit" class="btn btn-primary">Add Organization</button>
            <a href="addform.php" id="cancel" class="btn btn-secondary">Clear</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
