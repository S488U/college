<!-- Write a Php script to display the employee details (Slno, Ename, Dept,
Salary) from database and use anchor tag to update each record in the table.
(Insert the records manually in the database). -->


<!-- connect.php: -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbaa";
// Create connection
try {
    $conn = mysqli_connect($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die("Some error occured");
}
?>

<!-- insert.php: -->
<html>

<head>
    <title>Inserting records</title>
</head>

<body>
    <a href="view.php">View Record(s)</a> <br><br>
    <?php include_once("connection.php"); ?>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td>ID</td>
                <td>
                    <input type="text" name="id" required>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="fname" required>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <input type="text" name="dept" required>
                </td>
            </tr>
            <tr>
                <td>Salary</td>
                <td>
                    <input type="text" name="sal" required>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="Insert" name="ins">
                </td>
            </tr>
            <?php
            if (isset($_POST["ins"])) {
                $id = $_POST["id"];
                $name = $_POST["fname"];
                $department = $_POST["dept"];
                $salary = $_POST["sal"];
                $sql = "insert into employee values('$id', '$name', '$department', '$salary')";
                $res = mysqli_query($con, $sql);
                if ($res) {
                    echo "Record inserted";
                } else {
                    echo "Record not inserted";
                }
            }
            ?>
        </table>
    </form>
</body>

</html>


<!-- view.php: -->
<html>

<body>
    <a href="insert.php">Insert record</a> <br><br>
    <form method="post" action="delete.php">
        <table border="1">
            <?php
            include("connection.php");
            $sql = "select * from employee";
            $res = mysqli_query($con, $sql);
            if ($res->num_rows == 0) {
                echo "No records in the table";
            } else {
                echo "<tr><td>SI. No.</td><td>";
                echo "Name</td><td>";
                echo "Department</td><td>";
                echo "Salary</td></tr>";
                while ($row = mysqli_fetch_assoc($res)) {
                    $id = $row["ID"];
                    echo "<tr><td>";
                    echo $id . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Dept'] . "</td>";
                    echo "<td>" . $row['Salary'] . "</td>";
                    echo "<td><a href='update.php?id=" . $row["ID"] . "'>Update</td></tr>";
                }
            }
            ?>
        </table>
    </form>
</body>

</html>



<!-- update.php: -->
<html>

<body>
    <?php
    include("connection.php");
    $id = $_REQUEST['id']; //this is received from view.php when we click delete
    $sql = "select * from employee where id=$id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
    ?>
    <a href="view.php">View Record(s)</a> <br><br>
    <a href="insert.php">Insert Record</a> <br><br>
    <form action=" " method="POST">
        <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['Name']; ?>">
        &nbsp;&nbsp;&nbsp;
        Age: <input type="text" name="dept" value="<?php echo $row['Dept']; ?>">
        &nbsp;&nbsp;&nbsp;
        Salary: <input type="text" name="sal" value="<?php echo $row["Salary"]; ?>">
        <input type="submit" name="submit" value="Update"> <br><br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $name = $_POST["name"];
        $dept = $_POST["dept"];
        $salary = $_POST["sal"];
        $delete = "update employee set Name = '$name', Dept = '$dept', Salary = '$salary' where ID = '$id'";
        $res = mysqli_query($con, $delete);
        if ($res)
            die("Record updated");
        else
            die("Record not updated");
    }
    ?>
</body>

</html>