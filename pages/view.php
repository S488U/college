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
        <!-- <script defer src="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-java.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/components/prism-python.min.js"></script> -->

        <style>
            /* Custom CSS for PDF container */
            #pdfContainer {
                display: flex;
                flex-wrap: wrap;
                gap: 20px;
                justify-content: center;
            }

            /* Custom CSS for responsive canvas */
            canvas {
                max-width: 100%;
                height: auto;
            }

            pre {
                border-radius: 0px 0px 7px 7px !important;
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
                .filenName {
                    max-width: 100%;

                    overflow: hidden;
                    position: relative;
                    animation: moving 10s linear infinite;
                    z-index: 0;
                    inset: 0;
                }

                .filenName em {
                    white-space: nowrap;
                    word-wrap: normal;
                    word-break: keep-all;
                }


                #copybtn {
                    max-width: 100px;
                    position: relative;
                    z-index: 1;
                }

                @keyframes moving {
                    0% {
                        left: -100%;
                    }

                    100% {
                        left: 100%;
                    }
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
                        // echo "<div id='pdfContainer'></div>";
                        // echo "<script src='https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js'></script>";
                        // echo "<script>
                        //         const pdfUrl = '$fileUrl';
                        //         const pdfContainer = document.getElementById('pdfContainer');
                        //         pdfContainer.innerText = 'Loading.........';

                        //         // PDF.js worker from cdnjs
                        //         pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';

                        //         // Asynchronous download of PDF
                        //         const loadingTask = pdfjsLib.getDocument(pdfUrl);
                        //         loadingTask.promise.then(pdf => {
                        //             for (let pageNum = 1; pageNum <= pdf.numPages; pageNum++) {
                        //                 pdf.getPage(pageNum).then(page => {
                        //                     const viewport = page.getViewport({ scale: 1 });
                        //                     const canvas = document.createElement('canvas');
                        //                     const context = canvas.getContext('2d');
                        //                     canvas.height = viewport.height;
                        //                     canvas.width = viewport.width;

                        //                     // Render PDF page into canvas context
                        //                     const renderContext = {
                        //                         canvasContext: context,
                        //                         viewport: viewport
                        //                     };
                        //                     pdfContainer.innerText = '';
                        //                     page.render(renderContext).promise.then(() => {
                        //                         pdfContainer.appendChild(canvas);
                        //                     });
                        //                 });
                        //             }
                        //         });
                        //     </script>";
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
    // Handle case where file information is not provided
    echo "Error: File URL not provided.";
}
?>