<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <!--   -->
    <link rel="stylesheet" type="text/css" href="../css/login_as.css">
</head>
<body>
    <div class="form-container">
        <h2>Login</h2>
        <form id="loginForm" action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p id="message"></p>
        <p><a href="signup.html">Create an account</a></p>
    </div>
</body>
</html>
<?php
require "../database/db.php";

// Check connection
if ($conn->connect_error) {
    die(json_encode([
        "status" => "error",
        "msg" => "Database connection failed: " . $conn->connect_error,
    ]));
}

// Retrieve input from POST request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $inputUsername = trim($_POST["username"]);
    $inputPassword = trim($_POST["password"]);

    // Validate input
    if (empty($inputUsername) || empty($inputPassword)) {
        echo json_encode([
            "status" => "error",
            "msg" => "Username and password are required.",
        ]);
        exit();
    }

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $inputUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        // Verify password
        if (password_verify($inputPassword, $hashedPassword)) {
            // Success: Set session and return response
            $_SESSION["username"] = $inputUsername;
        
            // Redirect to index.php with f=s query parameter
            header("Location: ../index.php");
            exit();
        }
        
         else {
            echo '<script type="text/javascript">alert("Incorrect password. Please try again."); window.location.href = "login.php";</script>';
            exit();
        }
    } else {
        // Error: Username not found
        echo '<script type="text/javascript">alert("Username not found."); window.location.href = "login.php";</script>';
        exit();
    }

    $stmt->close();
}


$conn->close();
?>
