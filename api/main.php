<?php

// Include the PHP file that processes the prompt
include('processPrompt.php');

// Get the prompt (e.g., passed via form, URL, etc.)
$prompt = "My father beats me."; // Example prompt, modify as needed

// Get the response from processPrompt.php
$response = processPrompt($prompt);

// Send the JSON response back to the same file or user
header('Content-Type: application/json');
echo json_encode($response);

?>
