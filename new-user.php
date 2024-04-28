<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type = "text/css" href= "style.css">

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

    .button {
        display: block;
        font-family: SourceSerif;
        font-size: 35px;
        margin: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        background-color: #ffffff;
        border-radius: 10px;
        border: 1px, solid, #E76F51;
        height: auto;
        text-align: center;
    }

    .button:hover {
        background-color: #e1e1e1;
    }

    #inputs {
        margin: auto;
        width: 800px;
    }

    td {
        width: 50%;
    }

    label {
        text-align: right;
        margin-right: 10px;
    }

    input[type="text"] {
        text-align: left;
        margin-left: 10px;
    }

</style>
</head>
<body>

<?php 
    include 'header.php';
?>

<h1 class="page_title">Create an Account</h1>

<form id="registrationForm" method="get" action="new-user-process.php" onsubmit="return validateForm()">
<table id="inputs">
    <tr class="entry-box">
        
        <th><label for="first_name">First Name:</label></th>
        <th><input type="text" id="first_name" name="first_name"></th>
    </tr>

    <tr class="entry-box">
    <th><label for="last_name">Last Name:</label></th>
    <th><input type="text" id="last_name" name="last_name"></th>
    </tr>

    <tr class="entry-box">
    <th><label for="email">Email:</label></th>
    <th><input type="email" id="email" name="email"></th>
    </tr>

    <tr class="entry-box">
    <th><label for="password">Password:</label></th>
    <th><input type="password" id="password" name="password"></th>
    </tr>

    <input type="submit" value="Create Account" class="button">
</table>
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

<?php include 'footer.php'; ?>

</body>
</html>