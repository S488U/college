<?php

if (!isset($_SESSION['openFolders'])) {
    $_SESSION['openFolders'] = [];
}

function displayFolderStructure($path, $rootDirectory)
{
    $dir = opendir($path);
    $entries = [];

    while ($file = readdir($dir)) {
        $fullPath = $path . '/' . $file;
        $relativePath = str_replace($rootDirectory, '', $fullPath);

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
    sort($entries);

    foreach ($entries as $entry) {
        $fullPath = $path . '/' . $entry;
        $relativePath = str_replace($rootDirectory, '', $fullPath);
        $isOpen = in_array($relativePath, $_SESSION['openFolders']); 

        if (is_dir($fullPath)) {
            echo '<div class="custom-folder">';
            echo '<div class="custom-collapsible" onclick="toggleFolder(this, \'' . htmlspecialchars($relativePath) . '\')"><strong>' . $entry . '</strong> ➤</div>';
            echo '<div class="custom-content" style="display: ' . ($isOpen ? 'block' : 'none') . ';">'; 
            displayFolderStructure($fullPath, $rootDirectory);

            echo '</div>';
            echo '</div>';
        } else {
            $allowedExtensions = ["docx","ppt", "pptx", "doc", "py", "html", "pdf", "txt", "java", "cpp", "c", "sh", "css", "png", "jpeg", "jpg", "webp", "php"];
            $extension = pathinfo($entry, PATHINFO_EXTENSION);
            $relativePathToComponents = str_replace("/assets", "", dirname($relativePath)); // Remove "/assets" from the directory path
            $encodedRelativePath = implode("/", array_map('rawurlencode', explode("/", $relativePathToComponents))); // Encode each component of the path except "/"
            $encodedEntry = rawurlencode($entry); // Encode the filename

            if (in_array($extension, $allowedExtensions)) {
                echo "<div class='custom-file'><a class='custom-file-link' href='view.php?file=/MCA$encodedRelativePath/$encodedEntry' >" . htmlspecialchars($entry) . "</a></div>";
            } else {
                // if (in_array($extension, ["docx", "ppt", "pptx", "doc"])){
                //     echo "<div class='custom-file'><a class='custom-file-link' href='https://view.officeapps.live.com/op/view.aspx?src=https%3A%2F%2Fsu.dunite.tech%2FMCA/$encodedRelativePath/$encodedEntry&wdOrigin=BROWSELINK' >" . htmlspecialchars($entry) . "</a></div>";
                // } else {
                echo "<div class='custom-file'><a class='custom-file-link' href='/MCA/$encodedRelativePath/$encodedEntry' download>" . htmlspecialchars($entry) . "</a></div>";
                // }
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggleFolder'])) {
    $folderPath = $_POST['toggleFolder'];
    
    if (in_array($folderPath, $_SESSION['openFolders'])) {
        $_SESSION['openFolders'] = array_diff($_SESSION['openFolders'], [$folderPath]); // Close the folder
    } else {
        $_SESSION['openFolders'][] = $folderPath;
    }
}

$rootDirectory = __DIR__;

?>

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
            padding: 0; 
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
    <?php displayFolderStructure($rootDirectory, $rootDirectory); ?>
</div>

<script>
    function toggleFolder(element, folderPath) {
        var content = element.nextElementSibling;
        var isOpen = content.style.display === 'block';
        content.style.display = isOpen ? 'none' : 'block';
        element.innerHTML = (isOpen ? '<strong>' + element.textContent.trim().slice(0, -1) + '</strong> ➤' : '<strong>' + element.textContent.trim().slice(0, -1) + '</strong> ▼');

        var formData = new FormData();
        formData.append('toggleFolder', folderPath);

        fetch('', { 
            method: 'POST',
            body: formData
        });
    }
</script>

</body>
</html>
