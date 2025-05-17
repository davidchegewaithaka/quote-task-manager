<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

// Fetch random quote from ZenQuotes
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://zenquotes.io/api/random");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Decode and structure response
$data = json_decode($response, true);

echo json_encode([
  "text" => $data[0]['q'],
  "author" => $data[0]['a']
]);
