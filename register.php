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

<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>booked - Register</title>
        <meta charset="UTF-8">
        <meta name="author" content="booked development team">
        <meta name="email" content="latk0004@algonquinlive.com">
        <script src="scripts/formvalidator.js"></script>
    </head>
    <body id="background">

        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>

        <main>
            <div id="registrationFormContainer">


            <?php // If there was a registration error, regscript will have set the error session variable. -JL
                    // Show the error for the user and then clear the variable
                    // This shouldn't happen, but just in case...
                    if (isset($_SESSION["registererror"])) { ?>
                        <div id="LoginError">
                            <p class="error"><?php echo $_SESSION["registererror"]; ?></p>
                        </div>
                        <?php unset($_SESSION["registererror"]); 
                    } ?>

                <div id="loginBackground">
                    <form id="loginForm" method="POST" action="scripts/registerScript.php">
                        <input class="loginElements" type="text" id="username" name="username" placeholder="Username">
                        <span class="error" id="nameError"></span>
                        <input class="loginElements" type="password" id="password" name="password" placeholder="Password">
                        <span class="error" id="passwordError"></span>
                        <input class="loginElements" type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password">
                        <span class="error" id="confirmError"></span>
                        <button id="loginButton" type="submit">Register</button>
                    </form>
                    <p class="loginElements">Already have an account? <a href="login.php"><u>Login Here</u></a></p>  
                </div>
            </div>
        </main>

        <?php // Password hashing using Browser and JS.
             // Will send hash to backend where it'll be hashed again and compared to the database hash.
         ?>

        <script>
            document.getElementById("loginForm").addEventListener("submit", async function (event) {
                // Prevent the form from submitting immediately
                event.preventDefault();

                // Get the password and confirmPassword input fields
                const passwordField = document.getElementById("password");
                const confirmPasswordField = document.getElementById("confirmPassword");

                // Hash the password using the Web Crypto API
                // Black magic sorcery for hashing in the browser rather than getting a library
                const encoder = new TextEncoder();

                const hashPassword = async (value) => {
                    const data = encoder.encode(value);
                    const hashBuffer = await crypto.subtle.digest("SHA-256", data);
                    const hashArray = Array.from(new Uint8Array(hashBuffer));
                    return hashArray.map(byte => byte.toString(16).padStart(2, '0')).join('');
                };

                // Hash both password and confirmPassword fields
                passwordField.value = await hashPassword(passwordField.value);
                confirmPasswordField.value = await hashPassword(confirmPasswordField.value);

                // Submit the form
                this.submit();
            });
    </script>
    </body>
</html>