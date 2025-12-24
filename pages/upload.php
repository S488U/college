<?php
// PHP LOGIC -----------------------------------------
$msgError = "";
$alertType = ""; // 'success' or 'danger'

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_FILES['files']['name'][0])) {
        $upload_dir = '../uploads/';
        
        // Ensure upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $valid_extensions = array('zip', 'rar');
        $max_size = 64 * 1024 * 1024; // 64 MB
        $hasError = false;

        foreach ($_FILES['files']['name'] as $key => $name) {
            $tmp_name = $_FILES['files']['tmp_name'][$key];
            $size = $_FILES['files']['size'][$key];
            $error = $_FILES['files']['error'][$key];

            if ($error !== UPLOAD_ERR_OK) {
                $msgError = "Error uploading file: " . $name;
                $alertType = "danger";
                $hasError = true;
                break;
            }

            // Validate Extension
            $file_extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));
            if (!in_array($file_extension, $valid_extensions)) {
                $msgError = "Invalid file type ($name). Only .zip and .rar allowed.";
                $alertType = "danger";
                $hasError = true;
                break;
            }

            // Validate Size
            if ($size > $max_size) {
                $msgError = "File ($name) exceeds the 64MB limit.";
                $alertType = "danger";
                $hasError = true;
                break;
            }

            // Sanitize and Move
            $new_name = preg_replace('/[^A-Za-z0-9_.-]/', '_', $name);
            $final_name = time() . '_' . $new_name; 
            
            if (!move_uploaded_file($tmp_name, $upload_dir . $final_name)) {
                $msgError = "Failed to move uploaded file.";
                $alertType = "danger";
                $hasError = true;
                break;
            }
        }

        if (!$hasError) {
            $msgError = "Files uploaded successfully! Thank you for contributing.";
            $alertType = "success";
        }
    } else {
        $msgError = "No files were selected.";
        $alertType = "warning";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Study Materials - SU Study Materials</title>
    
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
 
    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
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

        .upload-title {
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
        }

        /* UPLOAD ZONE STYLES */
        .upload-zone {
            border: 2px dashed rgba(56, 189, 248, 0.3);
            border-radius: 12px;
            padding: 2.5rem;
            text-align: center;
            background: rgba(15, 23, 42, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            min-height: 250px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        /* State: Hover / Drag Over */
        .upload-zone.drag-over, 
        .upload-zone:hover {
            border-color: var(--accent);
            background: rgba(56, 189, 248, 0.05);
        }

        /* State: Files Selected */
        .upload-zone.files-present {
            border-style: solid;
            border-color: #10b981; /* Green */
            background: rgba(16, 185, 129, 0.05);
        }

        .upload-icon {
            font-size: 3rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }

        .upload-zone:hover .upload-icon {
            transform: translateY(-5px);
            color: var(--accent);
        }

        /* Input overlay */
        #fileInput {
            opacity: 0;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            z-index: 10;
        }

        /* File List Preview */
        .file-list-preview {
            width: 100%;
            max-width: 400px;
            text-align: left;
        }

        .file-item {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fadeIn 0.3s ease;
        }

        .file-item i { color: #38bdf8; margin-right: 10px; }
        .file-size { font-size: 0.8rem; color: #94a3b8; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Guidelines Box */
        .guidelines {
            background: rgba(234, 179, 8, 0.1); /* Yellow tint */
            border: 1px solid rgba(234, 179, 8, 0.2);
            border-radius: 12px;
            color: #fef08a; /* Light yellow text */
        }

        /* Buttons */
        .btn-upload {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border: none;
            color: white;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
        }
        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
            color: white;
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container py-5 my-4" style="min-height: 70vh;">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                
                <!-- Alert Feedback -->
                <?php if ($msgError): ?>
                    <div class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show mb-4" role="alert">
                        <?php if($alertType == 'success') echo '<i class="fa-solid fa-circle-check me-2"></i>'; ?>
                        <?php if($alertType == 'danger') echo '<i class="fa-solid fa-circle-exclamation me-2"></i>'; ?>
                        <?php echo $msgError; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="glass-card p-4 p-md-5">
                    <h1 class="upload-title text-center mb-4">Share Knowledge</h1>
                    <p class="text-center text-gray mb-5">
                        Upload study materials to help your peers. Please ensure files are organized before uploading.
                    </p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" id="uploadForm">
                        
                        <!-- INTERACTIVE UPLOAD ZONE -->
                        <div class="upload-zone mb-4" id="dropZone">
                            <input type="file" name="files[]" id="fileInput" multiple accept=".zip, .rar" required>
                            
                            <!-- State 1: Default View -->
                            <div id="defaultView">
                                <i class="fa-solid fa-cloud-arrow-up upload-icon"></i>
                                <h5 class="text-white mb-2">Click or Drag files here</h5>
                                <p class="text-muted small mb-0">Supported: .zip, .rar</p>
                            </div>

                            <!-- State 2: Files Selected View (Hidden initially) -->
                            <div id="filePreview" class="file-list-preview" style="display: none;">
                                <div class="text-center mb-3">
                                    <i class="fa-solid fa-circle-check text-success fs-3 mb-2"></i>
                                    <h6 class="text-white">Files Ready to Upload</h6>
                                </div>
                                <div id="fileListContainer">
                                    <!-- JS will inject files here -->
                                </div>
                                <p class="text-center text-muted small mt-2">Click to change selection</p>
                            </div>
                        </div>

                        <!-- GUIDELINES (Reverted to text style) -->
                        <div class="guidelines p-3 mb-4">
                            <h6 class="text-uppercase fw-bold mb-3" style="color: #fbbf24; font-size: 0.85rem; letter-spacing: 1px;">
                                <i class="fa-solid fa-triangle-exclamation me-2"></i>Instructions
                            </h6>
                            <p class="mb-2 small">Upload the file as a <strong>.zip</strong> or <strong>.rar</strong> and include a file called <strong>readme.txt</strong>.</p>
                            <p class="mb-2 small">In <strong>readme.txt</strong>, include information about the department's study materials, semester, and any additional details regarding the provided materials.</p>
                            <p class="mb-0 small">Max size for uploading is <strong>64 MB</strong>.</p>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-upload" type="submit">
                                <i class="fa-solid fa-paper-plane me-2"></i> Upload Materials
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="https://kit.fontawesome.com/4145934b9b.js" crossorigin="anonymous"></script>

    <!-- ENHANCED UX SCRIPT -->
    <script>
        const fileInput = document.getElementById('fileInput');
        const dropZone = document.getElementById('dropZone');
        const defaultView = document.getElementById('defaultView');
        const filePreview = document.getElementById('filePreview');
        const fileListContainer = document.getElementById('fileListContainer');

        // highlight drag area
        fileInput.addEventListener('dragenter', () => dropZone.classList.add('drag-over'));
        fileInput.addEventListener('dragleave', () => dropZone.classList.remove('drag-over'));
        fileInput.addEventListener('drop', () => dropZone.classList.remove('drag-over'));

        // Handle File Selection
        fileInput.addEventListener('change', function() {
            const files = this.files;
            
            if (files.length > 0) {
                // Switch UI State
                dropZone.classList.add('files-present');
                defaultView.style.display = 'none';
                filePreview.style.display = 'block';
                
                // Clear previous list
                fileListContainer.innerHTML = '';

                // Generate List
                Array.from(files).forEach(file => {
                    // Calculate size in MB or KB
                    let size = file.size / 1024;
                    let sizeText = size > 1024 ? (size/1024).toFixed(2) + ' MB' : Math.round(size) + ' KB';

                    const item = document.createElement('div');
                    item.className = 'file-item';
                    item.innerHTML = `
                        <div class="d-flex align-items-center text-white text-truncate" style="max-width: 70%;">
                            <i class="fa-regular fa-file-zipper"></i>
                            <span class="text-truncate">${file.name}</span>
                        </div>
                        <span class="file-size">${sizeText}</span>
                    `;
                    fileListContainer.appendChild(item);
                });
            } else {
                // Revert UI State if cancelled
                dropZone.classList.remove('files-present');
                defaultView.style.display = 'block';
                filePreview.style.display = 'none';
            }
        });
    </script>
</body>

</html>