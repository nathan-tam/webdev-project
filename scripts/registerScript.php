<?php
    session_start();

    include_once("connector.php");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // sanitize the username
        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            die("Invalid username.");
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $dbConnection = databaseConnection();
        $query = "INSERT INTO users(username, passwordHash) VALUES ('$username', '$password');";
        $doQuery = executeQuery($query, $dbConnection);

        closeConnection($dbConnection);
    } else {
        die("Invalid request.");
    }

    header("Location: ../login.php")
?>