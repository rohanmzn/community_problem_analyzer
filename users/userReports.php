<?php
// include "../database/db.php";
// Assuming you have a connection to the database ($conn)
$username = $_SESSION['username'];
$query = "SELECT * FROM user_form where username='$username'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn)); // Outputs any SQL errors
}

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
    // Start the table and add headers
    echo "<table class='table table-striped'>";
    echo "<thead><tr>
            <th>SNo</th>
            <th>Category</th>
            <th>Urgency</th>
            <th>Your Issue</th>
            <th>Advice/Suggestions</th>
            <th style='width: 5%;'>Support</th>
            <th>Actions</th>
          </tr></thead>";
    echo "<tbody>";

    // Loop through the rows and display each report as a table row
    $i=1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $i++. "</td>";
        echo "<td>" . htmlspecialchars($row['api_category']) . "</td>";
        echo "<td style='color: " . ($row['uf_urgency'] == 'High' ? 'red' : 'green') . ";'>" . htmlspecialchars($row['uf_urgency']) . "</td>";
        echo "<td style='text-align: justify;'>" . htmlspecialchars($row['prompt']) . "</td>";
        echo "<td style='text-align: justify;'>" . htmlspecialchars($row['api_response']) . "</td>";
        echo "<td><a href='orgns.php?category=" . urlencode($row['api_category']) . "'>link</a></td>";
        $id=$row['uf_id'];
        echo "<td>
               <a href='users/delete.php?id=$id'> <button class='btn btn-danger btn-sm'>Delete</button></a>
              </td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No reports found.</p>";
}
?>
