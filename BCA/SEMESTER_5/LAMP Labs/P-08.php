<!-- Write a Php script to insert and display values from different input fields. -->

<html>

<head>
    <title>Program 8</title>
    <style>
        /* optional css */
        table {
            border: 4px solid black;
            padding: 10px;
            width: 350px;
        }

        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td> <textarea name="addr" cols="30" rows="10" required></textarea> </td>
            </tr>
            <tr>
                <td>DOB</td>
                <td><input type="date" name="dob" required></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td> <input type="radio" name="gen" value="Male">Male <input type="radio" name="gen" value="Male">Female </td>
            </tr>
            <tr>
                <td>Hobbies</td>
                <td> <select name="hob[]" multiple="multiple" size="4" required>
                        <option value="Coding">Coding</option>
                        <option value="Drawing">Drawing</option>
                        <option value="Travelling">Travelling</option>
                        <option value="Gaming">Gaming</option>
                    </select> </td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit" name="submit"></td>
                <td> <input type="reset" value="Reset"> </td>
            </tr>
        </table>
    </form> <br><br>
    <h3><u>After Submitting:</u></h3>
    <table border="1">
        <?php if (isset($_POST["submit"])) {
            $name = $_POST["name"];
            $addr = $_POST["addr"];
            $dob = $_POST["dob"];
            $gen = $_POST["gen"];
            $hobbies = $_POST["hob"];
            echo "<tr><td>Name:</td><td>$name</td></tr>";
            echo "<tr><td>Address:</td><td>$addr</td></tr>";
            echo "<tr><td>DOB:</td><td>$dob</td></tr>";
            echo "<tr><td>Gender:</td><td>$gen</td></tr>";
            echo "<tr><td>Hobbies:</td><td>";
            for ($i = 0; $i < sizeof($hobbies) - 1; $i++) {
                echo $hobbies[$i] . ", ";
            }
            echo $hobbies[$i] . "</td></tr>";
        }        
        ?>
    </table>
</body>

</html>