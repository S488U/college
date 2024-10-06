<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Compiler - SU Study Materials</title>
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script.js"></script>
    <?php include "./g-tag.php"; ?>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 pt-0 p-md-0 p-5 p-md-5 " style="min-height: 60vh; height:auto;">
    <?php include "../compiler/index.php"; ?>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>