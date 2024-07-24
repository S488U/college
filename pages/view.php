<?php
// Check if the 'fileUrl' GET parameter is set
if (isset($_GET['file'])) {
    function retrieveAfterLastSlash($fileUrl)
    {
        $lastSlashPos = strrpos($fileUrl, '/');
        if ($lastSlashPos !== false) {
            return substr($fileUrl, $lastSlashPos + 1);
        } else {
            $fileUrl = "unknown file name";
        }

        return $fileUrl;
    }

    $fileUrl = $_GET['file'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo retrieveAfterLastSlash($fileUrl) . " | SU Study Material; " ?></title>
        <link href="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/themes/prism.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="../assets/style/scrollbar.css">
        <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://duploader.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="../assets/script/navbar.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/prism.min.js"></script>
        <?php include "./g-tag.php"; ?>
        <style>
            #pdfContainer {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
            }
            canvas {
                max-width: 100%;
                height: auto;
            }

            pre {
                border-radius: 0px 0px 7px 7px !important;
                background-color: #f5f2f0 !important;
                text-shadow: none;
            }

            pre * {
                background-color: #f5f2f0 !important;
                text-shadow: none;
                 
            }

            #copy_container {
                border-radius: 7px 7px 0px 0px !important;
                background: #212529 !important;
            }

            #copybtn {
                border: 1px solid #ddd;
                border-top: none;
                border-bottom: none;
                border-right: none;
                border-radius: 0 7px 0 0;
                background-color: #212520;
                color: #ddd;
                overflow: hidden !important;
            }

            #copybtn:hover {
                background-color: #6E7271;
            }

            @media screen and (max-width:600px) {
                body {
                    overflow-x: hidden;
                }

                .filenName {
                    display: block !important;
                    min-width: 40% !important;
                    overflow: hidden;
                    position: relative;
                    /* animation: moving 10s linear infinite; */
                    z-index: 0;
                    inset: 0;
                }

                .filenName em {
                    white-space: nowrap;
                    word-wrap: normal;
                    word-break: keep-all;
                }

                #copy_container {
                    display: flex !important;
                    justify-content: flex-end !important;
                }

                #copybtn {
                    max-width: 100px;
                }

                @keyframes moving {
                    0% {
                        left: -100%;
                    }

                    100% {
                        left: 100%;
                    }
                }

                code {
                    font-size: 15px !important;
                }

                code span {
                    font-size: 15px !important;
                }


            }
        </style>

    </head>

    <body>
        <?php include "../assets/components/navbar.php"; ?>
        <div class="container mt-5" style="min-height: 70vh; height: auto;">
            <?php

            echo "<h3>" . retrieveAfterLastSlash($fileUrl) . "</h3>";

            // Assuming view.php is in the same directory as the files you want to view
            $fileLocation = $_SERVER['DOCUMENT_ROOT'] . $fileUrl;

            // Check if the file exists and is readable
            if (file_exists($fileLocation) && is_readable($fileLocation)) {
                // Display PDF files using PDF.js
                $fileExtension = pathinfo($fileLocation, PATHINFO_EXTENSION);

                switch ($fileExtension) {
                    case 'pdf':
                        $partToRemove = "/var/www/vhosts/duploader.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<iframe src='https://$resultLink' width='100%' height='500'></iframe>";
                        break;
                    case 'jpeg':
                    case 'jpg':
                    case 'webp':
                    case 'png':
                        $partToRemove = "/var/www/vhosts/duploader.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<div class='container' style='width: 100%; max-width: 100%;'>
                                <img src='https://$resultLink' style='width: 100%; max-width: 100%; height: auto;'>  
                            </div>";
                        break;

                    default:
                        $fileContent = htmlspecialchars(file_get_contents($fileLocation));
                        echo "
                        <div >
                            <div id='copy_container' class='container-fluid d-flex flex-row justify-content-between align-items-center p-0 m-0''>
                                <span class='filenName ms-3 text-light'><em id='contentSec'>$fileUrl</em></span>
                                <button id='copybtn' title='Copy Code' class='btn btn-sm' onclick='copyCode()'>Copy Code</button>
                            </div>
                            <pre id='codeContainer' class='mt-0 mb-3 '><code class='language-$fileExtension'>$fileContent</code></pre>
                        </div>";
                        // $check = $fileExtension == "py" ? "<script defer src='https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-python.min.js'></script>" :  "<script defer src='https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-$fileExtension.min.js'></script>";

                        switch($fileExtension) {
                            case "py" :
                                echo "<script defer src='https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-python.min.js'></script>";
                                break;
                            case "php" :
                                echo '<script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-php-extras.min.js" integrity="sha512-slk6u22Z59/OgxTpC6/+BRJXb8f97I04A2KbD2nmvdrkBzequmHsf3Tm6n4iWW+Scf1j1f3qe+xj3DWtAgCXfg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
                                echo '<script defer src="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/components/prism-php.min.js" integrity="sha512-6UGCfZS8v5U+CkSBhDy+0cA3hHrcEIlIy2++BAjetYt+pnKGWGzcn+Pynk41SIiyV2Oj0IBOLqWCKS3Oa+v/Aw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>';
                                break;
                            default : 
                                echo "<script defer src='https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-$fileExtension.min.js'></script>";
                                break;
                        }
                        

                        // echo $check;
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
            var tempContent = document.getElementById("contentSec").innerText;

            function handleSize() {
                var winSize = window.innerWidth;
                var contentSec = document.getElementById("contentSec");

                if (winSize <= 700) {
                    tempContent = contentSec.innerHTML;
                    contentSec.innerHTML = "Duploader";
                    contentSec.style.display = "block";
                } else {
                    contentSec.innerHTML = tempContent;
                    contentSec.style.display = "block";
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                handleSize();
                window.addEventListener("resize", handleSize);
            });

            function copyCode() {
                var codeContainer = document.getElementById('codeContainer');
                var code = codeContainer.innerText;
                var textarea = document.createElement('textarea');
                textarea.value = code;
                document.body.appendChild(textarea);
                textarea.select();
                textarea.setSelectionRange(0, 99999);
                document.execCommand('copy');
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
    include "./error.php";
}
?>