<!-- Write a Php program to demonstrate date function. -->
 <!-- enhanced code | Tested -->
 <?php
    date_default_timezone_set("Asia/Kolkata"); 

    $a = date("G"); 
    echo "Current hour is: $a<br>"; 

    if ($a >= 0 && $a <= 5) {
        echo "It's late night";
    } elseif ($a >= 6 && $a <= 11) {
        echo "Good Morning";
    } elseif ($a >= 12 && $a <= 16) {
        echo "Good Afternoon";
    } else {
        echo "Good Evening";
    }

    echo "<br>"; 
    echo "Today is " . date("l");
?>