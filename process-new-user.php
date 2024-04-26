<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
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
    $first_name = isset($_GET['first_name']) ? $_GET['first_name'] : '';
    $last_name = isset($_GET['last_name']) ? $_GET['last_name'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $password = isset($_GET['password']) ? $_GET['password'] : '';

    // Validate input (you may want to add more validation)
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "<script>alert('Please fill out all fields.');</script>";
    } elseif (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[^a-zA-Z]/', $password)) {
        echo "<script>alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one non-letter character.');</script>";
    } else {
        // Convert email to lowercase for case-insensitive comparison
        $email = strtolower($email);

        // Check if email already exists in the database (case-insensitive)
        $check_email_query = "SELECT * FROM users WHERE LOWER(email) = '$email'";
        $result = $conn->query($check_email_query);

        if ($result->num_rows > 0) {
            echo "<script>alert('Email already exists in the database. Please use a different email.');</script>";
            echo "<script>window.location.href = 'create-user.php';</script>"; // Redirect back to create user page
            exit; // Stop further execution of the script
        } else {
            // Prepare and bind SQL statement
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $first_name, $last_name, $email, $password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<h2>User data has been saved:</h2>";
                echo "<p>First Name: $first_name</p>";
                echo "<p>Last Name: $last_name</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Password: $password</p>";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close statement
            $stmt->close();
        }
    }
}

// Close connection
$conn->close();
?>


</body>
</html>
