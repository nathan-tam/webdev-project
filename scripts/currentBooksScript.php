<?php
    // Written by JL


    // This script gets the books for the user's bookshelf and outputs the HTML for bookshelf.php
    // It has to do multiple SQL calls:
    //   What's the userID for the username?
    //   What ISBNs are attached to the userID?
    //   Get the book info for those ISBNs (this needs an SQL call for each book)

    include_once("connector.php");

    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else {
        //  Stop the script immediately if the user isn't logged in.
        // This script is called from bookshelf.php which required you to be logged in
        die("User not logged in.");
    }

    $dbConnection = databaseConnection();

    // Get the userID associated with the username
    $query = "SELECT userID FROM users WHERE username = '$username';";
    $doQuery = executeQuery($query, $dbConnection);


    // EDGE CASE CHECK: Check if the query failed or there are no rows returned at all
    // This occurs if a user is logged in, but there's no userID in the database for them
    // This should never happen...
    if ($doQuery === false || mysqli_num_rows($doQuery) === 0) {
        echo '<p id="nobooksinbookshelf">No bookshelf registered for your account! Please contact technical support.</p>';
        closeConnection($dbConnection);
        exit; // Stop further processing
    }
    
    $userID = mysqli_fetch_assoc($doQuery)["userID"];


    // Get the ISBNs of the books associated with the userID
    $query = "SELECT * FROM usersbooks WHERE userID = '$userID';";

    $doQuery = executeQuery($query, $dbConnection);
    $bookisbns = array();

    while ($row = mysqli_fetch_assoc($doQuery)) {
        $bookisbns[] = $row["ISBN"];
    }

    // Check if the user has any books in the database
    // This is a normal situation
    // If there are no books, the bookshelf page will just have a simple message instead of the normal book container HTML
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
            "description" => $bookInfo["description"],
            "coverImage" => $bookInfo["coverImage"]
        );
    } 

    closeConnection($dbConnection);

    // Store the $books array in the session
    //   (Not in use at the moment)
    //$_SESSION["books"] = $books;


  // Iterate through $books and echo book
  // This section makes the HTML for the bookshelf page
  // Every book gets its own bookitem
  //   Using htmlspecialchars to prevent html mischief
    foreach ($books as $book) {
        echo '<div class="bookItem">';
        echo '<img class="bookCover" src="' . htmlspecialchars($book["coverImage"]) . '" alt="Book cover">';
        echo '<div class="bookContents">';
        echo '<p class="bookTitle">' . htmlspecialchars($book["title"]) . '</p>';
        echo '<p class="bookAuthor">' . htmlspecialchars($book["author"]) . '</p>';
        echo '<p class="bookDescription">' . htmlspecialchars($book["description"]) . '</p>';
        // Hidden form so that the Remove Book button can communicate which book it belongs to
        echo '<form method="POST" action="scripts/removeBookScript.php">';
        echo '<input type="hidden" name="isbntoremove" value="' . htmlspecialchars($book["ISBN"]) . '">';   
        echo '<button type="submit">Remove book</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
