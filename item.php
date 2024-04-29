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
            $(document).ready(function() {
                const urlParams = new URLSearchParams(window.location.search);
                const volumeId = urlParams.get('id');

                // get book specific info
                const url = "https://www.googleapis.com/books/v1/volumes/" + volumeId;
                let volumeInfo;

                const req = new XMLHttpRequest();
                req.open("GET", url, true);
                req.onreadystatechange = function () {
                    if (req.readyState === 4) {
                        if (req.status === 200) {
                            const data = JSON.parse(req.responseText);
                            if (data.error) {
                                console.error("Error:", data.error.message);
                                return;
                            }
                            volumeInfo = data.volumeInfo || {};

                            // Set page elements to book data
                            $("#coverImg").attr("src", volumeInfo.imageLinks.small 
                                || volumeInfo.imageLinks.thumbnail).attr('alt', volumeInfo.title);
                            $("#title").text(volumeInfo.title);
                            $("#author").text(volumeInfo.authors);
                            $("#price").text('$10.00')
                            $("#description").html(volumeInfo.description);
                            const isbn13 = data.volumeInfo.industryIdentifiers.find(identifier => identifier.type === "ISBN_13").identifier;
                            $("#IBSN").text(isbn13);
                            $("#publisher").text(volumeInfo.publisher);
                            $("#published").text(volumeInfo.publishedDate);
                            console.log(volumeInfo);


                            $(".add").click(function() {
                                alert(volumeInfo.title + " added to your Cart");
                            });

                        } else {
                            console.error("Error:", req.status);
                        }
                    }
                };

                req.send();

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