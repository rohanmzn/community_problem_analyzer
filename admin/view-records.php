 <?php
 require 'admin_session.php';
 include "admin_navbar.php";
 include "../database/db.php";
?>
 <link rel="stylesheet" href="../css/view.css">
 <!-- Main Content -->
 <div class="content">
    <div id="past-records">
      <h1>Past Records:</h1>
      <?php

      $sql = "SELECT uf_urgency, prompt, api_category, api_response FROM user_form";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<div class="table-container">';
        echo "<table>";
        echo "<tr>
                    <th>S.No.</th>
                    <th>Urgency</th>
                    <th>Category</th>
                    <th>Message</th>
                    <th>Response</th>
                  </tr>";

        $serialNumber = 1;

        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                        <td>" . $serialNumber++ . "</td>
                        <td>" . htmlspecialchars($row['uf_urgency']) . "</td>
                        <td>" . htmlspecialchars($row['api_category']) . "</td>
                        <td>" . htmlspecialchars($row['prompt']) . "</td>
                        <td>" . htmlspecialchars($row['api_response']) . "</td>
                      </tr>";
        }
        echo "</table>";
        echo '</div>';
      } else {
        echo "<p>No records found.</p>";
      }

      $conn->close();
      ?>
    </div>
  </div>