<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SU Study Materials</title>
    
    <!-- CSS & Fonts -->
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Fira+Code:wght@500&display=swap" rel="stylesheet">
	
    <style>
        :root {
            --page-bg: #0f172a;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
            --accent: #38bdf8;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.08);
            --input-bg: rgba(15, 23, 42, 0.6);
        }

        body {
            background-color: var(--page-bg);
            color: var(--text-main);
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Dashboard Header */
        .dash-header {
            background: linear-gradient(to right, #1e293b, #0f172a);
            border-bottom: 1px solid var(--glass-border);
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .dash-title {
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        /* Tab Navigation */
        .nav-pills .nav-link {
            color: var(--text-muted);
            background: transparent;
            border: 1px solid transparent;
            margin-right: 10px;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all 0.3s;
        }

        .nav-pills .nav-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .nav-pills .nav-link.active {
            background: rgba(56, 189, 248, 0.1);
            color: var(--accent);
            border-color: var(--accent);
            box-shadow: 0 0 15px rgba(56, 189, 248, 0.2);
        }

        /* Glass Cards */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* Form Elements */
        .form-control, .form-control:focus {
            background-color: var(--input-bg);
            border: 1px solid var(--glass-border);
            color: #fff;
        }
        .form-control:focus {
            box-shadow: 0 0 0 2px rgba(56, 189, 248, 0.3);
            border-color: var(--accent);
        }
		
		.form-control::placeholder {
			color: gray;
		}
        
        /* Table Styles */
        .table-dark-glass {
            --bs-table-bg: transparent;
            --bs-table-color: var(--text-main);
            border-color: var(--glass-border);
        }
        .table-dark-glass th {
            border-bottom-width: 1px;
            color: var(--accent);
            font-weight: 600;
        }
        .table-dark-glass td {
            vertical-align: middle;
        }
        
        /* Added for text-accent used in feedback */
        .text-accent { color: var(--accent); }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <!-- Dashboard Header with Nav -->
    <div class="dash-header">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <h2 class="dash-title m-0"><i class="fa-solid fa-gauge-high me-2"></i> Admin Dashboard</h2>
                
                <!-- Navigation Tabs -->
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-courses-tab" data-bs-toggle="pill" data-bs-target="#pills-courses" type="button" role="tab"><i class="fa-solid fa-book me-2"></i>Courses</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-uploads-tab" data-bs-toggle="pill" data-bs-target="#pills-uploads" type="button" role="tab"><i class="fa-solid fa-cloud-arrow-up me-2"></i>Uploads</button>
                    </li>
                    <!-- NEW FEEDBACK TAB -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-feedback-tab" data-bs-toggle="pill" data-bs-target="#pills-feedback" type="button" role="tab"><i class="fa-solid fa-comments me-2"></i>Feedback</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container mb-5" style="min-height: 60vh;">
        <!-- Tab Content Wrapper -->
        <div class="tab-content" id="pills-tabContent">
            
            <!-- Tab 1: Courses -->
            <div class="tab-pane fade show active" id="pills-courses" role="tabpanel">
                <?php include "../admin/course-update.php"; ?>
            </div>

            <!-- Tab 2: Uploads -->
            <div class="tab-pane fade" id="pills-uploads" role="tabpanel">
                <?php include "../admin/upload-shows.php"; ?>
            </div>
            
            <!-- Tab 3: Feedback (NEW) -->
            <div class="tab-pane fade" id="pills-feedback" role="tabpanel">
                <?php include "../admin/feedback-view.php"; ?>
            </div>

        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>
	
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- TAB PERSISTENCE SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // 1. Restore the active tab on page load
            const activeTabId = localStorage.getItem('activeAdminTab');
            if (activeTabId) {
                const triggerEl = document.querySelector(`#${activeTabId}`);
                if (triggerEl) {
                    const tabInstance = new bootstrap.Tab(triggerEl);
                    tabInstance.show();
                }
            }

            // 2. Save the active tab whenever a user clicks one
            const tabElss = document.querySelectorAll('button[data-bs-toggle="pill"]');
            tabElss.forEach(tabEl => {
                tabEl.addEventListener('shown.bs.tab', event => {
                    localStorage.setItem('activeAdminTab', event.target.id);
                });
            });
        });
    </script>
</body>
</html>