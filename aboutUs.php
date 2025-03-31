<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>booked</title>
            <meta charset="UTF-8">
			<meta name="author" content="booked development team">
			<meta name="email" content="bookeddev@algonquincollege.com">
    </head>
    <body id="background">
        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>
        <main>
            <div id="aboutUsContainer">
                
                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/mikaela-small.png" alt="A headshot of a young woman.">
                    <div class="aboutUsContents">
                        <p class="aboutUsTitle">Mikaela Cotter</p>
                        <p class="aboutUsDescription">Front End Designer</p><br>
                        <p class="aboutUsDescription">A big fan of rounded edges, pastel colors, and lower case letters.</p>
                    </div>
                </div>

                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/Ryan-AI.jpg" alt="A caricature of a young man with technology-related cartoon images around him.">
                    <div class="aboutUsContents">
                        <p class="aboutUsTitle">Ryan Marshall</p>
                        <p class="aboutUsDescription">Back End Developer</p><br>
                        <p class="aboutUsDescription">A database is a scary bottomless pit, and Ryan is our fearless spelunker. He also assures us that .js is a real file type. </p>
                    </div>
                </div>

                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/nathan-small.png" alt="A headshot of a young man while he works on a computer.">
                    <div class="aboutUsContents">
                        <p class="aboutUsTitle">Nathan Tam</p>
                        <p class="aboutUsDescription">Front End Developer</p><br>
                        <p class="aboutUsDescription">Nathan made the mistake of showing us his excellent personal websites, so he was given the most complicated job.</p>
                    </div>
                </div>

                <div class="aboutUsItem">
                    <img class="aboutUsImage" src="images/latk0004-headshot-small.jpg" alt="A headshot of a young man.">
                    <div class="aboutUsContents">
                        <p class="aboutUsTitle">Jonathan Latkowcer</p>
                        <p class="aboutUsDescription">Team Leader</p><br>
                        <p class="aboutUsDescription">Those who can, build.<br><br>Those who can't, lead.</p>
                    </div>
                </div>

            </div>
        </main>
    </body>
</html>