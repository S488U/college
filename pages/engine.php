<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU Study Engine | Study Materials - Srinivas University</title>

    <meta property="og:type" content="website" />
    <meta name="description" content="Fast search for Srinivas University study materials.">
    
    <!-- Styles & Fonts -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --text-gray: #94a3b8;
            --accent: #38bdf8;
            --glass-bg: rgba(30, 41, 59, 0.6);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .engine-title {
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        /* Modern Search Bar */
        .search-wrapper {
            position: relative;
            background: rgba(30, 41, 59, 0.8);
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            padding: 8px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }

        .search-wrapper:focus-within {
            border-color: var(--accent);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.3);
            transform: translateY(-2px);
        }

        .search-icon {
            color: var(--text-gray);
            font-size: 1.2rem;
        }

        .search-input {
            background: transparent;
            border: none;
            color: #fff;
            font-size: 1.1rem;
            width: 100%;
            padding: 5px 10px;
            font-weight: 500;
        }

        .search-input:focus {
            outline: none;
            box-shadow: none;
            background: transparent;
            color: #fff;
        }

        .search-input::placeholder {
            color: #64748b;
        }

        /* Result Cards */
        .result-card {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none !important;
            display: block;
        }

        .result-card:hover {
            background: rgba(56, 189, 248, 0.1);
            border-color: var(--accent);
            transform: translateY(-3px);
        }

        .breadcrumb-badge {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-gray);
            font-size: 0.75rem;
            padding: 2px 8px;
            border-radius: 4px;
        }

        /* Initial State Box */
        .empty-state {
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            padding: 2rem;
            color: var(--text-gray);
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container d-flex flex-column align-items-center mt-5 mb-5 p-3 p-md-5" style="min-height: 70vh;">
        
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="engine-title display-5 mb-2">Study Engine</h1>
            <p class="text-gray">Instant access to notes, labs, and papers.</p>
        </div>

        <!-- Search Bar -->
        <div class="container-fluid mb-5" style="max-width: 600px;">
            <div class="search-wrapper d-flex align-items-center">
                <i class="fas fa-search search-icon ms-2"></i>
                <input class="form-control search-input" type="text" id="search" autocomplete="off" placeholder="Search... (e.g. 'Java Notes')">
            </div>
        </div>
        
        <!-- Results Area -->
        <div id="search-results" class="container-fluid w-100" style="max-width: 700px;">
            <div class="text-center empty-state">
                <i class="fa-regular fa-keyboard fa-2x mb-3 opacity-50"></i>
                <p class="mb-0">Start typing above to search.</p>
            </div>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>

    <!-- Search Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('search');
            const resultsContainer = document.getElementById('search-results');
            let debounceTimer; 

            // Dark Mode Empty State
            const initialMessageHTML = `
                <div class="text-center empty-state">
                    <i class="fa-regular fa-keyboard fa-2x mb-3 opacity-50"></i>
                    <p class="mb-0">Start typing above to search.</p>
                </div>`;

            // Updated Icon Colors for Dark Mode
            const getFileIcon = (fileName) => {
                const extension = fileName.split('.').pop().toLowerCase();
                switch (extension) {
                    case 'pdf': return 'fas fa-file-pdf text-danger';
                    case 'docx': case 'doc': return 'fas fa-file-word text-primary';
                    case 'pptx': case 'ppt': return 'fas fa-file-powerpoint text-warning';
                    case 'xlsx': case 'xls': return 'fas fa-file-excel text-success';
                    case 'java': return 'fab fa-java text-danger';
                    case 'py': return 'fab fa-python text-info';
                    case 'c': case 'cpp': return 'fas fa-file-code text-primary';
                    case 'php': return 'fab fa-php text-primary';
                    case 'js': return 'fab fa-js text-warning';
                    default: return 'fas fa-file text-secondary';
                }
            };
            
            const formatFolderName = (folder) => {
                return folder.replace(/_/g, ' ').replace(/%20/g, ' ');
            };

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                clearTimeout(debounceTimer);

                if (query.length > 1) { 
                    debounceTimer = setTimeout(() => {
                        resultsContainer.innerHTML = `
                            <div class="text-center py-5">
                                <div class="spinner-border text-primary" role="status"></div>
                                <p class="text-gray mt-2 small">Searching archives...</p>
                            </div>`;

                        fetch(`search.php?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.length > 0) {
                                    let allCardsHTML = ''; 

                                    data.forEach(filePath => {
                                        const fileName = filePath.split('/').pop();
                                        
                                        // Path Cleanup Logic
                                        let pathParts = filePath.split('/');
                                        pathParts.pop(); // remove filename
                                        
                                        if (pathParts.length > 0 && pathParts[0] === "") {
                                            pathParts.shift();
                                        }

                                        // Dark Mode Breadcrumbs
                                        const breadcrumbs = pathParts
                                            .map(folder => `<span class="breadcrumb-badge me-1">${formatFolderName(folder)}</span>`)
                                            .join('');

                                        const fileIconClass = getFileIcon(fileName);
                                        const viewerBase = "./view";
                                        const finalUrl = `${viewerBase}?file=${encodeURIComponent(filePath)}`;

                                        // Dark Mode Card HTML
                                        allCardsHTML += `
                                            <a href="${finalUrl}" class="result-card mb-3 p-3 text-white">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="d-flex align-items-center justify-content-center" style="width: 40px;">
                                                        <i class="${fileIconClass} fa-2x"></i>
                                                    </div>
                                                    <div class="d-flex flex-column overflow-hidden">
                                                        <span class="fw-bold text-truncate text-white">${fileName}</span>
                                                        <div class="mt-1 text-truncate">${breadcrumbs}</div>
                                                    </div>
                                                    <div class="ms-auto text-gray">
                                                        <i class="fa-solid fa-chevron-right small"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        `;
                                    });
                                    resultsContainer.innerHTML = allCardsHTML;
                                } else {
                                    resultsContainer.innerHTML = `
                                        <div class="text-center empty-state">
                                            <i class="fa-solid fa-magnifying-glass mb-3 text-gray"></i>
                                            <h5 class="text-white">No matches found</h5>
                                            <p class="text-gray small">Try simplifying your search terms.</p>
                                        </div>`;
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                resultsContainer.innerHTML = `
                                    <div class="alert alert-danger border-0 bg-danger bg-opacity-10 text-danger">
                                        <i class="fa-solid fa-triangle-exclamation me-2"></i> Error fetching results.
                                    </div>`;
                            });
                    }, 300); 
                } else {
                    resultsContainer.innerHTML = initialMessageHTML;
                }
            });
        });
    </script>
</body>
</html>
