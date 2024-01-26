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
            transition: background-color 0.3s ease, color 0.3s ease;
            background-color: #ffffff;
            /* Set background color to white */
            color: #333333;
            /* Set text color to dark gray */
        }

        .custom-folder:hover,
        .custom-file:hover {
            background-color: #ecf0f1;
            /* Change hover background color */
            color: #555555;
            /* Change hover text color */
        }

        .custom-folder {
            cursor: pointer;
        }

        .custom-file {
            background-color: #ffffff;
            color: #555555;
        }

        .custom-collapsible {
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            font-size: 18px;
            padding: 3px 4px;
            overflow: hidden;
        }

        .custom-content {
            display: none;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 2px solid #3498db;
        }

        .custom-file-link {
            color: #3498db;
            text-decoration: none;
            display: block;
        }

        .custom-file-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="custom-container">
    <?php
function displayFolderStructure($path, $rootDirectory)
{
    $dir = opendir($path);

    while ($file = readdir($dir)) {
        if ($file == '.' || $file == '..' || pathinfo($file, PATHINFO_EXTENSION) == 'php') {
            continue;
        }

        $fullPath = $path . '/' . $file;
        $relativePath = str_replace($rootDirectory, '', $fullPath);

        if (is_dir($fullPath)) {
            // Display a collapsible folder
            echo '<div class="custom-folder">';
            echo '<div class="custom-collapsible" onclick="toggleFolder(this)"><strong>' . $file . '</strong> ▶</div>';
            echo '<div class="custom-content">';

            // Recursively display the contents of the directory
            displayFolderStructure($fullPath, $rootDirectory);

            echo '</div>';
            echo '</div>';
        } else {
            // Display the file with a link to view it
            $relativePathToComponents = str_replace("/assets", "", dirname($relativePath));
            echo "<div class='custom-file'><a class='custom-file-link' href='/BCA$relativePathToComponents/$file' target='_blank'>$file</a></div>";
        }
    }

    closedir($dir);
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
            element.innerHTML = (content.style.display === 'block') ? '<strong>' + element.textContent.trim().slice(0, -1) + '</strong> ▶' : '<strong>' + element.textContent.trim().slice(0, -1) + '</strong> ▼';
        }
    </script>

</body>

</html>