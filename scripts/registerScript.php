<?php
    session_start();
    include_once("connector.php");

    // This script registers a new user in the database
    // Enters their username and hashed password into the database
    // The database automatically assigns them a userID (so it's not sent from here)

    // Incoming $_POST-password is hashed from the front-end
    // We're double-hashing it! -JL

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Sanitize the username. Kick the user back to the registration page if mischief is occurring -JL
        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            $_SESSION["registererror"] = "Invalid username: no special characters are allowed.";
            header("Location: ../register.php");
            die();
        }

        // Check if the username is already taken -JL
        $dbConnection = databaseConnection();
        $query = "SELECT * FROM users WHERE username = '$username'";
        $doQuery = executeQuery($query, $dbConnection);


         // If any rows are returned, that username already exists
        if (mysqli_num_rows($doQuery) > 0) {
            // Username is taken, so send the user back to the registration with an error -JL
            // SESSION variable used to show the error on the reg page
            closeConnection($dbConnection);
            $_SESSION["registererror"] = "Username is already taken. Please choose a different one.";
            header("Location: ../register.php");
            die();
        }


        // Password gets hashed on front end and here, so should be safe for SQL
        $password = password_hash($password, PASSWORD_DEFAULT);


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
        // If the POST variables are missing for some reason, kick the user back to the reg page
        $_SESSION["registererror"] = "Invalid registration request. Please try again.";
        header("Location: ../register.php");
        die();
    }

    // If the registration worked, send the user to the login page.
    header("Location: ../login.php")
?>