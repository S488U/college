<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - SU Study Materials</title>
    
    <!-- CSS & Resources -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
	
	<!-- 1. PRECONNECT: Tells browser to establish connection immediately -->
	<link rel="preconnect" href="https://cdnjs.cloudflare.com">
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
	

	<!-- 2. LOAD CSS: Use the standard stylesheet instead of the JS Kit -->
	<!-- media="print" onload="..." is a trick to load it without blocking page render -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
		  integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" 
		  crossorigin="anonymous" 
		  referrerpolicy="no-referrer" 
		  media="print" onload="this.media='all'" />

	<!-- 3. FALLBACK: For browsers with JS disabled -->
	<noscript>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	</noscript>

    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --text-gray: #cbd5e1; /* Lighter gray for visibility */
            --accent: #38bdf8;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Utility Class for Visibility */
        .text-gray { color: var(--text-gray) !important; }

        /* Hero Typography */
        h1 {
            font-weight: 800;
            letter-spacing: -1px;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1rem;
        }

        /* Glass Card Base */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
        }

        /* Warning Card (Red) */
        .warning-card {
            background: rgba(69, 10, 10, 0.6);
            border: 1px solid rgba(239, 68, 68, 0.4);
            border-left: 5px solid #ef4444;
            color: #fca5a5;
            box-shadow: 0 10px 30px -10px rgba(239, 68, 68, 0.1);
        }

        /* Info Card (Blue/Privacy) */
        .info-card {
            background: rgba(30, 58, 138, 0.4);
            border: 1px solid rgba(59, 130, 246, 0.4);
            border-left: 5px solid #3b82f6;
            color: #bfdbfe;
        }

        /* Team Section */
        .contributor-img {
            width: 80px; height: 80px;
            border-radius: 50%;
            border: 3px solid rgba(255,255,255,0.1);
            transition: all 0.3s;
        }
        .contributor-card:hover .contributor-img {
            border-color: var(--accent);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.4);
        }
        .role-badge {
            font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;
            color: var(--text-gray); background: rgba(255,255,255,0.05);
            padding: 4px 10px; border-radius: 4px;
        }

        /* Tech Stack Labels */
        .tech-item {
            display: flex; flex-direction: column; align-items: center; gap: 8px;
            margin: 0 15px;
        }
        .tech-icon { font-size: 2rem; color: var(--text-gray); transition: color 0.3s; }
        .tech-label { font-size: 0.8rem; color: var(--text-gray); }
        .tech-item:hover .tech-icon, .tech-item:hover .tech-label { color: #fff; }

        /* MACBOOK STYLE MODAL */
        .modal-content {
            background: transparent;
            border: none;
            box-shadow: none;
        }
        
        .mac-window {
            background: #0f172a; /* Dark terminal bg */
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0,0,0,0.5);
        }

        .mac-header {
            background: #1e293b;
            padding: 12px 16px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #334155;
        }

        .mac-dots { display: flex; gap: 8px; }
        .dot { width: 12px; height: 12px; border-radius: 50%; cursor: pointer; }
        .dot-red { background: #ef4444; }
        .dot-yellow { background: #f59e0b; }
        .dot-green { background: #10b981; }

        .mac-title {
            flex-grow: 1;
            text-align: center;
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            color: #94a3b8;
            opacity: 0.8;
        }

        .mac-body {
            padding: 20px;
            color: #e2e8f0;
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            max-height: 60vh;
            overflow-y: auto;
            line-height: 1.6;
        }

        /* Links */
        .link-highlight {
            color: #38bdf8;
            text-decoration: underline;
            text-decoration-thickness: 1px;
            text-underline-offset: 4px;
        }
        .link-highlight:hover { color: #fff; }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <main class="container py-5 my-md-4" style="min-height: 70vh;">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-11">
                
                <!-- 1. INTRO & DESCRIPTION -->
                <section class="text-center mb-5">
                    <h1>About SU Study Materials</h1>
                    <p class="lead mx-auto text-gray" style="max-width: 800px; line-height: 1.8;">
                        This website hosts comprehensive study materials from <strong class="text-white">Srinivas University</strong>, including notes, lab programs, and question papers. 
                        It is an open-source initiative <strong class="text-white">built by the community, for the community</strong>, where materials are submitted by students to help their peers. 
                        Our goal is to support your academic journey by making learning accessible and efficient.
                    </p>
                </section>

                <!-- 2. FAIR USE WARNING -->
                <section class="glass-card warning-card p-4 p-md-5">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <i class="fa-solid fa-triangle-exclamation fs-2 text-danger"></i>
                        <h4 class="m-0 fw-bold text-white">Warning: Fair Use & Malpractice</h4>
                    </div>
                    <div class="fs-6">
                        <p>
                            <strong>Strictly prohibited:</strong> Copying programs directly from this website during exams, lab internals, or any form of assessment is considered <strong>academic malpractice</strong>.
                        </p>
                        <p class="mb-0">
                            These resources are provided solely for educational reference and study purposes. We are not responsible for any disciplinary actions taken by the university against students found misusing this platform.
                        </p>
                    </div>
                </section>

                <!-- 3. PRIVACY & TERMS -->
                <section class="glass-card info-card p-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <i class="fa-solid fa-shield-halved fs-3 text-primary"></i>
                        <h5 class="m-0 fw-bold text-white">Terms of Service & Privacy</h5>
                    </div>
                    <p>
                        By accessing this website, you agree to our terms. To ensure the integrity of the platform and prevent academic dishonesty, we implement the following security measures:
                    </p>
                    <ul class="text-light opacity-75 mb-0">
                        <li>We collect <strong>Public IP Addresses</strong> and <strong>Timestamps</strong> of all visitors.</li>
                        <li>Access logs are monitored to identify patterns of misuse during exam hours.</li>
                        <li>Users must explicitly accept the disclaimer before browsing content.</li>
                    </ul>
                </section>

                <!-- 4. OPEN SOURCE & LICENSE -->
                <section class="mb-5">
                    <div class="glass-card d-flex flex-wrap align-items-center justify-content-between gap-4">
                        <div>
                            <h4 class="text-white mb-2"><i class="fa-brands fa-git-alt me-2 text-warning"></i>Open Source</h4>
                            <p class="mb-2 text-gray">
                                This project is transparent and collaborative. Licensed under <strong>GNU GPL v3.0</strong>.
                            </p>
                            <!-- License Modal Trigger -->
                            <button type="button" class="btn btn-sm btn-outline-success rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#licenseModal">
                                <i class="fa-solid fa-file-contract me-1"></i> View License
                            </button>
                        </div>
                        <div>
                            <a href="https://github.com/S488U/college" target="_blank" class="btn btn-dark border border-secondary rounded-pill px-4 py-2">
                                <i class="fa-brands fa-github me-2"></i> View Repository
                            </a>
                        </div>
                    </div>
                </section>

                <!-- 5. TEAM / MAINTAINERS -->
                <section class="mb-5">
                    <h5 class="text-white mb-4 ps-2 border-start border-4 border-info">Project Team</h5>
                    <div class="row g-4">
                        <!-- Author -->
                        <div class="col-md-4">
                            <div class="glass-card contributor-card text-center h-100 p-4 mb-0">
                                <a href="https://github.com/S488U" target="_blank">
                                    <img src="https://github.com/S488U.png" alt="S488U" class="contributor-img mb-3">
                                </a>
                                <h5 class="text-white mb-1">S488U</h5>
                                <span class="role-badge">Author & Maintainer</span>
                            </div>
                        </div>
                        <!-- Maintainer 1 -->
                        <div class="col-md-4">
                            <div class="glass-card contributor-card text-center h-100 p-4 mb-0">
                                <a href="https://github.com/Ubbix1" target="_blank">
                                    <img src="https://github.com/Ubbix1.png" alt="Ubbix1" class="contributor-img mb-3">
                                </a>
                                <h5 class="text-white mb-1">Ubbix1</h5>
                                <span class="role-badge">Maintainer</span>
                            </div>
                        </div>
                        <!-- Maintainer 2 -->
                        <div class="col-md-4">
                            <div class="glass-card contributor-card text-center h-100 p-4 mb-0">
                                <a href="https://github.com/Christo790" target="_blank">
                                    <img src="https://github.com/Christo790.png" alt="Christo790" class="contributor-img mb-3">
                                </a>
                                <h5 class="text-white mb-1">Christo790</h5>
                                <span class="role-badge">Maintainer</span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 6. TECH STACK -->
                <section class="mb-5 text-center">
                    <p class="small text-uppercase text-gray letter-spacing-2 mb-4">Powered By</p>
                    <div class="d-flex justify-content-center flex-wrap gap-4">
                        <div class="tech-item">
                            <i class="fa-brands fa-php tech-icon"></i>
                            <span class="tech-label">PHP</span>
                        </div>
                        <div class="tech-item">
                            <i class="fa-brands fa-bootstrap tech-icon"></i>
                            <span class="tech-label">Bootstrap</span>
                        </div>
                        <div class="tech-item">
                            <i class="fa-brands fa-js tech-icon"></i>
                            <span class="tech-label">JavaScript</span>
                        </div>
                        <div class="tech-item">
                            <i class="fa-solid fa-database tech-icon"></i>
                            <span class="tech-label">MySQL</span>
                        </div>
                    </div>
                </section>

                <!-- 7. CONTACT -->
                <div class="text-center mt-5 pt-3 border-top border-secondary border-opacity-25">
                    <p class="text-gray mb-2">Have questions or want to contribute?</p>
                    <a href="mailto:shahabassabbu12@gmail.com" class="link-highlight fs-5">
                        <i class="fa-solid fa-envelope me-2"></i>shahabassabbu12@gmail.com
                    </a>
                </div>

            </div>
        </div>
    </main>

    <!-- MODERN LICENSE MODAL (Mac Style) -->
    <div class="modal fade" id="licenseModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="mac-window">
                    <!-- Window Header -->
                    <div class="mac-header">
                        <div class="mac-dots">
                            <div class="dot dot-red" data-bs-dismiss="modal"></div>
                            <div class="dot dot-yellow"></div>
                            <div class="dot dot-green"></div>
                        </div>
                        <div class="mac-title">LICENSE.txt</div>
                    </div>
                    <!-- Window Body -->
                    <div class="mac-body">
                        <?php 
                            // Try to load license file from root
                            $licensePath = "../LICENSE";
                            if(file_exists($licensePath)) {
                                echo nl2br(htmlspecialchars(file_get_contents($licensePath)));
                            } else {
                                echo "<span class='text-warning'>// License file not found locally.</span><br>";
                                echo "Please visit the GitHub repository to view the full license.";
                            }
                        ?>
                        <br><br>
                        <a href="https://github.com/S488U/college/blob/main/LICENSE" target="_blank" class="text-primary text-decoration-none">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i> Open in GitHub
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>