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
            border-bottom: 2px solid #ccc; 

        }

        .navbar, .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 100%;
            width:100%;
            font-size:24px;
            font-family:roboto;
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
            margin-right: 20px;
        }

        .navbar li.cart {
            margin-right: 5px; 
        }

        .navbar li.user {
            margin-right: 20px;
        }

        .navbar li.logo img {
            max-width:300px !important;

        }
        .navbar li.user img,
        .navbar li.cart img {
            max-height: 40px;
        }
        .navbar li a {
            color: #264653;
            text-decoration: none;
        }

        nav .search-container {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }
        nav .search-box {
            position: relative; 
            max-width:500px;
            width:100%;
        }

        nav .search-box input {
            padding: 8px 35px 8px 15px; 
            border: 1px solid #ccc;
            font-size:20px;
        }

        nav .search-box i {
            position: absolute;
            right: 10px; 
            top: 50%; 
            transform: translateY(-50%);
            color: #ccc; 
        }

        .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 24px;
            height: 24px;
            border: none;
            background-color: transparent; 
            cursor: pointer;
            color: #ccc;
        }


        .search-icon i {
            font-size: 20px !important;
        }
        .navbar .icon {
            display:none;
        }
        .navbar li a i {
            font-size: 50px;
        }

        @media (max-width: 1100px){
            .navbar li a i {
                font-size:35px;
            }
            .navbar li {
                font-size:20px;
            }
            nav .search-box input {
                font-size:16px;
            }
            
        }

        .navbar li a.active {
            color: #F4A261; 
        }

        @media (max-width: 1000px) {
            .menu li {
                display: none;
            }
            
            .navbar .icon {
                display: flex;
                margin-right: 20px;
                text-decoration: none;
                font-size: 40px;
                color: #264653;
            }

            .menu.visible {
                display: flex;
                flex-direction: column; 
                position: absolute;
                top: 120px; 
                width: 100%; 
            }

            .menu.visible li:not(.logo):not(.icon) {
                display: block;
                text-align: center;
                padding: 10px 20px; 
                width: 100%; 
                justify-content:center;
                align-items:center;
                font-size:25px;
                box-sizing: border-box;
                margin-right:0px; 
            }
            nav .search-container {
                display: flex;
                justify-content: center; 
                width: 100%; 
            }

            nav .search-box {
                width: 90%; 
                margin: auto; 
                position: relative; 
            }

            nav .search-box input {
                width: 100%; 
                padding: 8px 35px 8px 15px; 
                box-sizing: border-box; 
            }
        }

        @media (max-width:750px){
            nav .search-container {
                display:none;
            }
        }




    </style>

     <title>ShelfSwap - Header</title>

 </head>
 <body>

    <nav>
        <ul class="navbar" id="nav">
            <li class="logo"><a href="home_page.php"><img src="logo.png"></a></li>
             <div class="menu" id="menu">

            <li><a href="browse.php">Browse</a></li>
            <li><a href="sell_book.php">Sell</a></li>
            <li><a href="about_us.html">About</a></li>
            <li class="search-container">
                <div class="search-box">
                    <input type="text" placeholder="Search Title, Author, Keyword, or ISBN" size="40">
                    <a href="search_results.html" class="search-icon">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            </li>
            <li class="cart"><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
            <li class="user"><a href="user.php"><i class="fa fa-user"></i></a></li>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="toggleMenu()" style="text-decoration: none;">
                 <i class="fa fa-bars"></i>
            </a>
            
        </ul>
    </nav>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('menu');
            menu.classList.toggle('visible');
        }
    
    </script>
 </body>
 </html>