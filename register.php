<!DOCTYPE html>
<?php session_start();?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Login/Register</title>
    </head>
    <body>

        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>
        
        <main>
            <div id="registrationFormContainer">
                <form id="registrationBackground" method="POST" action="registerScript.php">
                    <div class="registrationItem">
                        <label class="registerLabel" for="username">Username:</label>
                        <input class="registerInput" type="text" id="username" name="username" placeholder="Username">
                        <span class="error" id="usernameError"></span>
                    </div>

                    <div class="registrationItem">
                        <label class="registerLabel" for="password">Password:</label>
                        <input class="registerInput" type="password" id="password" name="password" placeholder="Password">
                        <span class="error" id="passwordError"></span>
                    </div>

                    <div class="registrationItem">
                        <label class="registerLabel" for="confirmPassword">Confirm Password:</label>
                        <input class="registerInput" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                        <span class="error" id="confirmError"></span>
                    </div>
                    <button id="registerButton" type="button" onclick="validateForm()" value="submit">Register</button>
                </form>
            </div>
        </main>
        <script>
            function validateForm() {
                let name = document.getElementById("username").value;
                let password = document.getElementById("password").value;
                let confirmPassword = document.getElementById("confirmPassword").value;
        
                let nameError = document.getElementById("usernameError");
                let passwordError = document.getElementById("passwordError");
                let confirmError = document.getElementById("confirmError");
                
                // clear the previous errors
                nameError.textContent = "";
                confirmError.textContent = "";
                
                let valid = true;

                // checks if the username field is empty or invalid
                const usernamePattern = /^[a-zA-Z0-9_]+$/;

                if (name === "") {
                    nameError.textContent = "Name is required.";
                    valid = false;
                } else if (!usernamePattern.test(name)) {
                    nameError.textContent = "Invalid username.";
                    valid = false;
                }
                
                // checks if the password field is empty
                if (password === "") {
                    passwordError.textContent = "Password is required!";
                    valid = false;
                // checks if the confirm password field is empty
                } else if (confirmPassword === "") {
                    confirmError.textContent = "Password confirmation is required!";
                    valid = false;
                // checks if the password matches the password confirmation
                } else if (password !== confirmPassword) {
                    confirmError.textContent = "The passwords do not match!"
                    valid = false;
                }

                if (valid) {
                    document.getElementById("registrationBackground").submit();
                }
            }
        </script>
    </body>
</html>