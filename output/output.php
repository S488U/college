<?php
$program = "";
$programId = "";
$newRoute = "";
$msg = "";
$msgType = "danger"; // For UI styling

// 1. Process Logic
if (isset($_GET["pg"]) && isset($_GET["id"])) {
    $program = $_GET["pg"];
    $programId = $_GET["id"];
    
    // Validate Input to prevent directory traversal
    // (Basic check to ensure we stay within known directories if needed, 
    // but relying on existing logic as requested)
    
    $newRoute = getFileContent($program, $programId);
} else {
    $msg = "Invalid Request. No program specified.";
    $msgType = "warning";
}

function getFileContent($pg, $pgId) {
    global $msg, $msgType;
    
    // Security: Validate path roughly
    $programPath = $_SERVER["DOCUMENT_ROOT"] . '/' . $pg; 
    
    if (!file_exists($programPath)) {
        $msg = "Source file not found.";
        return "";
    }

    $fileContent = file_get_contents($programPath);

    // Validate content
    try {
        $fileContent = sanitizeContent($fileContent);
    } catch (Exception $e) {
        $msg = $e->getMessage();
        $msgType = "danger";
        return "";
    }

    if (createTmpFile($pgId, $fileContent)) {
        // Return web-accessible path
        return "/output/allFiles/" . $pgId . ".php"; 
    }
    return "";
}

function sanitizeContent($content) {
    // Block potentially harmful execution functions for security
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
        '/mysqli_connect\(/i',
        '/pdo\(/i'
    ];

    foreach ($dangerousPatterns as $pattern) {
        if (preg_match($pattern, $content)) {
            throw new Exception("Security Alert: Use of forbidden functions detected.");
        }
    }

    // Limit comments to prevent abuse/spam in processed files (Architecture requirement)
    if (preg_match_all('/\/\*.*?\*\/|\/\/.*?(\n|$)|#.*?(\n|$)/s', $content) > 5) {
        throw new Exception("Too many comments detected! Please clean up the code.");
    }

    return $content;
}

function createTmpFile($pgId, $fileContent) {
    global $msg;
    $dirPath = "./allFiles/";
    
    // Ensure directory exists
    if (!is_dir($dirPath)) {
        if (!mkdir($dirPath, 0755, true)) {
            $msg = "Server Error: Could not create output directory.";
            return false;
        }
    }

    $tmpFileName = $pgId . '.php';
    $filePath = $dirPath . $tmpFileName;
    
    $tmpFile = fopen($filePath, "w");

    if ($tmpFile) {
        fwrite($tmpFile, $fileContent);
        fclose($tmpFile);
        return true;
    } else {
        $msg = "Server Error: Failed to create temporary execution file.";
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Output Console - Srinivas University</title>

    <meta property="og:type" content="website" />
    <meta name="description" content="View the output of your code execution.">
    
    <!-- Styles & Fonts -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <script src="../assets/script/navbar.js"></script>
    <?php include "../pages/g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --glass-bg: rgba(30, 41, 59, 0.7); 
            --glass-border: rgba(255, 255, 255, 0.08);
            --accent: #38bdf8;
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        /* Hero Text */
        .page-title {
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        /* Output Window Container */
        .window-container {
            background: white; /* Content usually expects white background */
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 50px -10px rgba(0,0,0,0.5);
            border: 1px solid #334155;
            transition: transform 0.3s ease;
        }

        /* Window Header (Mac Style) */
        .window-header {
            background: #1e293b;
            padding: 10px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #334155;
        }

        .window-controls {
            display: flex;
            gap: 8px;
        }
        .control-dot { width: 12px; height: 12px; border-radius: 50%; }
        .dot-red { background: #ef4444; }
        .dot-yellow { background: #f59e0b; }
        .dot-green { background: #10b981; }

        .window-title {
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            color: #94a3b8;
            opacity: 0.8;
        }

        .window-actions button {
            background: transparent;
            border: none;
            color: #94a3b8;
            transition: color 0.2s;
        }
        .window-actions button:hover { color: white; }

        /* The Iframe */
        iframe {
            width: 100%;
            height: 600px; /* Default height */
            border: none;
            display: block;
            background: #ffffff;
        }

        /* Error Box */
        .error-box {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <main class="container d-flex flex-column align-items-center gap-4 mt-5 mb-5 p-md-5">
        
        <div class="text-center">
            <h1 class="page-title">Program Output</h1>
            <p class="text-gray small">
                Results generated from the executed script.
            </p>
        </div>

        <div class="container-fluid d-flex flex-column align-items-center">
            
            <?php if (!empty($newRoute)) { ?>
                
                <!-- Info Alert -->
                <div class="alert alert-info d-flex align-items-center gap-2 py-2 px-3 rounded-pill mb-4 fade show" role="alert" style="font-size: 0.9rem; border: 1px solid rgba(56, 189, 248, 0.2); background: rgba(56, 189, 248, 0.05); color: #bae6fd;">
                    <i class="fa-solid fa-clock"></i>
                    <span>Output link expires in <strong>every sunday</strong>.</span>
                </div>

                <!-- Browser Window UI -->
                <div class="window-container w-100" style="max-width: 1000px;">
                    <div class="window-header">
                        <div class="window-controls">
                            <div class="control-dot dot-red"></div>
                            <div class="control-dot dot-yellow"></div>
                            <div class="control-dot dot-green"></div>
                        </div>
                        <div class="window-title d-none d-md-block">output_console.php</div>
                        <div class="window-actions">
                            <button onclick="document.getElementById('responsiveIframe').contentWindow.location.reload();" title="Refresh Output">
                                <i class="fa-solid fa-rotate-right"></i>
                            </button>
                            <button onclick="window.open('<?php echo $newRoute; ?>', '_blank')" title="Open in New Tab" class="ms-2">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </button>
                        </div>
                    </div>
                    <iframe id="responsiveIframe" src="<?php echo $newRoute; ?>"></iframe>
                </div>

            <?php } else { ?>
                
                <!-- Error State -->
                <div class="error-box w-100" style="max-width: 600px;">
                    <i class="fa-solid fa-triangle-exclamation fa-3x mb-3 text-danger"></i>
                    <h4 class="text-white mb-2">Execution Failed</h4>
                    <p class="mb-0"><?php echo $msg; ?></p>
                    <div class="mt-4">
                        <a href="javascript:history.back()" class="btn btn-outline-light rounded-pill px-4">Go Back</a>
                    </div>
                </div>

            <?php } ?>
        </div>
    </main>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
    
    <!-- Iframe Dynamic Resizing (Optional, mostly handled by CSS now) -->
    <script>
        // If we want to dynamically adjust height based on content (Cross-domain limits may apply)
        const iframe = document.getElementById('responsiveIframe');
        if(iframe) {
            iframe.onload = function() {
                // If the output creates a scrollbar, CSS handles it. 
                // Just ensuring it focuses correctly.
            };
        }
    </script>
</body>

</html>