<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type = "text/css" href= "style.css">
    <style> 

        .books-container {
            display: flex; 
            flex-wrap: wrap; 
            justify-content: center;
            padding: 20px;
        }

        .book {
            background-color: white; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            margin: 10px; 
            padding: 10px; 
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); 
        }

        .bookImage {
            width: 100%; 
            height: auto; 
            border-radius: 4px; 
            margin-bottom: 10px;
        }

        .title,
        .author,
        .description,
        .quality,
        .price {
            margin: 5px 0; 
        }

        .warning-message {
            color: #d9534f; 
            font-weight: bold; 
            text-align: center; 
            margin: 20px; 
            padding: 10px; 
            background-color: #f8d7da; 
            border: 1px solid #f5c6cb; 
            border-radius: 4px; 
        }

        .warning-message a {
            color: #d9534f; 
            text-decoration: none;
            font-weight: bold; 
        }

        .warning-message a:hover {
            text-decoration: underline;
        }

        .empty-cart-message {
            color: #264653;
            font-weight: bold;
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid #264653;
            border-radius: 5px;
            text-align: center;
            margin:20px
        }


    </style>
</head>
<body>

<?php 
    include 'header.php';
?>

<div class ="page_title"><h1>Shopping Cart</h1></div>

<!-- add code here to use the associative array and display like browse -->
<?php
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

    if (isset($_GET['username'])) {
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
                        echo $result;

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
                    echo '<div class="empty-cart-message">Cart is Empty</div>';
                }
            } else {
                echo "Failed to retrieve cart value for user with email: " . $email;
            }
        } else {
            echo "User not found with username: " . $username;
        }
    } else {
        echo "<div class='warning-message'>";
        echo "Username not provided. <a href='user.php'> Please log in or make an account!</a>";
        echo "</div>";
    }
    // Close connection
    $conn->close();
?>

<?php include 'footer.php'; ?>


<!-- Note:
    INSERT INTO all_carts (cart_num, isbn, price) VALUES (2, 2147483647, 10);
-->