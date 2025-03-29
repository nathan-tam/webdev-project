<?php session_start();?>

<?php
    // Written by JL
    // This script removes a book from the user's bookshelf
    // Note that it does this by removing the userid-ISBN entry in the userbooks table
    // The book stays in the book database table -- we don't have to check if any other users have the book

    include_once("connector.php");

    // We should never end up here without a POST request, but just in case...
    if (!isset($_POST["isbntoremove"])) {
        header("Location: ../index.php");
        exit();
    }

    $isbntoremove = $_POST["isbntoremove"];

    // There should never be a non-logged in user here, but just in case...
    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        exit();
    }

    $dbConnection = databaseConnection();

    // Get the userID associated with the username
    $username = $_SESSION["username"];
    $query = "SELECT userID FROM users WHERE username = '$username';";
    $doQuery = executeQuery($query, $dbConnection);

    // EDGE CASE CHECK: Check if the query failed or there are no rows returned at all
    // (This occurs if a user is logged in, but there's no userID in the database for them)
    // This should never happen...
    if ($doQuery === false || mysqli_num_rows($doQuery) === 0) {
        header("Location: ../index.php");
        closeConnection($dbConnection);
        exit;
    }
    
    $userID = mysqli_fetch_assoc($doQuery)["userID"];

    // Send a scary SQL request to the database...
    // Remove the userid-isbn entry from the userbooks table
    $query = "DELETE FROM usersbooks WHERE userID = '$userID' AND ISBN = '$isbntoremove';";
    $doQuery = executeQuery($query, $dbConnection);

    closeConnection($dbConnection);

    /*
    // Possible error handling that could be implemented:
    if ($doQuery) {
        // Successfully removed the book from the user's bookshelf
        // Redirect to the bookshelf page to reload it
        header("Location: ../bookshelf.php");
        exit();
    } else {
        // Failed to remove the book from the user's bookshelf
        header("Location: ../error.php?error=removeBookFailed");
        exit();
    }
    */

    header("Location: ../bookshelf.php");
    exit();

    ?>