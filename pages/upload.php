<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload your Study Materials on SU Study Materials</title>
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script/navbar.js"></script>
    <?php include "./g-tag.php"; ?>
</head>

<body>
    <?php
    include "../assets/components/navbar.php";
    $msgError = "";

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if files were uploaded
        if (!empty($_FILES['files']['name'][0])) {
            // Set upload directory
            $upload_dir = '../uploads/';

            // Validate and sanitize files
            $valid_extensions = array('zip', 'rar');
            $max_size = 64 * 1024 * 1024; // 64 MB

            foreach ($_FILES['files']['name'] as $key => $name) {
                $tmp_name = $_FILES['files']['tmp_name'][$key];
                $size = $_FILES['files']['size'][$key];
                $error = $_FILES['files']['error'][$key];

                // Validate file extension
                $file_extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                if (!in_array($file_extension, $valid_extensions)) {
                    $msgError = "Invalid file extension. Only zip and rar files are allowed.";
                    exit;
                }

                // Validate file size
                if ($size > $max_size) {
                    $msgError = "File size exceeds the maximum allowed limit.";
                    exit;
                }

                // Sanitize file name
                $new_name = preg_replace('/[^A-Za-z0-9_.-]/', '_', $name);

                // Move the file to the upload directory
                $destination = $upload_dir . $new_name;
                move_uploaded_file($tmp_name, $destination);
            }

            $msgError = "Files uploaded successfully!";
        } else {
            $msgError = "No files were uploaded.";
        }
    }
    ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 p-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1 class="text-capitalize text-center">Upload your study Materials here</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3 d-flex flex-column flex-md-row gap-2">
                <input class="form-control border border-dark flex-fill" type="file" name="files[]" id="formFileMultiple" multiple accept=".zip, .rar">
                <input class="btn btn-outline-dark flex-fill" type="submit" value="Submit">
            </div>

        </form>
        <p><?php echo $msgError; ?></p>
        <div class="container bg-warning-subtle border border-warning rounded p-3">
            <p>Upload the file as a zip or rar and include a file called readme.txt.</p>
            <p>In Readme.txt file should contain information about the department's study materials, semester, and any additional details regarding the provided study materials.</p>
            <p>Max size for uploading is 64 MB.</p>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>
