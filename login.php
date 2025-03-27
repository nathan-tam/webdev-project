<!DOCTYPE html>
<?php session_start();?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Login</title>
    </head>
    <body>
        <header class="pageHeader">
            <a href="index.php"><button id="signOut">Go Back</button></a>
            <h1 id="bookedLogo">booked</h1>
        </header>
        <main>
            <div id="loginContainer">
                <div id="loginBackground">
                    <form id="loginForm" method="POST" action="loginScript.php">
                        <input class="loginElements" type="text" id="username" placeholder="Username">
                        <span class="error" id="nameError"></span>
                        <input class="loginElements" type="password" id="password" placeholder="Password">
                        <span class="error" id="passwordError"></span>
                        <button id="loginButton" type="submit" onclick="validateForm()>Login</button>
                    </form>
                    <p class="loginElements">Don't have an account? <a href="register.php"><u>Register Here</u></a></p>  
                </div>
            </div>
        </main>
        <script>
            function onClick() {
                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;

                let valid = true;
                
                // checks if the username field is empty or invalid
                const usernamePattern = /^[a-zA-Z0-9_]+$/;

                if (username === "") {
                    nameError.textContent = "Name is required.";
                    valid = false;
                } else if (!usernamePattern.test(username)) {
                    nameError.textContent = "Invalid username.";
                    valid = false;
                }

                // checks if the password field is empty
                if (password === "") {
                    passwordError.textContent = "Password is required.";
                    valid = false;
                }
            }
        </script>
    </body>
</html>