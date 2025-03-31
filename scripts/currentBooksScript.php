<?php

    // This script gets the books for the user's bookshelf and outputs the HTML for bookshelf.php
    // Called every time the bookshelf page is loaded

    // It has to do multiple SQL calls:
    //   What's the userID for the username?
    //   What ISBNs are attached to the userID?
    //   Get the book info for those ISBNs (this needs an SQL call for each book)
    //
    // This script could be optimized!
    // Written by JL

    include_once("connector.php");


    // userID should always be set - JL
    if (isset($_SESSION["userID"])) {

        $userID = $_SESSION["userID"];

    }
    else
    {
        // Stop the script immediately if the user isn't properly logged in.
        // This script is called from bookshelf.php which requires you to be logged in
        // This should never happen
        header("Location: ../index.php");
        exit();
    }


    // sanitize the username and don't show any books if mischief is occurring
    if (!preg_match("/^[0-9]+$/", $userID)) {
        echo '<p id="nobooksinbookshelf">There appears to be a problem with your userID. Please sign-out and log in again.</p>';
        die();
    }

    //userID is the only input that we need to sanitize, since everything else comes from the DB



    // Get the userID associated with the username
    //$query = "SELECT userID FROM users WHERE username = '$username';";
    //$doQuery = executeQuery($query, $dbConnection);


    // EDGE CASE CHECK: Check if the query failed or there are no rows returned at all
    // This occurs if a user is logged in, but there's no userID in the database for them
    // This should never happen...
   // if ($doQuery === false || mysqli_num_rows($doQuery) === 0) {
   //     echo '<p id="nobooksinbookshelf">No bookshelf registered for your account! Please contact technical support.</p>';
   //     closeConnection($dbConnection);
   //     exit; // Stop further processing
   // }
    
    //$userID = mysqli_fetch_assoc($doQuery)["userID"];

    $dbConnection = databaseConnection();

    // Get the ISBNs of the books associated with the userID and put them into an array
    $query = "SELECT * FROM usersbooks WHERE userID = '$userID';";
    $doQuery = executeQuery($query, $dbConnection);
    $bookisbns = array();

    while ($row = mysqli_fetch_assoc($doQuery)) {
        $bookisbns[] = $row["ISBN"];
    }

    // Check if the user has any books in the database
    // If there are no books, the bookshelf page will just have a simple message instead of the normal book container HTML
    // This is a normal situation (like for a new user)
    if (empty($bookisbns)) {
        echo '<p id="nobooksinbookshelf">No books in your bookshelf yet!</p>';
        closeConnection($dbConnection);
        exit; // Stop further processing
    }

    // Get the book info for each ISBN
    // This requires a lot of SQL calls
    foreach ($bookisbns as $isbn) {
        $query = "SELECT * FROM books WHERE ISBN = '$isbn';";
        $doQuery = executeQuery($query, $dbConnection);
        $bookInfo = mysqli_fetch_assoc($doQuery);
        $books[] = array(
            "ISBN" => $bookInfo["ISBN"],
            "title" => $bookInfo["title"],
            "author" => $bookInfo["author"],
            "year" => $bookInfo["year"],
            "coverImage" => $bookInfo["coverImage"]
        );
    } 

    closeConnection($dbConnection);


  // Iterate through $books and echo book
  // This section makes the HTML for the bookshelf page
  // Every book gets its own bookitem
  //   Using htmlspecialchars to prevent html mischief
    foreach ($books as $book) {
        echo '<div class="bookItem">';
            echo '<div class="bookOverview">';
                echo '<img class="bookCover" src="' . htmlspecialchars($book["coverImage"]) . '" alt="Book cover">';
                echo '<div class="bookContents">';
                    echo '<p class="bookTitle">' . htmlspecialchars_decode($book["title"]) . '</p>';
                    echo '<p class="bookAuthor">' . htmlspecialchars_decode($book["author"]) . '</p>';
                    echo ('<p class="bookYear"> Date of publishing: ' . htmlspecialchars_decode($book["year"]) . '</p>');
                echo '</div>';
                echo '<div class="AddBookContainer">';
                    echo '<form>';
                    echo '<button type="button" class="AddBookButton" onclick="showModal(\'' . htmlspecialchars($book["ISBN"]) . '\')">Remove Book</button>';
                    echo '</form>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
