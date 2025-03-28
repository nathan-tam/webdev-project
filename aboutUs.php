<!DOCTYPE html>
<?php session_start();?>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Booked</title>
    </head>

    <header class="pageHeader">
        <a href="index.php"><button id="signOut">Go Back</button></a>
        <h1 id="bookedLogo">booked</h1>
    </header>

    <body>

        <main>
            <div id="aboutUsContainer">
                    <div class="aboutUsItem">
                        <img class="aboutUsImage" src="bookNoCover.png" alt="Purple book cover with dark purple lines to indicate a book with no cover">
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