<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Hosting</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include "./assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 p-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1 class="text-capitalize text-center">Find your desired Study Materials Here</h1>
        <div class="container d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">
            <div class="card" onclick="bca();" style="cursor: pointer;">
                <div class="card-body">
                    <h1 class="card-title">BCA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Bachelors of Computer Application.
                    </p>
                    <a class="card-link text-capitalize" href="#">BCA Study materials</a>
                </div>
            </div>
            <div class="card" onclick="mca();">
                <div class="card-body" >
                    <h1 class="card-title">MCA</h1>
                    <p class="card-text text-break text-capitalize">
                        Find all the study Materials of Masters of computer application.
                    </p>
                    <a class="card-link text-capitalize" href="#">MCA Study materials</a>
                </div>
            </div>
        </div>
    </div>

    <?php include "./assets/components/footer.php" ?>
    <?php include "./assets/components/scripts.php" ?>

    <script src="./assets/script/navbar.js"></script>
    <script>
        function mca() {
            window.location.href="./pages/mca.php";
        }
        function bca() {
            window.location.href="./pages/bca.php";
        }
    </script>
</body>

</html>