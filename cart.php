<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type = "text/css" href= "style.css">

</head>
<body>

<?php 
    include 'header.php';
?>

<h1 class="page_title">Shopping Cart</h1>

<!-- add code here to use the associative array and display like browse -->
<?php
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

    if (isset($_GET['username'])) {
        // Sanitize the input to prevent SQL injection
        $username = $conn->real_escape_string($_GET['username']);
    
        // Query to retrieve the user's email from the users table
        $user_query = "SELECT email FROM users WHERE email = '$username'";
        $user_result = $conn->query($user_query);
    
        // Check if user exists
        if ($user_result->num_rows > 0) {
            // Fetch the user's email
            $row = $user_result->fetch_assoc();
            $email = $row['email'];
    
            // Query to retrieve the cart value from the users table
            $cart_query = "SELECT cart FROM users WHERE email = '$email'";
            $cart_result = $conn->query($cart_query);
    
            // Check if cart value is retrieved
            if ($cart_result->num_rows > 0) {
                // Fetch the cart value
                $row = $cart_result->fetch_assoc();
                $cart_value = $row['cart'];
    
                // Query to retrieve all rows from the all_carts table with matching cart value
                $all_carts_query = "SELECT * FROM all_carts WHERE cart_num = '$cart_value'";
                $all_carts_result = $conn->query($all_carts_query);
    
                // Check if rows are retrieved
                if ($all_carts_result->num_rows > 0) {
                    // Output the rows from all_carts table
                    while ($row = $all_carts_result->fetch_assoc()) {
                        // Output the row data as desired
                        $isbn = $row['isbn'];
                        $price = $row['price'];
                        // SQL query to search for a book with the given ISBN and price
                        $sql = "SELECT * FROM book_collection WHERE isbn = '$isbn' AND price = '$price'";

                        // Execute the query
                        $result = $conn->query($sql);

                        // Check if any rows are returned
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='book' onclick='toggleDescription(this)'>";
                                echo "<img src='" . $row['image'] . "' class='bookImage'>";
                                echo "<div class='title'>Title: " . $row['title'] . "</div>";
                                echo "<div class='author'>Author: " . $row['author'] . "</div>";
                                echo "<div class='description'>Description: " . $row['description'] . "</div>";
                                echo "<div class='quality'>Quality: " . $row['quality'] . "</div>";
                                echo "<div class='price'>Price: " . $row['price'] . "</div>";
                                echo "</div>";
                            }
                        } else {
                            echo "No book found with the given ISBN and price.";
                        }
                    }
                } else {
                    echo "No rows found in all_carts table with cart value: " . $cart_value;
                }
            } else {
                echo "Failed to retrieve cart value for user with email: " . $email;
            }
        } else {
            echo "User not found with username: " . $username;
        }
    } else {
        echo "Username not provided. Please log in or make an account!";
    }
    
    // Close connection
    $conn->close();
?>

<?php include 'footer.php'; ?>


<!-- Note:
    INSERT INTO all_carts (cart_num, isbn, price) VALUES (2, 2147483647, 10);
-->