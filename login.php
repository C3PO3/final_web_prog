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

<h1 class="page_title">Login to Your Account</h1>

<form id="registrationForm" method="get" action="login-process.php" onsubmit="return validateForm()">
<div class="user-enter">

    <div class="entry-box">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email">
    </div>

    <div class="entry-box">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    </div>

    <input type="submit" value="Submit" id="button"  class="button">
</div>
</form>

<script>
function validateForm() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;

    if (email === '' || password === '') {
        alert("Please fill out all fields.");
        return false;
    }

    return true;
}
</script>

<?php include 'footer.php'; ?>

</body>
</html>