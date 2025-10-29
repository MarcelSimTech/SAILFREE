<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAILFREE - Freelancer Platform</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <script src="signup.js"></script>
    <script src="project.js"></script>
    <style>
        body {
            background-color: #D2B48C; /* Caramel Brown */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #8B4513; /* Dark Brown */
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo img {
            height: 50px;
        }
        nav {
            display: flex;
            gap: 10px;
        }
        /*.form-group {
            margin-bottom: 15px;
        }*/
        /*.form-group label {
            display: block;
            margin-bottom: 15px;
        }*/
        .form-group input{
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
        .search-bar {
            padding: 8px;
            border: none;
            border-radius: 5px;
        }
        button {
            background-color: #A0522D; /* Slightly Lighter Brown */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background-color: #8B4513; /* Dark Brown on hover */
        }
        .job-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 20px;
        }
        .job-item {
            background: #8B4513; /* Dark Brown Background */
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 200px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }
        .job-item:hover {
            transform: scale(1.05); /* Slight float effect on hover */
        }
        .job-item img {
            width: 100%;
            border-radius: 5px;
        }
        .no-job {
            display: none;
            text-align: center;
            font-size: 18px;
            color: #8B4513;
            margin-top: 20px;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: #FFF;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        .close {
            position: absolute;
            top: 10px;
            right: 20px;
            background: black;
            color: white;
            border: none;
            padding: 5px;
            cursor: pointer;
        }
        .successMessage {
            display: none;
            background-color: #D2B48C;
            color: black;
            text-align: center;
            padding: 10px;
            margin: 20px auto;
            width: 50%;
            border-radius: 5px;
        }
        .google-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: black;
            border: 1px solid #8B4513;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        .google-btn img {
            width: 20px;
            margin-right: 10px;
        }
        footer {
            background-color: #8B4513;
            color: white;
            text-align: center;
            padding: 15px;
        }

        /* Center the form and add spacing */
.post-project-form {
    width: 400px;
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    gap: 12px;
}

/* Style input fields */
.post-project-form input,
.post-project-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

/* Improve spacing for the button */
.post-project-form button {
    width: 100%;
    padding: 12px;
    background: #a0522d; /* Adjust to match your site's theme */
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
}

.post-project-form button:hover {
    background: #8b4513;
}

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo.png" alt="SAILFREE Logo">
        </div>
        <nav>
            <input type="text" id="searchBar" placeholder="Search job..." class="search-bar" onkeyup="searchJobs()">
            <!--<button onclick="checkLoginStatus()">Post Project</button>-->
            <button onclick="openModal('postProjectModal')">Post Project</button>
            <button onclick="openModal('loginModal')">Login</button>
            <button onclick="openModal('signupModal')">Sign Up</button>
        </nav>
    </header>
    
    <main>
        <div class="job-list" id="jobList">
            <div class="job-item" data-title="Web Development" data-description="Develop a responsive website using HTML, CSS and Javascript." data-budget="$500"><img src="images/job1.jpg" alt="Web Development"><p>Web Development</p></div>
            <div class="job-item" data-title="Graphic Design" data-description="Create a modern and aesthetic logo and branding packing" data-budget="$300"><img src="images/job2.jpg" alt="Graphic Design"><p>Graphic Design</p></div>
            <div class="job-item" data-title="Content Writing" data-description="create a  blog posts, articles, social media content, website copy, product descriptions, and more." data-budget="$400"><img src="images/job3.jpg" alt="Content Writing"><p>Content Writing</p></div>
            <div class="job-item" data-title="App Development" data-description="Design, build, and maintain software applications for mobile devices (iOS, Android) or desktops." data-budget="$450"><img src="images/job4.jpg" alt="App Development"><p>App Development</p></div>
            <div class="job-item" data-title="Data Entry" data-description="Input, update, or manage data in digital formats using software like spreadsheets, databases, or specialized systems." data-budget="$500"><img src="images/job5.jpg" alt="Data Entry"><p>Data Entry</p></div>
            <div class="job-item" data-title="SEO Optimization" data-description="Improve a website’s visibility on search engines like Google to increase organic traffic." data-budget="$650"><img src="images/job6.jpg" alt="SEO Optimization"><p>SEO Optimization</p></div>
            <div class="job-item" data-title="Video Editing" data-description="Manipulate and arrange video footage and create a polished final product." data-budget="$550"><img src="images/job7.jpg" alt="Video Editing"><p>Video Editing</p></div>
            <div class="job-item" data-title="Digital Marketing" data-description="Collect, analyze, and interprete consumer data and understand behaviors, preferences, and trends  to create targeted marketing strategies." data-budget="$450"><img src="images/job8.jpg" alt="Digital Marketing"><p>Digital Marketing</p></div>
            <div class="job-item" data-title="UI/UX Design" data-description="UI/UX design focuses on creating user-friendly and visually appealing digital experiences." data-budget="$400"><img src="images/job9.jpg" alt="UI/UX Design"><p>UI/UX Design</p></div>
            <div class="job-item" data-title="Cybersecurity" data-description="Implement security measures like firewalls, encryption, multi-factor authentication, and regular security audits." data-budget="$700"><img src="images/job10.jpg" alt="Cybersecurity"><p>Cybersecurity</p></div>
        </div>
        <p class="no-job" id="noJob">No Job</p>
    </main>


        <div id="jobDetailModal" class="modal">
            <div class="modal-content">
                <button class="close" onclick="closeModal('jobDetailModal')">X</button>
                <h2 id="jobTitle"></h2>
                <p id="jobDescription"></p>
                <p><strong>Budget: </strong><span id="jobBudget"></span></p>
            </div>
        </div>
        
        <div id="loginModal" class="modal" action="backend/login.php" method="POST">
            <div class="modal-content">
                <button class="close" onclick="closeModal('loginModal')">X</button>
                <u><h2>Login</h2></u>
                <form action="../backend/login.php" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="submit-btn">Login</button>
                </form>
                <p>Don't have an account? <button onclick="openModal('signupModal')">Signup</button></p>
                <script src="login.js"></script>
            </div>
        </div>
        
        <div id="signupModal" class="modal" action="backend/signup.php" method="POST">
            <div class="modal-content">
                <button class="close" onclick="closeModal('signupModal')">X</button>
                <u><h2>Sign Up</h2></u>
                <form action="../backend/signup.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit" class="submit-btn">Sign Up</button>
                </form>
                <!--<button>Sign Up</button>-->
                <p>Have an account? <button onclick="openModal('loginModal')">Login</button></p>
                <p id="signup-message"></p> <!-- Success message appears here -->
                <script src="signup.js"></script>
            </div>
        </div>
        
        <div id="postProjectModal" class="modal" action="backend/post_project.php" method="POST">
            <script src="project.js"></script>
            <div class="modal-content">
                <button class="close" onclick="closeModal('postProjectModal')">X</button>
                <u><h2>Post a Project</h2></u>
                <form action="../backend/post_project.php" method="POST">
                    <script src="project.js"></script>
                    <div class="form-group">
                        <label for="title">Project Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Project Description</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="skills">Skills Required</label>
                        <input type="text" id="skills" name="skills" placeholder="e.g. PHP, JavaScript, HTML" required>
                    </div>
                    <div class="form-group">
                        <label for="budget">Budget (KSH)</label>
                        <input type="number" id="budget" name="budget" required>
                    </div>
                    <div class="form-group">
                        <label for="deadline">Deadline</label>
                        <input type="date" id="deadline" name="deadline" required>
                    </div>
                    <button type="submit" class="submit-btn">Submit Project</button>
                </form>
                <p id="project-message"></p> <!-- Success message appears here -->
                <!--<div id="successMessage">Project submitted successfully!</div>-->
            </div>
        </div>
        
    
    <script>

        

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
        //function openModal(id) {
          //  document.getElementById(id).style.display = "flex";
        //}
        //function closeModal(id) {
          //  document.getElementById(id).style.display = "none";
        //}

        
            function registerUser() {
                alert("Signup successful! Redirecting to login...");
                closeModal('signupModal'); 
                openModal('loginModal'); 
            }
        
            function openModal(modalId) {
                document.getElementById(modalId).style.display = "flex";
            }
        
            function closeModal(modalId) {
                document.getElementById(modalId).style.display = "none";
            }
        
        

        function searchJobs() {
            let input = document.getElementById('searchBar').value.toLowerCase();
            let jobs = document.querySelectorAll('.job-item');
            let noJobMessage = document.getElementById('noJob');
            let found = false;
            
            jobs.forEach(job => {
                let title = job.getAttribute('data-title').toLowerCase();
                if (title.includes(input)) {
                    job.style.display = "block";
                    found = true;
                } else {
                    job.style.display = "none";
                }
            });
            
            if (!found) {
                noJobMessage.style.display = "block";
            } else {
                noJobMessage.style.display = "none";
            }
        }

     //   let isLoggedIn = false;

       // function checkLoginStatus() {
         //   if (isLoggedIn) {
           //     openModal('postProjectModal');
            //} else {
              //  alert("You need to sign up or log in first.");
                //openModal('signupModal');
            //}
        //}

        function loginUser() {
            isLoggedIn = true;
            closeModal('loginModal');
            alert("Login successful!");
        }

        function registerUser() {
            isLoggedIn = true;
            closeModal('signupModal');
            alert("Signup successful!");
        }

        //function openModal(id) {
           //document.getElementById(id).style.display = "flex";
        //}
        //function closeModal(id) {
            //document.getElementById(id).style.display = "none";
        //}

        document.addEventListener('keydown', function(event) {
            if (event.key === "Escape") {
                closeModal('jobDetailModal');
            }
        });

        document.querySelectorAll('.job-item').forEach(item => {
            item.addEventListener('click', () => {
                document.getElementById('jobTitle').innerText = item.getAttribute('data-title');
                document.getElementById('jobDescription').innerText = item.getAttribute('data-description');
                document.getElementById('jobBudget').innerText = item.getAttribute('data-budget');
                openModal('jobDetailModal');
            });
        });

        let startX;
        document.addEventListener('touchstart', function(event) {
            startX = event.touches[0].clientX;
        });

        document.addEventListener('touchend', function(event) {
            let endX = event.changedTouches[0].clientX;
            if (startX - endX > 50) {
                window.history.back();
            }
        });

       // function checkLoginStatus() {
         //   fetch('backend/check_session.php')
           //     .then(response => response.text())
             //   .then(data => {
               //     if (data === "logged_in") {
                 //       window.location.href = "post_project.html";
                   // } else {
                     //   alert("You need to log in first!");
                    //}
                //});
        //}
        
    </script>

    <footer>
        <p>&copy; 2025 SAILFREE. All rights reserved.</p>
        <div>
            <a href="https://www.facebook.com" >
                <img src="images/facebook-icon.png" alt="Facebook" width="30">
            </a>
            <a href="https://www.twitter.com" >
                <img src="images/x-icon.png" alt="X (Twitter)" width="30">
            </a>
            <a href="https://www.instagram.com" >
                <img src="images/instagram-icon.png" alt="Instagram" width="30">
            </a>
        </div>
    </footer>
    
</body>
</html>
