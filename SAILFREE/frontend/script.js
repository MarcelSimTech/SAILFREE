document.addEventListener("DOMContentLoaded", function () {
    fetch("../backend/fetch_jobs.php")
        .then(response => response.json())
        .then(data => {
            const jobList = document.getElementById("jobList");
            data.forEach(job => {
                const jobItem = document.createElement("div");
                jobItem.classList.add("job-item");
                jobItem.innerHTML = `<h3>${job.title}</h3><p>${job.description}</p><strong>Budget: $${job.budget}</strong>`;
                jobList.appendChild(jobItem);
            });
        });

    document.getElementById("logoutBtn").addEventListener("click", function () {
        fetch("logout.php").then(() => window.location.href = "index.html");
    });
});