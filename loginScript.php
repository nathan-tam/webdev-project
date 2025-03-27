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

        // get all the users from the database
        $query = "SELECT username, passwordHash, FROM bookbased.users";
        $doQuery = executeQuery($query, $dbConnection);

        // loop through the results of the query and check for credential match
        while ($row = mysqli_fetch_assoc($doQuery)) {
            if ($row["username"] == $username && $row["passwordHash"] == $password) {
                $_SESSION["username"] = $username;
                break;
            }
        }

        closeConnection($dbConnection);
    } else {
        die("Invalid request.");
    }

    header("Location: bookself.php")
?>