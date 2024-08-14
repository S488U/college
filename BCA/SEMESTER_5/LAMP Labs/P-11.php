<!-- Write a Php script to display user details in table format, use anchor tag to
delete each record in the table and create a delete button to delete the table
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

<body>
    <a href="delete.php">Delete Table</a> <br><br>
    <?php
    include_once("connect.php");
    ?>
    <form action="" method="POST">
        <table border="1">
            <tr>
                <td>ID</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>Name </td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><input type="submit" name="insert" value="insert"></td>
            </tr>
            <?php
            if (isset($_POST['insert'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $age = $_POST['age'];
                $sql = "insert into details values('$id', '$name','$age')";
                $res = mysqli_query($conn, $sql);
                if ($res)
                    echo "Value is inserted";
                else
                    echo "Value is not inserted";
            }
            ?>
        </table>
    </form>
    <a href="view.php">View Record</a>
</body>

</html>


<!-- view.php: -->
<html>

<body>
    <a href="insert.php">Insert New Record</a> <br><br>
    <table border="1">
        <?php
        include("connect.php");
        echo "<tr><td>";
        echo "ID";
        echo "</td><td>";
        echo "NAME";
        echo "</td><td>";
        echo "AGE";
        echo "</td></tr>";
        $sql = "SELECT * FROM details ORDER BY name desc";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>";
                echo $row["id"];
                echo "</td><td>";
                echo $row['name'];
                echo "</td><td>";
                echo $row['age'];
                echo "</td><td>";
                echo "<a href='deleterow.php?id=" . $row["id"] . "'>Delete</a>";
                echo "</td></tr>";
            }
        }
        ?>
    </table>
</body>

</html>

<!-- deleterow.php: -->
<html>

<body>
    <?php
    include("connect.php");
    $id = $_REQUEST['id']; //this is received from view.php when we click delete
    $sql = "select * from details where id=$id";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
    ?>
    <a href="view.php">View Record(s)</a> <br><br>
    <form action=" " method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>">
        &nbsp;&nbsp;&nbsp;
        Age: <input type="text" name="age" value="<?php echo $row['age']; ?>">
        <input type="submit" name="submit" value="delete"> <br><br>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $delete = "delete from details where id=$id";
        $res1 = mysqli_query($conn, $delete);
        if ($res1)
            echo "Row deleted";
        else
            echo "No Rows deleted";
    }
    ?>
</body>

</html>

<!-- delete.php: -->
<?php
require_once 'connect.php';
mysqli_query($conn, "DELETE FROM details") or die(mysqli_error());
echo "All the records of the table are deleted";
?>