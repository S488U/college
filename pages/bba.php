<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBA Study Materials - Srinivas University</title>

    <!-- SEO Meta Tags -->
    <meta property="og:type" content="website" />
    <meta name="description" content="Comprehensive BBA study materials coming soon. Contribute resources to help your peers.">
    <meta property="og:title" content="BBA Study Materials - Srinivas University">

    <!-- CSS & Fonts -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    
    <script src="../assets/script/navbar.js"></script>
    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;     /* Deep Slate */
            --text-main: #e2e8f0;   /* Light Gray */
            --text-muted: #94a3b8;  /* Muted Slate */
            --accent: #38bdf8;      /* Sky Blue */
            --glass-bg: rgba(30, 41, 59, 0.7); 
            --glass-border: rgba(255, 255, 255, 0.08);
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        /* Hero Typography */
        h1 {
            font-weight: 800;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }

        /* Glass Card Container */
        .status-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 3rem 2rem;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.4);
            text-align: center;
        }

        /* Icon Animation */
        .status-icon {
            font-size: 4rem;
            color: var(--accent);
            margin-bottom: 1.5rem;
            animation: float 3s ease-in-out infinite;
            display: inline-block;
        }

        /* CTA Button */
        .btn-upload {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            border: none;
            padding: 0.8rem 2.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-upload:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.4);
            color: white;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <main class="container d-flex flex-column justify-content-center align-items-center gap-4 py-5">
        
        <div class="text-center mb-2">
            <h1>BBA Study Materials</h1>
            <p class="text-gray">Bachelor of Business Administration</p>
        </div>

        <div class="status-card">
            <!-- Animated Icon -->
            <div class="status-icon">
                <i class="fa-solid fa-rocket"></i>
            </div>

            <h2 class="fw-bold text-white mb-3">Coming Soon</h2>
            
            <p class="text-gray mb-4" style="line-height: 1.6;">
                We are currently gathering resources for the BBA department. 
                <br class="d-none d-md-block">
                Help your juniors and peers by contributing your notes today.
            </p>

            <a href="https://plexaur.com/pages/upload.php" class="btn-upload">
                <i class="fa-solid fa-cloud-arrow-up"></i> Upload Materials
            </a>
        </div>

    </main>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>
</body>

</html>