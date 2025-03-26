<!DOCTYPE html>
<?php session_start();?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Login</title>
    </head>

    <body>
        <header class="pageHeader">
            <a href="index.html"><button id="signOut">Go Back</button></a>
            <h1 id="bookedLogo">booked</h1>
        </header>
        <main>
            <div id="loginContainer">
                <div id="loginBackground">
                    <form id="loginForm">
                        <input class="loginElements" type="text" id="username" placeholder="Username">
                        <input class="loginElements" type="password" id="password" placeholder="Password">
                        <button id="loginButton" type="submit">Login</button>
                    </form>
                    <p class="loginElements">Don't have an account? <a href="register.html"><u>Register Here</u></a></p>  
                </div>
            </div>
        </main>
    </body>
</html>