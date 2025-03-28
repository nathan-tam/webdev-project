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
        
        <!-- Header module on all pages (booked logo and rightside link) -->
         <?php include('modules/mod-header.php'); ?>

        <main>
            <div id="welcomeMessage">
                <h2 id="welcomeText">Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
            </div>
            <div id="addBook">
                <a href="search.php"><button id="bookshelfButton">Add Book +</button></a>
            </div>

            <div class="bookContainer">
                <div class="bookItem">
                    <img class="bookCover" src="bookNoCover.png" alt="Purple book cover with dark purple lines to indicate a book with no cover">
                    <div class="bookContents">
                        <p class="bookTitle">Title</p>
                        <p class="bookDescription">Author</p>
                        <p class="bookDescription">Description</p>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>