<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Highlighting Example</title>
    <link href="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/themes/prism.min.css" rel="stylesheet" />
</head>

<body>
    <?php
    // Check if the 'fileUrl' GET parameter is set
    if (isset($_GET['file'])) {

        function retrieveAfterLastSlash($fileUrl) {
            $lastSlashPos = strrpos($fileUrl, '/');
            if ($lastSlashPos !== false) {
                return substr($fileUrl, $lastSlashPos + 1);
            } else {
                $fileUrl = "unknown file name";
            }

            return $fileUrl;
        }
    
        $fileUrl = $_GET['file'];
    
        echo "<h1>" . retrieveAfterLastSlash($fileUrl) . "</h1>";

        // Assuming view.php is in the same directory as the files you want to view
        $fileLocation = $_SERVER['DOCUMENT_ROOT'] . $fileUrl;

        // Check if the file exists and is readable
        if (file_exists($fileLocation) && is_readable($fileLocation)) {
            // Display PDF files using iframe
            if (pathinfo($fileLocation, PATHINFO_EXTENSION) === 'pdf') {
                echo "<iframe src='$fileUrl' width='100%' height='800px'></iframe>";
            } else {
                // For other file types, display them in preformatted format with syntax highlighting
                $fileContent = htmlspecialchars(file_get_contents($fileLocation));
                $fileExtension = pathinfo($fileLocation, PATHINFO_EXTENSION);
                echo "<pre><code class='language-$fileExtension'>$fileContent</code></pre>";
            }
        } else {
            echo "Error: File not found or inaccessible.";
        }
    } else {
        // Handle case where file information is not provided
        echo "Error: File URL not provided.";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/prismjs@1.25.0/prism.min.js"></script>
</body>

</html>