<!-- Write a Php script to login using session variable and destroy the session
variable. (Insert the records manually in the database). -->

<!-- connect.php: -->
<?php
try {
    $con = mysqli_connect("localhost", "root", "", "mydbaa");
} catch (Exception $E) {
    echo "<script>alert('Some error occured. Try again later');</script>"; //calling JS alert function from PHP
}
?>


<!-- login.php: -->
<html>

<head></head>

<body>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td colspan="2" style="text-align: center;">LOGIN</td> <!-- skip style part if you want -->
            </tr>
            <tr>
                <td>Username</td>
                <td>
                    <input type="text" name="name" required>
                </td>
            </tr>
            <tr>
                <td>Password</td>
                <td>
                    <input type="password" name="pass" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Submit" name="sub">
                </td>
            </tr>
        </table>
    </form>
    <?php
    session_start();
    include("connect.php");
    if (isset($_POST["sub"])) {
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        $res = mysqli_query($con, "select * from login_table where Username='$name' and Password='$pass'");
        $row = mysqli_fetch_assoc($res);
        if ($row != null && $row != 0) {
            $_SESSION['id'] = $row['Id'];
            $_SESSION["Uname"] = $name;
        } else {
            echo "<script>alert('Invalid user');</script>";
        }
        if (isset($_SESSION['id'])) {
            header("location:index.php");
        }
    }
    ?>
</body>

</html>


<!-- index.php: -->
<?php
session_start();
if ($_SESSION["Uname"]) {
?>
    Welcome
    <?php
    echo ", " . $_SESSION["Uname"] . ".<br><br>";
    ?>
    Click here to <a href="logout.php">Logout</a>
<?php
} else
    echo "Please log in first";
?>

<!-- logout.php: -->
<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["Uname"]);
unset($_SESSION["Pass"]);
header("location:login.php");
?>