document.getElementById("admin-form").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("add_admin.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let messageBox = document.getElementById("admin-message");
        messageBox.innerHTML = data.message;
        messageBox.style.color = data.status === "success" ? "green" : "red";
        
        if (data.status === "success") {
            setTimeout(() => {
                location.reload();
            }, 2000);
        }
    });
});
