<div id="toast" class="container border border-warning bg-white z-3 p-3 rounded position-fixed" style="display:none; width: 300px; bottom: 20px; right: 20px;">
    <p>By entering you are agreeing with our terms and conditions. Please read this <a href="../../pages/about.php">Warning</a>.</p>
    <div class="fluid-container d-flex justify-content-center gap-1">
        <button id="close" class="btn btn-dark flex-fill" type="button">Close</button>
        <button id="agree" class="btn btn-dark flex-fill" type="button">Agree</button>
    </div>
</div>

<?php
if ($_SERVER['REQUEST_URI'] === '/agree') {
    // Get user's IP address
    $userIP = $_SERVER['REMOTE_ADDR'];

    // Get current timestamp
    $timestamp = date("Y-m-d H:i:s");

    // Get the page title from the HTTP headers
    $pageTitle = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER['HTTP_REFERER']) : 'Unknown Page';
    include("../../dbconnection/connection.php");

    // Insert IP address, timestamp, and title into the database
    $sql = "INSERT INTO ip_addresses (ip_address, timestamp, page_title) VALUES ('$userIP', '$timestamp', '$pageTitle')";

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
?>