<?php
// submit_feedback.php

// Ensure no whitespace or HTML is sent before JSON
ob_start(); 

header('Content-Type: application/json');

// 1. Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
    exit;
}

// 2. Connect DB
// BEST PRACTICE: Use a relative path or __DIR__ instead of hardcoded absolute paths
// Adjust "../assets/components/db.php" based on your actual file structure
$dbPath = __DIR__ . '/../assets/components/db.php'; 

if (file_exists($dbPath)) {
    include($dbPath);
} elseif (file_exists("../../components/db.php")) {
    include("../../components/db.php");
} else {
    echo json_encode(['status' => 'error', 'message' => 'Database file not found']);
    exit;
}

if (!isset($conn)) {
    echo json_encode(['status' => 'error', 'message' => 'Database connection failed']);
    exit;
}

// 3. Sanitize Inputs
$name = !empty($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : 'Anonymous';
$email = !empty($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)) : null;
$category = isset($_POST['category']) ? trim(htmlspecialchars($_POST['category'])) : 'general';
$rating = isset($_POST['rating']) ? (int)$_POST['rating'] : 0;
$message = isset($_POST['message']) ? trim(htmlspecialchars($_POST['message'])) : '';
$ip = $_SERVER['REMOTE_ADDR'];

// 4. Validation
if ($rating < 1 || $rating > 5) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid rating']);
    exit;
}
if (empty($message)) {
    echo json_encode(['status' => 'error', 'message' => 'Message cannot be empty']);
    exit;
}

// 5. Insert
$stmt = $conn->prepare("INSERT INTO feedback (name, email, category, rating, message, user_ip) VALUES (?, ?, ?, ?, ?, ?)");

if ($stmt) {
    // FIX HERE: Changed 'q' to 's'
    // s = name, s = email, s = category, i = rating, s = message, s = ip
    $stmt->bind_param("sssiss", $name, $email, $category, $rating, $message, $ip);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        // Log error server-side instead of sending to client for security
        error_log("DB Error: " . $stmt->error); 
        echo json_encode(['status' => 'error', 'message' => 'Database insert failed']);
    }
    $stmt->close();
} else {
    error_log("Prepare Error: " . $conn->error);
    echo json_encode(['status' => 'error', 'message' => 'Query preparation failed']);
}

$conn->close();
ob_end_flush();
?>