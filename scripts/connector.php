<?php
function databaseConnection() {
    $server = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "bookedbased";

    $connection = mysqli_connect($server, $dbUser, $dbPassword, $dbName);

    if (!$connection) {
        exit("Connection failed: " . mysqli_connect_error());
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