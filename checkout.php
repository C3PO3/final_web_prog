<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
    // Include the header file
    include 'header.php';

    // Database connection details
    $servername = "localhost";
    $username = "uxv8sl1ts3vhy";
    $password = "1*@El&1_68&l";
    $dbname = "dbikb3jnjnetbs";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the username from the GET request
    if (isset($_GET['username'])) {
        $username = $conn->real_escape_string($_GET['username']);

        // Retrieve the user's email from the database
        $user_query = "SELECT email FROM users WHERE email = '$username'";
        $user_result = $conn->query($user_query);

        // Check if the user exists
        if ($user_result->num_rows > 0) {
            // Fetch the user's email
            $row = $user_result->fetch_assoc();
            $email = $row['email'];

            // Retrieve the cart value from the users table
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
                    // Iterate over the rows and delete them from the database
                    while ($row = $all_carts_result->fetch_assoc()) {
                        $isbn = $row['isbn'];
                        $price = $row['price'];

                        // Remove the book from the all_carts table
                        $delete_query = "DELETE FROM all_carts WHERE cart_num = '$cart_value' AND isbn = '$isbn'";
                        $conn->query($delete_query);
                    }

                    // Output a success message
                    echo "<div class='success-message'>Checkout successful! Books have been removed from your cart.</div>";
                } else {
                    echo "<div class='empty-cart-message'>Cart is empty. No books to remove.</div>";
                }
            } else {
                echo "Failed to retrieve cart value for user with email: " . $email;
            }
        } else {
            echo "User not found with username: " . $username;
        }
    } else {
        echo "<div class='warning-message'>";
        echo "Username not provided. <a href='user.php'>Please log in or make an account!</a>";
        echo "</div>";
    }

    // Close the database connection
    $conn->close();

    // Include the footer file
    include 'footer.php';
?>
</body>
</html>