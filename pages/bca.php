<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Study Materials</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 p-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1>BCA Study Materials</h1>
        <div class="container d-flex flex-column justify-content-center align-items-center ">
            <?php include "../BCA/index.php"; ?>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/navbar.js"></script>
</body>

</html>