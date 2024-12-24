<?php
include 'database/session.php';
if (empty($_SESSION['username'])) {
    // Redirect to login page if username is empty or not set
    header('Location: users/login.php');
    exit(); // Make sure no further code is executed
}
$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=" css/user.css">
    <title>User Issue Form</title>
</head>

<body>
    <main>
        <form class="form-container" action="#" method="post" >
            <h1>State Your Issue Here</h1>

            <label for="urgency">Urgency:</label>
            <select name="urgency" id="urgency" required onchange="toggleTollFree()">
                <option id="low" value="Low">Low</option>
                <option id="medium" value="Medium">Medium</option>
                <option id="high" value="High">High</option>
            </select>

            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10" required minlength="15"></textarea>

            <!-- Toll-free number displayed only when 'High' urgency is selected -->
            <div id="tollFree" style="display:none; color: green; margin-top: 10px;">
                <strong>For immediate assistance, <br>please call our toll-free number: 01-4280919</strong>
            </div>
            <br>
            <button type="submit">Submit</button><br>
            <button type="button" class="secondary-button" onclick="window.location.href='./';">Go Back</button>
        </form>

    </main>
</body>
<script>
    function toggleTollFree() {
        var urgency = document.getElementById("urgency").value;
        var tollFreeDiv = document.getElementById("tollFree");

        // Show the toll-free number if 'High' urgency is selected, otherwise hide it
        if (urgency === "High") {
            tollFreeDiv.style.display = "block";
        } else {
            tollFreeDiv.style.display = "none";
        }
    }
</script>

</html>
<?php

// Include the database connection file
include 'database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $urgency = htmlspecialchars($_POST['urgency']);
    $description = htmlspecialchars($_POST['description']);

    // Execute the Python script and capture the output
    $command = escapeshellcmd("python3 api.py " . escapeshellarg($description));
    $output = shell_exec($command);

    // Decode the JSON response
    $response = json_decode($output, true);

    // Default values for category and response
    $api_category = "unknown_not_listed";
    $api_response = "";

    // If the response from the Python script is valid, assign category and solution
    if ($response) {
        $api_category = $response['category'];
        $api_response = $response['solution'];
    }

    // Fetch the username from the session
    $username = isset($_SESSION["username"]) ? $_SESSION["username"] : '';
     // Use a fallback if username is not set

    if (!empty($urgency) && !empty($description)) {
        // Prepare the SQL query to insert data into the database
        $sql = "INSERT INTO user_form (uf_urgency, prompt, api_category, api_response, username) VALUES (?, ?, ?, ?, ?)";

        // Prepare the statement
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "sssss", $urgency, $description, $api_category, $api_response, $username);

            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                // Data inserted successfully
                $_SESSION['message'] = "Your issue has been submitted successfully! You can check it on reports.";
                header("Location: index.php?f=s");
                exit();
            } else {
                // Error inserting data
                $_SESSION['error'] = "There was an error submitting your issue. Please try again.";
                header("Location: index.php?f=e");  // Redirect to an error page
                exit();
            }

            // Close the prepared statement
            mysqli_stmt_close($stmt);
        } else {
            // Error preparing the statement
            $_SESSION['error'] = "There was an error preparing the query.";
            header("Location: error.php");  // Redirect to a custom error page
            exit();
        }
    } else {
        // If required fields are missing
        $_SESSION['error'] = "Please fill out all required fields.";
        header("Location: error.php");  // Redirect back to the form with an error message
        exit();
    }
}
?>
