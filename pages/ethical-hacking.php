<?php
include "/var/www/vhosts/dunite.tech/components/db.php";
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
            <div class="container py-5">
                <div class="row row-cols-1 row-cols-md-2 g-3 ">
                    <?php
                    $sql = "SELECT * FROM courses";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col border rounded px-3 py-2">
                                    <h2 class="text-capitalize fs-2">' . $row["title"] . '</h2>
                                    <p id="para" class="text-secondary overflow-auto" style="height:150px;">' . $row["description"] . '</p>
                                    <a href="' . $row["link"] . '" class="btn btn-dark text-white d-block">Get now</a>
                                </div>';
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        #para::-webkit-scrollbar {
            width: 2px;
            background-color: lightgray;
        }

        #para::-webkit-scrollbar-thumb {
            width: 2px;
            background-color: gray;
        }
    </style>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>