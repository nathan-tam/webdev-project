<?php session_start();?>

<?php

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
            <!-- These links look like buttons because they're part of welcomeButton due to CSS! -JL -->
            <div id="buttonContainer">
                <a href="login.php" class="welcomeButton">Login</a>
                <a href="register.php" class="welcomeButton">Sign Up</a>
                <a href="aboutUs.php" class="welcomeButton">About Us</a>
            </div>
            <div>
            <!-- Displays an error if the database can't connect  -->
                <?php if (isset($_SESSION["dberror"])){
                 echo('<div id=\'dberrormessage\'><p>'. $_SESSION["dberror"] .'</p>');
                 unset($_SESSION["dberror"]); } ?>
            </div>
        </main>
    </body>
</html>