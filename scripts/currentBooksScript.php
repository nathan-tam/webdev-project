<?php
    // Written by JL with a lot of AI assistance.


    include_once("connector.php");

    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else {
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
    // If they don't, display a message and stop further processing
    if (empty($bookisbns)) {
        echo '<p id="nobooksinbookshelf">No books in your bookshelf yet!</p>';
        closeConnection($dbConnection);
        exit; // Stop further processing
    }

    // Get the book info for each ISBN
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
    $_SESSION["books"] = $books;


  // Iterate through $books and echo book items
    foreach ($books as $book) {
        echo '<div class="bookItem">';
        echo '<img class="bookCover" src="' . htmlspecialchars($book["coverImage"]) . '" alt="Book cover">';
        echo '<div class="bookContents">';
        echo '<p class="bookTitle">' . htmlspecialchars($book["title"]) . '</p>';
        echo '<p class="bookAuthor">' . htmlspecialchars($book["author"]) . '</p>';
        echo '<p class="bookDescription">' . htmlspecialchars($book["description"]) . '</p>';
        echo '</div>';
        echo '</div>';
    }



    // Testing
    //echo json_encode($books);