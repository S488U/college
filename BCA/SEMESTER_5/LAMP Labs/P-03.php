<!-- Write a Php program to demonstrate array concept 
 to store marks of three students in three subjects. -->
<!-- enhanced code | Tested -->

<?php
    $sdt = "";
    $stdMarks = [
        "Ramesh" => ["Java" => "88", "PHP" => "98", "Networking" => "78"],
        "Suresh" => ["Java" => "83", "PHP" => "90", "Networking" => "82"],
        "Kishan" => ["Java" => "85", "PHP" => "90", "Networking" => "79"]
    ];

    echo "<h2>Students Marks</h2>";
    foreach ($stdMarks as $sdt => $subjectArray) {
        echo "Marks of $sdt:<br>";
        foreach ($subjectArray as $subject => $marks) {
            echo "$subject = $marks   ";
        }
        echo "<br><br>";
    }
?>