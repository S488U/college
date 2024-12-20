<nav class="navbar bg-body-tertiary fs-5">
    <div class="container d-flex flex-row ">
        <a class="navbar-brand" href="/">
            <img src="/assets/svg/logo.png" alt="Logo" width="40" height="40"> SU Study Materials
        </a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../../pages/about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../pages/bca.php">BCA</a>
            </li>
            <li class="nav-item">
                <a class="nav-link user-login" href="../../pages/mca.php">MCA</a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link user-login" href="../../pages/upload.php">Upload</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active p-2 py-1 mt-1" aria-current="page" href="../../pages/compiler.php" style="border: 1px solid black; border-radius: 7px;">Compiler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link userShow" href="./assets/pages/user.html" aria-disabled="true"></a>
            </li>
        </ul>
        <button class="btn btn-outline-dark navbtntoggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" style="display: none;" aria-controls="offcanvasExample">
            <i class="fa-solid fa-bars"></i>
        </button>
    </div>

    <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel"><a class="navbar-brand" href="/">
                    <img src="https://dunite.tech/assets/favicon/android-chrome-512x512.png?v=1704904973" alt="Bootstrap" width="30" height="24"> SU Study Materials
                </a></h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../pages/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../pages/bca.php">BCA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link user-login" href="../../pages/mca.php">MCA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link user-login" href="../../pages/ibm.php">IBM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link user-login" href="../../pages/ethical-hacking.php">EH Course</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link user-login" href="../../pages/upload.php">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link userShow" href="./assets/pages/user.html" aria-disabled="true"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active p-2 py-1 mt-1" aria-current="page" href="../../pages/compiler.php" style="border: 1px solid black; border-radius: 7px;">Compiler</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    .nav-link {
        color: black !important;
        transform: translateY(0px);
        transition: color 250ms ease-in, transform 250ms ease-in;
    }

    .nav-link:hover {
        color: #292920 !important;
        transform: translateY(-3px);
    }
</style>

<script src="https://kit.fontawesome.com/4145934b9b.js" crossorigin="anonymous"></script>