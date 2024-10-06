<?php
$servername = "localhost:3306";
$username = "AdShahabas";
$password = "Shahabas@12";
$dbname = "db_dunite";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");
$conn->query("SET SESSION sql_mode = 'STRICT_ALL_TABLES,NO_ENGINE_SUBSTITUTION'");

error_reporting(0);
ini_set('display_errors', 0);
?>
