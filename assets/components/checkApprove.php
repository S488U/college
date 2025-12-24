<!-- UI ONLY: Logic handled via AJAX in log_visit.php -->
<style>
    :root {
        --toast-bg: rgba(15, 23, 42, 0.95);
        --toast-border: rgba(255, 255, 255, 0.1);
        --toast-text: #e2e8f0;
    }

    .modern-toast {
        display: none;
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 340px;
        background-color: var(--toast-bg);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid var(--toast-border);
        border-radius: 16px;
        padding: 1.25rem;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 8px 10px -6px rgba(0, 0, 0, 0.5);
        z-index: 1050;
        font-family: 'Inter', sans-serif;
        animation: slideUp 0.5s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .toast-content p {
        color: var(--toast-text);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .toast-content a {
        color: #38bdf8;
        text-decoration: none;
        font-weight: 600;
        border-bottom: 1px dashed #38bdf8;
    }

    .toast-content a:hover {
        color: #7dd3fc;
        border-style: solid;
    }

    .btn-toast-group { display: flex; gap: 0.75rem; }

    .btn-toast {
        flex: 1;
        padding: 0.5rem;
        border-radius: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        border: none;
    }

    .btn-toast-close {
        background: transparent;
        color: #94a3b8;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .btn-toast-close:hover { background: rgba(255, 255, 255, 0.05); color: #fff; }

    .btn-toast-agree {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
    }

    .btn-toast-agree:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 10px -1px rgba(59, 130, 246, 0.4);
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @media (max-width: 600px) { .modern-toast { right: 10px; left: 10px; width: auto; } }
</style>

<div id="consentToast" class="modern-toast">
    <div class="toast-content">
        <div class="d-flex align-items-center gap-2 mb-2">
            <i class="fa-solid fa-shield-halved text-warning"></i>
            <strong class="text-white">Terms of Use</strong>
        </div>
        <p>
            By entering, you agree to our terms. 
            Please read the <a href="./pages/about.php">Warning & Disclaimer</a> carefully.
        </p>
        <div class="btn-toast-group">
            <button id="closeToast" class="btn-toast btn-toast-close" type="button">Close</button>
            <button id="agreeToast" class="btn-toast btn-toast-agree" type="button">I Agree</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toast = document.getElementById('consentToast');
        const closeBtn = document.getElementById('closeToast');
        const agreeBtn = document.getElementById('agreeToast');
        
        // 1. Check LocalStorage
        if (!localStorage.getItem('site_consent_agreed')) {
            setTimeout(() => {
                toast.style.display = 'block';
            }, 1000);
        }

        const hideToast = () => {
            toast.style.opacity = '0';
            setTimeout(() => { toast.style.display = 'none'; }, 300);
        };

        // 2. Close Handler
        closeBtn.addEventListener('click', () => {
            hideToast();
            // Optional: Remind them next session? Or dismiss forever?
            localStorage.setItem('site_consent_agreed', 'dismissed'); 
        });

        // 3. Agree Handler (AJAX)
        agreeBtn.addEventListener('click', () => {
            // Immediately hide UI for speed
            hideToast();
            localStorage.setItem('site_consent_agreed', 'true');

            // Send data to background worker
            const formData = new FormData();
            formData.append('page_title', document.title);

            fetch('./assets/components/log_visit.php', {
                method: 'POST',
                body: formData
            }).catch(err => console.error("Logging failed", err));
        });
    });
</script>