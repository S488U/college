<?php 
$default = '<?php
// Write your PHP code here
// Developed by https://github.com/S488U

$greetings = "Hello, Srinivas University!";
echo $greetings . "\n";
echo "Welcome to the Online Compiler.\n";
echo "Built by Plexaur.com"
?>'; 
?>

<!-- Main IDE Wrapper -->
<div class="ide-container">
    <!-- Header with Controls -->
    <div class="ide-header">
        <div class="ide-title">
            <i class="fa-brands fa-php fa-lg text-primary"></i>
            <span>main.php</span>
        </div>
        <button type="button" id="runBtn" class="btn-run">
            <span class="loader" id="runLoader"></span>
            <i class="fa-solid fa-play" id="runIcon"></i> 
            Run Code
        </button>
    </div>

    <!-- Split Layout: Editor & Terminal -->
    <div class="d-flex ide-body">
        
        <!-- Code Editor Area -->
        <div class="flex-grow-1" style="flex-basis: 60%;">
            <form id="codeForm" style="height: 100%;">
                <textarea id="php_code" name="php_code"><?php echo htmlspecialchars($default); ?></textarea>
            </form>
        </div>

        <!-- Output Terminal Area -->
        <div class="flex-grow-1" style="flex-basis: 40%;">
            <div class="terminal-window">
                <div class="terminal-header">
                    <i class="fa-solid fa-terminal me-2"></i> Console Output
                </div>
                <div class="terminal-content" id="outputBox">// Output will appear here...</div>
            </div>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize CodeMirror
        const textArea = document.getElementById('php_code');
        
        const editor = CodeMirror.fromTextArea(textArea, {
            mode: "application/x-httpd-php",
            theme: "dracula",
            lineNumbers: true,
            indentUnit: 4,
            indentWithTabs: true,
            autoCloseBrackets: true,
            autoCloseTags: true,
            matchBrackets: true,
            lineWrapping: true
        });

        // Run Logic
        const runBtn = document.getElementById('runBtn');
        const loader = document.getElementById('runLoader');
        const icon = document.getElementById('runIcon');
        const outputBox = document.getElementById('outputBox');

        runBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // UI Loading State
            runBtn.disabled = true;
            loader.style.display = 'block';
            icon.style.display = 'none';
            outputBox.innerHTML = '<span class="text-gray">Executing script...</span>';

            const code = editor.getValue();
            
            // Using relative path assuming this file is included in pages/compiler.php
            // and run.php is in ../compiler/run.php relative to the page
            const url = "../compiler/run.php"; 

            fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({ php_code: code })
            })
            .then(res => res.text())
            .then(output => {
                // Formatting output for terminal feel
                if(!output.trim()) {
                    outputBox.innerHTML = '<span class="text-gray">// Script finished with no output.</span>';
                } else {
                    // Simple styling for errors vs success (heuristic)
                    if(output.includes('Fatal error') || output.includes('Parse error')) {
                         outputBox.style.color = '#ef4444'; // Red for errors
                    } else {
                         outputBox.style.color = '#10b981'; // Green for success
                    }
                    outputBox.textContent = output;
                }
            })
            .catch(err => {
                outputBox.style.color = '#ef4444';
                outputBox.textContent = 'Server Error: Failed to reach compiler endpoint.';
                console.error(err);
            })
            .finally(() => {
                // Reset UI
                runBtn.disabled = false;
                loader.style.display = 'none';
                icon.style.display = 'inline-block';
            });
        });
    });
</script>