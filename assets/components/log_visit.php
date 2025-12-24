<?php
// assets/components/log_visit.php

// 1. Security: Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    exit('Method Not Allowed');
}

// 2. Database Connection
// Adjust path to reach your root 'components/db.php'
$dbPath = __DIR__ . "/../../../components/db.php"; 

if (file_exists($dbPath)) {
    include($dbPath);
} else {
    // Fallback or error logging
    http_response_code(500);
    exit('DB Config Missing');
}

if (isset($conn) && $conn) {
    $userIP = $_SERVER['REMOTE_ADDR'];
    $timestamp = date("Y-m-d H:i:s");
    // We get the page title from the POST data sent by JS
    $pageTitle = isset($_POST['page_title']) ? substr(htmlspecialchars($_POST['page_title']), 0, 255) : 'Unknown Page';

    $stmt = $conn->prepare("INSERT INTO ip_addresses (ip_address, timestamp, page_title) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $userIP, $timestamp, $pageTitle);
        $stmt->execute();
        $stmt->close();
    }
    $conn->close();
    
    // Return JSON success
    header('Content-Type: application/json');
    echo json_encode(['status' => 'success']);
}
?>