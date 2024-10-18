<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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