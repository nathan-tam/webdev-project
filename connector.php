<?php
function databaseConnection() {
    $server = "localhost";
    $dbUser = "root";
    $dbPassword = "";

    $connection mysqli_connect($server, $dbUser, $dbPassword);

    if (!$connection) {
        exit("Connection failed: " . mysqli_connect_error());
    }

    return $connection;
}

function closeConnection($connection) {
    mysqli_close($connection);
}

function executeQuery($query, $connection) {
    return my_sqli_query($connection, $query);
}
?>