<head>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php include "database/db.php"; ?>
<!--/ Nav Star /-->
<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
        <img src="img/logo.png" width="80" height="50" alt="">
        <a class="navbar-brand js-scroll" href="#page-top">&nbsp;Civic Chain</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link js-scroll active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#category">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#institutions">Institutions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#reportsModal">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll" href="#" onclick="confirmLogout()">Logout</a>
                </li>

                <script>
                    function confirmLogout() {
                        // Show a confirmation alert
                        if (confirm("Are you sure you want to log out?")) {
                            // If user confirms, redirect to logout.php
                            window.location.href = 'logout.php';
                        }
                    }
                </script>

            </ul>
        </div>
    </div>
</nav>
<!--/ Nav End /-->
<div class="modal fade" id="reportsModal" tabindex="-1" aria-labelledby="reportsModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 70%; width: 70%;"> <!-- Modal width set to 70% -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportsModalLabel">Reports</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="max-height: 70vh; overflow-y: auto;"> <!-- Make content scrollable -->
                    <?php include "users/userReports.php"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>



<!--/ Nav Star /-->
<!-- Bootstrap JS and Popper.js (make sure this is correct) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>