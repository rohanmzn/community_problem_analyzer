<?php
require 'admin_session.php';
// Connect to the database
include '../database/db.php';

$sql = "SELECT full_name, username, email, address, contact_no FROM users";
$result = $conn->query($sql);
?>
  <link rel="stylesheet" href="../css/view.css">
  <?php require 'admin_navbar.php' ?>
  <div class="content">
    <h2 style="text-align: center;">Users Information</h2><br />
    <table>
      <thead>
        <tr>
          <th>Full Name</th>
          <th>Username</th>
          <th>Email</th>
          <th>Address</th>
          <th>Contact No</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Check if there are results
        if ($result->num_rows > 0) {
          // Output each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
                      <td>" . htmlspecialchars($row["full_name"]) . "</td>
                      <td>" . htmlspecialchars($row["username"]) . "</td>
                      <td>" . htmlspecialchars($row["email"]) . "</td>
                      <td>" . htmlspecialchars($row["address"]) . "</td>
                      <td>" . htmlspecialchars($row["contact_no"]) . "</td>
                    </tr>";
          }
        } else {
          echo "<tr><td colspan='5' style='text-align: center;'>No data found</td></tr>";
        }
        // Close connection
        $conn->close();
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>