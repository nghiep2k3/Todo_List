<?php
// api/createTodo.php
require_once '../config/config.php';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

if (isset($data->title)) {
    $title = $data->title;

    // Insert todo into database
    $query = "INSERT INTO todos (title, completed) VALUES (?, ?)";
    $stmt = $db->prepare($query);
    $completed = 0; // Chỉ định là chưa hoàn thành
    $stmt->bind_param("si", $title, $completed);

    if ($stmt->execute()) {
        echo json_encode(["message" => "Todo created successfully."]);
    } else {
        echo json_encode(["message" => "Todo creation failed."]);
    }
} else {
    echo json_encode(["message" => "Invalid input."]);
}
?>
