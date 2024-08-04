<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Compiler</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/themes/prism.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-0 my-5 p-0">
        <h1 class="mb-4 text-center">PHP Compiler</h1>
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h2>Write your PHP code here:</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group h-100">
                                <textarea name="php_code" id="php_code" class="form-control" rows="10" placeholder="Write your PHP code here..."><?php echo isset($_POST['php_code']) ? htmlspecialchars($_POST['php_code']) : ''; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Run Code</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-header">
                        <h2>Output</h2>
                    </div>
                    <div class="card-body">
                        <div class="output">
                            <?php
                            function is_safe_php_code($code) {
                                $disallowed_functions = ['exec', 'shell_exec', 'system', 'passthru', 'proc_open', 'popen', 'curl_exec', 'curl_multi_exec', 'parse_ini_file', 'show_source', 'file_put_contents', 'file_get_contents'];
                                foreach ($disallowed_functions as $function) {
                                    if (stripos($code, $function) !== false) {
                                        return false;
                                    }
                                }
                                $disallowed_js_patterns = ['<script', 'javascript:', 'onerror=', 'onload=', 'onmouseover=', 'alert(', 'confirm('];
                                foreach ($disallowed_js_patterns as $pattern) {
                                    if (stripos($code, $pattern) !== false) {
                                        return false;
                                    }
                                }
                                return true;
                            }

                            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['php_code'])) {
                                $php_code = $_POST['php_code'];
                                if (!empty($php_code)) {
                                    if (is_safe_php_code($php_code)) {
                                        $tmp_file = tempnam(sys_get_temp_dir(), 'php');
                                        file_put_contents($tmp_file, $php_code);
                                        ob_start();
                                        include $tmp_file;
                                        $output = ob_get_clean();
                                        unlink($tmp_file);
                                        echo $output;
                                    } else {
                                        echo "The code contains disallowed functions or JavaScript.";
                                    }
                                } else {
                                    echo "Please enter some PHP code.";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.23.0/prism.min.js"></script>
</body>
</html>
