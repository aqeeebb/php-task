<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and bind
    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Close statement
    $stmt->close();
}

// Redirect to index page
header("Location: index.php");
exit();
?>