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
    <?php $servername = "localhost"; //if your port no. is not 3306, then you need to manually type the port number here..  
    $username = "root";
    $pwd = "";
    $con = new mysqli($servername, $username, $pwd);
    if ($con) {
        echo "Connection Established<br>";
    } else {
        die("Connection failed: " . $con->connect_error);
    }
    if (isset($_POST["createDB"])) {
        $sql = "create database mydbaa";
        if ($con->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            die("Error creating database: " . $con->error);
        }
    }
    if (isset($_POST["createTB"])) {
        $con = new mysqli($servername, $username, $pwd, "mydbaa");
        $sql = "create table details(Name varchar(30) not null, Age varchar(30) not null)";
        if ($con->query($sql) === TRUE) {
            echo "Table \"details\" created successfully";
        } else {
            echo "Error creating table: " . $con->error;
        }
    }
    if (isset($_POST["del"])) {
        $sql = "drop database mydbaa";
        $res = $con->query($sql);
        if ($res) {                // echo var_dump($res);      
            echo "<br>Database is deleted";
        } else {
            die("Some exception occurred");
        }
    }    ?>
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