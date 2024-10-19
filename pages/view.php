<?php
if (isset($_GET['file'])) {
    function retrieveAfterLastSlash($fileUrl)
    {
        $lastSlashPos = strrpos($fileUrl, '/');
        return $lastSlashPos !== false ? substr($fileUrl, $lastSlashPos + 1) : "unknown file name";
    }

    $fileUrl = $_GET['file'];
    $pattern = "/^\/(BCA|MCA|IBM)\/.*/";

    if (!preg_match($pattern, $fileUrl)) {
        header("Location: ./error.php");
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo retrieveAfterLastSlash($fileUrl) . " | SU Study Material; "; ?></title>
        <link href="../assets/theme/prism.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/style/scrollbar.css?v=<?php echo time() ?>">
        <link rel="stylesheet" href="../assets/style/view.css?v=<?php echo time() ?>">
        <link rel="shortcut icon" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="../assets/script/navbar.js?v=<?php echo time(); ?>"></script>
        <script defer src="../assets/theme/prism.js"></script>
        <?php include "./g-tag.php"; ?>

    </head>

    <body>
        <?php include "../assets/components/navbar.php"; ?>
        <div class="container-fluid d-flex flex-column justify-content-center align-items-left mt-5 px-md-4" style="min-height: 70vh; height: auto;">
            <a class="link d-flex flex-row justify-content-start align-items-center my-1" href="javascript:window.history.back();">
                <svg data-toggle="tooltip" title="Go Back" class="mx-2" fill="#000000" height="25px" width="30px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="-46.06 -46.06 603.92 603.92" xml:space="preserve" stroke="#000000" stroke-width="51.180099999999996" transform="rotate(0)">
                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="5.11801" />
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <g>
                                <g>
                                    <path d="M271.067,255.84l237.76-237.76c4.053-4.267,3.947-10.987-0.213-15.04c-4.16-3.947-10.667-3.947-14.827,0L248.453,248.373 c-4.16,4.16-4.16,10.88,0,15.04l245.333,245.333c4.267,4.053,10.987,3.947,15.04-0.213c3.947-4.16,3.947-10.667,0-14.827 L271.067,255.84z" />
                                    <path d="M25.733,255.84l237.76-237.76c4.053-4.267,3.947-10.987-0.213-15.04c-4.16-3.947-10.667-3.947-14.827,0L3.12,248.267 c-4.16,4.16-4.16,10.88,0,15.04L248.453,508.64c4.267,4.053,10.987,3.947,15.04-0.213c3.947-4.16,3.947-10.667,0-14.827 L25.733,255.84z" />
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <?php echo "<h3 class='text-dark m-0'>" . retrieveAfterLastSlash($fileUrl) . "</h3>"; ?>
            </a>
            <?php
            $fileLocation = $_SERVER['DOCUMENT_ROOT'] . $fileUrl;

            if (file_exists($fileLocation) && is_readable($fileLocation)) {
                $fileExtension = pathinfo($fileLocation, PATHINFO_EXTENSION);

                switch ($fileExtension) {
                    case 'pdf':
                        $partToRemove = "/var/www/vhosts/dunite.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<iframe src='https://$resultLink' width='100%' height='700' style='border-radius: 8px; margin-bottom: 40px;'></iframe>";
                        break;
                    case 'jpeg':
                    case 'jpg':
                    case 'webp':
                    case 'png':
                        $partToRemove = "/var/www/vhosts/dunite.tech/";
                        $resultLink = str_replace($partToRemove, '', $fileLocation);
                        echo "<div class='container' style='width: 100%; max-width: 100%;'>
                                <img src='https://$resultLink' style='width: 100%; max-width: 100%; height: auto;'>  
                              </div>";
                        break;
                    default:
                        $fileContent = htmlspecialchars(file_get_contents($fileLocation));
                        if ($fileExtension == "php") {
                            echo "<button onclick='showOutput()'' class='btn btn-dark my-2' data-toggle='tooltip' title='Click to see the output' style='width:fit-content;'>Output</button>";
                            date_default_timezone_set('Asia/Kolkata');
                            echo '
                                <script>
                                function showOutput() {
                                    window.open(
                                        "../output/output.php?pg=' . $fileUrl . '&id=' . date("hisAdmY") . '",
                                        "blank"
                                        );
                                };
                                </script>   
                            ';
                        }
                        echo "
                            <div id='main-code-container' class='container-fluid p-0'>
                                <div class='fullscreen' onclick='fullscreen();' data-toggle='tooltip' title='Full Screen'>
                                    <svg fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='64px' height='64px' viewBox='-32.24 -32.24 467.48 467.48' xml:space='preserve' stroke='#ffffff'>
                                        <g id='SVGRepo_bgCarrier' stroke-width='0'>
                                            <rect x='-32.24' y='-32.24' width='467.48' height='467.48' rx='37.3984' fill='#000000' strokewidth='0'/>
                                        </g>
                                        <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'/>
                                        <g id='SVGRepo_iconCarrier'> <g> <g> <path d='M392.996,1.985H258.33c-5.523,0-10,4.477-10,10V31.01c0,5.523,4.477,10,10,10h78.046L224.955,152.431 c-3.905,3.905-3.905,10.237,0,14.142l13.453,13.453c1.953,1.953,4.512,2.929,7.07,2.929c2.56,0,5.119-0.977,7.071-2.929 L363.972,68.604v78.047c0,5.523,4.478,10,10,10h19.024c5.523,0,10-4.477,10-10V11.985C402.996,6.462,398.52,1.985,392.996,1.985z'/> <path d='M66.62,41.01h78.046c5.523,0,10-4.477,10-10V11.985c0-5.523-4.477-10-10-10H10c-5.523,0-10,4.477-10,10v134.666 c0,5.523,4.477,10,10,10h19.024c5.523,0,10-4.477,10-10V68.604l111.422,111.421c1.952,1.953,4.512,2.929,7.071,2.929 s5.119-0.977,7.071-2.929l13.453-13.453c3.905-3.905,3.905-10.237,0-14.142L66.62,41.01z'/> <path d='M392.996,246.344h-19.024c-5.522,0-10,4.478-10,10v78.047L252.55,222.97c-3.903-3.905-10.237-3.905-14.142,0 l-13.453,13.453c-3.905,3.904-3.905,10.236,0,14.142l111.421,111.421H258.33c-5.523,0-10,4.477-10,10v19.023 c0,5.523,4.477,10,10,10h134.666c5.523,0,10-4.477,10-10V256.344C402.996,250.821,398.52,246.344,392.996,246.344z'/> <path d='M164.588,222.97c-3.905-3.905-10.238-3.905-14.142,0L39.024,334.392v-78.047c0-5.523-4.477-10-10-10H10 c-5.523,0-10,4.477-10,10v134.666c0,5.523,4.477,10,10,10h134.666c5.523,0,10-4.477,10-10v-19.023c0-5.523-4.477-10-10-10H66.62 l111.421-111.422c3.905-3.904,3.905-10.236,0-14.143L164.588,222.97z'/> </g> </g> </g>
                                    </svg>
                                </div>
                                <div class='fontSize' onclick='fsSetting()' data-toggle='tooltip' title='Custom Font Size'>
                                    <svg fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='64px' height='64px' viewBox='-32.25 -32.25 386.96 386.96' xml:space='preserve' stroke='#ffffff' stroke-width='0.0032245999999999998'>
                                    <g id='SVGRepo_bgCarrier' stroke-width='0'>
                                        <rect x='-32.25' y='-32.25' width='386.96' height='386.96' rx='30.956799999999998' fill='#000000' strokewidth='0'/>
                                    </g>
                                    <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round' stroke='#ffffff' stroke-width='0.6449199999999999'> <g> <g> <path d='M98.685,274.34l-2.565-0.121c-8.889-0.453-16.973-1.925-24.034-4.388c-6.099-2.141-9.191-4.915-9.191-8.273 c0-1.799,0.279-4.214,0.825-7.188c0.562-3.037,1.593-7.05,3.062-11.896c1.627-5.104,3.451-10.674,5.498-16.717 c1.87-5.548,4.292-12.087,7.214-19.459h83.251l19.887,53.811c0.39,0.97,0.686,2.119,0.886,3.428 c0.211,1.35,0.321,2.494,0.321,3.438c0,0.623-1.471,2.236-7.04,3.86c-5.784,1.683-13.193,2.821-22.027,3.386l-2.529,0.163v17.63 h108.361v-17.688l-2.595-0.105c-2.721-0.11-6.175-0.696-10.257-1.751c-4.034-1.033-7.313-2.31-9.634-3.718 c-3.713-2.516-6.624-5.078-8.648-7.646c-2.036-2.568-3.893-6.027-5.537-10.288L140.708,35.416h-17.664l-0.669,1.725 c-11.757,30.257-25.139,64.761-40.155,103.513c-14.895,38.443-28.751,73.681-41.175,104.698 c-2.35,5.817-4.765,10.399-7.172,13.627c-2.365,3.169-5.782,6.275-10.114,9.197c-2.64,1.688-6.123,3.068-10.352,4.103 c-4.385,1.065-8.063,1.719-10.914,1.93L0,274.408v17.593h98.685V274.34z M87.684,185.361l33.064-85.954l33.544,85.954H87.684z'/> <polygon points='256.278,234.604 289.369,289.301 322.46,234.604 297.47,234.604 297.47,85.14 322.46,85.14 289.369,30.449 256.278,85.14 281.27,85.14 281.27,234.604 '/> </g> </g> </g>
                                    <g id='SVGRepo_iconCarrier'> <g> <g> <path d='M98.685,274.34l-2.565-0.121c-8.889-0.453-16.973-1.925-24.034-4.388c-6.099-2.141-9.191-4.915-9.191-8.273 c0-1.799,0.279-4.214,0.825-7.188c0.562-3.037,1.593-7.05,3.062-11.896c1.627-5.104,3.451-10.674,5.498-16.717 c1.87-5.548,4.292-12.087,7.214-19.459h83.251l19.887,53.811c0.39,0.97,0.686,2.119,0.886,3.428 c0.211,1.35,0.321,2.494,0.321,3.438c0,0.623-1.471,2.236-7.04,3.86c-5.784,1.683-13.193,2.821-22.027,3.386l-2.529,0.163v17.63 h108.361v-17.688l-2.595-0.105c-2.721-0.11-6.175-0.696-10.257-1.751c-4.034-1.033-7.313-2.31-9.634-3.718 c-3.713-2.516-6.624-5.078-8.648-7.646c-2.036-2.568-3.893-6.027-5.537-10.288L140.708,35.416h-17.664l-0.669,1.725 c-11.757,30.257-25.139,64.761-40.155,103.513c-14.895,38.443-28.751,73.681-41.175,104.698 c-2.35,5.817-4.765,10.399-7.172,13.627c-2.365,3.169-5.782,6.275-10.114,9.197c-2.64,1.688-6.123,3.068-10.352,4.103 c-4.385,1.065-8.063,1.719-10.914,1.93L0,274.408v17.593h98.685V274.34z M87.684,185.361l33.064-85.954l33.544,85.954H87.684z'/> <polygon points='256.278,234.604 289.369,289.301 322.46,234.604 297.47,234.604 297.47,85.14 322.46,85.14 289.369,30.449 256.278,85.14 281.27,85.14 281.27,234.604 '/> </g> </g> </g>
                                    </svg>
                                </div>
                                <div class='fsSettings'>
                                    <div class='slider-container'>
                                        <label for='font-size-slider'>Font Size: </label>
                                        <input type='range' id='font-size-slider' min='10' max='40' value='16' step='1' oninput='changeFontSize(this.value)'>
                                        <span id='font-size-display'>16px</span>
                                    </div>
                                </div>
                                <div id='copy_container' class='container-fluid d-flex flex-row justify-content-between align-items-center p-0 m-0'>
                                    <span class='filenName ms-3 text-light'><em id='contentSec'>$fileUrl</em></span>
                                    <button id='copybtn' class='btn btn-sm' onclick='copyCode()' data-toggle='tooltip' title='Copy Program'>Copy Code 
                                        <span>
                                            <svg width='20px' height='20px' viewBox='0 0 24.00 24.00' fill='none' xmlns='http://www.w3.org/2000/svg' transform='matrix(1, 0, 0, -1, 0, 0)rotate(180)' stroke='#ffffff'>
                                                <g id='SVGRepo_bgCarrier' stroke-width='0'/>
                                                <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round' stroke='#CCCCCC' stroke-width='3.8880000000000003'/>
                                                <g id='SVGRepo_iconCarrier'> <path d='M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z' stroke='#ffffff' stroke-width='1.848'/> <path d='M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5' stroke='#ffffff' stroke-width='1.848'/> </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <pre id='codeContainer' class='mt-0 mb-3'><code class='language-$fileExtension match-braces no-whitespace-normalization line-numbers' id='font'>$fileContent</code></pre>
                                </div>";
                        echo "";
                        break;
                }
            } else {
                $developer_jokes = [
                    "Why do programmers prefer dark mode? Because light attracts bugs!",
                    "Why do Java developers wear glasses? Because they don't see sharp!",
                    "How many programmers does it take to change a light bulb? None. It's a hardware problem!",
                    "Why was the JavaScript developer sad? Because he didn't know how to 'null' his feelings.",
                    "Why do Python programmers prefer using a debugger? Because they can't 'import' their emotions!",
                    "Why did the programmer quit his job? Because he didn't get arrays!",
                    "What do you call a programmer from Finland? Nerdic!",
                    "Why do programmers hate nature? It has too many bugs.",
                    "Why was the developer unhappy at his job? He wanted arrays!",
                    "Why do C# and Java developers keep getting confused? Because they both have a lot of common class!",
                    "Why do PHP developers love nature? Because it has so many trees!",
                    "What did the Java code say to the C code? You've got no class!",
                    "How do you comfort a JavaScript bug? You console it!",
                    "Why did the web developer go broke? Because he used up all his cache!",
                    "Why couldn't the programmer finish his dinner? Because he kept forgetting to close his tags!",
                    "Why did the programmer bring a ladder to work? Because he wanted to reach the next level!",
                    "Why did the developer go broke? Because he lost his domain in a bet!",
                    "What do you call a programmer's favorite snack? Byte-sized cookies!",
                    "Why was the computer cold? It left its Windows open!",
                    "What did the coder say when he got locked out? 'I can't find my key!'",
                    "Why did the programmer get kicked out of school? Because he kept breaking class!",
                    "Why are assembly programmers always soaking wet? They work below C-level!",
                    "What do you call a database administrator who loves baseball? A SQL pitcher!",
                    "Why did the developer break up with his girlfriend? She had too many bugs!",
                    "What do you call a programmer who doesn’t like to code? A script kiddie!",
                    "Why was the computer cold at work? It couldn't find its cache!",
                    "Why did the web developer leave the restaurant? Because they had too many cookies!",
                    "What do you call a website that gives out free snacks? A cookie site!",
                    "How do programmers stay warm in winter? They code by the fire!",
                    "Why do programmers always mix up Christmas and Halloween? Because Oct 31 == Dec 25!",
                    "Why did the developer fail his driving test? He couldn't find the right key!",
                    "What do you call a computer that sings? A Dell!",
                    "Why did the programmer prefer dark mode? Because it helps him debug better!",
                ];

                $random_key = array_rand($developer_jokes);
                $random_joke = $developer_jokes[$random_key];

                http_response_code(404);

                $error = [
                    "code" => "404",
                    "message" => "File not found or hiding very well",
                    "details" => [
                        "file" =>  "/pages/view.php?file=" . $fileUrl ,
                        "titleName" => retrieveAfterLastSlash($fileUrl) . " | SU Study Material",
                        "suggestion" => "Double-check the file path, ask it nicely, or maybe offer it a cookie."
                    ],
                    "joke" => $random_joke
                ];
                echo "<div id='main-code-container' class='container-fluid p-0'>
                                <div class='fullscreen' onclick='fullscreen();' data-toggle='tooltip' title='Full Screen'>
                                    <svg fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='64px' height='64px' viewBox='-32.24 -32.24 467.48 467.48' xml:space='preserve' stroke='#ffffff'>
                                        <g id='SVGRepo_bgCarrier' stroke-width='0'>
                                            <rect x='-32.24' y='-32.24' width='467.48' height='467.48' rx='37.3984' fill='#000000' strokewidth='0'/>
                                        </g>
                                        <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round'/>
                                        <g id='SVGRepo_iconCarrier'> <g> <g> <path d='M392.996,1.985H258.33c-5.523,0-10,4.477-10,10V31.01c0,5.523,4.477,10,10,10h78.046L224.955,152.431 c-3.905,3.905-3.905,10.237,0,14.142l13.453,13.453c1.953,1.953,4.512,2.929,7.07,2.929c2.56,0,5.119-0.977,7.071-2.929 L363.972,68.604v78.047c0,5.523,4.478,10,10,10h19.024c5.523,0,10-4.477,10-10V11.985C402.996,6.462,398.52,1.985,392.996,1.985z'/> <path d='M66.62,41.01h78.046c5.523,0,10-4.477,10-10V11.985c0-5.523-4.477-10-10-10H10c-5.523,0-10,4.477-10,10v134.666 c0,5.523,4.477,10,10,10h19.024c5.523,0,10-4.477,10-10V68.604l111.422,111.421c1.952,1.953,4.512,2.929,7.071,2.929 s5.119-0.977,7.071-2.929l13.453-13.453c3.905-3.905,3.905-10.237,0-14.142L66.62,41.01z'/> <path d='M392.996,246.344h-19.024c-5.522,0-10,4.478-10,10v78.047L252.55,222.97c-3.903-3.905-10.237-3.905-14.142,0 l-13.453,13.453c-3.905,3.904-3.905,10.236,0,14.142l111.421,111.421H258.33c-5.523,0-10,4.477-10,10v19.023 c0,5.523,4.477,10,10,10h134.666c5.523,0,10-4.477,10-10V256.344C402.996,250.821,398.52,246.344,392.996,246.344z'/> <path d='M164.588,222.97c-3.905-3.905-10.238-3.905-14.142,0L39.024,334.392v-78.047c0-5.523-4.477-10-10-10H10 c-5.523,0-10,4.477-10,10v134.666c0,5.523,4.477,10,10,10h134.666c5.523,0,10-4.477,10-10v-19.023c0-5.523-4.477-10-10-10H66.62 l111.421-111.422c3.905-3.904,3.905-10.236,0-14.143L164.588,222.97z'/> </g> </g> </g>
                                    </svg>
                                </div>
                                <div class='fontSize' onclick='fsSetting()' data-toggle='tooltip' title='Custom Font Size'>
                                    <svg fill='#ffffff' version='1.1' id='Capa_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='64px' height='64px' viewBox='-32.25 -32.25 386.96 386.96' xml:space='preserve' stroke='#ffffff' stroke-width='0.0032245999999999998'>
                                    <g id='SVGRepo_bgCarrier' stroke-width='0'>
                                        <rect x='-32.25' y='-32.25' width='386.96' height='386.96' rx='30.956799999999998' fill='#000000' strokewidth='0'/>
                                    </g>
                                    <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round' stroke='#ffffff' stroke-width='0.6449199999999999'> <g> <g> <path d='M98.685,274.34l-2.565-0.121c-8.889-0.453-16.973-1.925-24.034-4.388c-6.099-2.141-9.191-4.915-9.191-8.273 c0-1.799,0.279-4.214,0.825-7.188c0.562-3.037,1.593-7.05,3.062-11.896c1.627-5.104,3.451-10.674,5.498-16.717 c1.87-5.548,4.292-12.087,7.214-19.459h83.251l19.887,53.811c0.39,0.97,0.686,2.119,0.886,3.428 c0.211,1.35,0.321,2.494,0.321,3.438c0,0.623-1.471,2.236-7.04,3.86c-5.784,1.683-13.193,2.821-22.027,3.386l-2.529,0.163v17.63 h108.361v-17.688l-2.595-0.105c-2.721-0.11-6.175-0.696-10.257-1.751c-4.034-1.033-7.313-2.31-9.634-3.718 c-3.713-2.516-6.624-5.078-8.648-7.646c-2.036-2.568-3.893-6.027-5.537-10.288L140.708,35.416h-17.664l-0.669,1.725 c-11.757,30.257-25.139,64.761-40.155,103.513c-14.895,38.443-28.751,73.681-41.175,104.698 c-2.35,5.817-4.765,10.399-7.172,13.627c-2.365,3.169-5.782,6.275-10.114,9.197c-2.64,1.688-6.123,3.068-10.352,4.103 c-4.385,1.065-8.063,1.719-10.914,1.93L0,274.408v17.593h98.685V274.34z M87.684,185.361l33.064-85.954l33.544,85.954H87.684z'/> <polygon points='256.278,234.604 289.369,289.301 322.46,234.604 297.47,234.604 297.47,85.14 322.46,85.14 289.369,30.449 256.278,85.14 281.27,85.14 281.27,234.604 '/> </g> </g> </g>
                                    <g id='SVGRepo_iconCarrier'> <g> <g> <path d='M98.685,274.34l-2.565-0.121c-8.889-0.453-16.973-1.925-24.034-4.388c-6.099-2.141-9.191-4.915-9.191-8.273 c0-1.799,0.279-4.214,0.825-7.188c0.562-3.037,1.593-7.05,3.062-11.896c1.627-5.104,3.451-10.674,5.498-16.717 c1.87-5.548,4.292-12.087,7.214-19.459h83.251l19.887,53.811c0.39,0.97,0.686,2.119,0.886,3.428 c0.211,1.35,0.321,2.494,0.321,3.438c0,0.623-1.471,2.236-7.04,3.86c-5.784,1.683-13.193,2.821-22.027,3.386l-2.529,0.163v17.63 h108.361v-17.688l-2.595-0.105c-2.721-0.11-6.175-0.696-10.257-1.751c-4.034-1.033-7.313-2.31-9.634-3.718 c-3.713-2.516-6.624-5.078-8.648-7.646c-2.036-2.568-3.893-6.027-5.537-10.288L140.708,35.416h-17.664l-0.669,1.725 c-11.757,30.257-25.139,64.761-40.155,103.513c-14.895,38.443-28.751,73.681-41.175,104.698 c-2.35,5.817-4.765,10.399-7.172,13.627c-2.365,3.169-5.782,6.275-10.114,9.197c-2.64,1.688-6.123,3.068-10.352,4.103 c-4.385,1.065-8.063,1.719-10.914,1.93L0,274.408v17.593h98.685V274.34z M87.684,185.361l33.064-85.954l33.544,85.954H87.684z'/> <polygon points='256.278,234.604 289.369,289.301 322.46,234.604 297.47,234.604 297.47,85.14 322.46,85.14 289.369,30.449 256.278,85.14 281.27,85.14 281.27,234.604 '/> </g> </g> </g>
                                    </svg>
                                </div>
                                <div class='fsSettings'>
                                    <div class='slider-container'>
                                        <label for='font-size-slider'>Font Size: </label>
                                        <input type='range' id='font-size-slider' min='10' max='40' value='16' step='1' oninput='changeFontSize(this.value)'>
                                        <span id='font-size-display'>16px</span>
                                    </div>
                                </div>
                                <div id='copy_container' class='container-fluid d-flex flex-row justify-content-between align-items-center p-0 m-0'>
                                    <span class='filenName ms-3 text-light'><em id='contentSec'>$fileUrl</em></span>
                                    <button id='copybtn' class='btn btn-sm' onclick='copyCode()' data-toggle='tooltip' title='Copy Program'>Copy Code 
                                        <span>
                                            <svg width='20px' height='20px' viewBox='0 0 24.00 24.00' fill='none' xmlns='http://www.w3.org/2000/svg' transform='matrix(1, 0, 0, -1, 0, 0)rotate(180)' stroke='#ffffff'>
                                                <g id='SVGRepo_bgCarrier' stroke-width='0'/>
                                                <g id='SVGRepo_tracerCarrier' stroke-linecap='round' stroke-linejoin='round' stroke='#CCCCCC' stroke-width='3.8880000000000003'/>
                                                <g id='SVGRepo_iconCarrier'> <path d='M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z' stroke='#ffffff' stroke-width='1.848'/> <path d='M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5' stroke='#ffffff' stroke-width='1.848'/> </g>
                                            </svg>
                                        </span>
                                    </button>
                                </div>
                                <pre id='codeContainer' class='mt-0 mb-3'><code style='color: white !important;' class='language-json match-braces no-whitespace-normalization line-numbers' id='font'>{
  &quot;error&quot;: {
    &quot;code&quot;: &quot;" . htmlentities($error['code']) ."&quot;,
    &quot;message&quot;: &quot;" . htmlentities($error['message']) ."&quot;,
    &quot;details&quot;: {
      &quot;file&quot;: &quot;" . htmlentities($error['details']['file']) ."&quot;,
      &quot;title&quot;: &quot;" . htmlentities($error['details']['titleName']) ."&quot;,
      &quot;suggestion&quot;: &quot;" . htmlentities($error['details']['suggestion']) ."&quot;
    },
    &quot;funFact&quot;: &quot;" . htmlentities($error['joke']) . "&quot;
  }
}
</code></pre></div>";
            }
            ?>
        </div>
        <?php include "../assets/components/footer.php"; ?>
        <?php include "../assets/components/checkApprove.php"; ?>
        <?php include "../assets/components/scripts.php"; ?>
        <script src="../assets/script/checkAccepted.js"></script>
        <script>
            var tempContent = document.getElementById("contentSec").innerText;

            function handleSize() {
                var winSize = window.innerWidth;
                var contentSec = document.getElementById("contentSec");

                if (winSize <= 700) {
                    tempContent = contentSec.innerHTML;
                    contentSec.innerHTML = "dunite";
                } else {
                    contentSec.innerHTML = tempContent;
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                handleSize();
                window.addEventListener("resize", handleSize);
            });

            function copyCode() {
                var codeContainer = document.getElementById('codeContainer');
                var code = codeContainer.innerText;
                var textarea = document.createElement('textarea');
                textarea.value = code;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
                var copyInside = document.getElementById("copybtn").innerHTML;
                document.getElementById("copybtn").innerHTML = 'Copied! <span><svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <path d="M4.89163 13.2687L9.16582 17.5427L18.7085 8" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/> </g></svg></span>';
                setTimeout(() => {
                    document.getElementById("copybtn").innerHTML = copyInside;
                }, 4000);
            }

            function fullscreen() {
                var elem = document.getElementById("main-code-container");

                if (!elem.getAttribute("data-fullscreen")) {
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.webkitRequestFullscreen) {
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) {
                        elem.msRequestFullscreen();
                    } else if (elem.mozRequestFullScreen) {
                        elem.mozRequestFullScreen();
                    }
                    elem.style.overflow = "auto"; // Enable scrolling
                    elem.style.width = "100vw"; // Full screen width
                    elem.style.height = "100vh"; // Full screen height
                    elem.setAttribute("data-fullscreen", "true");
                } else {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    }
                    elem.style.overflow = ""; // Reset to default
                    elem.style.width = ""; // Reset to default
                    elem.style.height = ""; // Reset to default
                    elem.removeAttribute("data-fullscreen");
                }
            }

            document.addEventListener("fullscreenchange", function() {
                var elem = document.getElementById("main-code-container");
                if (!document.fullscreenElement) {
                    elem.removeAttribute("data-fullscreen");
                    elem.style.overflow = ""; // Reset overflow when exiting fullscreen
                    elem.style.width = ""; // Reset width when exiting fullscreen
                    elem.style.height = ""; // Reset height when exiting fullscreen
                }
            });

            function fsSetting() {
                var settings = document.querySelector(".fsSettings");
                if (!settings.getAttribute("data-settings-show")) {
                    settings.style.visibility = "visible";
                    settings.style.opacity = "1";
                    settings.style.transform = "translateX(0)";
                    settings.setAttribute("data-settings-show", "true")
                } else {
                    settings.style.visibility = "hidden";
                    settings.style.opacity = "0";
                    settings.style.transform = "translateX(200px)";
                    settings.removeAttribute("data-settings-show");
                }
            }

            function changeFontSize(value) {
                document.getElementById('font').style.fontSize = value + 'px';
                document.getElementById('font-size-display').textContent = value + 'px';
            }

            $(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
    </body>

    </html>
<?php
} else {
    include "./error.php";
}
?>