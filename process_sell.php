
<!-- database being manipulated here is a table formatted as:
     isbn    quality     price
 -->

 
<!-- helper search php code given book name -->
<?php
    // Function to fetch book data from the API using the provided URL
    function get_book_data($url) {
        $result = file_get_contents($url); // Fetch data from the URL
        $data = json_decode($result, true); // Decode JSON data

        // Loop through the items and display book information
        foreach ($data['items'] as $item) {
            $volumeInfo = $item['volumeInfo'];
            if (isset($volumeInfo['title']) && isset($volumeInfo['publishedDate'])) {
                $isbn = isset($volumeInfo['industryIdentifiers']) && count($volumeInfo['industryIdentifiers']) > 0 ? $volumeInfo['industryIdentifiers'][0]['identifier'] : "unknown";

                $bookDiv = "<div class='book' onclick=\"window.location.href='next_page.php?isbn=$isbn';\">";
                $titleDiv = "<div class='title'>Title: " . $volumeInfo['title'] . "</div>";
                $authorDiv = isset($volumeInfo['authors']) ? "<div class='author'>Author: " . implode(", ", $volumeInfo['authors']) . "</div>" : "<div class='author'>Author: unknown</div>";
                $pubDiv = "<div class='pubDiv'>Published first in: " . $volumeInfo['publishedDate'] . "</div>";
                $isbnDiv = "<div class='isbn'>ISBN: $isbn</div>"; // Display ISBN
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

    // $servername = "localhost";
    // $username = "u5rikrp6bcxpf";
    // $password = "passtest2233";
    // $dbname = "dbseizae2lm8vt";

    // $conn = new mysqli($servername, $username, $password, $dbname);

    $searchTerm = $_GET["book_name"];
    $quality = $_GET["quality"];
    $price = $_GET["price"];

    echo "<h1>Select the correct book by clicking the cover image: </h1>";

    get_book_data(make_url_given_book($searchTerm));
?>

<html>
    <head>
        <style>
            /* Your CSS styles here */
            .book {
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 10px;
                background-color: #f9f9f9;
                transition: background-color 0.3s;
            }

            .book:hover {
                background-color: #e9e9e9;
            }

            .bookImage {
                width: 100px;
                height: auto;
                margin-right: 10px;
                float: left;
            }

            .title {
                font-weight: bold;
            }

            .author {
                font-style: italic;
            }

            .pubDiv, .isbn, .description {
                margin-top: 5px;
            }
        </style>
    </head>
</html>