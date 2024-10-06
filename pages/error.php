<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Page Not Found</title>

    <script src="../assets/script/navbar.js"></script>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link rel="stylesheet" href="./assets/style/scrollbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php include "./g-tag.php"; ?>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 p-5 p-md-5" style="min-height: 70vh; height:auto;">
        <img src="../assets/svg/warning.svg" />
        <h1 class="text-capitalize text-center error">OOPs ⊙⁠﹏⁠⊙</h1>
        <p class="err-p text-capitalize text-center error">The page you are looking for could not be found.</p>
    </div>

    <style>
        .container img {
            width: 20%;
        }

        .error {
            font-size: 70px;
            margin-bottom: 0;
            padding-bottom: 0;
        }


        .err-p {
            font-size: 24px;
        }

        @media screen and (max-width: 600px) {
            .container img {
                width: 50%;
            }

        }
    </style>



    <?php
    include "../assets/components/footer.php";
    include "../assets/components/checkApprove.php";
    include "../assets/components/scripts.php";
    ?>

    <script src="../assets/script/checkAccepted.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</body>

</html>