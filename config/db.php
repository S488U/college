<?php

// load composer
$autoload = dirname(__DIR__) . '/vendor/autoload.php';
if (file_exists($autoload)) {
    require $autoload;
}

if (class_exists('Dotenv\Dotenv')) {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->safeLoad();
}

// check for environment mode 
$mode = $_ENV['MODE'] ?? 'development';

if ($mode === "production") {
    ini_set('display_errors', 0);
    error_reporting(0);
    mysqli_report(MYSQLI_REPORT_OFF);
} else {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
}

ini_set('log_errors', 1);

// db config
$db_host = $_ENV['DB_HOST'] ?? 'central_db';
$db_user = $_ENV['DB_USER'] ?? 'plexaur';
$db_pass = $_ENV['DB_PASS'] ?? 'plexaurpass';
$db_name = $_ENV['DB_NAME'] ?? 'plexaur';
$db_port = $_ENV['DB_PORT'] ?? 3306;	

if (strpos($db_host, ':') !== false) {
    [$db_host, $db_port] = explode(':', $db_host);
}

if ($db_host === 'localhost') {
    $db_host = '127.0.0.1';
}

try {

    $conn = new mysqli(
        $db_host,
        $db_user,
        $db_pass,
        $db_name,
        (int)$db_port
    );

    $conn->set_charset("utf8mb4");

} catch (mysqli_sql_exception $e) {

    error_log("DB Connection failed: " . $e->getMessage());

    if ($mode !== "production") {
        exit("Database connection failed: " . $e->getMessage());
    }

    http_response_code(500);
    exit("Internal Server Error");
}

if ($conn->connect_error) {

    error_log("DB Connection failed: " . $conn->connect_error);

    if ($mode !== "production") {
        exit("Database connection failed: " . $conn->connect_error);
    }

    http_response_code(500);
    exit("Internal Server Error");
}

