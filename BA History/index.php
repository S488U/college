<?php
// Fix: Ensure session is started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['openFolders'])) {
    $_SESSION['openFolders'] = [];
}

require_once __DIR__ . '/../utils/fileLink.php';

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
            if ($entry === 'Question Papers') {
                $courseName = basename($rootDirectory);
                echo '<div class="upload-paper-wrapper mb-2 p-2 rounded" style="background: rgba(56, 189, 248, 0.05); border: 1px dashed rgba(56, 189, 248, 0.3);">
                        <button class="btn btn-sm btn-outline-info w-100 d-flex align-items-center justify-content-center gap-2 py-2" onclick="triggerPaperUpload(event, \'' . htmlspecialchars($courseName) . '\', \'' . htmlspecialchars($relativePath) . '\', this)" style="border-radius: 6px; font-weight: 600; font-size: 0.85rem;">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>Upload Question Paper</span>
                        </button>
                      </div>';
            }
            displayFolderStructure($fullPath, $rootDirectory);

            echo '</div>';
            echo '</div>';
        } else {
            // FILE LOGIC
            $extension = normalizeExtension($entry);
            $baseLink = buildEncodedBaseLink('BA History', $relativePath);
            $viewerHref = buildViewerHref('BA History', $relativePath);
            $icon = getFileIcon($entry);

            echo "<div class='custom-file'>";
            if (isViewableExtension($extension)) {
                echo "<a class='custom-file-link' href='$viewerHref' >$icon" . htmlspecialchars($entry) . "</a>";
            } else {
                echo "<a class='custom-file-link' href='$baseLink' download>$icon" . htmlspecialchars($entry) . "</a>";
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

    function triggerPaperUpload(event, course, relativePath, btn) {
        event.stopPropagation();
        
        // Create file input dynamically
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = '.pdf,.doc,.docx,.png,.jpg,.jpeg,.webp';
        
        fileInput.onchange = function() {
            if (this.files.length === 0) return;
            const file = this.files[0];
            
            if (file.size > 20 * 1024 * 1024) {
                alert('File size exceeds the 20MB limit.');
                return;
            }
            
            const originalContent = btn.innerHTML;
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i>Uploading...';
            
            const formData = new FormData();
            formData.append('file', file);
            formData.append('course', course);
            formData.append('path', relativePath);
            
            fetch('../utils/upload_paper.php', {
                method: 'POST',
                body: formData
            })
            .then(res => {
                if (!res.ok) {
                    throw new Error('HTTP status ' + res.status);
                }
                return res.json();
            })
            .then(data => {
                btn.disabled = false;
                btn.innerHTML = originalContent;
                
                if (data.success) {
                    const contentDiv = btn.closest('.custom-content');
                    if (contentDiv) {
                        const newFileDiv = document.createElement('div');
                        newFileDiv.className = 'custom-file';
                        
                        let fileLinkHtml = '';
                        if (data.isViewable) {
                            fileLinkHtml = `<a class="custom-file-link" href="${data.viewerHref}">${data.iconHtml}${escapeHTML(data.filename)}</a>`;
                        } else {
                            fileLinkHtml = `<a class="custom-file-link" href="${data.baseLink}" download>${data.iconHtml}${escapeHTML(data.filename)}</a>`;
                        }
                        newFileDiv.innerHTML = fileLinkHtml;
                        contentDiv.appendChild(newFileDiv);
                    }
                    
                    alert('File uploaded successfully!');
                } else {
                    alert('Upload failed: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(err => {
                btn.disabled = false;
                btn.innerHTML = originalContent;
                console.error(err);
                alert('An error occurred during upload: ' + err.message);
            });
        };
        
        fileInput.click();
    }

    function escapeHTML(str) {
        return str.replace(/[&<>"']/g, function(m) {
            return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;','\'':'&#39;'}[m];
        });
    }
</script>
