<?php

// Written by Jonathan Latkowcer
// This script is called when someone pushes the signout button.
// Destroys the session and clear variables, then sends the user back to the home/login page.

session_start();

session_unset();
session_destroy();
header("Location: ../index.php");
exit();
?>