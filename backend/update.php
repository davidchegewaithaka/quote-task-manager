<?php
require_once "db.php";
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$id = $data['id'] ?? null;
$title = $data['title'] ?? '';
$description = $data['description'] ?? '';

if (!$id || !$title) {
    echo json_encode(["success" => false, "message" => "Missing required fields"]);
    exit;
}

$stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
$stmt->bind_param("ssi", $title, $description, $id);
$stmt->execute();

echo json_encode(["success" => true, "message" => "Task updated"]);
?>
