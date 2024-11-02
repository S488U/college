<!-- write a php program to demonstrate $_POST method and display pattern -->
 <!-- echanced code | Tested -->

 <h2>Pyramid</h2>
<form method="POST">
    Enter number of lines
    <input type="number" name="line" required>
    Enter symbol
    <input type="text" name="symbol" required>
    <input type="reset" value="Clear">
    <input type="submit" value="Submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noOfLines = $_POST["line"];
    $symbol = $_POST["symbol"];
    for ($i = 0; $i < $noOfLines; $i++) {
        echo str_repeat("$symbol ", $i + 1) . "<br>";
    }
}
?>