<!DOCTYPE html>
<?php
    session_start();

    // check if a user is logged in
    if (!isset($_SESSION["username"])) {
        echo "Warning! Not Logged In.";
        exit;
    }
?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Bookshelf</title>
    </head>
    <body>
        <header class="pageHeader">
            <a href="login.php"><button id="signOut">Sign Out</button></a>
            <h1 id="bookedLogo">booked</h1>
        </header>
        <main>
            <div id="welcomeMessage">
                <h2 id="welcomeText">Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
            </div>
            <div id="addBook">
                <a href="search.php"><button id="bookshelfButton">Add Book +</button></a>
            </div>
        </main>
    </body>
</html>