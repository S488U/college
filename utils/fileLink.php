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

