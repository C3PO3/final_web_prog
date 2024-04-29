
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
            .box-td {
                padding-left: 10px;
            }
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
            /* new stuff */
            .input-table {
                margin: auto;
            }

            .lable-td {
                padding-right: 10px;
                text-align: right;
                align-items: right;
            }

            .labels {
                font-family: SourceSerif;
                font-size: 30px;
                text-align: right;
                align-items: right;
            }

            .button-row {
                margin: auto;
                padding-top: 15px;
                justify-content: center;
                text-align: center;
            }

            .input-button {
                font-family: SourceSerif;
                font-size: 30px;
                background-color: #ffffff;
                border: 1px, solid, #000000;
                border-radius: 5px;
                text-align: center;
                margin: auto 0;
            }

            .input-button:hover {
                background-color: #e1e1e1;
            }

            .box {
                height: 30px;
                width: 200px;
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
        <h1 class="page_title">Enter Book Details</h1>

        <form action="process_sell.php" method="get" id="sell_book">
            <td class="lable-td"><label for="book_name" class="labels">Book Name:</label></td>
            <td class="box-td"><input type="text" id="book_name" name="book_name" class="box" required></td>

            <br><br><br><br>
            <div class="quality-container">
                <div class="quality-option" onclick="setQuality('poor')">Poor</div>
                <div class="quality-option" onclick="setQuality('well_loved')">Well Loved</div>
                <div class="quality-option" onclick="setQuality('fair')">Fair</div>
                <div class="quality-option" onclick="setQuality('excellent')">Excellent</div>
                <div class="quality-option" onclick="setQuality('brand_new')">Brand New</div>
                <input type="hidden" id="quality" name="quality" required>
            </div>
            <br>

            <td class="lable-td"><label for="price" class="labels">Price:</label></td>
            <td class="box-td"><input type="number" id="price" name="price" step="0.01" class="box" required></td>

            <br><br>
            <tr>
                <td colspan="2" class="button-row">
                    <input type="submit" value="Submit" id = "submit_sell" class="input-button">
                </td>
            </tr>
        </form>
        <?php include 'footer.php'; ?>
    </body>
</html>
