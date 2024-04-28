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


        .section img {
            width: 50%; 
            height: auto;
            border-radius: 10px; 
        }

        .new-text {
            width: 50%; 
        }

        .about-section {
            margin-bottom: 60px; 
            padding-bottom: 20px;
        }

        .about-section img {
            width: 300px;
            height: 200px; 
            object-fit: cover; 
            border-radius: 10px; 
        }

        /* returning section styles */
        .returning ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: grid;
            grid-template-columns: repeat(3, 1fr); 
            gap: 20px; 
        }
        
        .returning ul li img {
            width: 200px;
            height: 300px; 
            object-fit: cover; 
        }

        .returning ul li {
            margin-bottom: 10px;
            position: relative;
            text-align: center;
        }

        .returning ul li p {
            margin-top: 10px;
            color: #333;
        }


        /* Paragraph elements for returning titles */
        .returning ul li p.name {
            color: #333;
            font-weight: bold; /* Keeps titles regular (not bold) */
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
        <button class="nav-button active" id="new-button" onclick="showSection('new')">new</button>
        <button class="nav-button" id="returning-button" onclick="showSection('returning')">returning</button>
    </div>

    <!-- new section -->
    <div id="new-section" class="section about-container active">
    <form id="newForm" method="get" action="new-user-process.php" onsubmit="return validateNewForm()">
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
        </table>

        <input type="submit" value="Create Account" class="button">
    </form> 
    </div>

    <!-- returning section -->
<div id="returning-section" class="section returning">
    <form id="returningForm" method="get" action="login-process.php" onsubmit="return validateReturningForm()">

        <div class="entry-box">
        <label for="email">Email:</label>
        <input type="email" id="returning-email" name="email">
        </div>

        <div class="entry-box">
        <label for="password">Password:</label>
        <input type="password" id="returning-password" name="password">
        </div>

        <input type="submit" value="Submit" class="button">
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