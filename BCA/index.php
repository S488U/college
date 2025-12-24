<?php
// Fix: Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['openFolders'])) {
    $_SESSION['openFolders'] = [];
}

// ICON HELPER FUNCTION
function getFileIcon($filename) {
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    // Icons list (without prefix)
    $icons = [
        'pdf'  => 'fa-file-pdf text-danger',
        'zip'  => 'fa-file-zipper text-warning',
        'rar'  => 'fa-file-zipper text-warning',
        'py'   => 'fa-python text-info',
        'php'  => 'fa-php text-primary',
        'html' => 'fa-html5 text-danger',
        'css'  => 'fa-css3-alt text-primary',
        'c'    => 'fa-c text-primary',
        'cpp'  => 'fa-c text-primary',
        'java' => 'fa-java text-danger',
        'txt'  => 'fa-file-lines text-secondary',
        'jpg'  => 'fa-image text-info',
        'png'  => 'fa-image text-info',
        'jpeg' => 'fa-image text-info',
        'ppt'  => 'fa-file-powerpoint text-warning',
        'pptx' => 'fa-file-powerpoint text-warning',
        'sql'  => 'fa-database text-warning',
        'doc'  => 'fa-file-word text-primary',
        'docx' => 'fa-file-word text-primary',
        'sh'   => 'fa-terminal text-success',
        'exe'  => 'fa-windows text-primary',
		'mp4' => 'fa-video text-gray',
		'js' => 'fa-square-js text-warning',
    ];

    // File types that use fa-brands
    $brandIcons = [
        'py', 'php', 'html', 'css', 'js', 'c', 'cpp', 'java', 'exe', 'js'
    ];

    // Final icon class
    $iconClass = isset($icons[$ext]) ? $icons[$ext] : 'fa-file text-gray';

    // Pick prefix
	$prefix = (isset($icons[$ext]) && in_array($ext, $brandIcons))
    	? 'fa-brands'
        : 'fa-solid';

    // Special override for C/C++
    if ($ext === 'c' || $ext === 'cpp') {
        $prefix = 'fa-solid';
        $iconClass = 'fa-file-code text-primary';
    }

    return '<i class="' . $prefix . ' ' . $iconClass . ' me-2"></i>';
}

function displayFolderStructure($path, $rootDirectory)
{
    $dir = opendir($path);
    $entries = [];

    while ($file = readdir($dir)) {
        $fullPath = $path . '/' . $file;
        $relativePath = str_replace($rootDirectory, '', $fullPath);

        if ($file == '.' || $file == '..') continue;
        if (pathinfo($file, PATHINFO_EXTENSION) == 'php' && !preg_match('#/LAMP Labs/#', $relativePath)) continue;

        $entries[] = $file;
    }

    closedir($dir);
    sort($entries);

    foreach ($entries as $entry) {
        $fullPath = $path . '/' . $entry;
        $relativePath = str_replace($rootDirectory, '', $fullPath);
        $isOpen = in_array($relativePath, $_SESSION['openFolders']); 

        if (is_dir($fullPath)) {
            // DYNAMIC CLASSES FOR OPEN STATE
            $arrowIcon = $isOpen ? 'fa-chevron-down' : 'fa-chevron-right';
            // Open = Blue Icon, Closed = Amber Icon
            $folderIconClass = $isOpen ? 'fa-folder-open text-primary' : 'fa-folder text-warning'; 
            // Add 'opened-folder' class to wrapper if open
            $activeClass = $isOpen ? 'opened-folder' : '';

            echo '<div class="custom-folder">';
            
            // Trigger Div
            echo '<div class="custom-collapsible ' . $activeClass . '" onclick="toggleFolder(this, \'' . htmlspecialchars($relativePath) . '\')">
                    <div class="d-flex align-items-center text-truncate folder-label">
                        <i class="fa-solid ' . $folderIconClass . ' me-2 folder-icon-dynamic"></i> 
                        <strong class="folder-text">' . $entry . '</strong>
                    </div>
                    <i class="fa-solid ' . $arrowIcon . ' ms-2 arrow-icon"></i>
                  </div>';
            
            // Content Div
            echo '<div class="custom-content" style="display: ' . ($isOpen ? 'block' : 'none') . ';">'; 
            displayFolderStructure($fullPath, $rootDirectory);

            echo '</div>';
            echo '</div>';
        } else {
            // FILE LOGIC
            $allowedExtensions = ["py", "html", "pdf", "txt", "java", "cpp", "c", "sh", "css", "png", "jpeg", "jpg", "webp", "php", 'ppt', 'pptx', 'docx', 'doc', 'sql', 'js'];
            $extension = pathinfo($entry, PATHINFO_EXTENSION);
            $relativePathToComponents = str_replace("/assets", "", dirname($relativePath));
            $encodedRelativePath = implode("/", array_map('rawurlencode', explode("/", $relativePathToComponents)));
            $encodedEntry = rawurlencode($entry);
            $icon = getFileIcon($entry);

            echo "<div class='custom-file'>";
            if (in_array($extension, $allowedExtensions)) {
                echo "<a class='custom-file-link' href='view?file=/BCA$encodedRelativePath/$encodedEntry' >$icon" . htmlspecialchars($entry) . "</a>";
            } else {
                echo "<a class='custom-file-link' href='/BCA/$encodedRelativePath/$encodedEntry' download>$icon" . htmlspecialchars($entry) . "</a>";
            }
            echo "</div>";
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggleFolder'])) {
    $folderPath = $_POST['toggleFolder'];
    if (in_array($folderPath, $_SESSION['openFolders'])) {
        $_SESSION['openFolders'] = array_diff($_SESSION['openFolders'], [$folderPath]); 
    } else {
        $_SESSION['openFolders'][] = $folderPath;
    }
}

$rootDirectory = __DIR__;
?>

<style>
    /* Main Container */
    .custom-container {
        width: 100%;
        max-width: 900px;
        background: rgba(30, 41, 59, 0.4);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .custom-folder, .custom-file {
        background-color: transparent;
        margin-bottom: 2px;
        padding: 0;
    }

    /* --- FOLDER STYLES --- */
    .custom-collapsible {
        display: flex;
        align-items: center;
        justify-content: space-between;
        cursor: pointer;
        font-size: 0.95rem;
        padding: 8px 12px;
        background: rgba(255, 255, 255, 0.02); /* Default dark bg */
        border-radius: 6px;
        border-left: 3px solid transparent; /* Invisible border initially */
        color: #cbd5e1; /* Slightly muted white for closed folders */
        transition: all 0.2s ease;
    }

    .custom-collapsible:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #fff;
    }

    /* OPENED STATE (The Highlighting Logic) */
    .custom-collapsible.opened-folder {
        background: rgba(56, 189, 248, 0.15); /* Blue Tint */
        border-left: 3px solid #38bdf8;       /* Bright Blue Border */
        color: #fff;                          /* Bright White Text */
    }

    /* Arrow Icon - Brighter now */
    .arrow-icon {
        color: #fbbf24; /* Amber 400 - Very Bright Yellow/Orange */
        font-size: 0.8rem;
        opacity: 0.9;
    }

    /* --- FILE STYLES --- */
    .custom-file-link {
        color: #94a3b8;
        text-decoration: none;
        display: flex;
        align-items: center;
        transition: all 0.2s;
        padding: 8px 12px;
        font-size: 0.9rem;
        border-radius: 6px;
    }

    .custom-file-link:hover {
        background: rgba(56, 189, 248, 0.1);
        color: #38bdf8;
        padding-left: 18px;
    }

    .custom-content {
        display: none;
        margin-left: 8px;
        padding-left: 8px;
        border-left: 1px solid rgba(255, 255, 255, 0.1);
        margin-top: 4px;
        margin-bottom: 4px;
    }

    /* Mobile Tweaks */
    @media screen and (max-width: 600px) {
        .custom-container { padding: 10px; }
        .custom-collapsible { padding: 10px 8px; font-size: 0.9rem; }
        .custom-file-link { padding: 10px 8px; font-size: 0.85rem; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .custom-file-link i { display: inline-block; vertical-align: middle; margin-right: 8px; }
        .custom-content { margin-left: 6px; padding-left: 6px; }
    }
</style>

<div class="custom-container">
    <?php displayFolderStructure($rootDirectory, $rootDirectory); ?>
</div>

<script>
    function toggleFolder(element, folderPath) {
        var content = element.nextElementSibling;
        var isOpen = content.style.display === 'block';
        
        // Toggle Visibility
        content.style.display = isOpen ? 'none' : 'block';

        // Toggle Icons & Styles
        var icon = element.querySelector('.arrow-icon');
        var folderIcon = element.querySelector('.folder-icon-dynamic');
        
        if(isOpen) {
            // Closing
            element.classList.remove('opened-folder'); // Remove Highlight
            
            if(icon) { icon.classList.remove('fa-chevron-down'); icon.classList.add('fa-chevron-right'); }
            
            // Switch back to Amber Folder
            if(folderIcon) { 
                folderIcon.classList.remove('fa-folder-open', 'text-primary'); 
                folderIcon.classList.add('fa-folder', 'text-warning'); 
            }
        } else {
            // Opening
            element.classList.add('opened-folder'); // Add Highlight
            
            if(icon) { icon.classList.remove('fa-chevron-right'); icon.classList.add('fa-chevron-down'); }
            
            // Switch to Blue Folder
            if(folderIcon) { 
                folderIcon.classList.remove('fa-folder', 'text-warning'); 
                folderIcon.classList.add('fa-folder-open', 'text-primary'); 
            }
        }

        // Backend Sync
        var formData = new FormData();
        formData.append('toggleFolder', folderPath);
        fetch('', { method: 'POST', body: formData });
    }
</script>