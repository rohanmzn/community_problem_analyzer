<?php
require 'admin_session.php';

include "../database/db.php";
?>
<?php
// Get the number of users
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$result_users = $conn->query($sql_users);
$row_users = $result_users->fetch_assoc();
$total_users = $row_users['total_users'];

// Get the number of reports
$sql_reports = "SELECT COUNT(*) AS total_reports FROM user_form";
$result_reports = $conn->query($sql_reports);
$row_reports = $result_reports->fetch_assoc();
$total_reports = $row_reports['total_reports'];

// Get the number of accessible organizations
$sql_organizations = "SELECT COUNT(*) AS total_organizations FROM organization_list";
$result_organizations = $conn->query($sql_organizations);
$row_organizations = $result_organizations->fetch_assoc();
$total_organizations = $row_organizations['total_organizations'];

// Get the frequency of api_category
$sql_category = "SELECT api_category, COUNT(*) AS category_count FROM user_form GROUP BY api_category";
$result_category = $conn->query($sql_category);

$categories = [];
$counts = [];

while ($row_category = $result_category->fetch_assoc()) {
  $categories[] = $row_category['api_category'];
  $counts[] = $row_category['category_count'];
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" />
  <link
    rel="stylesheet"
    href="{{ url_for('static', filename='bootstrap.min.css') }}" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    /* Reset body margin and set flexbox layout */
    body {
      display: flex;
      margin: 0;
      height: 100vh;
      background-color: #f8f9fa;
      overflow: hidden;
      /* Remove body-level scrolling */
    }

    /* Sidebar styling: fixed position */
    .sidebar {
      width: 250px;
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
      display: flex;
      flex-direction: column;
      position: fixed;
      /* Make the sidebar fixed */
      height: 100%;
      /* Ensure the sidebar takes full height */
    }

    /* Sidebar links and title */
    .sidebar a {
      color: #fff;
      text-decoration: none;
      padding: 10px 20px;
      display: block;
    }

    .sidebar a:hover {
      background-color: #495057;
    }

    .sidebar h2 {
      text-align: center;
      font-size: 1.5rem;
      margin-bottom: 20px;
    }

    /* Content area */
    .content {
      margin-left: 250px;
      /* Add margin to the left to account for the sidebar */
      padding: 20px;
      flex: 1;
      /* Make the content area flexible */
      height: 100vh;
      /* Full height for the content */
      overflow-y: auto;
      /* Only the content section scrolls */
    }

    /* Header and text in the content */
    .content h1 {
      margin-top: 40px;
      text-align: center;
    }

    .content p {
      text-align: center;
      font-size: large;
    }

    /* Dashboard box styling */
    .dashboard-box {
      text-align: center;
      padding: 30px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #fff;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .dashboard-box h1 {
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .dashboard-box p {
      font-size: 1.5rem;
    }

    /* Chart container */
    .chart-container {
      width: 70%;
      margin: 0 auto;
      padding: 10px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
<?php require 'admin_navbar.php' ?>

  <!-- Main Content -->
  <div class="content">
    <h1>Admin Dashboard</h1>
    <p>Welcome to the admin dashboard. Use the navigation bar to explore the features.</p>


    <!-- Chart containers -->
    <div class="chart-container">
      <canvas id="categoryChart"></canvas>
    </div>
    <div class="chart-container">
      <canvas id="organizationChart"></canvas>
    </div>
  </div>

  <script>
    // Prepare data for the first chart
    var categories = <?php echo json_encode($categories); ?>;
    var counts = <?php echo json_encode($counts); ?>;

    var ctx = document.getElementById('categoryChart').getContext('2d');
    var categoryChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: categories,
        datasets: [{
          label: 'Number of Reports by Category',
          data: counts,
          backgroundColor: '#808080',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              color: '#212529' // Darker text color for the y-axis labels
            }
          },
          x: {
            ticks: {
              color: '#212529' // Darker text color for the x-axis labels
            }
          }
        }
      }
    });

    // Prepare data for the second chart
    var organizationLabels = ['No. of Accessible Organizations', 'No. of Users', 'No. of Reports'];
    var organizationData = [
      <?php echo $total_organizations; ?>,
      <?php echo $total_users; ?>,
      <?php echo $total_reports; ?>
    ];

    var ctx2 = document.getElementById('organizationChart').getContext('2d');
    var organizationChart = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: organizationLabels,
        datasets: [{
          label: 'Statistics Overview',
          data: organizationData,
          backgroundColor: '#808080',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>

</body>

</html>