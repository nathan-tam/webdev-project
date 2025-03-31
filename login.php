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
        <title>booked - Login</title>
        <meta charset="UTF-8">
        <meta name="author" content="booked development team">
        <meta name="email" content="bookeddev@algonquincollege.com">
        <script src="scripts/formvalidator.js"></script>
    </head>
    <body id="background">

        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>

        <main>
            <div id="loginContainer">
                
            <?php // If there was a login error, loginscript will have set the error session variable.
                    // Show the error for the user and then clear the variable
                    if (isset($_SESSION["loginerror"])) { ?>
                        <div id="LoginError">
                            <p class="error"><?php echo $_SESSION["loginerror"]; ?></p>
                        </div>
                        <?php unset($_SESSION["loginerror"]); 
                    } ?>
                

                <div id="loginBackground">

                     <?php //You can use "test" as a username to bypass the database login.
                     // Commented out in loginscript, currently. ?>

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

        <?php 
        // Password hashing using Browser and JS.
        // Will send hash to backend where it'll be hashed again and compared to the database hash.
        // Written by JL with internet help
        ?>
        <script>
            document.getElementById("loginForm").addEventListener("submit", async function (event) {
                document.getElementById("username").style.visibility = "hidden";
                document.getElementById("password").style.visibility = "hidden";
                
                // Prevent the form from submitting immediately
                event.preventDefault();

                // Get the password input field
                const passwordField = document.getElementById("password");

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

                // Submit the form
                this.submit();
            });
        </script>

    </body>
</html>