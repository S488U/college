<!-- Write a Php program to generate a simple calculator. -->
<!-- enhanced code | Tested  -->

<html>

<body>
    <?php
    $result = "";
    if (isset($_POST["operator"])) {
        $firstNum = $_POST["firstNum"];
        $secondNum = $_POST["secondNum"];
        $operator = $_POST['operator'];
        if (is_numeric($firstNum) && is_numeric($secondNum)) {
            $result = eval("return $firstNum $operator $secondNum;");
        }
    }
    ?>
    <h1>PHP Simple Calculator</h1>
    <form method="post">
        <label>First Number:</label>
        <input type="number" name="firstNum" value="<?php echo $firstNum ?? ''; ?>" required>
        <br>
        <label>Second Number:</label>
        <input type="number" name="secondNum" value="<?php echo $secondNum ?? ''; ?>" required>
        <br>
        Result:
        <input type="number" name="result" value="<?php echo $result; ?>" readonly>
        <br>
        <input type="submit" value="+" name="operator">
        <input type="submit" value="-" name="operator">
        <input type="submit" value="*" name="operator">
        <input type="submit" value="/" name="operator">
    </form>
</body>

</html>