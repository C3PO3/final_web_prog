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

<form method="get" action="process-new-user.php">
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

</body>
</html>
