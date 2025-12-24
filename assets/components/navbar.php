<style>
    :root {
        --nav-bg: rgba(15, 23, 42, 0.95); /* Dark Slate with opacity */
        --nav-text: #94a3b8; /* Muted Slate */
        --nav-hover: #38bdf8; /* Sky Blue */
        --nav-border: rgba(255, 255, 255, 0.1);
    }

    /* Navbar Container */
    .navbar-modern {
        background-color: var(--nav-bg);
        backdrop-filter: blur(12px); /* Glass effect */
        -webkit-backdrop-filter: blur(12px);
        border-bottom: 1px solid var(--nav-border);
        padding: 0.8rem 0;
        transition: all 0.3s ease;
    }

    /* Brand Style */
    .navbar-brand-text {
        font-weight: 800;
        font-size: 1.25rem;
        background: linear-gradient(to right, #fff, #cbd5e1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: -0.5px;
        vertical-align: middle;
    }

    /* Navigation Links */
    .nav-link-custom {
        color: var(--nav-text) !important;
        font-weight: 500;
        font-size: 0.95rem;
        margin: 0 5px;
        transition: all 0.3s ease;
        position: relative;
    }

    .nav-link-custom:hover, 
    .nav-link-custom.active {
        color: var(--nav-hover) !important;
        transform: translateY(-2px);
    }

    /* Compiler CTA Button */
    .btn-compiler {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white !important;
        border: none;
        padding: 0.5rem 1.2rem;
        border-radius: 50px;
        font-weight: 600;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .btn-compiler:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.5);
        color: white !important;
    }

    /* Dropdown Styling */
    .dropdown-menu-dark-custom {
        background-color: #1e293b;
        border: 1px solid var(--nav-border);
        box-shadow: 0 10px 30px rgba(0,0,0,0.3);
    }
    
    .dropdown-item {
        color: var(--nav-text);
        padding: 0.5rem 1rem;
    }

    .dropdown-item:hover {
        background-color: rgba(56, 189, 248, 0.1);
        color: var(--nav-hover);
    }

    /* Mobile Toggler */
    .navbar-toggler {
        border: 1px solid var(--nav-border);
        color: white;
    }
    
    .navbar-toggler:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
    }

    /* Offcanvas (Mobile Menu) */
    .offcanvas-dark {
        background-color: #0f172a;
        color: white;
    }

    .offcanvas-header {
        border-bottom: 1px solid var(--nav-border);
    }

    .btn-close-white {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
</style>

<nav class="navbar navbar-expand-lg sticky-top navbar-modern">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="/assets/svg/plexaur.png" alt="Logo" width="35" height="35" class="d-inline-block align-text-top">
            <span class="navbar-brand-text">SU Study Materials</span>
        </a>

        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu" aria-controls="mobileMenu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Desktop Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                
                <!-- Search Link (New) -->
                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="../../pages/engine">
                        <i class="fa-solid fa-magnifying-glass"></i> Search
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom" href="../../pages/about">About</a>
                </li>
                
                <!-- Dropdown for Courses to save space -->
                <li class="nav-item dropdown">
                    <a class="nav-link nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Courses
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-dark-custom">
                        <li><a class="dropdown-item" href="../../pages/bca">BCA</a></li>
                        <li><a class="dropdown-item" href="../../pages/mca">MCA</a></li>
                        <li><a class="dropdown-item" href="../../pages/ibm">IBM</a></li>
                        <li><a class="dropdown-item" href="../../pages/ethical-hacking">EH Course</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom user-login" href="../../pages/upload">Upload</a>
                </li>

                <!-- User Profile (Hidden if empty, handled by JS) 
                <li class="nav-item">
                    <a class="nav-link nav-link-custom userShow" href="./assets/pages/user.html"></a>
                </li> -->

                <!-- Compiler CTA -->
                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <a class="nav-link btn-compiler" href="../../pages/compiler">
                        <i class="fa-solid fa-code me-1"></i> Compiler
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-start offcanvas-dark" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title d-flex align-items-center gap-2" id="mobileMenuLabel">
            <img src="/assets/svg/plexaur.png" alt="Logo" width="30" height="30">
            <span class="navbar-brand-text fs-5">Menu</span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column gap-2">
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="/">Home</a>
            </li>
            
            <!-- Search Link Mobile (New) -->
            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="../../pages/engine">
                    <i class="fa-solid fa-magnifying-glass me-2"></i> Search
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link nav-link-custom" href="../../pages/about">About</a>
            </li>
            
            <hr class="border-secondary my-2">
            <div class="text-white-50 small text-uppercase fw-bold mb-2 ps-2">Courses</div>
            
            <li class="nav-item ps-2">
                <a class="nav-link nav-link-custom" href="../../pages/bca">BCA</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link nav-link-custom" href="../../pages/mca">MCA</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link nav-link-custom" href="../../pages/ibm">IBM</a>
            </li>
            <li class="nav-item ps-2">
                <a class="nav-link nav-link-custom" href="../../pages/ethical-hacking">EH Course</a>
            </li>
            
            <hr class="border-secondary my-2">

            <li class="nav-item">
                <a class="nav-link nav-link-custom user-login" href="../../pages/upload">Upload</a>
            </li>
			<!--
            <li class="nav-item">
                <a class="nav-link nav-link-custom userShow" href="./assets/pages/user.html"></a>
            </li> -->
            <li class="nav-item mt-3">
                <a class="nav-link btn-compiler text-center justify-content-center d-flex" href="../../pages/compiler">
                    <i class="fa-solid fa-code me-2"></i> Open Compiler
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Load FontAwesome if not already loaded in header -->
<script src="https://kit.fontawesome.com/4145934b9b.js" crossorigin="anonymous"></script>