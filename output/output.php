<?php
$program = "";
$programId = "";
$newRoute = "";

if (isset($_GET["pg"]) && isset($_GET["id"])) {
    $program = $_GET["pg"];
    $programId = $_GET["id"];
    $newRoute = getFileContent($program, $programId);
    echo $newRoute;
} else {
    echo "No Records Found!";
}

function getFileContent($pg, $pgId) {
    $programPath = $_SERVER["DOCUMENT_ROOT"] . '/' . $pg; 
    $fileContent = file_get_contents($programPath);

    createTmpFile($pgId, $fileContent);
    $newRoute = $_SERVER["DOCUMENT_ROOT"] . "/output/allFiles/" . $pgId . ".php";
    return $newRoute;
}

function createTmpFile($pgId, $fileContent) {
    $tmpFileName = $pgId . '.php';
    $tmpFile = fopen("./allFiles/" . $tmpFileName, "w"); 

    if ($tmpFile) {
        fwrite($tmpFile, $fileContent);
        fclose($tmpFile);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Program</title>
</head>
<body>
    <?php if (!empty($newRoute)) { ?>
        <iframe src="<?php echo $newRoute; ?>" width="1000" height="700"></iframe>
    <?php } ?>
</body>
</html>
