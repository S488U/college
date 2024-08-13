<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armstrong Number</title>
</head>

<body>
    <form method="post">
        <table>
            <tr>
                <td>Enter Number: </td>
                <td><input type="number" name="number"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Submit" name="submit"></td>
            </tr>
            <?php
            if (isset($_POST["submit"])) {
                $a = $_POST["number"];
                if ($a !== null && $a !== "") {
                    $number = $a;
                    $sum = 0;
                    while ($number != 0) {
                        $r = $number % 10;
                        $sum = $sum + ($r * $r * $r);
                        $number = (int)($number / 10);
                    }

                    if ($a == $sum) {
                        echo "$a is a Armstrong number.";
                    } else {
                        echo "$a is not a Armstrong number.";
                    }
                } else {
                    echo "Enter input to check.";
                }
            }
            ?>
        </table>
    </form>
</body>

</html>
