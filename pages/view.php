<?php
// Prevent caching
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");

function retrieveAfterLastSlash($url) {
    return basename($url);
}

if (isset($_GET['file'])) {
    $fileUrl = $_GET['file']; // This is DECODED by PHP (e.g. "C# & .Net")
    
    // Security check
    $pattern = "/^\/(BCA|MCA|IBM)\/.*/";
    if (!preg_match($pattern, $fileUrl)) {
        header("Location: ./error.php");
        exit;
    }

    function getFileName($path) {
        return basename($path);
    }
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo getFileName($fileUrl) . " | SU Study Material"; ?></title>
        
        <link href="../assets/theme/prism.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/style/scrollbar.css?v=<?php echo time() ?>">
        
        <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
        
        <script defer src="../assets/theme/prism.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mammoth/1.6.0/mammoth.browser.min.js"></script>
        
        <?php include "./g-tag.php"; ?>

        <style>
            /* ... (Keep existing CSS) ... */
            :root {
                --page-bg: #0f172a;
                --text-main: #e2e8f0;
                --glass-bg: rgba(30, 41, 59, 0.7); 
                --glass-border: rgba(255, 255, 255, 0.08);
                --code-bg: #1e293b;
                --accent: #38bdf8;
            }

            body {
                background-color: var(--page-bg);
                color: var(--text-main);
                font-family: 'Inter', sans-serif;
                overflow-x: hidden;
            }

            .view-header {
                background: rgba(15, 23, 42, 0.95);
                backdrop-filter: blur(10px);
                border-bottom: 1px solid var(--glass-border);
                position: sticky;
                top: 70px;
                z-index: 800;
                padding: 10px 0;
                margin-bottom: 20px;
                transition: all 0.3s ease;
            }

            .back-btn {
                color: var(--text-main);
                text-decoration: none;
                font-size: 1rem;
                display: flex;
                align-items: center;
                gap: 8px;
            }
            .back-btn:hover { color: var(--accent); }

            .download-btn {
                background: linear-gradient(135deg, #3b82f6, #8b5cf6);
                color: white;
                border: none;
                width: 35px; height: 35px;
                border-radius: 50%;
                display: flex; align-items: center; justify-content: center;
                transition: transform 0.2s;
            }
            .download-btn:hover { transform: scale(1.1); color: white; }

            #main-code-container {
                border-radius: 12px;
                overflow: hidden;
                border: 1px solid var(--glass-border);
                background: var(--code-bg);
                box-shadow: 0 10px 30px rgba(0,0,0,0.3);
                position: relative;
            }

            .code-toolbar {
                background: #0f172a;
                padding: 8px 15px;
                border-bottom: 1px solid #334155;
                display: flex;
                justify-content: space-between;
                align-items: center;
                height: 44px;
            }

            .mac-dots { display: flex; gap: 6px; }
            .dot { width: 10px; height: 10px; border-radius: 50%; }
            .dot-red { background: #ef4444; }
            .dot-yellow { background: #f59e0b; }
            .dot-green { background: #10b981; }

            .file-path-display {
                font-family: 'Fira Code', monospace;
                font-size: 0.8rem;
                color: #64748b;
                opacity: 0.8;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                max-width: 50%;
            }

            .tool-actions button {
                background: transparent;
                border: none;
                color: #94a3b8;
                font-size: 0.9rem;
                margin-left: 8px;
                transition: color 0.2s;
                padding: 5px;
            }
            .tool-actions button:hover { color: var(--accent); }

            code[class*="language-"], pre[class*="language-"] {
                font-family: 'Fira Code', monospace !important;
                font-size: 14px !important;
                line-height: 24px !important;
                direction: ltr;
                text-align: left;
                white-space: pre;
                word-spacing: normal;
                word-break: normal;
                tab-size: 4;
                hyphens: none;
                text-shadow: none !important;
            }

            pre[class*="language-"] {
                padding: 15px !important;
                padding-left: 3.8em !important;
                margin: 0 !important;
                background: transparent !important;
                overflow: auto;
                overscroll-behavior-x: contain; 
            }

            .line-numbers .line-numbers-rows {
                border-right: 1px solid rgba(255, 255, 255, 0.1);
                top: 0 !important;
                padding-top: 15px !important;
                background: rgba(15, 23, 42, 0.4);
                width: 3em !important;
            }
            
            .line-numbers-rows > span {
                counter-increment: linenumber;
                pointer-events: none;
                display: block;
                padding-right: 0.8em;
            }

            .fsSettings {
                position: absolute;
                top: 40px; right: 5px;
                background: #334155;
                padding: 10px;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.5);
                z-index: 100;
                display: none;
                border: 1px solid #475569;
                min-width: 150px;
            }
            .fsSettings.show { display: block; animation: fadeIn 0.2s; }
            
            #main-code-container[data-fullscreen="true"] {
                position: fixed; top: 0; left: 0; width: 100vw; height: 100vh;
                z-index: 9999; border-radius: 0;
            }

            .viewer-container {
                background: white;
                border-radius: 8px;
                overflow: hidden;
                margin-bottom: 40px;
            }

            @media (max-width: 576px) {
                .view-header { top: 60px; padding: 5px 0; background: rgba(15, 23, 42, 0.98); }
                .container { padding-left: 10px; padding-right: 10px; }
                .mac-dots, .file-path-display { display: none; }
                .code-toolbar { height: 35px; padding: 0 10px; justify-content: flex-end; }
                code[class*="language-"], pre[class*="language-"] { font-size: 11px !important; line-height: 18px !important; }
                pre[class*="language-"] { padding: 10px !important; padding-left: 3.5em !important; }
                .line-numbers .line-numbers-rows { padding-top: 10px !important; }
            }

            @keyframes fadeIn { from { opacity: 0; transform: translateY(-5px); } to { opacity: 1; transform: translateY(0); } }
        </style>
    </head>

    <body>
        <?php include "../assets/components/navbar.php"; ?>
        
        <div class="container-fluid view-header">
            <div class="container d-flex justify-content-between align-items-center">
                <a href="javascript:window.history.back();" class="back-btn">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    <h6 class="m-0 ms-2 text-truncate" style="max-width: 220px;"><?php echo getFileName($fileUrl); ?></h6>
                </a>
                
                <!-- CRITICAL FIX: Encode the download link too -->
                <?php 
                    $urlParts = explode('/', ltrim($fileUrl, '/'));
                    $encodedParts = array_map('rawurlencode', $urlParts);
                    $encodedDownloadPath = '/' . implode('/', $encodedParts);
                ?>
                <a href="<?php echo $encodedDownloadPath; ?>" download class="download-btn" data-bs-toggle="tooltip" title="Download File">
                    <i class="fa-solid fa-download fa-sm"></i>
                </a>
            </div>
        </div>

        <div class="container pb-5" style="min-height: 70vh;">
            
            <?php
            // Use DECODED path for server file system check
            $fileLocation = $_SERVER['DOCUMENT_ROOT'] . $fileUrl;

            if (file_exists($fileLocation) && is_readable($fileLocation)) {
                $fileExtension = strtolower(pathinfo($fileLocation, PATHINFO_EXTENSION));
                $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
                
                // --- CRITICAL FIX: RE-ENCODE PATH FOR BROWSER URLS ---
                // We split the decoded path by slash, URL-encode each segment (spaces->%20, #->%23), then rejoin
                // This ensures browsers and fetch() handle the URL correctly.
                $urlSegments = explode('/', ltrim($fileUrl, '/')); // remove leading slash to avoid empty first element issues in loop
                $encodedSegments = array_map('rawurlencode', $urlSegments);
                $encodedPath = '/' . implode('/', $encodedSegments);
                
                $webUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $encodedPath;

                switch ($fileExtension) {
                    case 'pdf':
                        echo "<div class='viewer-container shadow'>
                                <iframe loading='lazy' src='$webUrl' width='100%' height='600' style='border:none;'></iframe>
                              </div>";
                        break;

                    case 'docx':
                        echo "
                        <div id='docx-container' class='viewer-container p-3 p-md-5 shadow' style='background:white; color:#333;'>
                            <div class='text-center text-muted py-5'>
                                <div class='spinner-border text-primary' role='status'></div>
                                <p class='mt-3'>Rendering Document...</p>
                            </div>
                        </div>
                        <script>
                            fetch('$webUrl')
                                .then(response => {
                                    if (!response.ok) throw new Error('Network response was not ok');
                                    return response.arrayBuffer();
                                })
                                .then(arrayBuffer => mammoth.convertToHtml({arrayBuffer: arrayBuffer}))
                                .then(result => {
                                    document.getElementById('docx-container').innerHTML = result.value;
                                })
                                .catch(err => {
                                    console.error(err);
                                    document.getElementById('docx-container').innerHTML = '<div class=\"alert alert-warning\">Preview failed. Please download the file.</div>';
                                });
                        </script>";
                        break;

                    case 'pptx':
                    case 'ppt':
                    case 'doc': 
                        // Google docs viewer needs the URL encoded again as a parameter
                        $googleUrl = urlencode($webUrl);
                        echo "<div class='viewer-container shadow'>
                                <iframe loading='lazy' src='https://docs.google.com/gview?url=$googleUrl&embedded=true' width='100%' height='600' style='border:none;'></iframe>
                              </div>";
                        break;

                    case 'jpeg':
                    case 'jpg':
                    case 'webp':
                    case 'png':
                        echo "<div class='text-center my-4'>
                                <img src='$webUrl' class='img-fluid rounded shadow' style='max-height: 70vh; border: 1px solid #334155;'>  
                              </div>";
                        break;

                    default:
                        $fileContent = htmlspecialchars(trim(file_get_contents($fileLocation)));
                        
                        if ($fileExtension == "php") {
                            date_default_timezone_set('Asia/Kolkata');
                            echo '
                                <div class="mb-3 text-end">
                                    <button onclick="showOutput()" class="btn btn-primary btn-sm rounded-pill px-3">
                                        <i class="fa-solid fa-play me-2"></i> Run Code
                                    </button>
                                </div>
                                <script>
                                function showOutput() {
                                    // Use encoded path for run link
                                    window.open("../output/output.php?pg=' . $encodedPath . '&id=' . date("hisAdmY") . '", "_blank");
                                };
                                </script>   
                            ';
                        }

                        echo "<div id='main-code-container'>
                                <div class='code-toolbar'>
                                    <div class='mac-dots'>
                                        <div class='dot dot-red'></div>
                                        <div class='dot dot-yellow'></div>
                                        <div class='dot dot-green'></div>
                                    </div>
                                    <div class='file-path-display'>$fileUrl</div>
                                    <div class='tool-actions'>
                                        <button onclick='copyCode()' id='copyBtn' title='Copy'><i class='fa-regular fa-copy'></i></button>
                                        <button onclick='toggleFsSettings()' title='Font'><i class='fa-solid fa-text-height'></i></button>
                                        <button onclick='toggleFullscreen()' title='Expand'><i class='fa-solid fa-expand'></i></button>
                                        <div class='fsSettings' id='fsSettings'>
                                            <label class='text-white small mb-1 d-block'>Size: <span id='fsVal'>14px</span></label>
                                            <input type='range' class='form-range' min='10' max='24' value='14' oninput='changeFontSize(this.value)'>
                                        </div>
                                    </div>
                                </div>
                                <pre class='line-numbers' style='padding-top: 0 !important;'><code class='language-$fileExtension' id='codeBlock'>$fileContent</code></pre>
                            </div>";
                        break;
                }
            } else {
                // 404 Handling (Same as before)
                $developer_jokes = [
                    "Why do programmers prefer dark mode? Because light attracts bugs!",
                    "Why did the developer go broke? Because he lost his domain in a bet!",
                    "How do you comfort a JavaScript bug? You console it!",
                    "A SQL query walks into a bar, asks two tables: 'Can I join you?'"
                ];
                $random_joke = $developer_jokes[array_rand($developer_jokes)];
                http_response_code(404);

                $errorJSON = json_encode([
                    "error" => [
                        "code" => 404,
                        "message" => "File not found",
                        "funFact" => $random_joke
                    ]
                ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

                echo "
                    <div class='container mt-4'>
                        <div id='main-code-container' style='border-color: #ef4444;'>
                             <div class='code-toolbar'>
                                <div class='mac-dots'><div class='dot dot-red'></div></div>
                                <div class='text-danger small'>Error 404</div>
                             </div>
                             <pre><code class='language-json' style='color: #fca5a5;'>$errorJSON</code></pre>
                        </div>
                        <div class='text-center mt-4'>
                            <a href='javascript:history.back()' class='btn btn-outline-light btn-sm rounded-pill'>Go Back</a>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>

        <?php include "../assets/components/footer.php"; ?>
        <?php include "../assets/components/checkApprove.php"; ?>
        <?php include "../assets/components/scripts.php"; ?>
        
        <script>
            function copyCode() {
                const codeBlock = document.getElementById('codeBlock');
                const btn = document.getElementById('copyBtn');
                if(codeBlock) {
                    navigator.clipboard.writeText(codeBlock.innerText).then(() => {
                        const originalIcon = btn.innerHTML;
                        btn.innerHTML = '<i class="fa-solid fa-check text-success"></i>';
                        setTimeout(() => { btn.innerHTML = originalIcon; }, 2000);
                    });
                }
            }

            function toggleFsSettings() {
                document.getElementById('fsSettings').classList.toggle('show');
            }

            function changeFontSize(val) {
                const codeBlock = document.getElementById('codeBlock');
                const label = document.getElementById('fsVal');
                
                if(codeBlock) {
                    codeBlock.style.fontSize = val + 'px';
                    let newHeight = Math.floor(parseInt(val) * 1.7) + 'px';
                    codeBlock.style.lineHeight = newHeight;
                    codeBlock.parentElement.style.lineHeight = newHeight;
                    label.textContent = val + 'px';
                }
            }

            function toggleFullscreen() {
                const container = document.getElementById('main-code-container');
                const isFullscreen = container.getAttribute('data-fullscreen') === 'true';
                if (!isFullscreen) {
                    container.setAttribute('data-fullscreen', 'true');
                    container.style.overflow = 'auto';
                } else {
                    container.setAttribute('data-fullscreen', 'false');
                    container.style.overflow = 'hidden';
                }
            }

            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                })
            });
        </script>
    </body>
    </html>
<?php
} else {
    echo "<script>window.location.href='/';</script>";
}
?>