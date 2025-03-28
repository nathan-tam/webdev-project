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
