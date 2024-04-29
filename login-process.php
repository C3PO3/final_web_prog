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

// database connection code
$servername = "localhost";
$username = "uxv8sl1ts3vhy";
$password = "1*@El&1_68&l";
$database = "dbikb3jnjnetbs";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $passwordin = isset($_POST['password']) ? $_POST['password'] : '';

    // Convert email to lowercase for case-insensitive comparison
    $email = strtolower($email);

    // Check if email already exists in the database (case-insensitive)
    $check_email_query = "SELECT * FROM users WHERE LOWER(email) = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows < 1) {
        echo "<script>alert('No Account Associates with that email');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to login
        exit; // Stop further execution of the script
    } else {
        // Fetch the password from the result set
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        $name = $row['first_name'];

        // Check if the provided password matches the stored password
        if ($stored_password === $passwordin) {
            echo "<h1 class='page_title'>Welcome Back $name!</h1>";
            ?>
            <h2 class="page_title">Lets Get Started</h2>

            <a href="browse.php"><button class="button">Browse our Collection</button></a>
            <a href="sell_book.php"><button class="button">Sell your books</button></a>
            <?
        } else {
            echo "<script>alert('Incorrect Password');</script>";
            echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to login
        }
    }
}

// Close connection
$conn->close();
?>

<?php include 'footer.php'; ?>

</body>
</html>
