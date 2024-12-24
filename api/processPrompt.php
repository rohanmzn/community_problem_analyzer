<?php

function processPrompt($prompt) {
    // Google Gemini API Configuration
    $API_KEY = "AIzaSyDLnLDtWEeF_d7XxocihI0schvazTPm358";
    $API_URL = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent";

    // Predefined categories
    $CATEGORIES = [
        "domestic_violence",
        "animal_abuse",
        "child_abuse",
        "sexual_harassment",
        "physical_verbal_abuse",
        "digital_abuse",
        "addiction",
        "mental_health_stigma",
        "unknown_not_listed"
    ];

    // Request headers
    $headers = [
        "Content-Type: application/json"
    ];

    // Prompt for the Gemini API
    $instructions = "Classify the following prompt into one of these categories(give same casing and underscore dont change it. I wanna use it as primary key in database): " . implode(", ", $CATEGORIES) . ". ";
    $instructions .= "Provide the category name followed by the solution, separated by a colon (e.g., 'Domestic Violence: Seek help ...').\n";
    $prompt = $instructions . $prompt;

    // Request payload
    $payload = json_encode([
        "contents" => [
            [
                "parts" => [
                    ["text" => $prompt]
                ]
            ]
        ]
    ]);

    // Initialize cURL
    $ch = curl_init();
    if (!$ch) {
        return ['error' => 'Failed to initialize cURL.'];
    }

    curl_setopt($ch, CURLOPT_URL, $API_URL . "?key=" . $API_KEY);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

    // Enable verbose output for debugging
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $verbose = fopen('php://temp', 'w+');
    curl_setopt($ch, CURLOPT_STDERR, $verbose);

    // Make the POST request
    $response = curl_exec($ch);

    if ($response === false) {
        $error_message = curl_error($ch); // Get the actual error message
        fclose($verbose);
        return [
            'error' => 'Error calling API: ' . $error_message
        ];
    }

    // Check verbose output for debugging cURL
    rewind($verbose);
    $verbose_log = stream_get_contents($verbose);
    fclose($verbose);

    // Log the verbose output for further analysis
    if (!empty($verbose_log)) {
        file_put_contents("curl_debug.log", $verbose_log, FILE_APPEND);
    }

    curl_close($ch);

    // Parse the JSON response
    $result = json_decode($response, true);

    // Check if the API response is valid
    if (isset($result['candidates'][0]['content']['parts'][0]['text'])) {
        $text_response = $result['candidates'][0]['content']['parts'][0]['text'];
    } else {
        return [
            'error' => 'Invalid API response or no valid candidates returned.'
        ];
    }

    // Split the response into category and solution
    if (strpos($text_response, ":") !== false) {
        list($category, $solution) = array_map('trim', explode(":", $text_response, 2));
    } else {
        $category = "unknown";
        $solution = "Solution not provided.";
    }

    // Prepare the output data
    return [
        "prompt" => $prompt,
        "category" => $category,
        "solution" => $solution
    ];
}

?>
