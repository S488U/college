<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IBM Study Materials - Srinivas University</title>

    <!-- SEO Meta -->
    <meta property="og:type" content="website"/>
    <meta name="description" content="Comprehensive IBM study materials from Srinivas University. Access notes, labs, and resources.">
    <meta property="og:description" content="Comprehensive IBM study materials from Srinivas University. Access notes, labs, and resources.">
    <meta property="og:title" content="IBM Study Materials - Srinivas University">

    <!-- CSS & Fonts -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <script src="../assets/script/navbar.js"></script>
    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.08);
        }
        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        h1 {
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column align-items-center gap-4 mt-5 mb-5 p-3 p-md-5" style="min-height: 80vh;">
        <div class="text-center mb-2">
            <h1>IBM Study Materials</h1>
            <p class="text-white">Browse folders to find notes, labs, and code.</p>
        </div>

        <div class="container-fluid d-flex justify-content-center">
            <!-- Loading the File Explorer -->
            <?php include "../IBM/index.php"; ?>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>
    
    <!-- Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/4145934b9b.js" crossorigin="anonymous"></script>
    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>