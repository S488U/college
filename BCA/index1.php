<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .custom-container {
            width: 80%;
            max-width: 800px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-sizing: border-box;
            overflow-y: auto;
        }

        .custom-folder,
        .custom-file {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            transition: background-color 0.3s ease-out, color 0.3s ease-out;
            background-color: #ffffff;
            color: #333333;
        }

        .custom-folder:hover,
        .custom-file:hover {
            background-color: #ecf0f1;
            color: #555555;
        }

        .custom-folder {
            cursor: pointer;
            padding: 0 5px;
            padding-bottom: 5px;
            padding-top: 5px;
        }

        .custom-file {
            background-color: #ffffff;
            color: #555555;
            padding:0; 
        }

        .custom-collapsible {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-size: 18px;
            padding: 15px 10px;
            overflow: hidden;
        }

        .custom-content {
            display: none;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 2px solid #3498db;
            transition: border 300ms ease-in-out;
        }

        .custom-content:hover {
            border-left: 2px solid red;
        }

        .custom-file-link {
            color: #3498db;
            text-decoration: none;
            display: block;
            transition: color 200ms ease-in-out;
            padding: 15px;
        }

        .custom-file-link:hover {
            text-decoration: underline;
            color: red;
        }

        @media screen and (max-width: 600px) {
            .custom-container {
                width: 110%;
                padding: 10px;
            }

            .custom-collapsible,
            .custom-folder,
            strong {
                font-size: 16px;
            }

            .custom-content {
                margin-left: 5px;
                padding-left: 0;
            }

            .custom-folder {
                padding: 5px;
            }
        }
    </style>
</head>

<body>

    <div class="custom-container">
        <?php
        function displayFolderStructure($path, $rootDirectory)
        {
            $dir = opendir($path);

            $entries = [];

            while ($file = readdir($dir)) {
                $fullPath = $path . '/' . $file;
                $relativePath = str_replace($rootDirectory, '', $fullPath);

                // Check if the file is a PHP file and not in the "LAMP Labs" folder
                if ($file == '.' || $file == '..') {
                    continue;
                }
                if (pathinfo($file, PATHINFO_EXTENSION) == 'php' && !preg_match('#/LAMP Labs/#', $relativePath)) {
                    continue;
                }

                if (is_dir($fullPath)) {
                    $entries[] = $file;
                } else {
                    $entries[] = $file;
                }
            }
           
            closedir($dir);

            // Sort the entries alphabetically
            sort($entries);

            foreach ($entries as $entry) {
                $fullPath = $path . '/' . $entry;
                $relativePath = str_replace($rootDirectory, '', $fullPath);

                if (is_dir($fullPath)) {
                    // Display a collapsible folder
                    echo '<div class="custom-folder">';
                    echo '<div class="custom-collapsible" onclick="toggleFolder(this)"><strong>' . $entry . '</strong> ➤</div>';
                    echo '<div class="custom-content">';

                    // Recursively display the contents of the directory
                    displayFolderStructure($fullPath, $rootDirectory);

                    echo '</div>';
                    echo '</div>';
                } else {
                    // Handle file display/download based on extension
                    $allowedExtensions = array("py", "html", "pdf", "txt", "java", "cpp", "c", "sh", "css", "png", "jpeg", "jpg", "webp", "php");
                    $extension = pathinfo($entry, PATHINFO_EXTENSION);
                    $relativePathToComponents = str_replace("/assets", "", dirname($relativePath)); // Remove "/assets" from the directory path
                    $encodedRelativePath = implode("/", array_map('rawurlencode', explode("/", $relativePathToComponents))); // Encode each component of the path except "/"
                    $encodedEntry = rawurlencode($entry); // Encode the filename

                    if (in_array($extension, $allowedExtensions)) {
                        // Redirect to view.php
                        echo "<div class='custom-file'><a class='custom-file-link' href='view.php?file=/BCA$encodedRelativePath/$encodedEntry' target='_blank'>" . htmlspecialchars($entry) . "</a></div>"; // Generate the link
                    } else {
                        // Direct download link
                        echo "<div class='custom-file'><a class='custom-file-link' href='/BCA/$encodedRelativePath/$encodedEntry' download>" . htmlspecialchars($entry) . "</a></div>"; // Generate the link
                    }
                }
            }
        }

        // Specify the root directory
        $rootDirectory = __DIR__;

        // Display the folder structure
        displayFolderStructure($rootDirectory, $rootDirectory);
        ?>
    </div>

    <script>
        function toggleFolder(element) {
            var content = element.nextElementSibling;
            content.style.display = (content.style.display === 'block') ? 'none' : 'block';
            element.innerHTML = (content.style.display === 'block') ? '<strong>' + element.textContent.trim().slice(0, -1) + '</strong> ➤' : '<strong>' + element.textContent.trim().slice(0, -1) + '</strong> ▼';
        }
    </script>

</body>

</html>
