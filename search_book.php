
<!-- search for all books and info code -->
<?php
    // make form element to search a given book title
    echo '<h1>Book Search</h1>
    <form id="bookForm">
        <label for="bookName">Enter Book Name:</label>
        <input type="text" id="bookName" name="bookName">
        <input type="submit" value="Search">
    </form>
    <div id="bookData"></div>';

    // checker to see if the bookName is updated and submitted to search again
    if (isset($_GET['bookName'])) {
        $bookName = $_GET['bookName'];
        $url = make_url_given_book($bookName);
        get_book_data($url, $bookName);
    }

    // Function to fetch book data from the API using the provided URL
    function get_book_data($url, $bookName) {
        $result = file_get_contents($url); // Fetch data from the URL
        $data = json_decode($result, true); // Decode JSON data

        // Display message about the search
        $message = "<h2>Your search term is: <b>" . $bookName . "</b>.</h2>" .
                "<h2>There were a total of " . $data['totalItems'] . " results for your search.</h2>";
        echo $message;

        // Loop through the items and display book information
        foreach ($data['items'] as $item) {
            $volumeInfo = $item['volumeInfo'];
            if (isset($volumeInfo['title']) && isset($volumeInfo['publishedDate'])) {
                $bookDiv = "<div class='book'>";
                $titleDiv = "<div class='title'>Title: " . $volumeInfo['title'] . "</div>";
                $authorDiv = isset($volumeInfo['authors']) ? "<div class='author'>Author: " . implode(", ", $volumeInfo['authors']) . "</div>" : "<div class='author'>Author: unknown</div>";
                $pubDiv = "<div class='pubDiv'>Published first in: " . $volumeInfo['publishedDate'] . "</div>";
                $isbnDiv = isset($volumeInfo['industryIdentifiers']) && count($volumeInfo['industryIdentifiers']) > 0 ? "<div class='isbn'>ISBN: " . $volumeInfo['industryIdentifiers'][0]['identifier'] . "</div>" : "<div class='isbn'>ISBN: unknown</div>";
                $description = isset($volumeInfo['description']) ? "<div class='description'>Description: " . $volumeInfo['description'] . "</div>" : "";

                // Adding book image if available
                if (isset($volumeInfo['imageLinks'])) {
                    $imageDiv = "<img src='" . $volumeInfo['imageLinks']['thumbnail'] . "' class='bookImage'>";
                    $bookDiv .= $imageDiv;
                }

                $bookDiv .= $titleDiv . $authorDiv . $pubDiv . $isbnDiv . $description . "</div>";
                echo $bookDiv;
            }
        }
    }

    // Function to create a URL given a book name with spaces replaced by '+'
    function make_url_given_book($book_name) {
        $base_url = "https://www.googleapis.com/books/v1/volumes?q=";
        // Split the input string by spaces and then rejoin with '+' between words
        $splitBook = explode(" ", $book_name);
        $queryTerm = implode("+", $splitBook);
        $new_url = $base_url . $queryTerm;
        return $new_url;
    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Search</title>
    </head>
    <body>
    </body>
</html>