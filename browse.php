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

<html>
    <head>
        <meta charset="utf-8">
        <title>Two Owls Cafe</title>
        <style type=text/css>
        </style>
    </head>
</html>