<?php session_start();?>

<?php

    // Use the variable below for testing.
    //$_SESSION['username'] = 'jonathan'; 

    // If user is logged in, send them to their library automatically
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
    <title>booked</title>
    </head>
    <body id="homepageBody">
        <main>
            <h1 id="welcomeBanner">welcome to booked!</h1>
            <div id="buttonContainer">
                <a href="login.php"><button class="welcomeButton">Login</button></a>
                <a href="register.php"><button class="welcomeButton">Sign Up</button></a>
                <a href="aboutUs.php"><button class="welcomeButton">About Us</button></a>
            </div>
            <div>
                <?php if (isset($_SESSION["dberror"])){
                 echo('<p>'. $_SESSION["dberror"] .'</p>');
                 unset($_SESSION["dberror"]); } ?>
            </div>
        </main>
    </body>
</html>