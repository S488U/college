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