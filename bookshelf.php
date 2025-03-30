<?php session_start(); ?>

<?php
    // If there's no user set, kick the browser back to the index.php page -JL
    if (!isset($_SESSION["username"])) {
        //echo "Warning! Not Logged In."; // For testing purposes only. Remove later.

        header("Location: index.php");    // Production code for when testing is finished.
        exit();
    }
?>

<!DOCTYPE html>

<html id="background" lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>Bookshelf</title>
    </head>
    <body>

        <!-- Header module on all pages (booked logo and rightside link) -->
         <?php include('modules/mod-header.php'); ?>

        <main>
            <div id="welcomeMessage">
                <h2 id="welcomeText">Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
            </div>
            <div id="addBook">
                <a href="search.php"><button id="bookshelfButton">Add Book +</button></a>
            </div>

            <div class="bookContainer">
                <!-- Placeholder book-
                 <div class="bookItem">
                     <img class="bookCover" src="bookNoCover.png" alt="Purple book cover with dark purple lines to indicate a book with no cover">
                     <div class="bookContents">
                         <p class="bookTitle">Title</p>
                         <p class="bookDescription">Author</p>
                         <p class="bookDescription">Description</p>
                     </div>
                 </div>
                 </div> -->
 
             
                 <?php include 'scripts/currentBooksScript.php' ?>
 
             
 
            </div>
        </main>

        <div id="confirmationModal" class="modal">
            <div class="modalContent">
                <p>Are you sure you want to remove this book from your bookshelf?</p>
                <form id="removeBookForm" action="scripts/removeBookScript.php" method="POST">
                    <input type="hidden" name="isbn" id="modalISBN">
                    <button type="submit" class="confirmButton">Yes, Remove</button>
                    <button type="button" class="cancelButton" onclick="closeModal()">Cancel</button>
                </form>
            </div>
        </div>

        <script>
            function showModal(isbn) {
                // Show the modal
                var modal = document.getElementById('confirmationModal');
                modal.style.display = 'flex';

                // Set the ISBN in the hidden input field
                document.getElementById('modalISBN').value = isbn;
            }

            function closeModal() {
                // Hide the modal
                var modal = document.getElementById('confirmationModal');
                modal.style.display = 'none';
            }

            // Close the modal if the user clicks outside of it
            window.onclick = function(event) {
                var modal = document.getElementById('confirmationModal');
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            };
        </script>

    </body>
</html>