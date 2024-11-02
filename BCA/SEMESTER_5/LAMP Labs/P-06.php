<!-- Write a Php program to upload a file, and display the image
detail -->
<!-- enhanced code | Tested -->

<html>
<body>
    <form method="post" enctype="multipart/form-data">
        Upload Image: <input type="file" name="photo" required>
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php 
    if (isset($_POST["submit"])) {
        $photo = $_FILES["photo"];
        $path = "upload/" . $photo["name"];
        if (move_uploaded_file($photo["tmp_name"], $path)) {
            echo "<b>Image Name:</b> {$photo['name']}<br>
                  <b>Image Type:</b> {$photo['type']}<br>
                  <b>Image Size:</b> {$photo['size']} bytes<br>
                  <b>The Image:</b><br>
                  <img src='$path' height='200' width='300' class='the-img'><br>
                  Image uploaded successfully!";
        } else {
            echo "Error uploading image.";
        }
    }
    ?>
</body>
</html>
