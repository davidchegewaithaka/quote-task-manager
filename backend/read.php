<?php
require_once "db.php";
header("Content-Type: application/json");

$result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");

$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

echo json_encode(["success" => true, "tasks" => $tasks]);
?>
