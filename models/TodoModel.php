<?php
// models/TodoModel.php
include_once '../config/config.php';

// Lấy tất cả các todo
function getTodos() {
    global $connection;
    $query = "SELECT * FROM todos";
    $result = mysqli_query($connection, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Tạo một todo mới
function createTodo($title) {
    global $connection;
    $query = "INSERT INTO todos (title, completed) VALUES (?, 0)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $title);
    return mysqli_stmt_execute($stmt);
}

// Cập nhật todo
function updateTodo($id, $title, $completed) {
    global $connection;
    $query = "UPDATE todos SET title = ?, completed = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "sii", $title, $completed, $id);
    return mysqli_stmt_execute($stmt);
}

// Xóa todo
function deleteTodo($id) {
    global $connection;
    $query = "DELETE FROM todos WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    return mysqli_stmt_execute($stmt);
}
?>
