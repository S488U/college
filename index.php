<?php
// 1. PERFORMANCE: Start Output Buffering
ob_start();

// 2. DATA: specific optimizations for pageLink
if (file_exists("./utils/pageLink.php")) {
    include "./utils/pageLink.php";
} else {
    $courses = [];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU Study Materials - Srinivas University</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="Comprehensive BCA study materials from Srinivas University. Access notes, papers, and labs.">
    <meta property="og:type" content="website" />
    <meta property="og:title" content="SU Study Materials - Srinivas University">
    <meta property="og:url" content="https://plexaur.com">

    <!-- PERFORMANCE: Preconnect to CDNs to speed up connection time -->
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="stylesheet" href="./assets/style/scrollbar.css">
    
    <!-- CSS: Load Critical CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <!-- Fonts: Display swap ensures text is visible while font loads -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Analytics -->
    <?php include "./pages/g-tag.php"; ?>
    
    <style>
        /* Inlined Critical CSS for First Paint */
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
            --accent: #38bdf8;
            --glass-bg: rgba(30, 41, 59, 0.7); 
            --glass-border: rgba(255, 255, 255, 0.08);
            --card-hover-border: rgba(56, 189, 248, 0.5);
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .hero-title {
            font-weight: 800;
            letter-spacing: -1px;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
            /* Fix for Webkit gradient text rendering */
            display: inline-block; 
        }

        /* Search Styles */
        .search-wrapper {
            position: relative;
            background: rgba(30, 41, 59, 0.8);
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            padding: 10px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            max-width: 600px;
            margin: 0 auto;
        }

        .search-wrapper:focus-within {
            border-color: var(--accent);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.2);
            transform: translateY(-2px);
        }

        .search-input {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 1rem;
            width: 100%;
            padding: 5px 15px;
            font-weight: 500;
        }
        .search-input:focus { outline: none; box-shadow: none; background: transparent; color: #fff; }
        .search-input::placeholder { color: #64748b; }
        .search-icon { color: var(--text-muted); font-size: 1.1rem; }

        /* Results Styles */
        #search-results {
            position: relative;
            z-index: 1000;
            margin-top: 1rem;
            max-width: 650px;
            margin-left: auto;
            margin-right: auto;
        }

        .result-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none !important;
            display: block;
            margin-bottom: 0.75rem;
        }

        .result-card:hover {
            background: rgba(56, 189, 248, 0.1);
            border-color: var(--accent);
            transform: translateY(-3px);
        }

        .breadcrumb-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-muted);
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 4px;
        }

        /* Glass Card (Course Grid) */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease;
            cursor: pointer;
            height: 100%;
            overflow: hidden;
            position: relative;
        }

        .glass-card:hover {
            transform: translateY(-8px);
            border-color: var(--card-hover-border);
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5);
        }

        .card-body {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title { color: #fff; font-weight: 700; font-size: 1.5rem; margin-bottom: 0.75rem; }
        .card-text { color: var(--text-muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem; }
        
        .card-action {
            color: var(--accent);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.2s ease;
        }
        .glass-card:hover .card-action { color: #7dd3fc; gap: 0.8rem; }

        /* Optimization: Use simple opacity for hover gradient to reduce repaint */
        .glass-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at top right, rgba(56, 189, 248, 0.1), transparent 40%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }
        .glass-card:hover::before { opacity: 1; }
    </style>
</head>

<body>
    <?php include "./assets/components/navbar.php"; ?>

    <!-- Main Content -->
    <main class="container py-5 mt-4" style="min-height: 70vh;">
        
        <!-- Hero Section -->
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8">
                <!-- Removed 'display-5' to allow hero-title class to control sizing properly or keep it if consistent with theme -->
                <h1 class="hero-title animate__animated animate__pulse display-5">
                    Find Your Desired Study Materials
                </h1>
                <p class="text-gray fs-5 mb-4">
                    Search notes, papers, and labs or select a course below.
                </p>

                <!-- Search Input -->
                <div class="search-wrapper d-flex align-items-center mb-2">
                    <i class="fas fa-search search-icon ms-2"></i>
                    <input class="form-control search-input" type="text" id="searchInput" autocomplete="off" placeholder="Type to search... (e.g. 'Sem 5 Java')">
                </div>
                
                <!-- Live Results -->
                <div id="searchResults"></div>
            </div>
        </div>

        <!-- Course Grid -->
        <div class="row row-cols-1 row-cols-md-2 g-4 g-lg-5" id="courseGrid">
            <?php foreach ($courses as $courseKey => $course): ?>
                <div class="col animate__animated animate__fadeInUp">
                    <div class="card glass-card" onclick="window.location.href='<?php echo htmlspecialchars($course['redirectLink']); ?>'">
                        <div class="card-body">
                            <div>
                                <h2 class="card-title"><?php echo htmlspecialchars($course['name']); ?></h2>
                                <p class="card-text text-capitalize">
                                    Access notes, papers, and study materials for <?php echo htmlspecialchars($course['name']); ?>.
                                </p>
                            </div>
                            <div class="mt-3">
                                <span class="card-action">
                                    Browse Materials <i class="fa-solid fa-arrow-right"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <?php
    include "./assets/components/footer.php";
    include "./assets/components/checkApprove.php";
    include "./assets/components/scripts.php";
    ?>

    <!-- Deferred JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" defer></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const resultsContainer = document.getElementById('searchResults');
            let debounceTimer; 

            // Icon Mapping helper
            const getFileIcon = (fileName) => {
                const ext = fileName.split('.').pop().toLowerCase();
                const icons = {
                    'pdf': 'fas fa-file-pdf text-danger',
                    'docx': 'fas fa-file-word text-primary', 'doc': 'fas fa-file-word text-primary',
                    'pptx': 'fas fa-file-powerpoint text-warning', 'ppt': 'fas fa-file-powerpoint text-warning',
                    'xlsx': 'fas fa-file-excel text-success', 'xls': 'fas fa-file-excel text-success',
                    'java': 'fab fa-java text-danger',
                    'py': 'fab fa-python text-info',
                    'c': 'fas fa-file-code text-primary', 'cpp': 'fas fa-file-code text-primary',
                    'php': 'fab fa-php text-primary',
                    'js': 'fab fa-js text-warning'
                };
                return icons[ext] || 'fas fa-file text-secondary';
            };
            
            const formatFolderName = (folder) => folder.replace(/_/g, ' ').replace(/%20/g, ' ');

            const escapeHTML = (str) => {
                return str.replace(/[&<>"']/g, function(m) {
                    return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;','\'':'&#39;'}[m];
                });
            };

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                clearTimeout(debounceTimer);

                if (query.length > 1) { 
                    debounceTimer = setTimeout(() => {
                        resultsContainer.innerHTML = `
                            <div class="text-center py-4">
                                <div class="spinner-border text-primary" role="status"></div>
                            </div>`;

                        fetch(`./pages/search?query=${encodeURIComponent(query)}`)
                            .then(res => {
                                if(!res.ok) throw new Error('Network error');
                                return res.json();
                            })
                            .then(data => {
                                if (data.length > 0) {
                                    const allCardsHTML = data.map(filePath => {
                                        const fileName = filePath.split('/').pop();
                                        const pathParts = filePath.split('/');
                                        pathParts.pop(); 
                                        if (pathParts[0] === "") pathParts.shift();

                                        const breadcrumbs = pathParts
                                            .map(folder => `<span class="breadcrumb-badge me-1">${formatFolderName(folder)}</span>`)
                                            .join('');

                                        return `
                                            <a href="./pages/view?file=${encodeURIComponent(filePath)}" class="result-card p-3 text-white text-start">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="d-flex align-items-center justify-content-center" style="width: 40px;">
                                                        <i class="${getFileIcon(fileName)} fa-2x"></i>
                                                    </div>
                                                    <div class="d-flex flex-column overflow-hidden" style="flex:1;">
                                                        <span class="fw-bold text-truncate text-white">${fileName}</span>
                                                        <div class="mt-1 text-truncate">${breadcrumbs}</div>
                                                    </div>
                                                    <div class="ms-auto text-muted">
                                                        <i class="fa-solid fa-chevron-right small"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        `;
                                    }).join('');
                                    resultsContainer.innerHTML = allCardsHTML;
                                } else {
                                    resultsContainer.innerHTML = `
                                        <div class="text-center p-3 border border-secondary rounded bg-dark bg-opacity-50">
                                            <p class="text-gray mb-0">No matches found for "${escapeHTML(query)}"</p>
                                        </div>`;
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                resultsContainer.innerHTML = '';
                            });
                    }, 300); 
                } else {
                    resultsContainer.innerHTML = '';
                }
            });
        });
    </script>
</body>
</html>
<?php 
// Flush output buffer
ob_end_flush(); 
?>
