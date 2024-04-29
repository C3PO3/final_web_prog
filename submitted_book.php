
<html>
    <head>
        <title>Submitted Book - ShelfSwap</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type = "text/css" href= "style.css">
        <?php include 'header.php'; ?>
        <meta charset="utf-8">
        <style type=text/css>
        </style>
    </head>
</html>

<?php
    // Retrieve ISBN, quality, and price from the URL parameters
    $isbn = $_GET['isbn'];
    $quality = $_GET['quality'];
    $price = $_GET['price'];
    $title = $_GET['title'];
    $author = $_GET['author'];
    $description = $_GET['description'];
    $image = $_GET['image'];

    // Database connection parameters
    $servername = "localhost";
    $username = "uxv8sl1ts3vhy";
    $password = "1*@El&1_68&l";
    $dbname = "dbikb3jnjnetbs";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert data into the book_collection table
    $sql = "INSERT INTO book_collection (isbn, quality, price, title, author, description, image) VALUES ('$isbn', '$quality', '$price', '$title', '$author', '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully. Please continue browsing!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
    include 'footer.php';
?>