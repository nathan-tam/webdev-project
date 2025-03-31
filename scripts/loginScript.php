<?php
    session_start();

    // This script handles logging in a user
    // A username and password-hash are handed over via POST
    // The script checks the database for a matching username and password
    // If a match is found, the user is logged in and redirected to the bookshelf page


    // TEST CODE FOR NON-DB USER: -JL
    // Allows you to log in without the database
    // To remain commented, except for testing purposes
    //if ($_POST['username'] == "test"){
    //    $_SESSION["username"] = "test";
    //    $_SESSION["userID"] = "999";
    //    header("Location: ../bookshelf.php");
    //    exit();
    //}



    // Password should be arriving in a hashed form from the front-end
    // We're double-hashing it! -JL

    include_once("connector.php");

    // Be careful making edits because of the nested IF statements.

    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // sanitize the username and kick the user back to the login page if mischief is occurring
        if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
            $_SESSION["loginerror"] = "Invalid login request. Please try again.";
            header("Location: ../login.php");
            die();
        }

        $dbConnection = databaseConnection();

        // query for the user with the given username
        $query = "SELECT passwordHash FROM users WHERE username = '$username';";
        $doQuery = executeQuery($query, $dbConnection);


        $row = mysqli_fetch_assoc($doQuery);


        // Nathan's password verification code.
        // You have to use password_verify to check the password because of the salt.
        if ($row) {
            // verify the password
            if (password_verify($password, $row["passwordHash"])) {
                $_SESSION["username"] = $username;


                 // set the session variable for the user ID
                 $query = "SELECT userID FROM users WHERE username = '$username';";
                 $doQuery = executeQuery($query, $dbConnection);
                 $row = mysqli_fetch_assoc($doQuery);
                 closeConnection($dbConnection);


                 // Grabbing userID to make things easier later -NT
                 $_SESSION["userID"] = $row["userID"];


            } else {

               // Added error handling -- sets a SESSION variable error that shows on login page -JL
                // Also kicks the user back to the login page
                closeConnection($dbConnection);

                $_SESSION["loginerror"] = "Invalid password.";
                header("Location: ../login.php");
                die();
            }
        } else {
            closeConnection($dbConnection);

            $_SESSION["loginerror"] = "User not found.";
            header("Location: ../login.php");
            die();
        }

        
    } else {

        // A POST variable is missing for some reason, kick the user back to the login page

        $_SESSION["loginerror"] = "Invalid login request. Please try again.";
        header("Location: ../login.php");
        die();
    }

    header("Location: ../bookshelf.php")
?>