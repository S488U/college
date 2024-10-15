<?php
$program = "";
$programId = "";
$newRoute = "";
$msg = "";

if (isset($_GET["pg"]) && isset($_GET["id"])) {
    $program = $_GET["pg"];
    $programId = $_GET["id"];
    $newRoute = getFileContent($program, $programId);
} else {
    $msg = "No Records Found!";
}

function getFileContent($pg, $pgId) {
    global $msg;
    $programPath = $_SERVER["DOCUMENT_ROOT"] . '/' . $pg; 
    $fileContent = file_get_contents($programPath);

    // Validate content
    try {
        $fileContent = sanitizeContent($fileContent);
    } catch (Exception $e) {
        $msg = $e->getMessage();
        return "";
    }

    createTmpFile($pgId, $fileContent);
    $newRoute = "/output/allFiles/" . $pgId . ".php"; 
    return $newRoute;
}

function sanitizeContent($content) {
    $dangerousPatterns = [
        '/exec\(/i', 
        '/shell_exec\(/i', 
        '/system\(/i', 
        '/passthru\(/i', 
        '/`.*`/i', 
        '/\$\(\)/i', 
        '/\$\$/i', 
        '/eval\(/i', 
        '/mysql_connect\(/i', 
        '/fetch_assoc\(/i', 
        '/mysqli\(/i', 
        '/mysqli_connect\(/i'
    ];

    foreach ($dangerousPatterns as $pattern) {
        if (preg_match($pattern, $content)) {
            throw new Exception("MySQL files can't render because of Hardware limitations");
        }
    }

    // Limit comments
    if (preg_match_all('/\/\*.*?\*\/|\/\/.*?(\n|$)|#.*?(\n|$)/s', $content) > 5) {
        throw new Exception("Too many comments detected!");
    }

    return $content;
}

function createTmpFile($pgId, $fileContent) {
    global $msg;
    $dirPath = "./allFiles/";
    if (!is_dir($dirPath)) {
        if (!mkdir($dirPath, 0777, true)) {
            $msg = "Failed to create directory!";
            return;
        }
    }

    $tmpFileName = $pgId . '.php';
    $tmpFile = fopen($dirPath . $tmpFileName, "w");

    if ($tmpFile) {
        fwrite($tmpFile, $fileContent);
        fclose($tmpFile);
    } else {
        $msg = "Failed to create temporary file!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Output</title>

    <meta property="og:type" content="website" />
    <meta name="description" content="This website will display the output of simple code.">
    <meta property="og:description" content="This website will display the output of simple code.">
    <meta property="og:title" content="View Output  - Srinivas University">

    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script/navbar.js"></script>
    <?php include "../pages/g-tag.php"; ?>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 mb-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1>Program's Output</h1>
        <div class="container d-flex flex-column justify-content-center align-items-center ">
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <?php if (!empty($newRoute)) { ?>
                    <p class="text-center">If you want to save the link, copy and save somewhere safe. <strong>Note: These links will only valid for 24hrs</strong></p>
                    <iframe id="responsiveIframe" src="<?php echo $newRoute; ?>" height="700"></iframe>
                <?php } else {
                    echo "<h4 class='text-capitalize text-danger text-center' >" . $msg . "</h4>";
                }
                ?>
            </div>
        </div>
    </div>
    <style>
        iframe {
            border: 2px solid black;
            border-radius: 7px;
            width: 1000px;
        }
    </style>

    <script>
        function adjustIframeWidth() {
            const iframe = document.getElementById('responsiveIframe');
            const deviceWidth = window.innerWidth;
            if (deviceWidth < 1000) {
                iframe.style.width = (deviceWidth - 30) + 'px';
            } else {
                iframe.style.width = '1000px'; 
            }
        }

        adjustIframeWidth();
        window.addEventListener('resize', adjustIframeWidth);
    </script>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>


</html>