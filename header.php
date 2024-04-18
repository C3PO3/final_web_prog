<!-- 

 -->
 <!DOCTYPE html>
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
        body {
    margin: 0;
    font-family: latoReg;
    src: url(Lato-Regular.ttf);
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

.navbar li img {
    max-height:40px;
}

.navbar li a {
    color: #2D446E;
    text-decoration: none;
}

.navbar li a:hover {
    color: #2D446E;
    text-decoration: underline;
}
    </style>

     <title>ShelfSwap - Header</title>
     <style>

     </style>

 </head>
 <body>

    <nav>
        <ul class="navbar">
            <li class="logo"><a href="home_page.html"><img src="logo.png"></a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="sell.php">Sell</a></li>
            <li><a href="about_us.html">About</a></li>
            <input type="text" placeholder="Search Title, Author, Keyword, or IBSN" size="50">
            <li class="cart"><a href="cart.php"><img src="cart.png"></a></li>
            <li class="user"><a href="user.php"><img src="user.png"></a></li>
            
        </ul>
    </nav>
 </body>
 </html>
