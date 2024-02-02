<?php
if ($_SERVER['REQUEST_URI'] === '/agree') {
    // Get user's IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Get current timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Database connection details (replace with your actual database credentials)
    $db_host = 'localhost';
    $db_user = 'shahabas_sabbu';
    $db_password = 'Sabbu00@duploader.tech';
    $db_name = 'db_duploader';

    // Create a database connection
    $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert IP address and timestamp into the database
    $sql = "INSERT INTO ip_addresses (ip_address, timestamp) VALUES ('$userIP', '$timestamp')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>window.history.back();</script>';
    } else {
        echo '<script>console.log("Error: ' . $sql . '<br>' . $conn->error . '")</script>';
    }

    // Close the database connection
    $conn->close();
} else {
    echo '<script>console.log("Invalid Requests")</script>';
}
