<?php
// Masked Mobile Lookup API
header('Content-Type: application/json');

// Get input and validate
$mobile = isset($_GET['mobile']) ? preg_replace('/\D/', '', $_GET['mobile']) : '';
$key = isset($_GET['key']) ? $_GET['key'] : '';

if (!$mobile  !$key  $key !== 'ishu@ssf') {
    http_response_code(400);
    echo json_encode(['status' => 'error', 'message' => 'Invalid parameters']);
    exit;
}

// Original API (hidden)
$original_api = "https://gauravapi.gauravyt492.workers.dev/?mobile=$mobile";

// Fetch original API
$ch = curl_init($original_api);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// Return response
http_response_code($code);
echo $response;
?>