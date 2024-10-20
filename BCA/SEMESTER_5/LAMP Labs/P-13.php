<!-- Write a Php script to login using session variable and destroy the session
variable. (Insert the records manually in the database). -->

<!-- connection.php: -->
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
?>


<!-- login.php: -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <h2>Login Page</h2>   
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <?php
    session_start();
    include("connection.php");
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "select * from users where username = '$username' and password = '$password'");
        $row = mysqli_fetch_assoc($result);
        if($row != null && $row != 0) {
            $_SESSION["id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
        } else{
            echo "<script>alert('Invalid User');</script>";
        }

        if(isset($_SESSION['id'])){
            header("location:index.php");
        }
    }
    ?>
</body>
</html>

<!-- index.php: -->
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


<!-- logout.php: -->
<?php
session_start();

session_destroy();
header("location: login.php");

?>