<!-- Write a Php program to generate a simple calculator. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Four</title>
</head>
<body>
    <?php 
    if(isset($_POST["operator"])) {
        $firstNum = $_POST["firstNum"];
        $secondNum = $_POST["secondNum"];
        $operator = $_POST["operator"];
        $result = "";

        if(is_numeric($firstNum) && is_numeric($secondNum)) {
            switch($operator) {
                case "+" :
                    $result = $firstNum + $secondNum;
                    break;
                case "-" :
                    $result = $firstNum - $secondNum;
                    break;
                case "*" :
                    $result = $firstNum * $secondNum;
                    break;
                case "/" :
                    $result = $firstNum / $secondNum;
                    break;
            }
        }
    }
    ?>
</body>
    <h1>PHP Simple Calculator</h1>
    <form action="" method="post">
        <div>
            <label>First Number:</label>
            <input type="number" name="firstNum" value="<?php echo $firstNum; ?>" required>
        </div>
        <div>
            <label>Second Number: </label>
            <input type="number" name="secondNum" value="<?php echo $secondNum; ?>" required>
        </div>
        <div>
            <label>Result: </label>
            <input type="number" name="result" value="<?php echo $result; ?>" readonly>
        </div>

        <input type="submit" value="+" name="operator">
        <input type="submit" value="-" name="operator">
        <input type="submit" value="*" name="operator">
        <input type="submit" value="/" name="operator">
    </form>
</html>
