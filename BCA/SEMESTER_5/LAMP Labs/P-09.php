<!-- Write a Php script to create a database, create table and delete the database. -->

<html>
<head>
    <title>Program Nine</title>
</head>
<body>
    <form action="" method="post">
        <input type="submit" value="Create Database" name="createDB">
        <input type="submit" value="Create Table" name="createTB">
        <input type="submit" value="Delete Database" name="del">
    </form>
    <br><br>
    <?php 
    // If your server is localhost:3307 or some other port correct the localhost in mysqli() method
    $con = new mysqli("localhost", "root", "");
    echo ($con) ? "Connection Established<br>" : die("Connection failed: " . $con->connect_error);
    
    if (isset($_POST["createDB"])) {
        $sql = "CREATE DATABASE mydbaa";
        if ($con->query($sql) === TRUE) {
            echo "Database created successfully<br>";
        } else {
            die("Error creating database: " . $con->error);
        }
    }

    // Re-establish connection to the database before creating the table
    if (isset($_POST["createTB"])) {
        $con = new mysqli("localhost", "root", "", "mydbaa"); // Use a string for localhost
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }
        $sql = "CREATE TABLE details (Name VARCHAR(30) NOT NULL, Age VARCHAR(30) NOT NULL)";
        if ($con->query($sql) === TRUE) {
            echo "Table \"details\" created successfully<br>";
        } else {
            echo "Error creating table: " . $con->error . "<br>";
        }
    }

    if (isset($_POST["del"])) {
        $sql = "DROP DATABASE mydbaa";
        if ($con->query($sql) === TRUE) {
            echo "<br>Database is deleted<br>";
        } else {
            die("Error deleting database: " . $con->error);
        }
    }    
    ?>
</body>
</html>

<!--
 output:-
create Database | create Table | Delete Database

Connection Established
Database created successfully

Table "details" created successfully

Database is deleted

-->