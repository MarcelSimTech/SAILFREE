document.getElementById('signupModal').addEventListener('submit', function(e) {
    e.preventDefault(); 
  });
  
document.getElementById("signupModal").addEventListener("submit", function (e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("../backend/signup.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        let messageBox = document.getElementById("signup-message");
        messageBox.innerHTML = data.message;
        messageBox.style.color = data.status === "success" ? "green" : "red";
        
        if (data.status === "success") {
            setTimeout(() => {
                window.location.href = "index.php"; // Redirect to login page
            }, 2000);
        }
    });
});

