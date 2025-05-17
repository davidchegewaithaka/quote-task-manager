<?php
$host = "localhost";
$username = "root";
$password = ""; // Leave empty for XAMPP or Laragon default
$database = "task_manager";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
  die(json_encode([
    "success" => false,
    "message" => "Database connection failed: " . $conn->connect_error
  ]));
}
?>
