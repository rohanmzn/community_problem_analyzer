<?php
require 'admin_session.php';
// include "admin_navbar.php";
include "../database/db.php";

$sql = "SELECT category, organization_name, phone, address, link, recommended_action FROM organization_list";
$result = $conn->query($sql);

// Check if query was successful
if (!$result) {
    die("Error in query: " . $conn->error);
}
?>
<link rel="stylesheet" href="../css/view-orgn.css">
<?php include "admin_navbar.php"; ?>
<div class="content">
    <h1 class="text-center my-4">Organizations List</h1>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Organization Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Link</th>
                    <th>Recommendation Actions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Initialize ID counter
                $idCounter = 1;

                // Check if there are rows to display
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $phone = $row["phone"]; // Store phone number for the link
                        echo "<tr>";
                        echo "<td>" . $idCounter++ . "</td>";
                        echo "<td>" . $row["category"] . "</td>";
                        echo "<td>" . $row["organization_name"] . "</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td><a href='" . $row["link"] . "' target='_blank'> link </a></td>";
                        echo "<td>" . $row["recommended_action"] . "</td>";
                        echo "<td class='action-buttons'>

                        <a href='editform.php?phone=$phone'>
                            <button class='action-btn edit-btn'>Edit</button>
                        </a>
                        <a href='delete.php?phone=$phone'>
                            <button class='action-btn delete-btn'>Delete</button>
                        </a> 
                        </td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>