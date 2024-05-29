<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $description, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        echo "Success";
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    $conn->close();
    header("Location: index.php");
    exit();
}
?>