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
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $passwordin = isset($_POST['password']) ? $_POST['password'] : '';

    // Convert username to lowercase for case-insensitive comparison
    $username = strtolower($username);

    // Check if username already exists in the database (case-insensitive)
    $check_username_query = "SELECT * FROM users WHERE LOWER(username) = '$username'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows < 1) {
        echo "<script>alert('No Account Associates with that username');</script>";
        echo "<script>window.location.href = 'user.php';</script>"; // Redirect back to login
        exit; // Stop further execution of the script
    } else {
        // Fetch the password from the result set
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];
        $name = $row['first_name'];
        echo $name;

        // Check if the provided password matches the stored password
        if ($stored_password === $passwordin) {
            $cookie_name = 'user';
            $cookie_value = $name;
            $cookie_expire = time() + (24 * 60 * 60); // 24 hours
            setcookie($cookie_name, $cookie_value, 864000, "/");

            if(isset($_COOKIE['user'])) {
                $username = $_COOKIE['user'];
                echo "Welcome There" . $_COOKIE['user'] . "!";
            } else {
                echo "<h2>Cookie 'user' is not set!</h2>";
            }

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
