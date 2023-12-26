<?php
    include('database.php');
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="border.css">
    <link rel="icon" href="headerCOSMOS.png">
    <title>Pending Orders</title>
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
        }

        .star {
            font-size: 24px;
            cursor: pointer;
            color: #ccc;
        }

        .star:hover,
        .star.active {
            color: gold;
        }
    </style>
</head>
<body>
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <?php

        $cid = $_SESSION['cid'];    

        $sql = "SELECT p.productid,p.name,o.total_amount,o.quantity,p.image_data,o.status,o.orderid from product as p
        join orders o on o.productid = p.productid
        where o.customerid = $cid AND o.status='delivered' AND o.rating is NULL LIMIT 1";

        $result = mysqli_query($conn,$sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo '<form id="RatingForm" action="process_rating.php" method="post">';
                echo '<div style="display: flex; align-items: center;">';
                echo '  <div style="margin-right: 20px;">';
                echo '    <img src="' . $row["image_data"] . '" alt="Product Image" style="width:400px; height:222px;"><br>';
                echo '    <label for="name">' . $row['name'] . '</label>';
                echo '  </div>';
                echo '  <div>';
                echo '    <label for="' . $row['orderid'] . 'Quantity">Quantity: '.$row['quantity'].'</label><br>';
                echo '    <label for="' . $row['orderid'] . 'Price">Price: '.$row['total_amount'].'</label><br>';
                echo '    <label for="' . $row['orderid'] . 'Review">Review:</label><br>';
                echo '    <input type="hidden" name="order_id" value="' . $row['orderid'] . '">';
                echo '  </div>';
                echo '  <div class="rating" id="rating">';
                echo '    <span class="star" data-value="5">&#9733;</span>';
                echo '    <span class="star" data-value="4">&#9733;</span>';
                echo '    <span class="star" data-value="3">&#9733;</span>';
                echo '    <span class="star" data-value="2">&#9733;</span>';
                echo '    <span class="star" data-value="1">&#9733;</span>';
                echo '  </div>';
                echo '<input type="hidden" name="selectedRating" id="selectedRating" value="0">';
                echo '    <input type="submit" name="yesnow" value="Confirm And Next"';
                echo '  </div>';
                echo '</form>';
            }
        }
        else{
            echo"There are no products to be reviewed";
        }

    ?>

    <script>
        // JavaScript for interactivity
        document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star');
        const ratingContainer = document.getElementById('rating');
        let selectedRating = 0;
        const selectedRatingInput = document.getElementById('selectedRating');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = star.getAttribute('data-value');
                
                
                    selectedRatingInput.value = value;
                    selectedRating = value;
                    highlightStars(value);
                    // You can send the rating to the server or perform other actions here
                    console.log('Selected rating:', selectedRating);
                
            });

            star.addEventListener('mouseover', () => {
                const value = star.getAttribute('data-value');
                highlightStars(value);
            });

            star.addEventListener('mouseout', () => {
                resetStars();
                highlightStars(selectedRating); // Highlight the selected rating on mouseout
                });
            });

        function highlightStars(value) {
            resetStars();
            stars.forEach(star => {
                if (star.getAttribute('data-value') <= value) {
                    star.classList.add('active');
                }
            });
        }

        function resetStars() {
            stars.forEach(star => {
                star.classList.remove('active');
            });
            }
            });

        function deleteRecord(rating) {
            
            event.preventDefault();
            // Make an asynchronous HTTP request to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "process_rating.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the server if needed
                    console.log(xhr.responseText);
                    
                }
            };
            xhr.send("rating=" + rating);
            //window.location.href = 'tobereviewed.php';
        }
    </script>
    
</body>
</html>