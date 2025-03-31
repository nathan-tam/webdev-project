<?php

    // This script adds a book to the user's bookshelf.
    // It's called from the Search page when the user clicks the "Add Book" button.
    // It checks if the book already exists in the user's collection.
    // It also checks if the book already exists in the database.
    // Once the book is in the books table of the database, it adds an entry to the usersbooks table.
    // The user ends up back on the search page with a message saying the book was added.


    // Written by NT
    session_start();


    // EDGE CASE - the userID should always be set if the user is here - JL
    if (!isset($_SESSION["userID"])) {
        header("Location: ../index.php");
        exit();
    }
    
    include_once("connector.php");
    

    // Sanitize backend inputs
    $userID = filter_var($_SESSION["userID"], FILTER_SANITIZE_NUMBER_INT);
    $isbn = filter_var($_POST["isbn"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $authors = filter_var($_POST["authors"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $year = filter_var($_POST["year"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $thumbnail = filter_var($_POST["thumbnail"], FILTER_SANITIZE_URL); // sanitize the thumbnail URL
    
    // 
    // The variables should be sanitized before we do any SQL queries
    // Potential work to do before submitting! -JL
    //

   
    // Sanitize the userID and abort the script if mischief is occurring
    if (!preg_match("/^[0-9]+$/", $userID)) {
        $_SESSION["bookadded"] = "Invalid userID detected. Please sign out and login again.";
        header("Location: ../search.php");
        die();
    }
    

    // Sanitize the isbn and abort the script if mischief is occurring
    if (!preg_match("/^[0-9]+$/", $isbn)) {
        $_SESSION["bookadded"] = "Invalid ISBN detected. This book isn't supported by booked!";
        header("Location: ../search.php");
        die();
    }




    // check if the user already added this book before... -JL
    $dbConnection = databaseConnection();
    $query = "SELECT * FROM usersbooks WHERE userID = '$userID' AND isbn = '$isbn'";
    $doQuery = executeQuery($query, $dbConnection);
    $row = mysqli_fetch_assoc($doQuery);

    // If there are any results, the userid-isbn pair is present in the datbase, so they already added the book
    if ($row) {
        closeConnection($dbConnection);
        $_SESSION['bookadded']="Book already exists in your collection!";
        header("Location: ../search.php"); // Redirect back to the search page
        exit();
    }


    // check if the book already exists in the 'books' table ofthe database
    $dbConnection = databaseConnection();
    $query = "SELECT * FROM books WHERE isbn = '$isbn'";
    $doQuery = executeQuery($query, $dbConnection);
    $row = mysqli_fetch_assoc($doQuery);
    
    // if the book does not exist, insert it into the 'books' table
    if (!$row) {
        $query = "INSERT INTO books(ISBN, title, author, year, coverImage) VALUES ('$isbn', '$title', '$authors', '$year', '$thumbnail');";
        executeQuery($query, $dbConnection);
    }

    // Whether the book was already in the datbase or not, it needs to be added to the user's bookshelf
    // make an entry into the usersbooks table
    $query = "INSERT INTO usersbooks(userID, ISBN) VALUES ('$userID', '$isbn');";
    executeQuery($query, $dbConnection);

    closeConnection($dbConnection);

    $_SESSION['bookadded']="Book added to your collection!";
    header("Location: ../search.php"); // Redirect back to the search page
    exit();
?>