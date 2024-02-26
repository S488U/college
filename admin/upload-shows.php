<?php
$upload_dir = "../uploads/";

// Function to list all files in a directory
function list_files($dir)
{
    $files = array_diff(scandir($dir), array('..', '.'));
    return $files;
}

// Delete file function
function delete_file($file)
{
    if (file_exists($file)) {
        unlink($file);
        return true;
    } else {
        return false;
    }
}

?>

    <div class="container flex flex-column  justify-content-center align-items-center">
        <h2 class="text-center">Uploaded Contents</h2>
        <div class="list-group mt-4">

            <?php
            // Listing files in uploads folder
            $files = list_files($upload_dir);

            // Displaying each file with delete and download options
            foreach ($files as $file) {
                $file_path = $upload_dir . $file;
                echo '
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <span  style="overflow:hidden;">' . $file . '</span>
            <div class="btn-group flex flex-md-row flex-column gap-2" role="group" aria-label="File Actions">
                <a href="' . $file_path . '" class="btn btn-primary btn-sm" download>Download</a>
                <form class="flex" method="post">
                    <input type="hidden" name="file_to_delete" value="' . $file_path . '">
                    <button type="submit" class="btn btn-danger btn-sm" name="delete">Delete</button>
                </form>
            </div>
        </div>
    ';
            }

            // Delete file if delete button is clicked
            if (isset($_POST['delete'])) {
                $file_to_delete = $_POST['file_to_delete'];
                if (delete_file($file_to_delete)) {
                    echo '<script>alert("File deleted successfully.");</script>';
                    echo '<script>window.location.href = window.location.href;</script>';
                } else {
                    echo '<script>alert("Error deleting file.");</script>';
                }
            }
            ?>

        </div>
    </div>