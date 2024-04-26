<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>

<style>

    .entry-box {
        display: block;
        text-align: center;
        margin: auto;
        font-size: 45px;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    h1 {
        text-align: center;
    }

    input {
        height: 45px;
        width: 300px;
    }

    #button {
        display: block;
        margin: auto;
        margin-top: 20px;
        font-size: 45px;
        height: auto;
        width: auto;
    }

</style>
</head>
<body>

<?php 
    include 'header.php';
?>

<h1>Create an Account</h1>

<form id="registrationForm" method="get" action="new-user-process.php" onsubmit="return validateForm()">
<div class="user-enter">
    
    <div class="entry-box">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name">
    </div>

    <div class="entry-box">
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name">
    </div>

    <div class="entry-box">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    </div>

    <div class="entry-box">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    </div>

    <input type="submit" value="Submit" id="button">
</div>
</form>

<script>
function validateForm() {
    var firstName = document.getElementById("first_name").value;
    var lastName = document.getElementById("last_name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (firstName === '' || lastName === '' || email === '' || password === '') {
        alert("Please fill out all fields.");
        return false;
    }

    if (password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/[^a-zA-Z]/.test(password)) {
        alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one non-letter character.");
        return false;
    }

    return true;
}
</script>

</body>
</html>