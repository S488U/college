<?php

function getViewableExtensions() {
    return [
        'py', 'html', 'pdf', 'txt', 'java', 'cpp', 'c', 'sh', 'css',
        'png', 'jpeg', 'jpg', 'webp', 'php', 'ppt', 'pptx', 'docx', 'doc',
        'sql', 'js'
    ];
}

function normalizeExtension($filenameOrExtension) {
    // Accept either a filename (e.g. demo.PDF) or a raw extension (e.g. PDF).
    if (strpos($filenameOrExtension, '.') !== false) {
        return strtolower(pathinfo($filenameOrExtension, PATHINFO_EXTENSION));
    }
    return strtolower(ltrim($filenameOrExtension, '.'));
}

function isViewableExtension($filenameOrExtension) {
    return in_array(normalizeExtension($filenameOrExtension), getViewableExtensions(), true);
}

function buildEncodedBaseLink($coursePrefix, $relativePath) {
    $cleanPath = ltrim($relativePath, '/');
    $segments = explode('/', $cleanPath);
    $encodedSegments = array_map('rawurlencode', $segments);
    $encodedPath = implode('/', $encodedSegments);
    return '/' . trim($coursePrefix, '/') . '/' . $encodedPath;
}

function buildViewerHref($coursePrefix, $relativePath) {
    return 'view?file=' . buildEncodedBaseLink($coursePrefix, $relativePath);
}

function buildDownloadHref($coursePrefix, $relativePath) {
    return buildEncodedBaseLink($coursePrefix, $relativePath);
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
        'mp4'  => 'fa-video text-gray',
        'js'   => 'fa-square-js text-warning',
    ];

    // File types that use fa-brands
    $brandIcons = [
        'py', 'php', 'html', 'css', 'js', 'c', 'cpp', 'java', 'exe'
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

