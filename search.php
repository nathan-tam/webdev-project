<!DOCTYPE html>
<?php session_start();?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Search</title>
    </head>
    <body>
        <header class="pageHeader">
            <a href="login.php"><button id="signOut">Sign Out</button></a>
            <h1 id="bookedLogo"><a href="bookshelf.php">booked</a></h1>
        </header>
        <main>
            <div id="searchBar">
                <input id="searchBarItem" type="text" placeholder="Enter book title...">
                <button id="searchButton" type="button">Search &#x1F50D;</button>
            </div>
            <div class="bookContainer">
                <div class="bookItem">
                    <img class="bookCover" src="bookNoCover.png" alt="Purple book cover with dark purple lines to indicate a book with no cover">
                    <div class="bookContents">
                        <p class="bookTitle">Title</p>
                        <p class="bookDescription">Author</p>
                        <p class="bookDescription">Description</p>
                    </div>
                    <div class="AddBookContainer">
                        <button id="AddBookButton" type="button">+ Add Book</button>
                    </div>
                </div>
            </div>
        </main>


    </body>
</html>