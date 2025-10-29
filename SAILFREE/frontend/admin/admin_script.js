document.addEventListener("DOMContentLoaded", function () {
    fetchUsers();
    fetchProjects();
});

function fetchUsers() {
    fetch("../backend/admin/fetch_users.php")
        .then(response => response.json())
        .then(data => {
            let table = document.getElementById("users-table");
            table.innerHTML = "";
            data.forEach(user => {
                let row = table.insertRow();
                row.innerHTML = `<td>${user.id}</td><td>${user.name}</td><td>${user.email}</td><td>${user.phone}</td>
                                 <td><button onclick="deleteUser(${user.id})">Delete</button></td>`;
            });
        })
        .catch(error => console.error("Error fetching users:", error));
}


function fetchProjects() {
    fetch("fetch_projects.php")
        .then(response => response.json())
        .then(data => {
            let table = document.getElementById("projects-table");
            data.forEach(project => {
                let row = table.insertRow();
                row.innerHTML = `<td>${project.id}</td><td>${project.title}</td><td>${project.description}</td>
                                 <td>${project.budget}</td><td>${project.deadline}</td>
                                 <td><button onclick="deleteProject(${project.id})">Delete</button></td>
                                 <td><button onclick="openBidForm(${project.id})">Bid</button></td>`;
            });
        });
}

function openBidForm(projectId) {
    let bidAmount = prompt("Enter your bid amount:");
    let bidMessage = prompt("Enter a message for your bid:");

    if (bidAmount && bidMessage) {
        submitBid(projectId, bidAmount, bidMessage);
    }
}

function submitBid(projectId, bidAmount, bidMessage) {
    fetch("submit_bid.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ project_id: projectId, bid_amount: bidAmount, bid_message: bidMessage })
    })
    .then(response => response.json())
    .then(data => alert(data.message))
    .catch(error => console.error("Error:", error));
}

function fetchBids() {
    fetch("fetch_bids.php")
        .then(response => response.json())
        .then(data => {
            let table = document.getElementById("bids-table");
            data.forEach(bid => {
                let row = table.insertRow();
                row.innerHTML = `<td>${bid.id}</td><td>${bid.bidder}</td><td>${bid.project}</td>
                                 <td>${bid.bid_amount}</td><td>${bid.bid_message}</td>
                                 <td>${bid.created_at}</td>`;
            });
        });
}

document.addEventListener("DOMContentLoaded", function () {
    fetchUsers();
    fetchProjects();
    fetchBids();  // Fetch bids when admin panel loads
});


function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        fetch(`delete_user.php?id=${id}`, { method: "GET" })
            .then(() => {
                showNotification("User deleted successfully!", "success");
                fetchUsers();
            });
    }
}

function deleteProject(id) {
    if (confirm("Are you sure you want to delete this project?")) {
        fetch(`delete_project.php?id=${id}`, { method: "GET" })
            .then(() => {
                showNotification("Project deleted successfully!", "success");
                fetchProjects();
            });
    }
}

    function showNotification(message, type) {
        let notification = document.createElement("div");
        notification.className = `notification ${type}`;
        notification.innerText = message;
    
        document.body.appendChild(notification);
    
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    document.addEventListener("DOMContentLoaded", function () {
        showLoading("users-table");
        showLoading("projects-table");
    
        fetchUsers();
        fetchProjects();
    });
    
    function showLoading(tableId) {
        let table = document.getElementById(tableId);
        table.innerHTML = "<tr><td colspan='5'>Loading...</td></tr>";
    }
    
    fetch("admin_stats.php")
        .then(response => response.json())
        .then(data => {
            document.getElementById("total-users").innerText = data.users;
            document.getElementById("total-projects").innerText = data.projects;
        });
    
    function logout() {
        window.location.href = "admin_logout.php";
    }

