<?php
if (isset($_GET['file'])) {
    function retrieveAfterLastSlash($fileUrl)
    {
        $lastSlashPos = strrpos($fileUrl, '/');
        return $lastSlashPos !== false ? substr($fileUrl, $lastSlashPos + 1) : "unknown file name";
    }

    $fileUrl = $_GET['file'];
    $pattern = "/^\/(BCA|MCA|IBM)\/.*/";

    if (!preg_match($pattern, $fileUrl)) {
        header("Location: ./error.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo retrieveAfterLastSlash($fileUrl) . " | SU Study Material; "; ?></title>
        <link href="../assets/theme/prism.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/style/scrollbar.css?v=<?php echo time() ?>">
        <link rel="stylesheet" href="../assets/style/view.css?v=<?php echo time() ?>">
        <link rel="shortcut icon" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../assets/script/navbar.js?v=<?php echo time();?>"></script>
        <script defer src="../assets/theme/prism.js"></script>
        <?php include "./g-tag.php"; ?>

    </head>

    <body>
        <?php include "../assets/components/navbar.php"; ?>
        <div class="container-fluid d-flex flex-column justify-content-center align-items-left mt-5 px-md-4" style="min-height: 70vh; height: auto;">
            <?php
            echo "<h3>" . retrieveAfterLastSlash($fileUrl) . "</h3>";

            $fileLocation = $_SERVER['DOCUMENT_ROOT'] . $fileUrl;

            if (file_exists($fileLocation) && is_readable($fileLocation)) {
                $fileExtension = pathinfo($fileLocation, PATHINFO_EXTENSION);

                switch ($fileExtension) {
                    case 'pdf':
                        $partToRemove = "/var/www/vhosts/dunite.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<iframe src='https://$resultLink' width='100%' height='500'></iframe>";
                        break;
                    case 'jpeg':
                    case 'jpg':
                    case 'webp':
                    case 'png':
                        $partToRemove = "/var/www/vhosts/dunite.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<div class='container' style='width: 100%; max-width: 100%;'>
                                <img src='https://$resultLink' style='width: 100%; max-width: 100%; height: auto;'>  
                              </div>";
                        break;
                    default:
                        $fileContent = htmlspecialchars(file_get_contents($fileLocation));
                        echo "<div id='main-code-container' class='container-fluid p-0'>
                                <div class='fullscreen' onclick='fullscreen();'>
                                    <img src='data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAABiElEQVR4nO2ZTW7DIBCF396+TKsmOYmXbdoDVVF3UXIDDpIcIL5GlRwg0lSWHKlCMAwpfyU8aTa2B78PMGAAmpqaHl7vAEYAVwCUOa6zl7Vvq3wUYJ4s4QUzFmCYLHHyASmhOxHTzcSiwkMsU/IngE6YPzAmpnsSdQA2MUCkEKFAJvUxQJABBKlAphrbAVBaHBiQg+H53VyWScla5AnA9x8+3AuAZSAv3sl67b0AON8BcZ5zubIpJsjeUIu+LXOxlLFNCaIYIxIYLlelBnEZugeCcoH4wkieVblAbgZXDoMmiGcDsIoNMvyKo2UEWmjlLObr3D29nKP2ruAgkrAZlkKQMKKD2LqZqzsVCUIMTAgISg2yjLCcodRdi1s7hYARq+qPfahl+HVNiK7JTjJpUmlLFNvoJIFROUB8IKQwKjVIFcv4fS0/Vn0tv7rVbD5UuR307zboulq2TDdM88cA6QF8xQApKR7voGcswDCFOHpbF2CYLPHqA3KDKel4+gTgzReiqampMv0ASd5jTrDJC3QAAAAASUVORK5CYII='>
                                </div>
                                <div class='fontSize' onclick='fsSetting()'>
                                    <img width='48' height='48' src='https://img.icons8.com/external-those-icons-fill-those-icons/48/external-Font-Size-text-editor-those-icons-fill-those-icons.png' alt='external-Font-Size-text-editor-those-icons-fill-those-icons'/>
                                </div>
                                <div class='fsSettings'>
                                    <div class='slider-container'>
                                        <label for='font-size-slider'>Font Size: </label>
                                        <input type='range' id='font-size-slider' min='10' max='40' value='16' step='1' oninput='changeFontSize(this.value)'>
                                        <span id='font-size-display'>16px</span>
                                    </div>
                                </div>
                                <div id='copy_container' class='container-fluid d-flex flex-row justify-content-between align-items-center p-0 m-0'>
                                    <span class='filenName ms-3 text-light'><em id='contentSec'>$fileUrl</em></span>
                                    <button id='copybtn' class='btn btn-sm' onclick='copyCode()'>Copy Code</button>
                                </div>
                                <pre id='codeContainer' class='mt-0 mb-3'><code class='language-$fileExtension match-braces no-whitespace-normalization line-numbers' id='font'>$fileContent</code></pre>
                                </div>";
                        echo "";
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
                    contentSec.innerHTML = "dunite";
                } else {
                    contentSec.innerHTML = tempContent;
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
                document.execCommand('copy');
                document.body.removeChild(textarea);
                document.getElementById("copybtn").innerText = "Copied!!";
                setTimeout(() => {
                    document.getElementById("copybtn").innerText = "Copy Code";
                }, 4000);
            }

            function fullscreen() {
                var elem = document.getElementById("main-code-container");

                if (!elem.getAttribute("data-fullscreen")) {
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.webkitRequestFullscreen) {
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
                    } else if (elem.mozRequestFullScreen) {
                        elem.mozRequestFullScreen();
                    }
                    elem.style.overflow = "auto"; // Enable scrolling
                    elem.style.width = "100vw"; // Full screen width
                    elem.style.height = "100vh"; // Full screen height
                    elem.setAttribute("data-fullscreen", "true");
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    }
                    elem.style.overflow = ""; // Reset to default
                    elem.style.width = ""; // Reset to default
                    elem.style.height = ""; // Reset to default
                    elem.removeAttribute("data-fullscreen");
                }
            }

            document.addEventListener("fullscreenchange", function() {
                var elem = document.getElementById("main-code-container");
                if (!document.fullscreenElement) {
                    elem.removeAttribute("data-fullscreen");
                    elem.style.overflow = ""; // Reset overflow when exiting fullscreen
                    elem.style.width = ""; // Reset width when exiting fullscreen
                    elem.style.height = ""; // Reset height when exiting fullscreen
                }
            });

            function fsSetting() {
                var settings = document.querySelector(".fsSettings");
                if (!settings.getAttribute("data-settings-show")) {
                    settings.style.visibility = "visible";
                    settings.style.opacity = "1";
                    settings.style.transform = "translateX(0)";
                    settings.setAttribute("data-settings-show", "true")
                } else {
                    settings.style.visibility = "hidden";
                    settings.style.opacity = "0";
                    settings.style.transform = "translateX(200px)";
                    settings.removeAttribute("data-settings-show");
                }
            }

            function changeFontSize(value) {
                document.getElementById('font').style.fontSize = value + 'px';
                document.getElementById('font-size-display').textContent = value + 'px';
            }
        </script>
    </body>

    </html>
<?php
} else {
    include "./error.php";
}
?>