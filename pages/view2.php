<?php
if (isset($_GET['file'])) {

    function retrieveAfterLastSlash($fileUrl)
    {
        $lastSlashPos = strrpos($fileUrl, '/');
        if ($lastSlashPos !== false) {
            return substr($fileUrl, $lastSlashPos + 1);
        } else {
            return "unknown file name";
        }
    }

    $fileUrl = $_GET['file'];
    $fileName = retrieveAfterLastSlash($fileUrl);

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $fileName . " | SU Study Material; " ?></title>
        <link href="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/themes/prism.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/style/scrollbar.css">
        <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://duploader.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="../assets/script/navbar.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/prism.min.js"></script>

        <style>
            /* Custom CSS for PDF container and other styles */
        </style>
    </head>

    <body>
        <?php include "../assets/components/navbar.php"; ?>
        <div class="container mt-5" style="min-height: 70vh; height: auto;">
            <?php

            echo "<h3>$fileName</h3>";

            $fileLocation = $_SERVER['DOCUMENT_ROOT'] . $fileUrl;

            if (file_exists($fileLocation) && is_readable($fileLocation)) {
                $fileExtension = pathinfo($fileLocation, PATHINFO_EXTENSION);

                switch ($fileExtension) {
                    case 'pdf':
                        // PDF handling
                        $partToRemove = "/var/www/vhosts/duploader.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<iframe src='https://$resultLink' width='100%' height='500'></iframe>";
                        break;
                    case 'jpeg':
                    case 'jpg':
                    case 'webp':
                    case 'png':
                        // Image handling
                        $partToRemove = "/var/www/vhosts/duploader.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<div class='container' style='width: 100%; max-width: 100%;'>
                                <img src='https://$resultLink' style='width: 100%; max-width: 100%; height: auto;'>  
                            </div>";
                        break;
                    default:
                        // Default case for other file types
                        $fileContent = htmlspecialchars(file_get_contents($fileLocation));
                        echo "
                        <div >
                            <div id='copy_container' class='container-fluid d-flex flex-row justify-content-between align-items-center p-0 m-0''>
                                <span class='filenName ms-3 text-light'><em>$fileUrl</em></span>
                                <button id='copybtn' title='Copy Code' class='btn btn-sm' onclick='copyCode()'>Copy Code</button>
                            </div>
                            <pre id='codeContainer' class='mt-0 mb-3 '><code class='language-$fileExtension'>$fileContent</code></pre>
                        </div>";
                        $check = $fileExtension == "py" ? "<script defer src='https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-python.min.js'></script>" :  "<script defer src='https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-$fileExtension.min.js'></script>"; 
                        echo $check;
                        break;
                }
            } else {
                echo "Error: File not found or inaccessible.";
            }
            ?>
        </div>

        <?php include "../assets/components/footer.php"; ?>
        <?php include "../assets/components/checkApprove.php"; ?>
        <?php include "../assets/components/scripts.php"; ?>

        <script src="../assets/script/checkAccepted.js"></script>
        <script>
            function copyCode() {
                var codeContainer = document.getElementById('codeContainer');
                var code = codeContainer.innerText;


                // Create a temporary textarea element
                var textarea = document.createElement('textarea');
                textarea.value = code;
                document.body.appendChild(textarea);

                // Select the text
                textarea.select();
                textarea.setSelectionRange(0, 99999); /* For mobile devices */

                // Copy the text
                document.execCommand('copy');

                // Remove the textarea
                document.body.removeChild(textarea);
                document.getElementById("copybtn").innerText = "Copied!!";

                setTimeout(() => {
                    document.getElementById("copybtn").innerText = "Copy Code";
                }, 4000);

            }
        </script>
    </body>

    </html>
    <?php
} else {
    echo "Error: File URL not provided.";
}
?>
