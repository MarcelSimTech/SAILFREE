document.getElementById("search-btn").addEventListener("click", function () {
    let query = document.getElementById("search-input").value.toLowerCase();
    fetch(`search_jobs.php?q=${query}`)
        .then(response => response.json())
        .then(data => displayJobs(data));
});
