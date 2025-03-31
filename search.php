<?php session_start(); ?>
<?php

    // This page lets users search for books
    // It also displays the results
    // You can add books directly from the search results

    // The search results are pulled using the Google Books API
    // Written by Ryan and Nathan



    // if there's no user set, kick the browser back to the index.php page -JL
    // Only logged-in users allowed on this page.

    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }

    // initialize the query variable, breaks otherwise
    $query = "";

    if (isset($_POST["query"])) {
        $query = $_POST["query"];
        $apiKey = "AIzaSyCN0rx7SH_UZjiW1yNeeB-fOyjh0khMbc8";    // hardcoded Google Books API from Ryan

        // urlencode() is used to convert a string into something useable in a URL (e.g., spaces, &, = become %20, %26, %3D)
        $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&maxResults=5&key=" . $apiKey;

        // MAX RESULTS is set to 5 up above.


        $jsonResponse = file_get_contents($url);    // file_get_contents() sends a GET request to the URL, then stores the response
        $data = json_decode($jsonResponse, true);   // 'true' here means we want the result as an associative array (dictionary)

        // checks to see if the 'items' array exists in the response ('items' is an array in the response that contains all book data)
        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $item) {
                // 'volumeInfo' is the key in the key-value pair so we must specify it to get the book data
                $title = $item['volumeInfo']['title'] ?? 'No Title';
                $authors = $item['volumeInfo']['authors'] ?? ['Unknown Author'];
                $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? 'images/bookNoCover.png';
                $isbn = 'No ISBN';
                $description = $item['volumeInfo']['description'] ?? '';
                $publishDate = $item['volumeInfo']['publishedDate'] ?? 'unknown';
                $publisher = $item['volumeInfo']['publisher'] ?? 'unknown publisher';


                // Extract ISBN
                if (isset($item['volumeInfo']['industryIdentifiers'])) {
                    foreach ($item['volumeInfo']['industryIdentifiers'] as $identifier) {
                        // prefers ISBN_13. will never set ISBN_10 if ISBN_13 is present
                        if ($identifier['type'] === 'ISBN_13') {
                            $isbn = $identifier['identifier'];
                            break;
                        } elseif ($identifier['type'] === 'ISBN_10') {
                            $isbn = $identifier['identifier'];
                        }
                    }
                }

                // Add the book details to the results array
                $searchResults[] = [
                    "title" => $title,
                    "authors" => $authors,
                    "thumbnail" => $thumbnail,
                    "isbn" => $isbn,
                    "description" => $description,
                    "publishDate" => $publishDate,
                    "publisher" => $publisher
                ];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>booked - Search</title>
        <meta charset="UTF-8">
        <meta name="author" content="booked development team">
        <meta name="email" content="bookeddev@algonquincollege.com">
    </head>
    <body id="background">
        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>
        <main>
            <div>
                <?php // Used to show messages when the user does things like add a book. -JL
                    // Also used to show an error if the same book is added twice
                    if (isset($_SESSION["bookadded"])) { ?>
                        <div id="bookAddedDiv">
                            <p class="error"><?php echo $_SESSION["bookadded"]; ?></p>
                        </div>
                        <?php unset($_SESSION["bookadded"]); 
                    } ?>
            </div>
            <div id="searchBar">
                <form id="searchform" action="search.php" method="POST">
                    <input id="searchBarItem" type="text" name="query" placeholder="Enter book title..." value="<?php echo htmlspecialchars($query); ?>">
                    <button id="searchButton" type="submit">Search &#x1F50D;</button>
                </form>
            </div>
            
            <?php   // This section creates the search results
            ?>
            <div class="bookContainer">
                <?php if (!empty($query)): ?>
                    <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
                <?php endif; ?>
                <?php if (!empty($searchResults)): ?>
                    <?php foreach ($searchResults as $book): ?>
                        <div class="bookItem">
                            <div class="bookOverview">
                                <img class="bookCover" src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="Book Thumbnail">
                                <div class="bookContents">
                                    <p class="bookTitle"><?php echo htmlspecialchars($book['title']); ?></p>
                                    <p class="bookInfo">Author(s): <?php echo htmlspecialchars(implode(', ', $book['authors'])); ?></p>
                                    <p class="bookInfo">ISBN: <?php echo htmlspecialchars($book['isbn']); ?></p>
                                    <p class="bookInfo">Published by: <?php echo htmlspecialchars($book['publisher']); ?> on <?php echo htmlspecialchars($book['publishDate']); ?> </p>
                                </div>
                                <?php   // This hidden form is used to pass the book info to the addBookScript.php script
                                ?>
                                <div class="AddBookContainer">
                                    <form action="scripts/addBookScript.php" method="POST">
                                        <input type="hidden" name="title" value="<?php echo htmlspecialchars($book['title']); ?>">
                                        <input type="hidden" name="authors" value="<?php echo htmlspecialchars(implode(', ', $book['authors'])); ?>">
                                        <input type="hidden" name="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>">
                                        <input type="hidden" name="thumbnail" value="<?php echo htmlspecialchars($book['thumbnail']); ?>">
                                        <input type="hidden" name="year" value="<?php echo htmlspecialchars($book['publishDate']); ?>">
                                        <button class="AddBookButton" type="submit">+ Add Book</button>
                                    </form>
                                </div>
                            </div>

                            <div class="bookDescription">
                                <p>
                                    <?php echo htmlspecialchars($book['description']); ?>
                                </p>
                            </div>
                        <br>
                        </div>
                        
                    <?php endforeach; ?>
                <?php else: ?>
                    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
                        <p>No books found for "<?php echo htmlspecialchars($query); ?>".</p>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </main>
        <script>


            // The scripting validates input for the search bar.
            document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('searchform');
            form.addEventListener('submit', validateSearch);    
            });

            function validateSearch(event) {
                var searchInput = document.getElementById('searchBarItem').value;

                // Regex to check if the input is empty or only spaces -JL
                // API gets angry if it's blank
                var emptyOrSpaces = /^\s*$/;

                if (searchInput === "") {
                    event.preventDefault();
                }
                else if (emptyOrSpaces.test(searchInput))
                {
                    event.preventDefault();
                }

            }
        </script>
    </body>
</html>
