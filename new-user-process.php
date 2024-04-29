<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <link rel="stylesheet" type = "text/css" href= "style.css">

    <style>

        h2 {
            margin-bottom: 50px;
        }
        .button {
            display: block;
            font-family: SourceSerif;
            font-size: 30px;
            background-color: #ffffff;
            border: 1px, solid, #000000;
            border-radius: 5px;
            text-align: center;
            margin: auto;
            margin-top: 25px;
            margin-bottom: 25px;
            width: 310px;
        }

        .button:hover {
            background-color: #e1e1e1;
        }

        a {
            text-decoration: none;
            margin: auto;
        }
    </style>
</head>
<body>

<?php
include 'header.php';

// Your database connection code
$servername = "localhost";
$username = "ugqlb33ihnf35";
$password = "magann2020";
$database = "dbed2glfukjapi";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Convert username to lowercase for case-insensitive comparison
    $username = strtolower($username);

    // Check if username already exists in the database (case-insensitive)
    $check_username_query = "SELECT * FROM users WHERE LOWER(email) = '$username'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows > 0) {
        echo "<script>alert('email already exists in the database. Please use a different email.');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to create user page
        exit; // Stop further execution of the script
    } else {
        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $username, $password);

        // Execute the statement
        if ($stmt->execute()) {
            
            echo "<div class='page_title'><h1>Welcome to ShelfSwap $first_name!</h1></div>";
            ?>
            <h2 class="page_title">Lets Get Started</h2>

            <a href="browse.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><button class="button">Browse our Collection</button></a>
            <a href="sell_book.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>"><button class="button">Sell your books</button></a>
            <?
            
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    }
}

// Close connection
$conn->close();


?>

<?php include 'footer.php'; ?>


</body>
</html>
