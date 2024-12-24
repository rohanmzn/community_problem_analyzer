<?php
$description = "My sir gives me lots of homework then make me take shirt off if i didn't completed it";  // Example hardcoded description

// Call the Python script and pass the description as an argument
$command = escapeshellcmd("python3 api.py " . escapeshellarg($description));

// Capture the output of the Python script
$output = shell_exec($command);

// Output the raw response for debugging
// echo "<pre>$output</pre>";

// Optionally decode the JSON output from Python
$response = json_decode($output, true);

// Display the response from Python
if ($response) {
    echo "Prompt: ". $description . '<br>';
    echo "Category: " . $response['category'] . "<br>";
    echo "Solution: " . $response['solution'] . "<br>";
} else {
    echo "No valid response received from Python script.<br>";
}
?>
