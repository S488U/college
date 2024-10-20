<!-- Write a Php script to display 3 records per page using the paging (Insert the
records manually in the database). -->


<!-- index.php: -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program 14</title>
</head>
<body>
    <table border=1>
        <tr>
            <td>S.No</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Deparment</td>
            <td>Section</td>
            <td>Percentage</td>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "mydb");
        $limit = 3;
        if(isset($_GET['page'])) {
            $offset = ($_GET['page'] -1) * $limit;
        } else {
            $offset = 0;
        }
        $res = mysqli_query($conn, "select count(id) from std_details");
        $row  = mysqli_fetch_array($res);
        $totalRow = $row[0];
        if($totalRow > $limit) {
            $nop = ceil($totalRow / $limit);
        } else {
            $nop = 0;
        }
        $res1 = mysqli_query($conn, "select * from std_details order by fname desc limit $limit offset $offset");
        $count = 1;
        while($row = mysqli_fetch_array($res1)) {
            echo "
            <tr>
                <td>" . $count . "</td>
                <td>" . $row['fname'] . "</td>
                <td>" . $row['lname'] . "</td>
                <td>" . $row['dept'] . "</td>
                <td>" . $row['class'] . "</td>
                <td>" . $row['percentage'] . "</td>
            </tr>
            ";
            $count++;
        }
        echo "</table><br><br><table border=1><tr>";
            for($i = 1; $i<=$nop; $i++) {
                echo "<td><a href='index.php?page=$i'>Page No: " . $i . "</a></td> ";
            }
            echo "</tr>";   
        ?>
    </table>
</body>
</html>