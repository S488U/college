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
    <meta property="og:url" content="https://su.dunite.tech">
    <script src="./assets/script/navbar.js"></script>


    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link rel="stylesheet" href="./assets/style/scrollbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php include "./pages/g-tag.php"; ?>
    </script>
</head>

<body>
    <?php include "./assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 p-5 p-md-5" style="min-height: 70vh; height:auto;">
        <div class="container-fluid d-flex flex-column justify-content-center align-items-center text-center gap-2">
            <h1 class="text-capitalize text-center mb-0">Find your desired Study Materials Here</h1>
            <p class="text-center fs-5" style="max-width: 600px; width:auto;">Streamline your search with the <a class="text-danger" style="cursor: pointer;" href="./pages/engine.php">SU study engine</a>. Fast access to BCA, MCA, and specialized courses at your fingertips.</p>
        </div>
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-md-2 g-5">
                <?php
                include("./utils/pageLink.php");
                foreach ($courses as $courseKey => $course) {
                ?>
                    <div class="col" onclick="window.location.href='<?php echo $course['redirectLink']; ?>'">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title"><?php echo $course['name']; ?></h1>
                                <p class="card-text text-break text-capitalize">
                                    Find all the study materials related to <?php echo $course['name']; ?>.
                                </p>
                                <a class="card-link text-capitalize" href="<?php echo $course['redirectLink']; ?>">Study materials</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </div>


    <style>
        .card {
            cursor: pointer !important;
        }

        .card:hover {
            border: 0.5px solid black !important;
        }
    </style>

    <?php
    include "./assets/components/footer.php";
    include "./assets/components/checkApprove.php";
    include "./assets/components/scripts.php";
    ?>

    <script src="./assets/script/checkAccepted.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        input:active,
        input:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: black !important;
        }
    </style>

</body>

</html>