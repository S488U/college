<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Compiler - SU Study Materials</title>
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preload stylesheet" as="style" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

	<link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js" as="script" crossorigin="anonymous" />
	
    <!-- CodeMirror CSS (Dark Theme) -->
    <link rel="preload stylesheet" as="style" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
    <link rel="preload stylesheet" as="style" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/dracula.min.css">

    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --accent: #38bdf8;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* IDE Container Styles */
        .ide-container {
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        /* Header Bar */
        .ide-header {
            background: #1e293b;
            padding: 10px 15px;
            border-bottom: 1px solid #334155;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ide-title {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            color: #94a3b8;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Run Button */
        .btn-run {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            border: none;
            padding: 5px 15px;
            font-size: 0.85rem;
            border-radius: 4px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .btn-run:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            color: white;
        }

        .btn-run:active { transform: translateY(0); }

        /* CodeMirror Overrides */
        .CodeMirror {
            height: 500px !important;
            font-family: 'Fira Code', monospace;
            font-size: 14px;
            background-color: #0f172a !important; /* Match page bg or slightly lighter */
        }
        
        .CodeMirror-gutters {
            background-color: #0f172a !important;
            border-right: 1px solid #334155;
        }

        /* Output Terminal */
        .terminal-window {
            background: #000;
            border-left: 1px solid #334155;
            color: #10b981; /* Hacker Green */
            font-family: 'Fira Code', monospace;
            padding: 0;
            height: 500px;
            display: flex;
            flex-direction: column;
        }

        .terminal-header {
            background: #1e293b;
            padding: 8px 15px;
            font-size: 0.8rem;
            color: #64748b;
            border-bottom: 1px solid #334155;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .terminal-content {
            padding: 15px;
            overflow-y: auto;
            flex-grow: 1;
            white-space: pre-wrap;
            font-size: 0.9rem;
        }

        /* Loading Spinner */
        .loader {
            border: 2px solid rgba(16, 185, 129, 0.3);
            border-top: 2px solid #10b981;
            border-radius: 50%;
            width: 16px; height: 16px;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .ide-body {
                flex-direction: column;
            }
            .CodeMirror { height: 350px !important; }
            .terminal-window { 
                height: 300px; 
                border-left: none;
                border-top: 5px solid #334155; /* Separator */
            }
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container py-5 mt-4" style="min-height: 80vh;">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-white">Online PHP Compiler</h2>
                    <p class="text-gray">Write, run, and debug PHP code instantly.</p>
                </div>
                
                <!-- Compiler Component Loaded Here -->
                <?php include "../compiler/index.php"; ?>
                
            </div>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    
    <!-- CodeMirror Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/clike/clike.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/xml/xml.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/addon/edit/matchbrackets.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/addon/edit/closebrackets.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/addon/edit/closetag.min.js"></script>

    <?php include "../assets/components/scripts.php"; ?>
</body>
</html>