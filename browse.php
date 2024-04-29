<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Browse</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <style>
        </style>
    <body>
        <?php include 'header.php'; ?>
        <div class="page_title">
            <h1>BROWSE</h1>
        </div>
        <div class="books-container" id="container">
        <?php
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
                while ($row = $result->fetch_assoc()) {
                    // Display book information
                    echo "<div class='book' id='" . $row['id'] . "'>";
                    echo "<form method='get' action='item.html'>";
                    echo "<input type='image' src='" . $row['image'] . "' class='bookImage' alt='" . $row['title'] . "'/>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'/>";
                    echo "</form>";
                    echo "<div class='price'>$" . $row['price'] . ".00</div>";
                    echo "<span class='author'>" . $row['author'] . "</span>";
                    echo "<h2>" . $row['title'] . "</h2>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }

            // Close connection
            $conn->close();
        ?>
        </div>
        <?php include 'footer.php'; ?>
  </body>
</html>