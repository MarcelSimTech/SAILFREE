document.getElementById("loginModal").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    let formData = new FormData(this);

    fetch("../backend/login.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            window.location.href = data.redirect.replace("\\", "/"); // Redirect to dashboard
        } else {
            alert(data.message); // Show error message
        }
    })
    .catch(error => console.error("Error:", error));
});
