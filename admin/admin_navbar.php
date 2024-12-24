<?php
require 'admin_session.php';
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

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--Google fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Caveat:wght@400..700&family=Croissant+One&family=Kaushan+Script&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merienda:wght@300..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Satisfy&family=VT323&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../css/admin_navbar.css">
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="admin_dashboard.php">Dashboard</a>
    <a href="addform.php">Add Organization</a>
    <a href="view-organization.php">View Organization</a>
    <a href="view-user.php">View Users</a>
    <a href="view-records.php">View Records</a>
    <!-- <a href="view-response.html">View Response</a> -->
    <a class="dropdown-item" href="../logout.php" style="text-align: left">
      Logout&nbsp;&nbsp;<i class="bi bi-box-arrow-left"></i>
    </a>

  </div>