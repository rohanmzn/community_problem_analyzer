<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizations List</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h1 class="mb-4">Organizations List</h1>

        <?php
        include "database/db.php"; // Include database connection

        if (isset($_GET['category'])) {
            $category = htmlspecialchars($_GET['category']); // Sanitize the input

            // Prepare and execute the query
            $query = "SELECT ol_id, category, organization_name, phone, address, link, recommended_action FROM organization_list WHERE category = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "s", $category);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table table-striped table-hover'>";
                echo "<thead class='table-dark'>
                        <tr>
                            <th>Sno:</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>Recommended Action</th>
                            <th>Website</th>
                        </tr>
                      </thead>";
                echo "<tbody>";

                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $i++ . "</td>";
                    echo "<td>" . htmlspecialchars($row['organization_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['address']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['recommended_action']) . "</td>";
                    $link = $row['link'];
                    if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
                        $link = "http://" . $link;
                    }
                    echo "<td><a href='" . htmlspecialchars($link) . "' target='_blank' class='btn btn-primary btn-sm'>Visit</a></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alert alert-warning'>No organizations found for the selected category.</div>";
            }
            echo "";

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            echo "<div class='alert alert-danger'>Category not specified.</div>";
        }
        ?>
        <button onclick="window.history.back();" class="btn btn-secondary mt-4">Go Back</button>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>