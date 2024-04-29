
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sell Book - ShelfSwap</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type = "text/css" href= "style.css">
        <?php include 'header.php'; ?>
        <meta charset="utf-8">
        <style type=text/css>
            .quality-container {
                display: flex;
                justify-content: space-around;
                margin-bottom: 30px;
            }
            .quality-option-text {
                margin-top: 5px;
            }
            .quality-option {
                display: flex;
                width: 15px;
                height: 15px;
                border: 2px solid rgb(0, 0, 0);
                border-radius: 50%;
                text-align: center;
                line-height: 50px;
                flex-direction: column;
                align-items: center;
                white-space: nowrap;
            }
            .quality-option:hover {
                background-color: rgb(211, 211, 211); /* Change to whatever color you desire */
            }
            .selected {
                border-color: #E76F51;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            function setQuality(quality) {
                document.getElementById('quality').value = quality;
                // make sure select works
                var options = document.getElementsByClassName('quality-option');
                for (var i = 0; i < options.length; i++) {
                    options[i].classList.remove('selected');
                }
                event.target.classList.add('selected');
                // turn off required
                var qual_field = document.getElementById('quality');
                qual_field.setAttribute('data-done', 'true');
            }

            $(document).ready(function() {
                $('#submit_sell').click(function(event) {
                    var qualField = $('#quality');
                    if (!qualField.data('done')) {
                        alert('Please select a quality option.');
                        event.preventDefault();
                    }
                });
            });
        </script>
    </head>
    <body>
        <div class="page_title"><h1>Enter Book Details</h1></div>
        <form action="process_sell.php<?= isset($_GET['username']) ? '?username=' . htmlspecialchars($_GET['username']) : '' ?>" method="get" id="sell_book">
            <label for="book_name">Book Name:</label><br>
            <input type="text" id="book_name" name="book_name" required><br><br>

            <div class="quality-container">
                <div class="quality-option" onclick="setQuality('poor')">Poor</div>
                <div class="quality-option" onclick="setQuality('well_loved')">Well Loved</div>
                <div class="quality-option" onclick="setQuality('fair')">Fair</div>
                <div class="quality-option" onclick="setQuality('excellent')">Excellent</div>
                <div class="quality-option" onclick="setQuality('brand_new')">Brand New</div>
                <input type="hidden" id="quality" name="quality" required>
            </div>

            <label for="price">Price:</label><br>
            <input type="number" id="price" name="price" step="0.01" required><br><br>

            <input type="submit" value="Submit" id = "submit_sell">
        </form>
        <?php include 'footer.php'; ?>
    </body>
</html>
