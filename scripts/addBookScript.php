<?php
    // Written by NT
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        exit();
    }

    // Edge case userID should always be set if username is set - JL
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
    
    // check if the user already added this book before... -JL
    $dbConnection = databaseConnection();
    $query = "SELECT * FROM usersbooks WHERE userID = '$userId' AND isbn = '$isbn'";
    $doQuery = executeQuery($query, $dbConnection);
    $row = mysqli_fetch_assoc($doQuery);

    // If there are any results, the userid-isbn pair is present, so they have the book already
    if ($row) {
        closeConnection($dbConnection);
        $_SESSION['bookadded']="Book already exists in your collection!";
        header("Location: ../search.php"); // Redirect back to the search page
        exit();
    }


    // check if the book already exists in the 'books' table
    $dbConnection = databaseConnection();
    $query = "SELECT * FROM books WHERE isbn = '$isbn'";
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