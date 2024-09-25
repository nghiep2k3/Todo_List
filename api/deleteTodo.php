<?php
// api/removeTodo.php
require_once '../config/config.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id)) {
    $id = $data->id;

    // Xóa todo khỏi cơ sở dữ liệu
    $query = "DELETE FROM todos WHERE id = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Todo removed successfully."]);
    } else {
        echo json_encode(["message" => "Todo removal failed."]);
    }
} else {
    echo json_encode(["message" => "Invalid input."]);
}
?>
