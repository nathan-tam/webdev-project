<?php session_start();?>
<!DOCTYPE html>
<html id="background" lang="en">
<?php   // Jonathan is currently working on this page.
        // PHP modules are being tested here. 
?>
    <head>
        <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>booked</title>
            <meta charset="UTF-8">
			<meta name="author" content="Jonathan Latkowcer">
			<meta name="email" content="latk0004@algonquincollege.com">
    </head>
    <body>
        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>
        <main>
        <!-- AboutUs uses some of the same CSS as the book listings -->
            <div id="aboutUsContainer">
                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/mikaela-small.png" alt="A headshot of a young woman.">
                    <div class="bookContents">
                        <p class="bookTitle">Mikaela Cotter</p>
                        <p class="bookDescription">Front End Designer</p><br>
                        <p class="bookDescription">A big fan of rounded edges, pastel colors, and lower case letters.</p>
                    </div>
                </div>
                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/latk0004-headshot-small.jpg" alt="A headshot of a young man.">
                    <div class="bookContents">
                        <p class="bookTitle">Jonathan Latkowcer</p>
                        <p class="bookDescription">Team Leader</p><br>
                        <p class="bookDescription">Those who do can, build.<br><br>Those who can't, lead.</p>
                    </div>
                </div>
                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/Ryan-AI.jpg" alt="A caricature of a young man with technology-related cartoon images around him.">
                    <div class="bookContents">
                        <p class="bookTitle">Ryan Marshall</p>
                        <p class="bookDescription">Back End Developer</p><br>
                        <p class="bookDescription">A database is a scary bottomless pit, and Ryan is our fearless spelunker.</p>
                    </div>
                </div>
                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/nathan-small.png" alt="A headshot of a young man while he works on a computer.">
                    <div class="bookContents">
                        <p class="bookTitle">Nathan Tam</p>
                        <p class="bookDescription">Front End Developer</p><br>
                        <p class="bookDescription">Nathan made the mistake of showing us his excellent personal websites, so he was given the most complicated job.</p>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>