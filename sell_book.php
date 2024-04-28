
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Book Details Form</title>
        <style>
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
                border-color: rgb(0, 0, 255);
            }
        </style>
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
        <h2>Enter Book Details</h2>
        <form action="process_sell.php" method="get" id="sell_book">
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
    </body>
</html>
