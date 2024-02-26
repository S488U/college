<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - SU Study Materials</title>
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://duploader.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script/navbar.js"></script>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>
    <?php include "../admin/admin_nav.php"; ?>

    <div  id="mainCon" class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-1 p-5 p-md-5" style="min-height: 60vh; height:auto;">

        <?php include "../admin/course-update.php"; ?>
        <?php include "../admin/upload-shows.php"; ?>

    </div>



    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>
<script>
    function LinkGenerate(e) {
        let elementLink = e.innerText;
        let mainCon = document.getElementById("mainCon");
        
        if (elementLink === "Upload") {
            // Assuming you're using XMLHttpRequest (XHR) for AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Assuming the response contains HTML content
                        mainCon.innerHTML = xhr.responseText;
                    } else {
                        console.error('Failed to load content');
                    }
                }
            };
            xhr.open('GET', './course-update.php', true);
            xhr.send();
        }
    }
</script>

</html>