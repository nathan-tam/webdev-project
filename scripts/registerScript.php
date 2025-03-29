<?php
    session_start();
    include_once("connector.php");

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // sanitize the username
        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            $_SESSION["registererror"] = "Invalid username: no special characters are allowed.";
            header("Location: ../register.php");
            die();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $dbConnection = databaseConnection();
        $query = "INSERT INTO users(username, passwordHash) VALUES ('$username', '$password');";
        $doQuery = executeQuery($query, $dbConnection);

        closeConnection($dbConnection);

        // Check if the query was successful
        if (!$doQuery) {
            // Failed to register the user
            // Added some extra error handling -- sets a SESSION variable that shows on reg page -JL
            // Also kicks the user back to the reg page
            $_SESSION["registererror"] = "Registration failed. Please try again.";
            header("Location: ../register.php");
            die();
        }
    } else {
        // Changed error handling to send user back to reg page -JL
        $_SESSION["registererror"] = "Invalid registration request. Please try again.";
        header("Location: ../register.php");
        die();
    }

    // If the registration worked, send the use to the login page.
    header("Location: ../login.php")
?>