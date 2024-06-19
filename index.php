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

<div class="container mt-5 p-5 p-md-5">
    <h1 class="text-center text-capitalize">Find your desired Study Materials Here</h1>
    <div class="row row-cols-1 row-cols-md-2 gap-5 justify-content-center align-items-center">
        <div class="col">
            <div class="card" onclick="linkFunction('bca');">
                <div class="card-body">
                    <h1 class="card-title">BCA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Bachelors of Computer Application.
                    </p>
                    <a class="card-link text-capitalize" href="#">BCA Study materials</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" onclick="linkFunction('mca');">
                <div class="card-body">
                    <h1 class="card-title">MCA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Masters of Computer Application.
                    </p>
                    <a class="card-link text-capitalize" href="#">MCA Study materials</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" onclick="linkFunction('bba');">
                <div class="card-body">
                    <h1 class="card-title">BBA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Bachelor of Business Administration.
                    </p>
                    <a class="card-link text-capitalize" href="#">BBA Study materials</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" onclick="linkFunction('mba');">
                <div class="card-body">
                    <h1 class="card-title">MBA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Masters of Business Administration.
                    </p>
                    <a class="card-link text-capitalize" href="#">MBA Study materials</a>
                </div>
            </div>
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
    <script>
        function linkFunction(e) {
            var courses = ['mca', 'bca', 'mba', 'bba'];
            for(let i=0; i<courses.length;i++) {
                if(courses[i] === e) {
                    window.history.replaceState({}, document.title, window.location.pathname);
                    window.location.href = "./pages/" + e + ".php";
                }
            }
            
        }
    </script>

    <?php
        include "./assets/components/footer.php";
        include "./assets/components/checkApprove.php";
        include "./assets/components/scripts.php";
    ?>

    <script src="./assets/script/checkAccepted.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>

</html>