<?php session_start();?>

<?php
    // Written by JL
    // This script removes a book from the user's bookshelf
    // Note that it does this by removing the userid-ISBN entry in the userbooks table
    // The book stays in the book database table -- we don't have to check if any other users have the book

    include_once("connector.php");

    // We should never end up here without a POST request, but just in case...
    if (!isset($_POST["isbntoremove"])) {
        header("Location: ../aboutUs.php");  //TESTING
        exit();
    }

    $isbntoremove = $_POST["isbntoremove"];

    // There should never be a non-logged in user here, but just in case...
    if (!isset($_SESSION["username"])) {
        header("Location: ../index.php");
        exit();
    }

    // EDGE CASE in case no userID set
    // Get the userID associated with the username

    if (!isset($_SESSION["userID"])) {

        $query = "SELECT userID FROM users WHERE username = '$username';";
        $doQuery = executeQuery($query, $dbConnection);

        // EDGE CASE CHECK: Check if the query failed or there are no rows returned at all
        // (This occurs if a user is logged in, but there's no userID in the database for them)
        // This should never happen...
        if ($doQuery === false || mysqli_num_rows($doQuery) === 0) {
            closeConnection($dbConnection);
            header("Location: ../index.php");
            exit;
        }
        
        $_SESSION["userID"] = mysqli_fetch_assoc($doQuery)["userID"];

    }
    

    $username = $_SESSION["username"];
    $userID = $_SESSION["userID"];
    $dbConnection = databaseConnection();



    // Send a scary SQL request to the database...
    // Remove the userid-isbn entry from the userbooks table
    $query = "DELETE FROM usersbooks WHERE userID = '$userID' AND ISBN = '$isbntoremove';";
    $doQuery = executeQuery($query, $dbConnection);

    $SESSION_["bookremoved"] = "Book removed from your collection!";

    closeConnection($dbConnection);


    header("Location: ../bookshelf.php");
    exit();

    ?>