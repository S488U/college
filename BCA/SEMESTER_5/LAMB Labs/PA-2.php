<!-- Write a Php program to demonstrate date function. -->
 
<?php
    date_default_timezone_set("Asia/Kolkata");
    $morning = "Good Morning";
    $afternoon = "Good Afternoon";
    $evening = "Good Evening";
    $late = "Working Late!!!";
    $friday = "Get Ready For The Weekend";

    $time = date("G");
    $day = date("l");

    echo " $time $day ";

    if($time >= 12 && $time <= 16){
        echo $afternoon;
    } else if ($time >= 17 && $time <= 23){
        echo $evening;
    } else if ($time >= 1 && $time <= 5){
        echo $late;
    } else if ($time >= 6 && $time <= 11){
        echo $morning;
    }

    if($day == "Friday"){
        echo " $friday";
    }
?>