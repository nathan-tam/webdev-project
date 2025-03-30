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
        <script src="scripts/formvalidator.js"></script>
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
    </body>
</html>