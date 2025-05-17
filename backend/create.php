<?php
require_once "db.php";
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'] ?? '';
$description = $data['description'] ?? '';

if (!$title) {
    echo json_encode(["success" => false, "message" => "Title is required"]);
    exit;
}

$stmt = $conn->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $description);
$stmt->execute();

echo json_encode(["success" => true, "message" => "Task added"]);
?>
