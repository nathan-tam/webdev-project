<?php session_start(); ?>
<?php
    // if there's no user set, kick the browser back to the index.php page
    if (!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }


    // initialize the query variable, breaks otherwise
    $query = "";

    if (isset($_POST["query"])) {
        $query = $_POST["query"];
        $apiKey = "AIzaSyCN0rx7SH_UZjiW1yNeeB-fOyjh0khMbc8";

        // urlencode() is used to convert a string into something useable in a URL (e.g., spaces, &, = become %20, %26, %3D)
        $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&maxResults=5&key=" . $apiKey;

        $jsonResponse = file_get_contents($url);    // file_get_contents() sends a GET request to the URL, then stores the response
        $data = json_decode($jsonResponse, true);   // 'true' here means we want the result as an associative array (dictionary)

        // checks to see if the 'items' array exists in the response ('items' is an array in the response that contains all book data)
        if (isset($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $item) {
                // 'volumeInfo' is the key in the key-value pair so we must specify it to get the book data
                $title = $item['volumeInfo']['title'] ?? 'No Title';
                $authors = $item['volumeInfo']['authors'] ?? ['Unknown Author'];
                $thumbnail = $item['volumeInfo']['imageLinks']['thumbnail'] ?? 'bookNoCover.png';
                $isbn = 'No ISBN';

                // Extract ISBN
                if (isset($item['volumeInfo']['industryIdentifiers'])) {
                    foreach ($item['volumeInfo']['industryIdentifiers'] as $identifier) {
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
                    "isbn" => $isbn
                ];
            }
        }
    }
?>
<!DOCTYPE html>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="main-stylesheet.css">
        <title>Search Results</title>
    </head>
    <body>
        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>
        <main>
            <div id="searchBar">
                <form id="searchform" action="search.php" method="POST">
                    <input id="searchBarItem" type="text" name="query" placeholder="Enter book title..." value="<?php echo htmlspecialchars($query); ?>">
                    <button id="searchButton" type="submit">Search &#x1F50D;</button>
                </form>
            </div>
            
            <div class="bookContainer">
                <?php if (!empty($query)): ?>
                    <h2>Search Results for "<?php echo htmlspecialchars($query); ?>"</h2>
                <?php endif; ?>
                <?php if (!empty($searchResults)): ?>
                    <?php foreach ($searchResults as $book): ?>
                        <div class="bookItem">
                            <img class="bookCover" src="<?php echo htmlspecialchars($book['thumbnail']); ?>" alt="Book Thumbnail">
                            <div class="bookContents">
                                <p class="bookTitle"><?php echo htmlspecialchars($book['title']); ?></p>
                                <p class="bookDescription">Author(s): <?php echo htmlspecialchars(implode(', ', $book['authors'])); ?></p>
                                <p class="bookDescription">ISBN: <?php echo htmlspecialchars($book['isbn']); ?></p>
                            </div>
                            <div class="AddBookContainer">
                                <form action="scripts/addBookScript.php" method="POST">
                                    <input type="hidden" name="title" value="<?php echo htmlspecialchars($book['title']); ?>">
                                    <input type="hidden" name="authors" value="<?php echo htmlspecialchars(implode(', ', $book['authors'])); ?>">
                                    <input type="hidden" name="isbn" value="<?php echo htmlspecialchars($book['isbn']); ?>">
                                    <input type="hidden" name="thumbnail" value="<?php echo htmlspecialchars($book['thumbnail']); ?>">
                                    <button id="AddBookButton" type="submit">+ Add Book</button>
                                </form>
                            </div>
                        </div>
                        <br>
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
