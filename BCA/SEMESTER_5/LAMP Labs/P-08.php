<!-- Write a Php script to insert and display values from different input fields. -->
<!-- Enhanced Code | Tested -->

<html>
<head>
    <title>Insert and Display Values</title>
    <style>
        table { border: 4px solid black; padding: 10px; width: 350px; }
        td { padding: 5px; }
    </style>
</head>
<body>
    <form method="post">
        <table>
            <tr><td>Name:</td><td><input type="text" name="name" required></td></tr>
            <tr><td>Address:</td><td><textarea name="addr" required></textarea></td></tr>
            <tr><td>DOB:</td><td><input type="date" name="dob" required></td></tr>
            <tr><td>Gender:</td>
                <td>
                    <input type="radio" name="gen" value="Male" required>Male
                    <input type="radio" name="gen" value="Female">Female
                </td>
            </tr>
            <tr><td>Hobbies:</td>
                <td>
                    <select name="hob[]" multiple required>
                        <option value="Coding">Coding</option>
                        <option value="Drawing">Drawing</option>
                        <option value="Travelling">Travelling</option>
                        <option value="Gaming">Gaming</option>
                    </select>
                </td>
            </tr>
            <tr><td><input type="submit" name="submit" value="Submit"></td>
                <td><input type="reset" value="Reset"></td></tr>
        </table>
    </form>

    <h3><u>After Submitting:</u></h3>
    <table border="1">
        <?php 
        if (isset($_POST["submit"])) {
            $name = $_POST["name"] ?? 'Not provided';
            $addr = $_POST["addr"] ?? 'Not provided';
            $dob = $_POST["dob"] ?? 'Not provided';
            $gen = $_POST["gen"] ?? 'Not provided';
            $hobbies = $_POST["hob"] ?? [];
            $hobbyList = is_array($hobbies) ? implode(", ", $hobbies) : 'None';

            echo "<tr><td>Name:</td><td>$name</td></tr>
                  <tr><td>Address:</td><td>$addr</td></tr>
                  <tr><td>DOB:</td><td>$dob</td></tr>
                  <tr><td>Gender:</td><td>$gen</td></tr>
                  <tr><td>Hobbies:</td><td>$hobbyList</td></tr>";
        }        
        ?>
    </table>
</body>
</html>
