<?php
$upload_dir = "../uploads/";

function list_files_safe($dir) {
    if (!is_dir($dir)) return [];
    $files = array_diff(scandir($dir), array('..', '.'));
    return $files;
}

// Format Bytes
function formatSizeUnits($bytes) {
    if ($bytes >= 1073741824) $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    elseif ($bytes >= 1048576) $bytes = number_format($bytes / 1048576, 2) . ' MB';
    elseif ($bytes >= 1024) $bytes = number_format($bytes / 1024, 2) . ' KB';
    elseif ($bytes > 1) $bytes = $bytes . ' bytes';
    elseif ($bytes == 1) $bytes = $bytes . ' byte';
    else $bytes = '0 bytes';
    return $bytes;
}

if (isset($_POST['delete_file'])) {
    $file_to_delete = $_POST['file_path'];
    if (file_exists($file_to_delete) && is_writable($file_to_delete)) {
        unlink($file_to_delete);
        echo '<div class="alert alert-success alert-dismissible fade show">File deleted successfully. <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show">Error: File could not be deleted. <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    }
}
?>

<div class="glass-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white m-0"><i class="fa-solid fa-folder-open me-2 text-warning"></i>File Manager</h4>
        <span class="badge bg-primary"><?php echo count(list_files_safe($upload_dir)); ?> Files</span>
    </div>

    <div class="table-responsive">
        <table class="table table-dark-glass align-middle">
            <thead>
                <tr>
                    <th style="width: 50px;">Type</th>
                    <th>Filename</th>
                    <th>Size</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $files = list_files_safe($upload_dir);
                
                if (count($files) > 0) {
                    foreach ($files as $file) {
                        $file_path = $upload_dir . $file;
                        $filesize = file_exists($file_path) ? formatSizeUnits(filesize($file_path)) : 'Unknown';
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        
                        // Icon Logic
                        $icon = '<i class="fa-solid fa-file text-secondary fa-lg"></i>';
                        if(in_array($ext, ['zip','rar','7z'])) $icon = '<i class="fa-solid fa-file-zipper text-warning fa-lg"></i>';
                        elseif(in_array($ext, ['pdf'])) $icon = '<i class="fa-solid fa-file-pdf text-danger fa-lg"></i>';
                        elseif(in_array($ext, ['jpg','png','jpeg'])) $icon = '<i class="fa-solid fa-file-image text-info fa-lg"></i>';
                        
                        echo '<tr>
                                <td class="text-center">' . $icon . '</td>
                                <td class="text-white font-monospace">' . htmlspecialchars($file) . '</td>
                                <td class="text-gray small">' . $filesize . '</td>
                                <td class="text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="' . $file_path . '" class="btn btn-sm btn-outline-primary" download title="Download">
                                            <i class="fa-solid fa-download"></i>
                                        </a>
                                        <form method="post" onsubmit="return confirm(\'Permanently delete ' . htmlspecialchars($file) . '?\');" style="display:inline;">
                                            <input type="hidden" name="file_path" value="' . $file_path . '">
                                            <button type="submit" name="delete_file" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-center py-5 text-muted">No files uploaded yet.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>