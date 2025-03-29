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

        closeConnection($dbConnection);

        $row = mysqli_fetch_assoc($doQuery);


        // Added some extra error handling -- sets a SESSION variable that shows on login page -JL
        // Also kicks the user back to the login page
        if ($row) {
            // verify the password
            if (password_verify($password, $row["passwordHash"])) {
                $_SESSION["username"] = $username;
            } else {
                $_SESSION["loginerror"] = "Invalid password.";
                header("Location: ../login.php");
                die();
            }
        } else {
            $_SESSION["loginerror"] = "User not found.";
            header("Location: ../login.php");
            die();
        }

        
    } else {
        $_SESSION["loginerror"] = "Invalid login request. Please try again.";
        header("Location: ../login.php");
        die();
    }

    header("Location: ../bookshelf.php")
?>