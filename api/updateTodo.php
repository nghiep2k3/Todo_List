<?php
// api/updateTodo.php
require_once '../config/config.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && isset($data->completed)) {
    $id = $data->id;
    $completed = $data->completed;

    // Cập nhật trạng thái todo
    $query = "UPDATE todos SET completed = ? WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("ii", $completed, $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Todo updated successfully."]);
    } else {
        echo json_encode(["message" => "Todo update failed."]);
    }
} else {
    echo json_encode(["message" => "Invalid input."]);
}
?>
