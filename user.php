<?php
ob_start(); // Start output buffering
include 'header.php'; // Include your header file

if(isset($_POST['new_user'])) {
    header("Location: new-user.php");
    exit; 
}
elseif(isset($_POST['returning_user'])) {
    header("Location: login.php");
    exit; // Ensure that no other output is sent
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

</body>
</html>
