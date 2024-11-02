<!-- write a php script to check wheather a given number number is Armstrong or not -->
 <!-- enhanced code | Tested -->

<html>

<head>
    <title>Armstrong Number</title>
</head>

<body>
    <form method="post">
        Enter Number: <input type="number" name="number"><br>
        <input type="submit" value="Submit" name="submit"><br>
        <?php
        if (isset($_POST["submit"])) {
            $a = $_POST["number"];
            $number = $a;
            $sum = 0;
            while ($number != 0) {
                $r = $number % 10;
                $sum = $sum + ($r * $r * $r);
                $number = (int)($number / 10);
            }
            echo ($a == $sum) ? "$a is a Armstrong number." : "$a is not a Armstrong number.";
        }
        ?>
    </form>
</body>

</html>