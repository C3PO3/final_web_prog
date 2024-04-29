
<html>
    <head>
        <title>Browse - ShelfSwap</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type = "text/css" href= "style.css">
        <?php include 'header.php'; ?>
        <meta charset="utf-8">
<<<<<<< Updated upstream
        <style type=text/css>
        </style>
    </head>
</html>

<?php
    echo "<h1>BROWSE</h1>";
    // Database connection parameters
    $servername = "localhost";
    $username = "u5rikrp6bcxpf";
    $password = "passtest2233";
    $dbname = "dbseizae2lm8vt";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to retrieve all books from the book_collection table
    $sql = "SELECT * FROM book_collection";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            // Display book information
            echo "<div class='book'>";
            echo "<img src='" . $row['image'] . "' class='bookImage'>";
            echo "<div class='title'>Title: " . $row['title'] . "</div>";
            echo "<div class='author'>Author: " . $row['author'] . "</div>";
            echo "<div class='description'>Description: " . $row['description'] . "</div>";
            echo "<div class='quality'>Quality: " . $row['quality'] . "</div>";
            echo "<div class='price'>Price: " . $row['price'] . "</div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    // Close connection
    $conn->close();
?>
=======
        <title>Browse</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <style type=text/css>
        </style>
    </head>
    <body>
    <?php 
        // Feature header
        include 'header.php';
    ?>
    <h1>BROWSE</h1>
    <?php 
        // Populate page based on database of current books in stock
        // When a book is clicked display a modal window with info
        // If a user adds the book to card, add it to their in-cart database
    ?>

    <div class="page_class">
            <div class="second-header">
                <p>Browse</p>
            </div>
            <!-- Book Modal Window-->
            <div id="bookModal" class="modal">
                <div class="modal-content">
                    <span class="close" style="display: block;">&times;</span>
                    <div class="modal-info" style="display: block;">
                        <h2 id="modalTitle"></h2>
                        <h3 id="modalAuthor"></h3>
                    </div>
                    <div class="modal-info" style="display: inline-block; width: calc(40%);">
                        <div id="modalCover"></div>
                        <h3 id="modalIBSN" style="font-size: 16px;"></h3>
                    </div>
                    <div class="modal-info" style="display: inline-block; width: calc(50%); vertical-align: top;">
                        <h3 id="modalQty" style="display: inline; padding-right: 40px; font-size: 16px;"></h3>
                        <h3 id="modalPrice" style="display: inline; font-size: 16px;"></h3>
                        <p id="modalDescription" style="padding-top: 20px;"></p>
                    </div>
                </div>
            </div>        
            <div class="books-container" id="books-container">
            </div>
            <!-- End Modal -->
            <script>
                const booksContainer = document.getElementById('books-container');
                // Loop through each book and add it to the container
                for (let i = 0; i < books.length; i++) {
                    book = books[i];
                    id = "book" + i;

                    // Create a div to contain the book and assign it to the book class
                    const bookElement = document.createElement('div');
                    bookElement.classList.add('book');
                    bookElement.id = id;
                    
                    // Set the title of the book using an h2 header
                    const titleElement = document.createElement('h2');
                    titleElement.textContent = book.title;
                    
                    // Set the author of the book using a p tag
                    const authorElement = document.createElement('p');
                    authorElement.textContent = `${book.author}`;
                    
                    // Add the cover image of the book to the class
                    const coverImage = document.createElement('img');
                    coverImage.src = book.cover_img;
                    coverImage.alt = book.title;

                    // Add each of the elements to the book
                    bookElement.appendChild(coverImage);
                    bookElement.appendChild(titleElement);
                    bookElement.appendChild(authorElement);
                    booksContainer.appendChild(bookElement);

                    // Update the data of each book
                    $("#" + id).data("title", book.title);
                    $("#" + id).data("ibsn", book.IBSN);
                    $("#" + id).data("author", book.author);
                    $("#" + id).data("description", book.description);
                    $("#" + id).data("cover", book.cover_img);
                    $("#" + id).data("IBSN", book.IBSN);
                    $("#" + id).data("qty", book.qty);
                    $("#" + id).data("price", book.price);

                    if (i > 7) {
                        $("#" + id).hide();
                    }
                }
                
            </script>
        <div class="buttons-container">
        <button class="show-hide" id="show-less">Show Less</button>
        <button class="show-hide" id="show-more">Show More</button>
        </div>
        </div>
    </body>
</html>
>>>>>>> Stashed changes
