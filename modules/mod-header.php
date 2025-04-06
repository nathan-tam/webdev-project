<?php //Written by Jonathan Latkowcer?>

<header class="pageHeader">
        
    <?php 
    // Only show the signout button if the user is logged in (mostly affects AboutUs page)
    if (isset($_SESSION['username'])){ ?>
        <form action="scripts/logoutScript.php" method="post">
            <button id="signOut" type="submit">Sign Out</button>
        </form>
       <?php }  ?>
        
    <?php // Sends the user back to the index page. If they're signed in, the index page will send them to their bookshelf instead 
    ?>
        <h1 id="bookedLogo"><a href="index.php">booked</a></h1>
</header>