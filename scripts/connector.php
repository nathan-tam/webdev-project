<?php

// Some functions used to interact with the database

// Written by Professor Frank Emanuel
// Downloaded from https://github.com/PomoRev/NET3010_25W/blob/tutorial/crosswordDBhelper.php
// Modified by Jonathan Latkowcer and Nathan Tam


// DATABASE CONNECTION CONTROLS:
//    Currently configured to work with default XAMPP database

function databaseConnection() {
    $server = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "bookedbased";

    // Experimental code to handle the database being down
    // A message will be displayed on the index.php page if a database transaction is attempted while the database isn't working 
    // The user shouldn't see this message, but just in case.... -JL

    // Enable exceptions for mysqli errors
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $connection = mysqli_connect($server, $dbUser, $dbPassword, $dbName);
    } catch (mysqli_sql_exception $e) {
       
        // Database is down!
        // Send the user back to the main page with an error
        header("Location: ../index.php");
        $_SESSION["dberror"] = "Database connection failed. Please try again later.";
        exit();
    }

    return $connection;
}

function closeConnection($connection) {
    mysqli_close($connection);
}

function executeQuery($query, $connection) {
    return mysqli_query($connection, $query);
}
?>