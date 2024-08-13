<!-- Write a Php program to upload a file, and display the image
detail -->

<html>
   <head>
      <title>Program Six</title>
   </head>
   <body>
      <form action="" method="post" enctype="multipart/form-data">
         Upload Image:
         <input type="file" name="photo"><br><br>
         <input type="submit" value="Submit" name="submit"><br><br>
         <?php if (isset($_POST["submit"])) {
             $photo = $_FILES["photo"]["name"];
             $path = "upload/" . $photo;
             if (move_uploaded_file($_FILES["photo"]["tmp_name"], $path)) {
                 echo "<b>Image Name:</b><br>" . $_FILES["photo"]["name"];
                 echo "<br><br><b>Image type:</b><br>" .
                     $_FILES["photo"]["type"];
                 echo "<br><br><b>Image size:</b><br>" .
                     $_FILES["photo"]["size"];
                 echo "<br><br><b>The image:</b><br>";
                 echo "<img src='$path' height=200 width=300 class='the-img'>";
                 echo "<br><br>Image uploaded successfully!!";
             } else {
                 echo "error";
             }
         } ?>
      </form>
   </body>
</html>
