<!DOCTYPE html>
<?php session_start();?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Login/Register</title>
    </head>
    <body>
        <header class="pageHeader">
            <a href="index.php"><button id="signOut">Go Back</button></a>
            <h1 id="bookedLogo">booked</h1>
        </header>
        <main>
            <div id="registrationFormContainer">
                <form id="registrationBackground" method="POST" action="registerScript.php">
                    <div class="registrationItem">
                        <label class="registerLabel" for="username">Username:</label>
                        <input class="registerInput" type="text" id="username" name="username" placeholder="Username">
                        <span class="error" id="usernameError"></span>
                    </div>
                    
                    <div class="registrationItem">
                        <label class="registerLabel" for="email">Email:</label>
                        <input class="registerInput" type="email" id="email" name="email" placeholder="Email">
                        <span class="error" id="emailError"></span>
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
                let email = document.getElementById("email").value;
                let password = document.getElementById("password").value;
                let confirmPassword = document.getElementById("confirmPassword").value;
        
                let nameError = document.getElementById("usernameError");
                let emailError = document.getElementById("emailError");
                let passwordError = document.getElementById("passwordError");
                let confirmError = document.getElementById("confirmError");
                
                // clear the previous errors
                nameError.textContent = "";
                emailError.textContent = "";
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

                // checks if email field is empty
                //if (email === "") {
                //    emailError.textContent = "Email is required.";
                //    valid = false;
                // checks if the email is in a valid format
                //} else if (!validateEmail(email)) {
                //    emailError.textContent = "Invalid email address.";
                //    valid = false;
                //}
                
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

            function validateEmail(email) {
                const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                return emailPattern.test(email);
            }
        </script>
    </body>
</html>