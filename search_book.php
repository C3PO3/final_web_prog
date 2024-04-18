<?php
    // Function to fetch book data from the API using the provided URL
    function get_book_data($url) {
        $result = file_get_contents($url); // Fetch data from the URL
        $data = json_decode($result, true); // Decode JSON data

        // Display message about the search
        $message = "<h1>Book you are searching for is: <b>Lord of the Rings</b>.</h1>" .
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

                // Adding book image if available
                if (isset($volumeInfo['imageLinks'])) {
                    $imageDiv = "<img src='" . $volumeInfo['imageLinks']['thumbnail'] . "' class='bookImage'>";
                    $bookDiv .= $imageDiv;
                }

                $bookDiv .= $titleDiv . $authorDiv . $pubDiv . $isbnDiv . "</div>";
                echo $bookDiv;
            }
        }

        // Additional information about the API and its usage
        $assignmentInfo = "I used the Google Books API. It contains books and related information such as author, ISBN, etc.<br>" .
                        "I found it online using the resources on developers.google.com at: <a href='https://developers.google.com/books/docs/v1/using#WorkingVolumes' target='_blank'>https://developers.google.com/books/docs/v1/using#WorkingVolumes</a>" .
                        "I offered a book series name to search the API ('Lord+of+the+Rings').<br>" .
                        "This could be useful for a library or book selling website. It could also be useful for a school or even looking through banned book lists as they have categories that books are sorted into";
        echo $assignmentInfo;
    }

    // Call the function with the API URL
    get_book_data("https://www.googleapis.com/books/v1/volumes?q=Lord+of+the+Rings");

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