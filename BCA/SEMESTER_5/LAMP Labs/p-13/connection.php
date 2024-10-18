<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "mydb";

$conn = new mysqli($server, $username, $password, $database);

if($conn) {
    echo "<script>console.log('Connection Successfull');</script>";
} else {
    echo "<script>console.log('Connection Failed');</script>";
}