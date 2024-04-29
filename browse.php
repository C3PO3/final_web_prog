<html>
  <head>
      <title>Browse - ShelfSwap</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="style.css">
      <?php include 'header.php'; ?>
      <meta charset="utf-8">
      <style>
          body {
              font-family: Arial, sans-serif;
              margin: 0;
              padding: 0;
          }
          h1 {
              text-align: center;
              margin-top: 20px;
          }
          .book {
              border: 1px solid #ccc;
              margin: 10px;
              padding: 10px;
              cursor: pointer;
              background-color: #f9f9f9;
              box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
              transition: 0.3s;
              max-width: 300px;
              display: inline-block;
              vertical-align: top;
          }
          .book:hover {
              box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
          }
          .book img {
              width: 100px;
              height: 150px;
              display: block;
              margin: auto;
          }
          .book .description {
              display: none;
              margin-top: 10px;
          }
          .book .title, .book .author, .book .quality, .book .price .description {
              font-weight: bold;
          }
      </style>
      <script>
          $(document).ready(function() {

              // Set variable for number to show
              num_shown = 8;

              // Function to show 4 more books on click of "show more" button
              $("#show-more").click(function() {
                  for (i = num_shown - 1; i < num_shown + 4; i++) {
                      id = "#book" + i;
                      $(id).slideDown();
                  }
                  num_shown += 4;
                  if (num_shown >= books.length) {
                      $("#show-more").addClass("disabled");
                  }
                  if ($("#show-less").hasClass("disabled")) {
                      $("#show-less").removeClass("disabled");
                  }
              });

              // Function to show 4 fewer books on click of "show less" button
              $("#show-less").click(function() {
                  for (i = num_shown - 1; i > num_shown - 5; i--) {
                      id = "#book" + i;
                      $(id).slideUp();
                  }
                  num_shown -= 4;
                  if (num_shown == 4) {
                      $("#show-less").addClass("disabled");
                  }
                  if ($("#show-more").hasClass("disabled")) {
                      $("#show-more").removeClass("disabled");
                  }
              });

              // Create a window popup that displays more information about each
              // book when its image is clicked
              $(".book img").click(function() {
                  var bookId = "#" + $(this).closest('.book').attr('id');
                  title = $(bookId).data("title");
                  author = $(bookId).data("author");
                  description = $(bookId).data("description");
                  cover = $(bookId).data("cover");
                  IBSN = $(bookId).data("IBSN");
                  qty = $(bookId).data("qty");
                  price = $(bookId).data("price");

                  $("#modalTitle").text(title);
                  $("#modalDescription").html(description);
                  $("#modalAuthor").html(author);
                  $("#modalCover").html(`<img src="${cover}" alt="Book Cover">`);
                  $("#modalIBSN").html("IBSN: " + IBSN);
                  $("#modalQty").html("Qty in stock: " + qty);
                  $("#modalPrice").html(price);

                  $("#bookModal").show();
                  $("body").css("overflow", "hidden");
              });

              // Close the description window
              $(".close").click(function() {
                  modal = document.getElementById("bookModal");
                  modal.style.display = "none";
                  document.body.style.overflow = "auto";
              });

          });
      </script>
  </head>
  <body>
      <?php
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

            // Query to retrieve all books from the book_collection table
            $sql = "SELECT * FROM book_collection";
            if (isset($_GET['query']) && !empty($_GET['query'])) {
                $query = $_GET['query'];
                $sql .= " WHERE author LIKE '%$query%' OR title LIKE '%$query%' OR description LIKE '%$query%' OR isbn LIKE '%$query%'";
            }
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    // Display book information
                    echo "<div class='book' onclick='toggleDescription(this)'>";
                    echo "<img src='" . $row['image'] . "' class='bookImage'>";
                    echo "<div class='title'>Title: " . $row['title'] . "</div>";
                    echo "<div class='author'>Author: " . $row['author'] . "</div>";
                    echo "<div class='description'>Description: " . $row['description'] . "</div>";
                    echo "<div class='quality'>Quality: " . $row['quality'] . "</div>";
                    echo "<div class='price'>Price: " . $row['price'] . "</div>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }

            // Close connection
            $conn->close();
      ?>

      <script>
          function toggleDescription(book) {
              var description = book.querySelector('.description');
              if (description.style.display === 'none') {
                  description.style.display = 'block';
                  description.style.fontWeight = 'bold';
              } else {
                  description.style.display = 'none';
                  description.style.fontWeight = 'normal';
              }
          }
      </script>
  </body>
</html>
