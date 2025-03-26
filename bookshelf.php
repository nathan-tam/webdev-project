<!DOCTYPE html>
<?php session_start();?>
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
            <div id="addBook">
                <a href="search.php"><button id="bookshelfButton">Add Book +</button></a>
            </div>
        </main>
    </body>
</html>
