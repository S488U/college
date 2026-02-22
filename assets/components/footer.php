<style>
    :root {
        --footer-bg: #0f172a;
        --footer-text: #94a3b8;
        --footer-hover: #38bdf8;
        --footer-heading: #f8fafc;
    }

    @font-face {
        font-family: 'Tango';
        src: url('/assets/fonts/TangoBT.ttf');
        font-weight: 100;
        font-style: normal;
        font-display: swap;
    }

    .footer-modern {
        background-color: var(--footer-bg);
        color: var(--footer-text);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        position: relative;
        overflow-x: hidden; /* Prevent horizontal scroll */
    }

    /* Top decorative gradient border */
    .footer-modern::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
    }

    .footer-heading {
        color: var(--footer-heading);
        font-weight: 700;
        letter-spacing: -0.5px;
        margin-bottom: 1.2rem;
        font-size: 1.1rem;
    }

    .footer-brand {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(to right, #fff, #cbd5e1);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
        display: inline-block;
    }

    .footer-nav ul {
        list-style: none;
        padding: 0; margin: 0;
    }

    .footer-nav li {
        margin-bottom: 0.6rem;
    }

    .footer-nav a {
        color: var(--footer-text);
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .footer-nav a:hover {
        color: var(--footer-hover);
        transform: translateX(5px);
    }

    .social-icon {
        width: 42px; height: 42px;
        display: inline-flex;
        align-items: center; justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.05);
        color: #fff;
        border: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .social-icon:hover {
        background: var(--footer-hover);
        border-color: var(--footer-hover);
        transform: translateY(-3px) scale(1.1);
        color: #0f172a;
    }

    .social-icon svg { width: 20px; height: 20px; fill: currentColor; }

    .powered-by {
        font-family: 'Tango', cursive;
        font-size: 1.8rem;
        color: #fff;
        text-decoration: none;
        transition: opacity 0.3s;
    }

    .powered-by:hover { opacity: 0.8; color: #fff; }

    .footer-divider {
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        margin: 3rem 0;
    }
</style>

<footer class="footer-modern pt-5 pb-4">
    <div class="container">
        <!-- Main Row -->
        <div class="row gy-5 justify-content-between">
            
            <!-- BRAND COLUMN (Centered on Mobile, Left on Desktop) -->
            <div class="col-lg-4 col-md-12 text-center text-lg-start">
                <div class="d-flex flex-column align-items-center align-items-lg-start">
                    <span class="footer-brand">SU Study Materials</span>
                    <p class="mb-4 text-center text-lg-start" style="max-width: 320px;">
                        Empowering students with accessible resources for a brighter academic future.
                    </p>
                    <small class="text-gray">&copy; <?= date("Y"); ?> All Rights Reserved.</small>
                </div>
            </div>

            <!-- LINKS WRAPPER -->
            <!-- We use col-6 for mobile to keep them side-by-side, but add padding to align visually -->
            <div class="col-6 col-lg-2 col-md-4 footer-nav ps-4 ps-lg-0 text-start">
                <h5 class="footer-heading">Resources</h5>
                <ul>
                    <li><a href="https://plexaur.com">Plexaur</a></li>
                    <li><a href="https://plexaur.com/pages/feedback">Feedback</a></li>
                    <li><a href="https://shahabas.vercel.app/#contact">Contact Us</a></li>
                    <li><a href="https://plexaur.com/pages/upload">Upload</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2 col-md-4 footer-nav ps-4 ps-lg-0 text-start">
                <h5 class="footer-heading">Courses</h5>
                <ul>
                    <li><a href="../../pages/bca">BCA</a></li>
                    <li><a href="../../pages/mca">MCA</a></li>
                    <li><a href="../../pages/ibm">IBM</a></li>
                    <li><a href="../../pages/bba">BBA</a></li>
                    <li><a href="../../pages/mba">MBA</a></li>
                </ul>
            </div>

            <!-- SOCIALS COLUMN (Centered on Mobile, Left on Desktop) -->
            <div class="col-lg-3 col-md-12 text-center text-lg-start">
                <h5 class="footer-heading">Connect</h5>
                <div class="d-flex gap-3 justify-content-center justify-content-lg-start mb-4">
                    <!-- YouTube -->
                    <a href="https://www.youtube.com/@dunite_tech" class="social-icon" aria-label="YouTube">
                        <svg viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="https://www.linkedin.com/company/dunite/" class="social-icon" aria-label="LinkedIn">
                        <svg viewBox="0 0 24 24"><path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z"/></svg>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://whatsapp.com/channel/0029VaLE3xEL2ATpQA9eef2v" class="social-icon" aria-label="WhatsApp">
                        <svg viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.992 1.992 4.735-1.425z"/></svg>
                    </a>
                </div>
                <div>
                    <a href="https://www.instagram.com/l_e_sims/" class="text-decoration-none small text-white-50 hover-link">
                        Also on Instagram: <span class="text-white">@l_e_sims</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-divider"></div>

        <!-- BOTTOM SIGNATURE -->
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0 text-uppercase" style="font-size: 0.75rem; letter-spacing: 2px; color: #64748b;">
                    Powered By
                </p>
                <div class="mt-1">
                    <a id="bx12" href="https://plexaur.com" class="powered-by">plexaur</a>
                </div>
            </div>
        </div>
    </div>
</footer>
