<!-- Write a Php script to display 3 records per page using the paging (Insert the
records manually in the database). -->


<!-- index.php: -->
<html>

<head>
    <title>Program Fourteen</title>
    <style>
        table {
            border: 5px solid #000;
            /* border-radius: 5px; */
        }

        td {
            padding: 5px;
            border: none;
            /* border: 5px solid #000; */
            /* border-radius: 5px; */
        }
    </style>
</head>

<body>
    <table border="1">
        <tr>
            <td>Sl. No.</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Department</td>
            <td>Section</td>
            <td>Percentage</td>
            <?php
            $con = mysqli_connect("localhost:3390//", "root", "", "mydbaa");
            $limit = 3;
            if (isset($_GET["page"])) { // can also use $_REQUEST
                $offset = ($_GET["page"] - 1) * $limit;
            } else {
                $offset = 0;
            }
            $sql = "select count(Id) from std_details";
            $res = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($res);
            $totalrow = $row[0]; //to get the total no. of records
            if ($totalrow > $limit) {
                $nop = ceil($totalrow / $limit);
            } else {
                $nop = 0;
            }
            $res1 = mysqli_query($con, "select * from std_details order by Fname desc limit $limit offset $offset");
            $count = 1;
            while ($row = mysqli_fetch_assoc($res1)) {
                echo "<tr><td>" . $count;
                echo "</td><td>" . $row["Fname"];
                echo "</td><td>" . $row["Lname"];
                echo "</td><td>" . $row["Dept"];
                echo "</td><td>" . $row["Class"];
                echo "</td><td>" . $row["Percentage"];
                echo "</td></tr>";
                $count++;
            }
            echo "</table>";
            echo "<br><br>";
            for ($i = 1; $i <= $nop; $i++) {
                echo "<td><a href='index.php?page=$i'>" . $i . "</a>&nbsp;";
            }
            ?>
        </tr>
    </table>
</body>

</html>