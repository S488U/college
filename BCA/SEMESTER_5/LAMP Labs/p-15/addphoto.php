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