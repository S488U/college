<!-- Write a Php program to demonstrate array concept 
 to store marks of three students in three subjects. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Three</title>
</head>

<body>
    <h2>Students Marks</h2>
    <?php
        $sdt = "";
        
        $stdMarks = array(
            "Ramesh" => array("Java" => "88", "PHP" => "98", "Networking" => "78"),
            "Suresh" => array("Java" => "83", "PHP" => "90", "Networking" => "82"),
            "Kishan" => array("Java" => "85", "PHP" => "90", "Networking" => "79")
        );

        foreach ($stdMarks as $std => $subjectArray) {
            echo "Marks of $sdt:<br>";
            foreach ($subjectArray as $subject => $marks) {
                echo "$subject = $marks   ";
            }
            echo "<br><br>";
        }
    ?>
</body>

</html>
