<?php
    session_start();


     // TEST CODE FOR NON-DB USER: -JL
    if ($_POST['username'] == "test"){
        $_SESSION["username"] = "test";
        header("Location: ../bookshelf.php");
        exit();
    }

    include_once("connector.php");


    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // sanitize the username
        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            die("Invalid username.");
        }

        $dbConnection = databaseConnection();

        // query for the user with the given username
        $query = "SELECT passwordHash FROM users WHERE username = '$username';";
        $doQuery = executeQuery($query, $dbConnection);

        $row = mysqli_fetch_assoc($doQuery);

        if ($row) {
            // verify the password
            if (password_verify($password, $row["passwordHash"])) {
                $_SESSION["username"] = $username;
            } else {
                die("Invalid password.");
            }
        } else {
            die("User not found.");
        }

        closeConnection($dbConnection);
    } else {
        die("Invalid Login Request.");
    }

    header("Location: bookshelf.php")
?>