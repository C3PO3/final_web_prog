<!DOCTYPE html>
<html>

<head>
    <title>Login - ShelfSwap</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type = "text/css" href= "style.css">
    <?php include 'header.php'; ?>
    <style>


        /* Navigation bar styles */
        .nav-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .nav-button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: white;
            color: #333;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            font-family: SourceSerif;
            font-size: 30px;
        }

        /* Active button styles */
        .nav-button.active {
            background-color: #f4a261; 
            color: white;
        }

        /* Section styles */
        .section {
            display: none;
            max-width: 800px;
            margin: 40px auto;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        /* Section active */
        .section.active {
            display: block; 
        }

       /* new content styles */
        .new-content {
            display: flex;
            flex-direction: row; 
            gap: 20px;
            align-items: center;
            justify-content:center;
        }

        .new-text {
            width: 50%; 
        }

        .about-section {
            margin-bottom: 60px; 
            padding-bottom: 20px;
        }

        .input-table {
            margin: auto;
        }

        .labels {
            font-family: SourceSerif;
            font-size: 30px;
        }

        .button {
            font-family: SourceSerif;
            font-size: 30px;
            background-color: #ffffff;
            border: 1px, solid, #000000;
            border-radius: 5px;
            margin: auto;
            text-align: center;
        }

        .button:hover {
            background-color: #e1e1e1;
        }

        /* Media queries for responsiveness */
        @media (max-width: 768px) {
            /* Adjust layout for screens with max width of 768px */
            .returning ul {
                grid-template-columns: 1fr; /* Show one column for returning section */
            }
            .new-content {
                flex-direction: column; /* Stack new content vertically */
            }
            .section img {
                width: 100%; /* Make images full width */
            }
}
    </style>
</head>

<body>
    <h1 class="page_title">Login or Sign Up</h1>

    <!-- Navigation bar with two buttons -->
    <div class="nav-bar">
        <button class="nav-button active" id="new-button" onclick="showSection('new')">New</button>
        <button class="nav-button" id="returning-button" onclick="showSection('returning')">Returning</button>
    </div>

    <!-- new section -->
    <div id="new-section" class="section about-container active">
    <form id="newForm" method="get" action="new-user-process.php" onsubmit="return validateNewForm()">
        <table class="input-table">
            <tr class="entry-box">
                <th><label for="first_name" class="labels">First Name:</label></th>
                <th><input type="text" id="first_name" name="first_name" class="box"></th>
            </tr>

            <tr class="entry-box">
                <th><label for="last_name" class="labels">Last Name:</label></th>
                <th><input type="text" id="last_name" name="last_name" class="box"></th>
            </tr>

            <tr class="entry-box">
                <th><label for="email" class="labels">Email:</label></th>
                <th><input type="email" id="email" name="email" class="box"></th>
            </tr>

            <tr class="entry-box">
                <th><label for="password" class="labels">Password:</label></th>
                <th><input type="password" id="password" name="password" class="box"></th>
            </tr>
        </table>

        <input type="submit" value="Create Account" class="button">
    </form> 
    </div>

    <!-- returning section -->
<div id="returning-section" class="section returning">
    <form id="returningForm" method="get" action="login-process.php" onsubmit="return validateReturningForm()">
    <table class="input-table">
        <tr class="entry-box">
            <th><label for="email" class="labels">Email:</label></th>
            <th><input type="email" id="returning-email" name="email" class="box"></th>
        </tr>

        <tr class="entry-box">
            <th><label for="password" class="labels">Password:</label></th>
            <th><input type="password" id="returning-password" name="password" class="box"></th>
        </tr>
    </table>

        <input type="submit" value="Login" class="button">
    
    </form>
</div>

    <script>
        function showSection(section) {
            const newButton = document.getElementById('new-button');
            const returningButton = document.getElementById('returning-button');

            const newSection = document.getElementById('new-section');
            const returningSection = document.getElementById('returning-section');

            if (section === 'new') {
                newSection.classList.add('active');
                returningSection.classList.remove('active');
                newButton.classList.add('active');
                returningButton.classList.remove('active');
            } else {
                newSection.classList.remove('active');
                returningSection.classList.add('active');
                newButton.classList.remove('active');
                returningButton.classList.add('active');
            }
        }
    

        function validateNewForm() {
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

        function validateReturningForm() {
            var remail = document.getElementById("returning-email").value;
            var rpassword = document.getElementById("returning-password").value;

            if (remail === '' || rpassword === '') {
                alert("Please fill out all fields.");
                return false;
            }

            return true;
}

</script>

<?php include 'footer.php'; ?>
</body>

</html>