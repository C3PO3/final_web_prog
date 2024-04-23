<!DOCTYPE html>
<html>
<head>
    <title>User Information</title>
</head>
<body>

<?php
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Collect form data
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $password = isset($_GET['password']) ? $_GET['password'] : '';

    // Validate input (you may want to add more validation)
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill out all fields.";
    } else {
        // Open file for writing
        $file = fopen("user_data.php", "a");
        if ($file) {
            // Write user data to the file
            fwrite($file, "<?php\n");
            fwrite($file, "\$name = '$name';\n");
            fwrite($file, "\$email = '$email';\n");
            fwrite($file, "\$password = '$password';\n");
            fwrite($file, "?>\n");
            fclose($file);
            echo "<h2>User data has been saved:</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Password: $password</p>";
        } else {
            echo "Error: Unable to open file.";
        }
    }
}
?>

</body>
</html>
