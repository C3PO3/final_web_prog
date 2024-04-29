<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>View Book</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
        </script>
        <script>
            $(".add").click(function() {
                alert(volumeInfo.title + " added to your Cart");
            });
        </script>
        <style>
            h1 {
                font-family: SourceSerif;
                margin: 0;
            }

            img {
                display: inline;
                width: 240px;
                object-fit: cover;
                align-self: flex-start;
            }

            .infoFlex {
                display: inline-flex;
                flex-direction: column;
                justify-content: left;
                margin-right: 200px;
            }

            .container {
                display: flex;
                width: 100%;
                margin: 60px 0;
            }

            p {
                font-family: SourceSerif;
                margin-bottom: 0;
            }

            .price {
                font-size: 36px;
                font-weight: bold;
                font-family: Roboto;
                padding: 10px 0;
            }

            .page_author {
                font-size: 21px;
                font-family: Roboto;
                margin: 20px 0;
            }

            .add {
                width: 120px;
                height: 36px;
                font-size: 18px;
                color: #ffffff;
                font-family: Roboto;
                padding: 0 10px;
                background-color: #264653;
                align-content: center;
                text-align: center;
                float: right;
                align-self: center;
                border-radius: 6px;
                margin-left: 60px; 
                border-style: solid;
                border-color: #264653;
                border-width: 2px;
            }

            .add:hover {
                color: #264653;
                background-color: #ffffff;
                cursor: pointer;
            }

            .image_container {
                display: flex;
                flex-direction: column;
                padding: 0 100px 0 200px;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="image_container">
            <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "u5rikrp6bcxpf";
                $password = "passtest2233";
                $dbname = "dbseizae2lm8vt";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $id = $_GET['id'];

                // Query to retrieve book information
                $sql = "SELECT * FROM book_collection WHERE id=$id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Display book information
                    $row = $result->fetch_assoc();
                    ?>
                    <img id="coverImg" src="<?php echo $row['cover_url']; ?>" alt="<?php echo $row['title']; ?>">
                    <p>IBSN: <span id="IBSN"><?php echo $row['isbn']; ?></span></p>
                    <p>Quality: Good<span id="quality"></span></p>
                    <p>Publisher: <span id="publisher"><?php echo $row['publisher']; ?></span></p>
                    <p>Published: <span id="published"><?php echo $row['published_date']; ?></span></p>
                    <?php
                } else {
                    echo "0 results";
                }

                // Close connection
                $conn->close();
            ?>
                <img id="coverImg">
                <p>IBSN: <span id="IBSN"></span></p>
                <p>Quality: Good<span id="quality"></span></p>
                <p>Publisher: <span id="publisher"></span></p>
                <p>Published: <span id="published"></span></p>
            </div>
            <div class="infoFlex">
                <h1 id="title"></h1>
                <p class="page_author">by: <span id="author"></span></p>
                <div style="display: flex;">
                    <span id="price" class="price"></span>
                    <span class="add">Add To Cart</span>
                </div>
                <p id="description"></p>
            </div>
        </div>
    </body>
</html>