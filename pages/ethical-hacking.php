<?php
// Database Connection
$dbPath = "../config/db.php";
include $dbPath;
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethical Hacking Training - SU Study Materials</title>

    <!-- SEO Meta Tags -->
    <meta property="og:type" content="website"/>
    <meta name="description" content="Master cybersecurity with our Ethical Hacking courses. Learn vulnerability assessment, network security, and digital defense.">
    <meta property="og:title" content="Ethical Hacking Training - SU Study Materials">
    
    <!-- CSS & Fonts -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@500&display=swap" rel="stylesheet">
    
    <!-- Script Deprecated -->
	<!-- <script src="./assets/script/navbar.js"></script> -->
    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;     /* Deep Slate */
            --text-main: #e2e8f0;   /* Light Gray */
            --text-muted: #94a3b8;  /* Muted Slate */
            --accent: #38bdf8;      /* Sky Blue */
            --accent-green: #10b981; /* Hacker Green */
            --glass-bg: rgba(30, 41, 59, 0.7); 
            --glass-border: rgba(255, 255, 255, 0.08);
            --card-hover-border: rgba(16, 185, 129, 0.5); /* Green glow for hacking theme */
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Hero Typography */
        .hero-title {
            font-weight: 800;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
            letter-spacing: -1px;
        }

        /* Glass Card */
        .course-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            height: 100%;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            position: relative;
        }

        .course-card:hover {
            transform: translateY(-5px);
            border-color: var(--card-hover-border);
            box-shadow: 0 10px 30px -5px rgba(16, 185, 129, 0.15); /* Green Shadow */
        }

        /* Course Icon */
        .card-icon {
            width: 50px; height: 50px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.5rem;
            color: var(--accent-green);
            margin-bottom: 1rem;
        }

        /* Typography */
        .course-title {
            font-family: 'Fira Code', monospace; /* Terminal Font */
            color: #fff;
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .course-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.6;
            height: 140px;
            overflow-y: auto;
            margin-bottom: 1.5rem;
            padding-right: 5px;
        }

        /* Custom Scrollbar for Description */
        .course-desc::-webkit-scrollbar {
            width: 4px;
        }
        .course-desc::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.02);
        }
        .course-desc::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }
        .course-desc::-webkit-scrollbar-thumb:hover {
            background: #64748b;
        }

        /* Action Button */
        .btn-course {
            margin-top: auto;
            background: linear-gradient(135deg, #059669, #10b981); /* Green Gradient */
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            transition: all 0.3s;
            display: block;
            width: 100%;
        }

        .btn-course:hover {
            filter: brightness(1.1);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        /* Empty State */
        .empty-state {
            background: rgba(255,255,255,0.02);
            border: 1px dashed rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 3rem;
            color: var(--text-muted);
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <div class="container py-5 mt-4" style="min-height: 70vh;">
        
        <!-- Header Section -->
        <div class="text-center mb-5">
            <h1 class="hero-title display-4">Ethical Hacking Training</h1>
            <p class="text-gray fs-5">
                Master the art of cybersecurity and digital defense.
            </p>
        </div>

        <!-- Courses Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            // Check connection before querying to prevent ugly fatal errors
            if (isset($conn) && $conn) {
                $sql = "SELECT * FROM courses";
                $result = $conn->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
            ?>
                        <div class="col animate__animated animate__fadeInUp">
                            <div class="course-card p-4">
                                <!-- Icon Header -->
                                <div class="card-icon">
                                    <i class="fa-solid fa-user-secret"></i>
                                </div>
                                
                                <!-- Title -->
                                <h2 class="course-title text-capitalize">
                                    <?php echo htmlspecialchars($row["title"]); ?>
                                </h2>
                                
                                <!-- Description (Scrollable) -->
                                <div class="course-desc">
                                    <?php echo htmlspecialchars($row["description"]); ?>
                                </div>
                                
                                <!-- CTA Button -->
                                <a href="<?php echo htmlspecialchars($row["link"]); ?>" class="btn-course">
                                    <i class="fa-solid fa-terminal me-2"></i> Get Access
                                </a>
                            </div>
                        </div>
            <?php
                    }
                } else {
                    // Modern Empty State
                    echo '
                    <div class="col-12 text-center w-100">
                        <div class="empty-state">
                            <i class="fa-solid fa-shield-cat fa-3x mb-3 text-secondary"></i>
                            <h4>No Courses Available Yet</h4>
                            <p>Check back soon for new cybersecurity modules.</p>
                        </div>
                    </div>';
                }
                $conn->close();
            } else {
                echo '<div class="alert alert-danger">Database connection failed. Please check configuration.</div>';
            }
            ?>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>