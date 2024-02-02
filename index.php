<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU Study Materials - Srinivas University </title>

    <meta property="og:type" content="website" />
    <meta name="description" content="This website hosts comprehensive BCA study materials from Srinivas University. Here, students can access a wide range of educational resources designed to support their academic journey, providing a valuable hub for learning and reference throughout their BCA studies at Srinivas University.">
    <meta property="og:description" content="This website hosts comprehensive BCA study materials from Srinivas University. Here, students can access a wide range of educational resources designed to support their academic journey, providing a valuable hub for learning and reference throughout their BCA studies at Srinivas University.">
    <meta property="og:title" content="SU Study Materials - Srinivas University ">
    <meta property="og:url" content="https://su.duploader.tech">
    <script src="./assets/script/navbar.js"></script>


    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://duploader.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link rel="stylesheet" href="./assets/style/scrollbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include "./assets/components/navbar.php"; ?>

    <div id="toast" class="container border border-warning bg-white z-3 p-3 rounded position-fixed" style="display:none; width: 300px; bottom: 20px; right: 20px;">
        <p>By entering you are agreeing with our terms and conditions. Please read this <a href="">Warning</a>.</p>
        <div class="fluid-container d-flex justify-content-center gap-1">
            <button id="close" class="btn btn-dark flex-fill" type="button">Close</button>
            <button id="agree" class="btn btn-dark flex-fill" type="button">Agree</button>
        </div>
    </div>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 p-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1 class="text-capitalize text-center">Find your desired Study Materials Here</h1>
        <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
            <div class="card" onclick="bca();">
                <div class="card-body">
                    <h1 class="card-title">BCA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Bachelors of Computer Application.
                    </p>
                    <a class="card-link text-capitalize" href="#">BCA Study materials</a>
                </div>
            </div>
            <div class="card" onclick="mca();">
                <div class="card-body">
                    <h1 class="card-title">MCA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Masters of computer application.
                    </p>
                    <a class="card-link text-capitalize" href="#">MCA Study materials</a>
                </div>
            </div>
        </div>
    </div>
    
    
    <?php
        if ($_SERVER['REQUEST_URI'] === '/agree') {
            // Get user's IP address
            $userIP = $_SERVER['REMOTE_ADDR'];

            // Get current timestamp
            $timestamp = date("Y-m-d H:i:s");

            // Database connection details (replace with your actual database credentials)
            $db_host = 'localhost';
            $db_user = 'shahabas_sabbu';
            $db_password = 'Sabbu00@duploader.tech';
            $db_name = 'db_duploader';

            // Create a database connection
            $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Insert IP address and timestamp into the database
            $sql = "INSERT INTO ip_addresses (ip_address, timestamp) VALUES ('$userIP', '$timestamp')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>console.log("Record added to the database successfully")</script>';
            } else {
                echo '<script>console.log("Error: ' . $sql . '<br>' . $conn->error . '")</script>';
            }

            // Close the database connection
            $conn->close();
        } else {
            echo '<script>console.log("Invalid Requests")</script>';
        }
        ?>


    <style>
        .card {
            cursor: pointer !important;
        }

        .card:active {
            border: 2px solid black !important;
        }
    </style>

    <?php include "./assets/components/footer.php" ?>
    <?php include "./assets/components/scripts.php" ?>

    <script src="./assets/script/checkAccepted.js"></script>

    <script>
        function mca() {
            window.location.href = "./pages/mca.php";
        }

        function bca() {
            window.location.href = "./pages/bca.php";
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>

</html>