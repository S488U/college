<footer>
    <div class="fluid-container d-flex flex-column bg-dark text-white ">
        <div class="container d-flex flex-column flex-md-row pt-5 pb-0 gap-4">
            <div class="container d-flex flex-row justify-content-center align-items-center">
                <h5>&copy; <span id="getDate"></span> SU Study Materials</h5>
            </div>
            <div class="container d-flex flex-column justify-content-md-center  align-items-md-center justify-content-start m-md-auto">
                <ul type="none">
                    <li><a class="link text-decoration-none hover-link" href="https://dunite.tech">dunite</a></li>
                    <li><a class="link text-decoration-none hover-link" href="https://survey.dunite.tech">Survey</a></li>
                    <li><a class="link text-decoration-none hover-link" href="https://dunite.tech/contact/">Contact Us</a></li>
                    <li><a class="link text-decoration-none hover-link" href="https://www.instagram.com/l_e_sims/">l_e_sims</a></li>
                    <li><a class="link text-decoration-none hover-link" href="https://su.dunite.tech/pages/upload.php">Upload</a></li>
                </ul>
            </div>
            <div class="container d-flex flex-column justify-content-md-center  align-items-md-center justify-content-start m-md-auto text-left">
                <ul type="none">
                    <li><a class="link text-decoration-none hover-link" href="../../pages/bca.php">BCA</a></li>
                    <li><a class="link text-decoration-none hover-link" href="../../pages/mca.php">MCA</a></li>
                    <li><a class="link text-decoration-none hover-link" href="../../pages/ibm.php">IBM</a></li>
                    <li><a class="link text-decoration-none hover-link" href="../../pages/bba.php">BBA</a></li>
                    <li><a class="link text-decoration-none hover-link" href="../../pages/Mba.php">MBA</a></li>
                </ul>

            </div>
        </div>
        <hr>
        <div class="container-fluid" style="height: 25px;">
            <h5 style="transform: translateY(-5px);" class=" text-center ">Powered by <span><a  id="bx12" href="https://dunite.tech">dunite</a></span></h5>
        </div>
        <hr>
        <div class="container d-flex flex-column justify-content-center align-items-center py-2">
            <p class="text-capitalize">Follow us on social media:</p>
            <div class="container d-flex flex-row text-center gap-4 justify-content-center align-items-center">
                <a class="link text-decoration-none hover-link" href="https://www.youtube.com/@dunite_tech">Youtube</a>
                <a class="link text-decoration-none hover-link" href="https://www.linkedin.com/company/dunite/">Linkedin</a>
                <a class="link text-decoration-none hover-link" href="https://whatsapp.com/channel/0029VaLE3xEL2ATpQA9eef2v">Whatsapp</a>
            </div>
        </div>
    </div>
</footer>

<script>
    let date = new Date();
    let year = date.getFullYear();
    document.getElementById("getDate").innerText = year;
</script>

<style>
    footer a {
        color: #ddd !important;
    }

    .hover-link:hover {
        text-decoration: underline !important;
    }

    @font-face {
        font-family: 'Tango';
        src: url(/assets/fonts/TangoBT.ttf);
        font-weight: 100;
        font-style: normal;
    }

    #bx12 {
        font-family: 'Tango', sans-serif;
        font-size: 28px;
    }
</style>