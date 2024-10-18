<?php
session_start();
if($_SESSION['username']) {
    echo "<h2>Welcome</h2>";
    echo "<h2>" . $_SESSION['username'] . "</h2>";
    echo "<br><a href='logout.php'>Logout</a>";
} else {
    echo "Please Login First";
}

?>
