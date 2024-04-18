<!-- 
 -->
 <!DOCTYPE html>
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
        body {
    margin: 0;
    font-family:serif;
}

nav {
    background-color: #ffffff;
    padding: 10px 0;
    position: sticky;
    z-index: 1000;
    max-width: 100%;
    width:100%;
    margin:0;
}

.navbar {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center; 
}

.navbar li {
    margin-top: 0px;
}

.navbar li.logo {
    margin-right: 0; 
    margin-left:0;
}

.navbar li {
    display: inline;
    margin-right: 10px;
}

.navbar li.logo img {
    width:400px !important;

}
.navbar li.user img,
.navbar li.cart img {
    max-height: 40px;
}
.navbar li a {
    color: #2D446E;
    text-decoration: none;
}

.navbar li a:hover {
    color: #2D446E;
    text-decoration: underline;
}


/* Hide the link that should open and close the topnav on small screens */
.navbar .icon {
  display: none;
}

/* When the screen is less than 600 pixels wide, hide all links, except for the first one ("Home"). Show the link that contains should open and close the topnav (.icon) */
@media screen and (max-width: 600px) {
  .navar a:not(:first-child) {display: none;}
  .navbar a.icon {
    float: right;
    display: block;
  }
}

/* The "responsive" class is added to the topnav with JavaScript when the user clicks on the icon. This class makes the topnav look good on small screens (display the links vertically instead of horizontally) */
@media screen and (max-width: 600px) {
  .navbar.responsive {position: relative;}
  .navbar.responsive a.icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .navbar.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}
    </style>

     <title>ShelfSwap - Header</title>
     <style>

     </style>

 </head>
 <body>

    <nav>
        <ul class="navbar" id="nav">
            <li class="logo"><a href="home_page.html"><img src="logo.png"></a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="sell.php">Sell</a></li>
            <li><a href="about_us.html">About</a></li>
            <input type="text" placeholder="Search Title, Author, Keyword, or IBSN" size="50">
            <li class="cart"><a href="cart.php"><img src="cart.png"></a></li>
            <li class="user"><a href="user.php"><img src="user.png"></a></li>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
            
        </ul>
    </nav>

    <script>
        function myFunction() {
            var x = document.getElementById("nav");
            if (x.className === "navbar") {
                x.className += " responsive";
            } else {
                x.className = "navbar";
            }
        }
    </script>
 </body>
 </html>
