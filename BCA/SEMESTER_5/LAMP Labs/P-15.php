<!-- Write a Php program to add photos and display only 5 images per row. -->


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


<!-- display.php: -->

<html>
<head>
    
    <title>Dispay</title>
</head>
<body>
    <h1>Your Photos</h1>
    <form action="addphoto.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <input type="submit" name="submit" value="Add Photo">
        <table>
            <tr>
                <?php
                include("connection.php");
                $sql = mysqli_query($conn, "select * from photos");
                $count = 0;
                
                while ($row = mysqli_fetch_assoc($sql)) {
                    if($count == 5) {
                        echo "</tr>";
                        $count = 0;
                    }
                    if($count == 0) {
                        echo "<tr>";
                    }
                    echo "<td>";
                    $photo = $row["location"];
                    $id = $row["imageName"];
                    $d = $row["dateAdded"];
                    echo $photo . "</td>
                    <td>
                        <center>
                        <a href='$photo'>
                            <img src='$photo' width='50' height='50' alt='img'/>
                        </a>
                        </center>
                        <br>" . $id . "<br>" . $d . "<br> </td>";
                    $count++;
                }
                ?>
            </tr>
        </table>
    </form>
</body>
</html>


<!-- addphoto.php: -->
<?php
include("connection.php");
if(!isset($_FILES['image']['tmp_name'])){
    echo "";
} else {
    $file = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    echo "got the image details";
    if($error > 0) {
        die("Error uploading file");
    } else {
        if($size > 10000000) {
            die("Format is not allowed.");
        } else {
            move_uploaded_file($file, "uploads/" . $image_name);
            $location = "uploads/" . $_FILES['image']['name'];
            $sql = "insert into photos (location, imageName, dateAdded) values('$location','$image_name', NOW())";
            $update = mysqli_query($conn, $sql);
        }
        header('location: display.php');    
    }
}
?>