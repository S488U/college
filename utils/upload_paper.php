<?php
header('Content-Type: application/json');

// Ensure session is started if needed
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'error' => 'Invalid request method.']);
    exit;
}

if (!isset($_FILES['file']) || !isset($_POST['course']) || !isset($_POST['path'])) {
    echo json_encode(['success' => false, 'error' => 'Missing required parameters.']);
    exit;
}

$course = $_POST['course'];
$path = $_POST['path']; // e.g. "/SEMESTER_1/Question Papers"

// 1. Validate Course
$allowedCourses = ['BCA', 'MCA', 'IBM', 'BA History'];
if (!in_array($course, $allowedCourses, true)) {
    echo json_encode(['success' => false, 'error' => 'Invalid course.']);
    exit;
}

// 2. Validate Semester path format (e.g. /SEMESTER_1/Question Papers)
if (!preg_match('/^\/SEMESTER_[1-9][0-9]*\/Question Papers$/', $path)) {
    echo json_encode(['success' => false, 'error' => 'Invalid target directory path.']);
    exit;
}

// 3. Resolve and validate directory security
$projectRoot = realpath(__DIR__ . '/../');
$targetDir = realpath($projectRoot . '/' . $course . '/' . $path);

if ($targetDir === false || strpos($targetDir, $projectRoot) !== 0) {
    echo json_encode(['success' => false, 'error' => 'Access denied or target directory does not exist.']);
    exit;
}

if (!is_dir($targetDir)) {
    echo json_encode(['success' => false, 'error' => 'Target is not a valid directory.']);
    exit;
}

// 4. Validate File Upload Status
$file = $_FILES['file'];
if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'error' => 'File upload error code: ' . $file['error']]);
    exit;
}

// 5. Validate File Size (Max 20MB)
$maxSize = 20 * 1024 * 1024;
if ($file['size'] > $maxSize) {
    echo json_encode(['success' => false, 'error' => 'File size exceeds the 20MB limit.']);
    exit;
}

// 6. Validate File Extension
$filename = basename($file['name']);
$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
$allowedExtensions = ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg', 'webp'];

if (!in_array($ext, $allowedExtensions, true)) {
    echo json_encode(['success' => false, 'error' => 'Forbidden file extension. Only documents and images allowed.']);
    exit;
}

// 7. Sanitize Filename
$baseName = pathinfo($filename, PATHINFO_FILENAME);
$cleanBase = preg_replace('/[^A-Za-z0-9_.-]/', '_', $baseName);
$finalFilename = $cleanBase . '.' . $ext;

$targetFile = $targetDir . '/' . $finalFilename;

// Avoid collisions by suffixing time
if (file_exists($targetFile)) {
    $finalFilename = $cleanBase . '_' . time() . '.' . $ext;
    $targetFile = $targetDir . '/' . $finalFilename;
}

// 8. Save the file
if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    // Include the utility to build links and get icon
    require_once __DIR__ . '/fileLink.php';
    
    $fileRelativePath = $path . '/' . $finalFilename;
    $baseLink = buildEncodedBaseLink($course, $fileRelativePath);
    $viewerHref = buildViewerHref($course, $fileRelativePath);
    $isViewable = isViewableExtension($ext);
    $iconHtml = getFileIcon($finalFilename);

    echo json_encode([
        'success' => true,
        'filename' => $finalFilename,
        'baseLink' => $baseLink,
        'viewerHref' => $viewerHref,
        'isViewable' => $isViewable,
        'iconHtml' => $iconHtml
    ]);
} else {
    echo json_encode(['success' => false, 'error' => 'Failed to save uploaded file. Check server write permissions.']);
}
