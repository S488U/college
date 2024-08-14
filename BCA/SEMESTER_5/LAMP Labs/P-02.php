<!-- Write a Php program to demonstrate date function. -->

<?php
    date_default_timezone_set("Asia/Kolkata"); // Replace with your timezone

    $late = "It's late night";
    $mor = "Good morning";
    $aft = "Good afternoon";
    $eve = "Good evening";

    $a = date("G"); // Current hour in 24-hour format without leading zeros

    echo "Current hour is: $a<br>"; // Print the current hour for debugging

    if ($a >= 0 && $a <= 5) {
        echo $late;
    } elseif ($a >= 6 && $a <= 11) {
        echo $mor;
    } elseif ($a >= 12 && $a <= 16) {
        echo $aft;
    } elseif ($a >= 17 && $a <= 23) {
        echo $eve;
    }

    echo "<br>"; // Add a line break for readability

    $b = date("l");
    $monday = "Today is Monday";
    $tuesday = "Today is Tuesday";
    $wednesday = "Today is Wednesday";
    $thursday = "Today is Thursday";
    $friday = "Today is Friday";
    $saturday = "Today is Saturday";
    $sunday = "Today is Sunday"; // Add Sunday

    if ($b == "Monday") {
        echo $monday;
    } elseif ($b == "Tuesday") {
        echo $tuesday;
    } elseif ($b == "Wednesday") {
        echo $wednesday;
    } elseif ($b == "Thursday") {
        echo $thursday;
    } elseif ($b == "Friday") {
        echo $friday;
    } elseif ($b == "Saturday") {
        echo $saturday;
    } else {
        echo $sunday;
    }
?>
