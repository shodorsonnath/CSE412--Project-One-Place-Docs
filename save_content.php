<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "User not authenticated."]);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // Database connection
    $conn = new mysqli('localhost', 'your_database_username', 'your_database_password', 'your_database_name');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert content into the database
    $stmt = $conn->prepare("INSERT INTO user_content (user_id, content) VALUES (?, ?)");
    $stmt->bind_param("is", $user_id, $content);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Content saved successfully."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to save content."]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
?>
