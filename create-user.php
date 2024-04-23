<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>

<?php 
    include 'header.php';
?>

<form method="get" action="process-new-user.php">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
