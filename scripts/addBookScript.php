<?php
    // Written by NT
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        exit();
    }

    // Edge case - JL
    if (!isset($_SESSION["userID"])) {
        header("Location: ../index.php");
        exit();
    }
    
    include_once("connector.php");
    
    $userId = $_SESSION["userID"];
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $authors = $_POST["authors"];
    $year = $_POST["year"];
    $thumbnail = $_POST["thumbnail"];
    
    // check if the book already exists in the 'books' table
    $dbConnection = databaseConnection();
    $query = "SELECT * FROM books WHERE isbn = $isbn";
    $doQuery = executeQuery($query, $dbConnection);
    $row = mysqli_fetch_assoc($doQuery);
    
    // if the book does not exist, insert it into the 'books' table
    if (!$row) {
        $query = "INSERT INTO books(ISBN, title, author, year, coverImage) VALUES ('$isbn', '$title', '$authors', '$year', '$thumbnail');";
        $doQuery= executeQuery($query, $dbConnection);
    }

    // make an entry into the usersbooks table
    $query = "INSERT INTO usersbooks(userID, ISBN) VALUES ('$userId', '$isbn');";
    $doQuery = executeQuery($query, $dbConnection);

    closeConnection($dbConnection);

    $_SESSION['bookadded']="Book added to your collection!";
    header("Location: ../search.php"); // Redirect back to the search page
    exit();
?>