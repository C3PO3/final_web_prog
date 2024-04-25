<?php
ob_start(); // Start output buffering
include 'header.php'; // Include your header file

if(isset($_POST['new_user'])) {
    // New User button is clicked
    header("Location: create-user.php");
    exit; // Ensure that no other output is sent
} elseif(isset($_POST['returning_user'])) {
    // Returning User button is clicked
    $welcome_message = "Welcome back, returning user!";
}
ob_end_flush(); // Flush the output buffer
?>

<!DOCTYPE html>
<html>
<head>
    <title>Redirect Example</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="submit" name="new_user" value="New User">
        <input type="submit" name="returning_user" value="Returning User">
    </form>

    <?php
    // Display the welcome message if set
    if(isset($welcome_message)) {
        echo "<p>$welcome_message</p>";
    }
    ?>
</body>
</html>
