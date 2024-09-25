<?php
// api/getTodos.php
require_once '../config/config.php';

$database = new Database();
$db = $database->getConnection();

$query = "SELECT id, title, completed FROM todos";
$stmt = $db->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

$todos = [];
while ($row = $result->fetch_assoc()) {
    $todos[] = $row;
}

echo json_encode($todos);
?>
