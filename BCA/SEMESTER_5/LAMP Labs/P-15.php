<!-- Write a Php program to add photos and display only 5 images per row. -->


<!-- connect.php: -->
<?php
try {
    $con = mysqli_connect("localhost:3307//", "root", "", "mydbaa");
} catch (Exception $E) {
    echo "<script>alert('Some error occured. Try again later');</script>";
}
?>


<!-- display.php: -->
<html>

<head>
    <!-- The below lines are for font, so they are optional -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: "Roboto Mono";
        }
    </style>
</head>

<body>
    <h1>~ YOUR PHOTOS ~</h1>
    <form action="addphoto.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" required>
        <input type="submit" value="Add Photo" name="sub">
        <br><br>
        <table>
            <tr>
                <?php
                include("connect.php");
                $query = mysqli_query($con, "select * from photos");
                $count = 0;
                while ($row = mysqli_fetch_assoc($query)) {
                    if ($count == 5) {
                        echo "</tr>";
                        $count = 0;
                    }
                    if ($count == 0)
                        echo "<tr>";
                    echo "<td>";
                    $photo = $row["Location"];
                    $id = $row["ImageName"];
                    $d = $row["DateAdded"];
                    echo $photo;
                    echo "<td><center>";
                    echo "<a href='$photo'><img src='$photo' width='110' height='60' alt='image1'></a><br>";
                    echo $id . "<br>";
                    echo $d . "<hr>";
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
include("connect.php");
if (!isset($_FILES["image"]["tmp_name"])) {
    echo "";
} else {
    $file = $_FILES["image"]["tmp_name"];
    $image_name = $_FILES["image"]["name"];
    $size = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];
    if ($error > 0) {
        die("Error uploading files");
    } else {
        if ($size > 10000000) {
            die("Fromat is not allowed");
        } else {
            move_uploaded_file($file, "upload/" . $image_name);
            $location = "upload/" . $_FILES["image"]["name"];
            $update = mysqli_query($con, "insert into photos values('$location', '$image_name', NOW());");
        }
        header("location:display.php");
    }
}
?>