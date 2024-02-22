<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page - SU Study Materials</title>
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://duploader.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script/navbar.js"></script>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

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
    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-1 p-5 p-md-5" style="min-height: 60vh; height:auto;">
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

        <div class="container flex flex-column  justify-content-center align-items-center">
            <?php
            require_once __DIR__ . '/vendor/autoload.php'; // Include Composer's autoloader

            use TCPDF; // Adjusted namespace usage

            // Function to generate PDF
            function generatePDF($data)
            {
                $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetTitle('IP Addresses Data');
                $pdf->SetHeaderData('', '', 'IP Addresses Data', '');
                $pdf->setPrintHeader(false);
                $pdf->SetFont('helvetica', '', 10);
                $pdf->AddPage();

                // Table header
                $html = '<table border="1">';
                $html .= '<tr><th>ID</th><th>IP Address</th><th>Page Title</th><th>Timestamp</th></tr>';

                // Table data
                foreach ($data as $row) {
                    $html .= '<tr>';
                    $html .= '<td>' . $row['id'] . '</td>';
                    $html .= '<td>' . $row['ip_addresses'] . '</td>';
                    $html .= '<td>' . $row['page_title'] . '</td>';
                    $html .= '<td>' . $row['timestamp'] . '</td>';
                    $html .= '</tr>';
                }
                $html .= '</table>';

                $pdf->writeHTML($html, true, false, true, false, '');

                // Close and output PDF
                $pdf->Output('ip_addresses_data.pdf', 'D');
            }

            // Database connection
            $db_host = 'localhost';
            $db_user = 'root'; // Adjusted for local development
            $db_password = 'root'; // Adjusted for local development
            $db_name = 'db_uploader';

            // Create a database connection
            $conn = new mysqli($db_host, $db_user, $db_password, $db_name);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the database
            $sql = "SELECT * FROM ip_addresses";
            $result = $conn->query($sql);
            $data = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }

            // Generate PDF
            generatePDF($data);

            // Close connection
            $conn->close();
            ?>

        </div>


    </div>



    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>