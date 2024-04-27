<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
    <link rel="stylesheet" type = "text/css" href= "style.css">
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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Collect form data
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $passwordin = isset($_GET['password']) ? $_GET['password'] : '';

    // Convert email to lowercase for case-insensitive comparison
    $email = strtolower($email);

    // Check if email already exists in the database (case-insensitive)
    $check_email_query = "SELECT * FROM users WHERE LOWER(email) = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows < 1) {
        echo "<script>alert('No Account Associates with that email');</script>";
        echo "<script>window.location.href = 'login.php';</script>"; // Redirect back to login
        exit; // Stop further execution of the script
    } else {
        // Fetch the password from the result set
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Check if the provided password matches the stored password
        if ($stored_password === $passwordin) {
            echo "Welcome Back!";
        } else {
            echo "Incorrect Password";
        }
    }
}

// Close connection
$conn->close();
?>



</body>
</html>
