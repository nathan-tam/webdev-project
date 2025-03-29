<?php session_start();?>
<?php
    // If user is logged in, send them to their library automatically -JL
    if (isset($_SESSION['username']))
    {
        header("Location: bookshelf.php");
        exit();
    }
?>
<!DOCTYPE html>
<html id="background" lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>Login</title>
    </head>
    <body>

        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>

        <main>
            <div id="loginContainer">
                
            <?php // If there was a login error, loginscript will have set the error session variable.
                    // Show the error for the user and then clear the variable
                     if (isset($_SESSION["loginerror"])) { ?>
                        <p class="error"><?php echo $_SESSION["loginerror"]; ?></p>
                        <?php unset($_SESSION["loginerror"]); } ?>

                <div id="loginBackground">

                     <?php //You can use "test" as a username to bypass the database login. ?>

                    <form id="loginForm" method="POST" action="scripts/loginScript.php">
                        <input class="loginElements" type="text" id="username" name="username" placeholder="Username">
                        <span class="error" id="nameError"></span>
                        <input class="loginElements" type="password" id="password" name="password" placeholder="Password">
                        <span class="error" id="passwordError"></span>
                        <button id="loginButton" type="submit">Login</button>
                    </form>
                    <p class="loginElements">Don't have an account? <a href="register.php"><u>Register Here</u></a></p>  
                </div>
            </div>
        </main>
        
        <script>

            // The scripting validates input for the username and password fields.
            // The user sees warnings if forbidden characters are added
            // Simple REGEX checks for username and password
            function validateUsername(event) {
                var username = document.getElementById('username').value;

                var usernamePattern = /^[a-zA-Z0-9]+$/;
                if (!usernamePattern.test(username)) {
                    nameError.textContent = "Invalid username.";
                    event.preventDefault();
                }
                else {
                    nameError.textContent = "";
                }
            }

            function validatePassword(event) {
                var pass = document.getElementById('password').value;

                // checks if the password field is empty
                if (pass === "") {
                    passwordError.textContent = "Password is required.";
                    event.preventDefault();
                }
                else{
                    passwordError.textContent = "";
                }
            }

            document.addEventListener('DOMContentLoaded', function () {

            var usernamefield = document.getElementById('username');
            usernamefield.addEventListener('input', validateUsername);

            var passwordfield = document.getElementById('password');
            passwordfield.addEventListener('input', validatePassword);

            
            var form = document.getElementById('loginForm');
            form.addEventListener('submit', validateUsername);
            form.addEventListener('submit', validatePassword);

            });


           /* function validateForm() {
                let username = document.getElementById("username").value;
                let password = document.getElementById("password").value;

                let valid = true;
                
                // checks if the username field is empty or invalid
                const usernamePattern = /^[a-zA-Z0-9_]+$/;

                if (username === "") {
                    nameError.textContent = "Username is required.";
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
            }*/
        </script>
    </body>
</html>