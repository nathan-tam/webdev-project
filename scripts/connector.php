<?php
function databaseConnection() {
    $server = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "bookedbased";

    // Experimental code to handle the database being down
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