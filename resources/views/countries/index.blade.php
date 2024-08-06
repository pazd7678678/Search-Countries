<!-- resources/views/countries/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Search</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div id="app">
    <input type="text" id="search" placeholder="Search countries...">
    <ul id="results"></ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        const resultsContainer = document.getElementById('results');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value;

            if (query.length > 1) {
                fetch(`/search?query=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsContainer.innerHTML = data.map(country => `
                                <li>
                                    <img src="${country.flag}" alt="Flag" style="width: 20px; height: 20px;">
                                    ${country.name_fa} (${country.name_en})
                                </li>
                            `).join('');
                    });
            } else {
                resultsContainer.innerHTML = '';
            }
        });
    });
</script>
</body>
</html>
