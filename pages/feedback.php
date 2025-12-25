<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - SU Study Materials</title>
    
    <!-- SEO & Performance -->
    <meta name="description" content="Send us your feedback, report bugs, or suggest features for SU Study Materials.">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon.ico">
    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    
    <!-- FontAwesome (Optimized) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="print" onload="this.media='all'" />
    <noscript><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"></noscript>

    <style>
        /* --- THEME VARIABLES --- */
        :root {
            --page-bg: #0f172a;     /* Deep Slate */
            --text-main: #e2e8f0;   /* Light Gray */
            --text-muted: #94a3b8;  /* Muted Slate */
            --accent: #38bdf8;      /* Sky Blue */
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

        .hero-title {
            font-weight: 800;
            background: linear-gradient(to right, #fff, #cbd5e1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        /* Glass Container */
        .glass-card {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 2.5rem;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.5);
        }

        /* Form Controls */
        .form-control {
            background-color: var(--input-bg);
            border: 1px solid var(--glass-border);
            color: #fff;
            padding: 0.8rem 1rem;
            border-radius: 12px;
        }
        .form-control:focus {
            background-color: var(--input-bg);
            border-color: var(--accent);
            color: #fff;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.1);
        }
        .form-control::placeholder { color: #475569; }
        .form-floating > label { color: var(--text-muted); }
        .form-floating > .form-control:focus ~ label,
        .form-floating > .form-control:not(:placeholder-shown) ~ label { color: var(--accent); }

        /* --- MODERN SELECT FIX --- */
        .modern-select {
            width: 100%;
            min-height: 52px;
            border-radius: 12px;
            background-color: var(--input-bg);
            border: 1px solid var(--glass-border);
            color: #fff;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            outline: none;
            display: flex; /* Keeps alignment tight */
            align-items: center;
        }

        /* Trigger Button */
        .modern-select button {
            display: flex;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: none;
            padding: 0 1rem;
            color: #fff;
            cursor: pointer;
            text-align: left;
            gap: 10px; /* Space between items */
        }

        /* Label ("TYPE:") */
        .modern-select .label {
            color: var(--text-muted);
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            white-space: nowrap; /* Prevents wrapping */
            flex-shrink: 0;
        }

        /* Selected Text */
        .modern-select selectedcontent {
            color: var(--accent);
            font-weight: 600;
            flex-grow: 1;
            white-space: nowrap; /* Prevents wrapping */
            overflow: hidden;
            text-overflow: ellipsis; /* Adds '...' if text is too long */
        }

        /* Icon Fixes */
        .modern-select i.fa-layer-group {
            color: var(--text-muted);
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .custom-arrow {
            color: var(--text-muted);
            font-size: 0.8rem;
            transition: transform 0.3s ease;
            margin-left: auto;
            flex-shrink: 0;
        }

        /* Dropdown Popover Styling */
        .modern-select, ::picker(select) {
            appearance: base-select;
            background-color: #0f172a;
            color: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
        }

        /* Options Wrapper */
        .option-container {
            padding: 6px;
            display: flex;
            flex-direction: column;
            gap: 4px;
            background-color: #0f172a;
        }

        /* Option Item */
        .modern-select option {
            padding: 10px 12px;
            border-radius: 8px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: background 0.2s ease;
            background: transparent;
            color: var(--text-muted);
        }
        
        .modern-select option:hover {
            background-color: rgba(56, 189, 248, 0.1);
            color: #fff;
        }
        
        .modern-select option:checked {
            background-color: rgba(56, 189, 248, 0.2);
            color: var(--accent);
            font-weight: 600;
        }
        
        .modern-select option::checkmark { display: none; }

        /* --- FIREFOX FALLBACK --- */
        @supports not (appearance: base-select) {
            .modern-select {
                appearance: none;
                -webkit-appearance: none;
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
                background-repeat: no-repeat;
                background-position: right 1rem center;
                background-size: 16px 12px;
                padding: 0.8rem 1rem;
                display: block; /* Reset flex for standard select */
            }
            .modern-select button { display: none; }
            .modern-select option { background-color: #1e293b; color: white; }
        }

        /* --- STAR RATING --- */
        .star-rating {
            display: flex;
            gap: 10px;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 10px 0;
        }
        .star-rating i {
            color: #334155;
            transition: color 0.2s, transform 0.2s;
        }
        .star-rating i.active {
            color: #fbbf24;
            text-shadow: 0 0 10px rgba(251, 191, 36, 0.3);
        }
        .star-rating i:hover { transform: scale(1.2); }

        /* Submit Button */
        .btn-gradient {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.5);
            color: white;
        }
        .btn-gradient:disabled { opacity: 0.7; cursor: not-allowed; }

        #successMessage { display: none; }
    </style>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>

    <main class="container py-5 my-md-4" style="min-height: 80vh;">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                
                <!-- Page Header -->
                <div class="text-center mb-5 animate__animated animate__fadeInDown">
                    <h1 class="hero-title display-5 mb-3">We Value Your Feedback</h1>
                    <p class="text-gray fs-5">
                        Found a bug? Have a suggestion? Or just want to say hi?<br>
                        Help us improve the platform for everyone.
                    </p>
                </div>

                <!-- Form Container -->
                <div class="glass-card animate__animated animate__fadeInUp">
                    
                    <!-- SUCCESS MESSAGE -->
                    <div id="successMessage" class="text-center py-5">
                        <div class="mb-4">
                            <i class="fa-solid fa-circle-check text-success" style="font-size: 5rem;"></i>
                        </div>
                        <h3 class="text-white mb-3">Thank You!</h3>
                        <p class="text-gray mb-4">
                            Your feedback has been submitted successfully.<br>
                            We appreciate your contribution to the community.
                        </p>
                        <button onclick="window.location.reload()" class="btn btn-outline-light rounded-pill px-4">
                            Send Another
                        </button>
                    </div>

                    <!-- FEEDBACK FORM -->
                    <form id="feedbackForm">
                        
                        <!-- 1. Dropdown & Rating -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-white small text-uppercase fw-bold mb-2">Category</label>
                                
                                <select class="modern-select" name="category" required>
                                    <!-- Trigger Button (Visible in Chrome/Edge) -->
                                    <button type="button">
                                        <i class="fa-solid fa-layer-group"></i>
                                        <span class="label">Type:</span>
                                        <selectedcontent>Select a topic...</selectedcontent>
                                        <i class="fa-solid fa-chevron-down custom-arrow"></i>
                                    </button>

                                    <!-- Options Wrapper (Unwrapped by JS for Firefox) -->
                                    <div class="option-container">
                                        <option value="" disabled selected>Select a topic...</option>
                                        <option value="bug"><i class="fa-solid fa-bug text-danger"></i> Report a Bug</option>
                                        <option value="content"><i class="fa-solid fa-book-open text-info"></i> Content Issue</option>
                                        <option value="feature"><i class="fa-solid fa-lightbulb text-warning"></i> Feature Request</option>
                                        <option value="general"><i class="fa-solid fa-comment-dots text-success"></i> General Feedback</option>
                                    </div>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-white small text-uppercase fw-bold mb-2">Rating</label>
                                <div class="star-rating" id="starContainer">
                                    <i class="fa-solid fa-star" data-value="1"></i>
                                    <i class="fa-solid fa-star" data-value="2"></i>
                                    <i class="fa-solid fa-star" data-value="3"></i>
                                    <i class="fa-solid fa-star" data-value="4"></i>
                                    <i class="fa-solid fa-star" data-value="5"></i>
                                </div>
                                <input type="hidden" name="rating" id="ratingInput" required>
                                <div class="invalid-feedback d-block mt-1" id="ratingError" style="opacity:0">Please select a rating</div>
                            </div>
                        </div>

                        <!-- 2. Message -->
                        <div class="form-floating mb-4">
                            <textarea class="form-control" placeholder="Leave your comment here" id="floatingTextarea" name="message" style="height: 150px" required></textarea>
                            <label for="floatingTextarea">Tell us what you think...</label>
                        </div>

                        <!-- 3. User Info -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingName" name="name" placeholder="Your Name">
                                    <label for="floatingName">Name (Optional)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com">
                                    <label for="floatingEmail">Email (Optional)</label>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Submit -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-gradient btn-lg" id="submitBtn">
                                <span class="btn-text">Submit Feedback</span>
                                <span class="spinner-border spinner-border-sm ms-2 d-none" role="status"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include "../assets/components/footer.php"; ?>
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // --- 1. FIREFOX FALLBACK ---
            // If browser doesn't support fancy select, unwrap options so they work normally
            if (!CSS.supports("appearance", "base-select")) {
                const selects = document.querySelectorAll('.modern-select');
                selects.forEach(select => {
                    const container = select.querySelector('.option-container');
                    if (container) {
                        while (container.firstChild) {
                            select.appendChild(container.firstChild);
                        }
                        container.remove();
                    }
                });
            }

            // --- 2. STAR RATING ---
            const stars = document.querySelectorAll('.star-rating i');
            const ratingInput = document.getElementById('ratingInput');
            const ratingError = document.getElementById('ratingError');

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const value = this.getAttribute('data-value');
                    ratingInput.value = value;
                    ratingError.style.opacity = '0';
                    stars.forEach(s => {
                        s.classList.toggle('active', s.getAttribute('data-value') <= value);
                    });
                });
            });

            // --- 3. AJAX SUBMISSION ---
            const form = document.getElementById('feedbackForm');
            const submitBtn = document.getElementById('submitBtn');
            const successMsg = document.getElementById('successMessage');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                if (!ratingInput.value) {
                    ratingError.style.opacity = '1';
                    const starContainer = document.getElementById('starContainer');
                    starContainer.classList.add('animate__animated', 'animate__headShake');
                    setTimeout(() => starContainer.classList.remove('animate__animated', 'animate__headShake'), 1000);
                    return;
                }

                // UI Loading
                const btnText = submitBtn.querySelector('.btn-text');
                const spinner = submitBtn.querySelector('.spinner-border');
                submitBtn.disabled = true;
                btnText.textContent = 'Sending...';
                spinner.classList.remove('d-none');

                const formData = new FormData(form);

                fetch('submit_feedback.php', {
					method: 'POST',
					body: formData
				})
				.then(response => {
					// Check if response is actually JSON
					const contentType = response.headers.get("content-type");
					if (contentType && contentType.indexOf("application/json") !== -1) {
						return response.json();
					} else {
						// If server returns HTML error (Fatal PHP error), throw it as text
						return response.text().then(text => {
							throw new Error("Server returned non-JSON response: " + text);
						});
					}
				})
				.then(data => {
					if (data.status === 'success') {
						form.style.display = 'none';
						successMsg.style.display = 'block';
						successMsg.classList.add('animate__animated', 'animate__fadeIn');
					} else {
						alert('Error: ' + data.message);
						resetButton();
					}
				})
				.catch(error => {
					console.error('Detailed Error:', error); // Check Console (F12) for this
					alert('Submission failed. Check console for details.');
					resetButton();
				});

                function resetButton() {
                    submitBtn.disabled = false;
                    btnText.textContent = 'Submit Feedback';
                    spinner.classList.add('d-none');
                }
            });
        });
    </script>
</body>
</html>