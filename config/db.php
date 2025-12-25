<?php
include '../vendor/autoload.php'; 

// Load Environment Variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// 1. Environment-based Error Handling
if (($_ENV['MODE'] ?? 'development') === "production") {
    ini_set('display_errors', 0);  
    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF); // Don't throw exceptions in production
} else {
    ini_set('display_errors', 1);  
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Help Sabbu debug!
}

ini_set('log_errors', 1);

// 2. Database credentials
$servername = $_ENV['DB_HOST'] ?: 'localhost';
$username   = $_ENV['DB_USER'] ?: 'root';
$password   = $_ENV['DB_PASS'] ?: '';
$dbname     = $_ENV['DB_NAME'] ?: 'plexaur';

// 3. Create connection
try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (mysqli_sql_exception $e) {
    error_log("Database connection failed: " . $e->getMessage());
    http_response_code(500);
    exit('Internal Server Error'); 
}

// Final Check (For older PHP versions compatibility)
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    http_response_code(500);
    exit('Internal Server Error'); 
}
?>