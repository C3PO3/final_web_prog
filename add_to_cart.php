<?php
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

    // Assuming $cart_num, $isbn, and $price are defined elsewhere
    $cart_num = $_POST['cart_num'];
    $isbn = $_POST['isbn'];
    $price = $_POST['price'];

    $sql = "INSERT INTO all_carts VALUES ($cart_num, $isbn, $price)";
    $result = $conn->query($sql);

    $conn->close();
?>