<?php
include('database.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-CART</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="cart.css">
    
</head>
<body>
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    
    <hr>
    <h1>CART</h1>
    <hr>

    <?php

    $cid = $_SESSION['cid'];
    $sql = "SELECT product.ProductID,product.image_data,product.price,cart.quantity from product 
    join cart on cart.productid = product.productid
    join customer on customer.customerid= cart.customerid
    where customer.customerid = $cid";
    $result = $conn->query($sql);

    if($result->num_rows>0){

        while($row = $result->fetch_assoc()){

            echo '<form id="CheckoutForm" action="checkout.php" method="post">';
            echo '<div class="productContainer">';
            echo '<div class="checkbox">';
            echo '<input type="checkbox" name="productCheckbox[]" value="' . $row["ProductID"] . '">';
            echo '</div>';
            echo '<div class="itemPicture">';
            echo '<img src="' . $row["image_data"] . '" alt="Product Image" style="width:400px; height:222px;"> ';
            echo '</div>';
            echo '<div class="price">';
            echo '<p>Price: ' . $row["price"] . '</p>';
            echo '<label for="quantity">Quantity:</label>';
            echo '<input type="number" id="quantity" name="quantity['.$row['ProductID'].']" value='.$row['quantity'].' min="1">';
            echo '</div>';
            echo '<button id="deleteButton" onclick="deleteRecord(event, '.$row['ProductID'].')">Delete</button>';
            echo '</div>';
        }
        echo '<div>';
        echo '<input type="submit" name="checkout" value="Checkout" > ';
        echo '</div>';
        echo '</form>';
    }
    else{
        echo "Cart is empty";
    }
    ?>

    <footer class="copy" id="footer" >
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>
    <style>
        footer
        {
            bottom: 0;
            font-size: 15px;
        }
        
        h1
        {
            margin: 100px auto; /* Updated margin to center horizontally */
            text-align: center;
        }
        i:hover 
        {
            color: yellow; /* Change to your desired color */
            cursor: pointer;
        }
    </style>

    <script>
        
        function deleteRecord(event,recordId) {
            
            event.preventDefault();
            // Make an asynchronous HTTP request to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "deletecart.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response from the server if needed
                    console.log(xhr.responseText);
                }
            };
            xhr.send("id=" + recordId);
            window.location.href = 'cart.php';
        }
    </script>

</body>
</html>


<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if product checkboxes are submitted
        if (isset($_POST['productCheckbox']) && is_array($_POST['productCheckbox'])) {
            // Loop through the array of product checkboxes
            header("location:checkout.php");
            exit();
        } else {
            echo "<script>
            alert('No products selected for checkout.')
            </script>";
        }
    }
?>