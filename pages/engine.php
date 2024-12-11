<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SU Study Engine | Study Materials - Srinivas University</title>

    <meta property="og:type" content="website" />
    <meta name="description" content="This website hosts comprehensive study materials from Srinivas University. Here, students can access a wide range of educational resources designed to support their academic journey, providing a valuable hub for learning and reference throughout their BCA studies at Srinivas University.">
    <meta property="og:description" content="This website hosts comprehensive study materials from Srinivas University. Here, students can access a wide range of educational resources designed to support their academic journey, providing a valuable hub for learning and reference throughout their BCA studies at Srinivas University.">
    <meta property="og:title" content="SU Study Engine | Study Materials - Srinivas University">

    <link rel="stylesheet" href="../assets/style/scrollbar.css">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="https://dunite.tech/assets/favicon/android-chrome-192x192.png?v=1706301104">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="../assets/script/navbar.js"></script>
    <?php include "./g-tag.php"; ?>
</head>

<body>
    <?php include "../assets/components/navbar.php"; ?>


    <div class="container d-flex flex-column justify-content-center align-items-center gap-5 mt-5 mb-5 p-md-5" style="min-height: 60vh; height:auto;">
        <h1>SU Study Engine Study Materials</h1>
        <div class="container d-flex flex-column justify-content-center align-items-center ">
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <form class="d-flex flex-row gap-2 form">
                    <input class="search form-control" type="text" name="" id="search" placeholder="search here..">
                    <input class="search-btn btn btn-dark" type="submit" value="search">
                </form>
            </div>
            <script>
                // Add an event listener to the search input
                document.querySelector('.search').addEventListener('input', function() {
                    const query = this.value;

                    // Perform AJAX call only if the query is not empty
                    if (query.trim() !== '') {
                        fetch(`search.php?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                const resultsContainer = document.getElementById('search-results');
                                resultsContainer.innerHTML = ''; // Clear previous results

                                if (data.length > 0) {
                                    data.forEach(filePath => {
                                        const fileName = filePath.split('/').pop(); // Extract file name
                                        const listItem = document.createElement('li');
                                        listItem.innerHTML = `<a href="${filePath}" target="_blank" class="text-black">${fileName}</a>`;
                                        resultsContainer.appendChild(listItem);
                                    });
                                } else {
                                    resultsContainer.innerHTML = '<p>No files found.</p>';
                                }
                            })
                            .catch(error => console.error('Error:', error));
                    } else {
                        document.getElementById('search-results').innerHTML = '<p>Start typing to search...</p>';
                    }
                });
            </script>

            <!-- Results Container -->
            <div class="container-fluid">
                <h4>Search Results:</h4>
                <div id="search-results" class="container d-flex flex-column gap-2 text-black">
                    <p>Start typing to search...</p>
                </div>
            </div>
        </div>
    </div>

    <?php include "../assets/components/footer.php"; ?>
    <?php include "../assets/components/checkApprove.php"; ?>
    <?php include "../assets/components/scripts.php"; ?>

    <script src="../assets/script/checkAccepted.js"></script>

</body>

</html>