<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Five</title>
</head>
<body>
    <?php
        $noOfLines = "";
        $symbol = "";
    ?>
    <h2>Pyramid</h2>
    <form method="POST">
        Enter the loop Number: 
        <input type="number" name="line" value="<?php echo $noOfLines; ?>" required>
        
        Enter the Symbol: 
        <input type="text" name="symbol" value="<?php echo $symbol; ?>" required>

        <input type="reset" value="Clear">
        <input type="submit" name="Submit" value="Submit">
    </form>

    <?php
        if(isset($_POST["Submit"])) {
            $noOfLines = $_POST["line"];
            $symbol = $_POST["symbol"];
        }
        if($noOfLines and $symbol) {
            for($i=0;$i<$noOfLines;$i++){
                for($j=0;$j<$i+1;$j++){
                    echo "<b>$symbol</b>  ";
                }
                echo "<br>";
            }
        }
    ?>
</body>
</html>
