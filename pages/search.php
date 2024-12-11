<?php
header('Content-Type: application/json');

// Function to recursively search files in directories
function searchFiles($dir, $query, &$results) {
    if ($handle = opendir($dir)) {
        while (($entry = readdir($handle)) !== false) {
            if ($entry === '.' || $entry === '..') continue;

            $fullPath = $dir . DIRECTORY_SEPARATOR . $entry;
            if (is_dir($fullPath)) {
                searchFiles($fullPath, $query, $results);
            } else {
                if (stripos($entry, $query) !== false) {
                    $results[] = $fullPath;
                }
            }
        }
        closedir($handle);
    }
}

// Handle the search query
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $rootDir = realpath(dirname(__DIR__)); 
    $results = [];
    searchFiles($rootDir, $searchQuery, $results);

    // Return results as JSON
    echo json_encode($results);
    exit;
}

// Return an empty array if no query
echo json_encode([]);
exit;