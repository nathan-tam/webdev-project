<?php session_start();?>

<?php

    // If user is logged in, send them to their library automatically
    //   This page should only be visible by guests who aren't logged in
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
    <meta charset="UTF-8">
    <meta name="author" content="booked development team">
    <meta name="email" content="latk0004@algonquinlive.com">
    </head>
    <body id="homepageBody">
        <main>
            <h1 id="welcomeBanner">welcome to booked!</h1>
            <!-- These links look like buttons due to CSS: they're part of welcomeButton -JL -->
            <div id="buttonContainer">
                <a href="login.php" class="welcomeButton">Login</a>
                <a href="register.php" class="welcomeButton">Sign Up</a>
                <a href="aboutUs.php" class="welcomeButton">About Us</a>
            </div>
            <div>
            <!-- Displays unique error if the database can't connect
                    This happens if a major DB exception is thrown when logging in or registering.  -->
                <?php if (isset($_SESSION["dberror"])){
                 echo('<div id=\'dberrormessage\'><p>&nbsp;&nbsp;'. $_SESSION["dberror"] .'</p>');
                 unset($_SESSION["dberror"]); } ?>
            </div>
        </main>
    </body>
</html>