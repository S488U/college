<?php
// /compiler/run.php

// --- DEBUGGING: UNCOMMENT THESE 2 LINES IF YOU STILL GET ERROR 500 ---
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// --- PRODUCTION SETTINGS ---
ini_set('display_errors', 0); // Keep this 0 for security in production
error_reporting(0);
set_time_limit(4); 
ini_set('memory_limit', '64M');

header('Content-Type: text/plain');

class CodeValidator {
    private static $blocked_functions = [
        'exec', 'passthru', 'shell_exec', 'system', 'proc_open', 'popen', 'pcntl_exec',
        'file_get_contents', 'file_put_contents', 'unlink', 'rmdir', 'mkdir', 'rename', 'copy',
        'fopen', 'fwrite', 'fputs', 'readfile', 'file', 'chgrp', 'chmod', 'chown', 'symlink', 'link',
        'base64_decode', 'base64_encode', 'uudecode', 'uuencode', 'str_rot13', 'gzinflate', 'gzdecode',
        'assert', 'create_function', 'call_user_func', 'call_user_func_array',
        'proc_nice', 'proc_terminate', 'proc_get_status',
        'curl_exec', 'curl_multi_exec', 'fsockopen', 'pfsockopen', 'stream_socket_client',
        'apache_child_terminate', 'posix_kill', 'posix_mkfifo', 'posix_setpgid', 'posix_setsid', 'posix_setuid',
    ];

    private static $blocked_constructs = [
        T_EVAL, T_EXIT, T_HALT_COMPILER, T_INCLUDE, T_INCLUDE_ONCE, 
        T_REQUIRE, T_REQUIRE_ONCE, T_PRINT, T_GLOBAL
        // Removed T_BACKTICK here to handle it manually in the loop to avoid undefined constant errors on old PHP
    ];

    public static function check($code) {
        $tokens = token_get_all("<?php " . $code);

        foreach ($tokens as $index => $token) {
            // Handle Single Characters (like ` or ;)
            if (is_string($token)) {
                if ($token === '`') return "Backticks (`) are not allowed.";
                continue;
            }

            list($id, $text, $line) = $token;

            // Check for Backticks (Token ID version)
            // Some PHP versions have T_BACKTICK, some treat it as a string. We check both.
            if (defined('T_BACKTICK') && $id === T_BACKTICK) {
                return "Backticks (`) are not allowed.";
            }

            if (in_array($id, self::$blocked_constructs)) {
                return "Forbidden language construct used: " . $text;
            }

            if ($id === T_STRING && in_array(strtolower($text), self::$blocked_functions)) {
                return "Function not allowed: " . $text . "()";
            }

            if ($id === T_VARIABLE) {
                $next = isset($tokens[$index + 1]) ? $tokens[$index + 1] : null;
                $i = 1;
                while (is_array($next) && $next[0] === T_WHITESPACE) {
                    $i++;
                    $next = isset($tokens[$index + $i]) ? $tokens[$index + $i] : null;
                }
                if ($next === '(' || (is_array($next) && $next[1] === '(')) {
                     return "Dynamic variable execution ($$text()) is not allowed.";
                }
            }
        }
        return true;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['php_code'])) {
    $user_code = $_POST['php_code'];

    if (empty($user_code)) {
        die("No Code Submitted");
    }

    $check_result = CodeValidator::check($user_code);
    if ($check_result !== true) {
        die("Security Error: " . $check_result);
    }

    // --- FIX: USE LOCAL TEMP FOLDER TO AVOID OPEN_BASEDIR ISSUES ---
    $temp_dir = __DIR__ . '/temp'; 
    if (!is_dir($temp_dir)) {
        // Try to create it if it doesn't exist
        if (!mkdir($temp_dir, 0755, true)) {
            die("Server Error: Cannot create 'temp' directory. Please create it manually.");
        }
    }

    // Generate random filename
    if (function_exists('random_bytes')) {
        $random_str = bin2hex(random_bytes(4));
    } else {
        $random_str = substr(md5(mt_rand()), 0, 8); // Fallback for older PHP
    }
    
    $temp_file = $temp_dir . '/run_' . $random_str . '.php';

    register_shutdown_function(function() use ($temp_file) {
        if (file_exists($temp_file)) {
            @unlink($temp_file);
        }
    });

    if (file_put_contents($temp_file, $user_code) === false) {
        die("Server Error: Cannot write to temporary file. Check permissions of 'temp' folder.");
    }

    $execute = function() use ($temp_file) {
        ob_start();
        try {
            include $temp_file;
        } catch (Exception $e) {
            echo "Runtime Error: " . $e->getMessage();
        } catch (Throwable $e) { // PHP 7+
            echo "Runtime Error: " . $e->getMessage();
        }
        return ob_get_clean();
    };

    echo $execute();

} else {
    echo "Send a POST request with 'php_code' parameter.";
}
?>