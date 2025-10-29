function submitProject() {
    if (isLoggedIn) {
        document.getElementById('successMessage').style.display = 'block';
        setTimeout(() => {
            document.getElementById('successMessage').style.display = 'none';
        }, 3000);
    } else {
        alert("You need to sign up or log in first.");
        openModal('signupModal');
    }
}
document.getElementById("project-form").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("..backend/submit_project.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let messageBox = document.getElementById("project-message");
        messageBox.innerHTML = data.message;
        messageBox.style.color = data.status === "success" ? "green" : "red";
        
        if (data.status === "success") {
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    });
});
