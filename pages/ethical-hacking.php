<?php
include "/var/www/vhosts/components/db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethical Hacking Training - SU Study Materials</title>

    <!-- <meta property="og:type" content="website"/>
    <meta name="description" content="This website hosts comprehensive BCA study materials from Srinivas University. Here, students can access a wide range of educational resources designed to support their academic journey, providing a valuable hub for learning and reference throughout their BCA studies at Srinivas University.">
    <meta property="og:description" content="This website hosts comprehensive BCA study materials from Srinivas University. Here, students can access a wide range of educational resources designed to support their academic journey, providing a valuable hub for learning and reference throughout their BCA studies at Srinivas University.">
    <meta property="og:title" content="Ethical Hacking Training - SU Study Materials"> -->
    <meta property="og:image" content=""> 

    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script/navbar.js"></script>
    <?php include "./g-tag.php"; ?>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 mb-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1 class="text-capitalize">ethical Hacking Training</h1>
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center ">
        <?php 
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //make a good layout
            echo '<div class="container d-flex flex-column justify-content-center align-items-center bg-light mt-3 m-0 p-2 px-4 rounded" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; ">';
            echo '<h4 class="m-0 p-0">' . $row["title"]. '</h4>';
            echo '<p class="m-0 p-0">' . $row["description"]. '</p>';
            echo '<p class="m-0 p-0">Link: <span> <a target="_blank" href=' . $row["link"]. '>' . $row["link"]. '</a></span></p>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>
