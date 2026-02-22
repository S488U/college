<?php

header('Content-Type: application/json');

// ================= CONFIGURATION =================

// 1. EXTENSIONS TO BLOCK (Strict Security)
// We allow php, js, css, but block system configs, database exports, and environment files.
$blocked_extensions = ['sql', 'env', 'htaccess', 'ini', 'log', 'config', 'json', 'xml', 'o', 'obj', 'class', 'exe', 'dll', 'so', 'a', 'lib', 'layout', 'cbp', 'depend'];

// 2. DIRECTORIES TO IGNORE (Recursive Block)
// Prevent searching inside your website's own source code folders.
// Add any folder here that contains site logic rather than study materials.
$blocked_directories = [
    'assets',
    'bin',
    'vendor',
    '.git',
    'includes',
    'components',
    'private',
    'cgi-bin',
	'pages',
	'output',
	'compiler',
	'admin',
	'utils',
	'api',
	'dumbcli',
];

// 3. SPECIFIC FILENAMES TO BLOCK
// Files that might exist in allowed folders but shouldn't be seen.
$blocked_filenames = [
    'search.php',
    'navbar.php', 
    'footer.php', 
    'header.php', 
    'g-tag.php', 
    'checkApprove.php',
    'db_connect.php',
    'index.php',
	'index1.php',
	'index copy.php',
	'load_env.php',
];

// 4. SPECIFIC RELATIVE PATHS TO BLOCK
// If a file doesn't fit the rules above but you want to hide it specifically.
// format: /folder/filename.ext
$blocked_relative_paths = [
    '/dashboard.php',
    '/admin/login.php',
    '/BCA/index.php',
	'/MCA/view.php',
];

// ================= END CONFIGURATION =================

// Helper: Normalize string (turn "Semester_2" into "semester 2")
function normalize($str) {
    // Replace underscores and dashes with spaces
    $str = str_replace(['_', '-'], ' ', $str);
    // Remove extra spaces
    $str = preg_replace('/\s+/', ' ', $str);
    return strtolower(trim($str));
}

function calculateScore($webPath, $fileName, $rawQuery) {
    $score = 0;
    
    // 1. Prepare Data
    $normPath = normalize($webPath);    // e.g. "/bca/semester 2/java/..."
    $normFile = normalize($fileName);   // e.g. "lab program 2.java"
    $normQuery = normalize($rawQuery);  // e.g. "semester 2"
    
    $keywords = explode(' ', $normQuery);
    $keywords = array_filter($keywords);

    // 2. CRITERIA 1: THE GOLDEN FOLDER (Massive Boost)
    // Does the path contain the exact phrase "semester 2" as a folder segment?
    // We wrap in spaces to ensure we match whole words in the path structure
    if (strpos(" " . $normPath . " ", " " . $normQuery . " ") !== false) {
        $score += 10000;
    }

    // 3. CRITERIA 2: STRICT KEYWORD MATCHING
    // We check every keyword. "2" must match "2", NOT "12".
    $matches = 0;
    foreach ($keywords as $word) {
        // Escape special regex chars
        $safeWord = preg_quote($word, '/');
        
        // Regex: \b means "Word Boundary". 
        // Matches " 2 " or "_2_" or "2." but NOT "12".
        // We search in the FULL normalized path
        if (preg_match("/\b$safeWord\b/i", $normPath)) {
            $matches++;
            
            // Bonus: Is this keyword in the FILENAME?
            if (preg_match("/\b$safeWord\b/i", $normFile)) {
                $score += 50;
            }
        }
    }

    // If keywords found, multiply score.
    // This penalizes partial matches.
    // If you search 3 words and find 3, score is high. 
    // If you search 3 and find 1, score is low.
    if ($matches > 0) {
        $score += ($matches * 100);
    }

    // 4. PENALTY for "Semester X" mismatch
    // If user searches "Semester 2", but path says "Semester 1", kill the score.
    if (strpos($normQuery, 'semester') !== false) {
        // Extract the number user wants (e.g., "2")
        preg_match('/semester\s+(\d+)/', $normQuery, $userSemMatch);
        
        if (!empty($userSemMatch[1])) {
            $wantedSem = $userSemMatch[1];
            
            // Extract the semester number from the FILE PATH
            // Looks for "semester 1", "semester 5", etc.
            if (preg_match('/semester\s+(\d+)/', $normPath, $fileSemMatch)) {
                $foundSem = $fileSemMatch[1];
                
                // If they don't match, this file is TRASH.
                if ($wantedSem != $foundSem) {
                    return -1; // Force ignore
                }
            }
        }
    }

    return $score;
}

function searchFiles($dir, $rawQuery, &$candidates, &$scanCount, $maxScan) {
    global $blocked_extensions, $blocked_directories, $blocked_filenames, $blocked_relative_paths;

    if ($scanCount >= $maxScan) return;
    if (!is_dir($dir)) return;

    $entries = scandir($dir);
    if ($entries === false) return;

    foreach ($entries as $entry) {
        if ($scanCount >= $maxScan) break;
        if ($entry === '.' || $entry === '..') continue;

        $fullPath = $dir . DIRECTORY_SEPARATOR . $entry;
        
        // --- DIRECTORY ---
        if (is_dir($fullPath)) {
            if (in_array($entry, $blocked_directories)) continue;
            searchFiles($fullPath, $rawQuery, $candidates, $scanCount, $maxScan);
        } 
        // --- FILE ---
        else {
            $scanCount++;
            
            if (in_array($entry, $blocked_filenames)) continue;
            $ext = strtolower(pathinfo($entry, PATHINFO_EXTENSION));
            if (in_array($ext, $blocked_extensions)) continue;

            // Web Path
            $docRoot = $_SERVER['DOCUMENT_ROOT'];
            $webPath = str_replace($docRoot, '', $fullPath);
            $webPath = str_replace('\\', '/', $webPath); 
            if (substr($webPath, 0, 1) !== '/') $webPath = '/' . $webPath;

            if (in_array($webPath, $blocked_relative_paths)) continue;

            // --- SCORING ---
            $score = calculateScore($webPath, $entry, $rawQuery);

            // Filter logic: Only keep if score > 0
            // Score can be -1 if it's the wrong semester
            if ($score > 0) {
                $candidates[] = [
                    'path' => $webPath,
                    'score' => $score
                ];
            }
        }
    }
}

// MAIN EXECUTION
if (isset($_GET['query']) && !empty($_GET['query'])) {
    $rawQuery = trim($_GET['query']);
    
    $rootDir = realpath(dirname(__DIR__)); 
    
    $candidates = [];
    $scanCount = 0;
    $maxScan = 10000; // Higher cap for larger repositories
    
    if(is_dir($rootDir)){
        searchFiles($rootDir, $rawQuery, $candidates, $scanCount, $maxScan);
    }

    // Sort by Score (Desc)
    usort($candidates, function($a, $b) {
        return $b['score'] <=> $a['score'];
    });

    // Top 50
    $finalResults = array_slice($candidates, 0, 50);
    $output = array_column($finalResults, 'path');

    echo json_encode($output);
    exit;
}

echo json_encode([]);
exit;
?>
