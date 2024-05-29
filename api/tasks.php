<?php
include '../db_connect.php';

// Set the content type to JSON
header('Content-Type: application/json');

// Fetch tasks from the database
$result = $conn->query("SELECT * FROM tasks");

// Initialize an empty array to store tasks
$tasks = array();

// Loop through the result set and add each task to the tasks array
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

// Close the database connection
$conn->close();

// Encode the tasks array as JSON and echo it
echo json_encode($tasks);
?>
