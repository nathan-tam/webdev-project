<?php
    session_start();
    $query = urlencode($_GET["query"]);
    $apiKey = "AIzaSyCN0rx7SH_UZjiW1yNeeB-fOyjh0khMbc8";
    $url = "https://www.googleapis.com/books/v1/volumes?q={$query}&maxResults=5&key={$apiKey}";

    $response = file_get_contents($url);
    $books = json_decode($response, true);
?>

<!DOCTYPE html>
<html id="background" lang="en">
    <head>
        <link rel="stylesheet" href="main-stylesheet.css">
        <title>Search Results</title>
    </head>
    <body>

        <!-- Header module on all pages (booked logo and rightside link) -->
        <?php include('modules/mod-header.php'); ?>
        
        <main>
            <div id="searchBar">
                
                <form action="search.php" method="GET">
                    <input id="searchBarItem" type="text" name="query" placeholder="Enter book title...">
                    <button id="searchButton" type="submit">Search &#x1F50D;</button>
                </form>

            </div>

            <h2>Search Results for "<?php echo htmlspecialchars($_GET["query"]); ?>"</h2>
            <div id="results">
                <?php
                if (!empty($books["items"])) {
                    foreach ($books["items"] as $book) {
                        $info = $book["volumeInfo"];
                        $title = $info["title"] ?? "Unknown Title";
                        $authors = !empty($info["authors"]) ? implode(", ", $info["authors"]) : "Unknown Author";
                        $thumbnail = $info["imageLinks"]["thumbnail"] ?? "images/placeholder";
                        $link = $info["infoLink"] ?? "#";

                        echo "<div class='bookItem'>";
                                echo "<img src='{$thumbnail}' alt='{$title}'>";
                                echo "<br>";
                                echo "<h3>{$title}</h3>";
                                echo "<br>";
                                echo "<p>{$authors}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No results found.</p>";
                }
                ?>
            </div>
            <div class="bookContainer">
                <div class="bookItem">
                    <img class="bookCover" src="bookNoCover.png" alt="Purple book cover with dark purple lines to indicate a book with no cover">
                    <div class="bookContents">
                        <p class="bookTitle">Title</p>
                        <p class="bookDescription">Author</p>
                        <p class="bookDescription">Description</p>
                    </div>
                    <div class="AddBookContainer">
                        <button id="AddBookButton" type="button">+ Add Book</button>
                    </div>
                </div>
            </div>
        </main>


    </body>
</html>
