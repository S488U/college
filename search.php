<?php
// Whitelisted root folders for searching
$whitelistedFolders = ['BCA', 'MCA'];

// Function to recursively search files based on keywords
function searchFiles($dir, $keywords, &$results, $baseUrl) {
    global $whitelistedFolders;

    // Check if the current directory is whitelisted
    $isWhitelisted = false;
    foreach ($whitelistedFolders as $folder) {
        if (stripos($dir, DIRECTORY_SEPARATOR . $folder) !== false) {
            $isWhitelisted = true;
            break;
        }
    }
    if (!$isWhitelisted) {
        return;
    }

    // Open the directory
    if ($handle = opendir($dir)) {
        while (($entry = readdir($handle)) !== false) {
            // Skip "." and ".."
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            $fullPath = $dir . DIRECTORY_SEPARATOR . $entry;

            // If it's a directory, search recursively
            if (is_dir($fullPath)) {
                searchFiles($fullPath, $keywords, $results, $baseUrl);
            } else {
                // Check if all keywords are in the file path
                $filePath = str_replace(DIRECTORY_SEPARATOR, '/', $fullPath);
                $matches = true;
                foreach ($keywords as $keyword) {
                    if (stripos($filePath, $keyword) === false) {
                        $matches = false;
                        break;
                    }
                }

                // Add to results if all keywords match
                if ($matches) {
                    $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', $filePath);
                    $url = $baseUrl . str_replace(' ', '%20', $relativePath);
                    $results[] = $url;
                }
            }
        }
        closedir($handle);
    }
}

// Process the search query
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    $keywords = array_filter(explode(' ', $searchQuery)); // Split query into keywords
    $results = [];
    $rootDir = __DIR__; // Root directory to start searching
    $baseUrl = "https://su.dunite.tech"; // Base URL for results

    // Perform the search
    searchFiles($rootDir, $keywords, $results, $baseUrl);

    // Return the results as JSON
    header('Content-Type: application/json');
    echo json_encode($results);
    exit;
}
?>
