<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Page Not Found</title>

    <!-- CSS & Fonts -->
    <script src="../assets/script/navbar.js"></script>
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@500&display=swap" rel="stylesheet">
    
    <?php include "./g-tag.php"; ?>

    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
            --accent: #ef4444; /* Red for Error */
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
            flex: 1; /* Pushes footer down */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        /* Background Glow Effect */
        main::before {
            content: '';
            position: absolute;
            width: 300px; height: 300px;
            background: radial-gradient(circle, rgba(239, 68, 68, 0.15) 0%, transparent 70%);
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        /* Glass Card */
        .error-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
			margin: 2rem auto;
            padding: 3rem 2rem;
            text-align: center;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.4);
            animation: floatUp 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Typography */
        .error-code {
            font-family: 'Fira Code', monospace;
            font-size: 6rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #f87171, #ef4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
        }

        .error-heading {
            font-weight: 700;
            font-size: 1.75rem;
            color: #fff;
            margin-bottom: 0.5rem;
        }

        .error-desc {
            color: var(--text-muted);
            font-size: 1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        /* Icon Animation */
        .icon-box {
            font-size: 4rem;
            color: var(--accent);
            margin-bottom: 1rem;
            animation: pulse 2s infinite;
        }

        /* Button */
        .btn-home {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-home:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.4);
            color: white;
        }

        /* Keyframes */
        @keyframes floatUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <main>
        <div class="error-card">
            <!-- Animated Icon -->
            <div class="icon-box">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            
            <!-- Big 404 Text -->
            <div class="error-code">404</div>
            
            <h1 class="error-heading">Page Not Found</h1>
            <p class="error-desc">
                Oops! The page you are looking for seems to have gone on a coffee break or doesn't exist.
            </p>

            <a href="/" class="btn-home">
                <i class="fa-solid fa-house"></i> Return Home
            </a>
        </div>
    </main>

    <?php
    include "../assets/components/footer.php";
    include "../assets/components/checkApprove.php";
    include "../assets/components/scripts.php";
    ?>

    <script src="../assets/script/checkAccepted.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</body>

</html>
