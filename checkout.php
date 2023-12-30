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
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <style>
    body
    {
        background-color: #2F4550;
    }
    img
    {
        margin-bottom: 20px;
    }
    .product 
    {
        margin-top: 30px;
        text-align: center;
        margin-bottom: 50px;
    }
    .product p 
    {
        font-size: 20px;
        font-weight: 550;
        color: #8490dd;
        margin-bottom: 10px;
    }

    hr
    {
        margin-bottom: 50px;
    }
    label[for="coupon"] 
    {
        
        margin-left: 550px;
        font-size: 35px;
        font-weight: 550;
        color: #8490dd;
    }

    .coupon-item
    {
        margin-top: 50px;
        text-align: center;
    }
    
    .price 
    {
        display: flex;
        margin-left: 600px;
    }
    .price p 
    {
        font-size: 20px;
        font-weight: 550;
        color: #8490dd;
    }
    input[name="couponCheckbox[]"] 
    {
        margin-right: 50px;
    }

    label[for="paymentLabel"]
    {
        margin-left: 550px;
        font-size: 20px;
        font-weight: 550;
        color: #8490dd;
        margin-bottom: 30px;
    }

    .payment 
    {
        
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #8490dd;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px; /* Set a specific width */
        margin: 30px auto; 
        text-align: center; /* Center text within the container */
    }

    .payment input[type="radio"] 
    {
        margin-right: 5px;
    }

    .payment label 
    {
        font-weight: bold;
    }

    .payment label[for="totalprice"] 
    {
        margin-top: 10px;
        display: block;
    }

    .payment input[type="submit"] 
    {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .address{
        margin-top: 30px;
        text-align: center;
        margin-bottom: 50px;
    }
</style>
    <title>COSMOS-Checkout</title>
</head>
<body>
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <!-- Assuming this part of the code goes within the <body> tag -->

<!--
<form id="OrderForm" action="order.php" method="post">
-->

<!-- Commented out PHP code -->

<!--
</form>
-->

<!-- Uncommented HTML equivalent -->

<!--
<label for="address">Confirm your address:</label><br>
<textarea id="address" name="address" rows="4" cols="50">123 Main Street, Cityville</textarea><br>

<label for="coupon">Select Coupon:</label><br>
 PHP code for fetching and displaying coupons 
Placeholder data for coupons  line number 138--> 




<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // Check if product checkboxes are submitted
        if (isset($_POST['productCheckbox']) && is_array($_POST['productCheckbox'])) {
            $totalprice=0;
            $quantities = $_POST['quantity'];
            echo'<form id="OrderForm" action="order.php" method="post">';
            // Loop through the array of product checkboxes
            foreach ($_POST['productCheckbox'] as $productId) {
                // $productId will be the value of the current selected checkbox
                $quantity = $quantities[$productId];
                $stmt = $conn->prepare("SELECT Name,image_data,price,StockQuantity from product WHERE ProductID = ?");
                $stmt->bind_param("s", $productId);
                $stmt->execute();
                $stmt->bind_result($name,$image,$price,$quantityavailable);
                $stmt->fetch();
                if($quantity>$quantityavailable){
                    echo"<script>
                    alert('Not enough items available for $name. Go back to cart');
                    window.location.href = 'cart.php'
                    </script>";

                }
                else{
                $lprice = $price*$quantity;
                $totalprice+=$price*$quantity;
                $stmt->close();

                echo '<div class="product">';
                echo '  <div style="margin-right: 20px;">';
                echo '    <img src="' . $image . '" style="width: 400px; height: 222px;" >';
                echo '  </div>';
                echo '  <div>';
                echo '    <p>' . $name . '</p>';
                echo '    <p>' . $quantity . ' Items</p>';
                echo '    <p>Price = $' . $lprice . '</p>';
                echo '  </div>';
                echo '</div>';

                echo '<hr>';

                $sql = "INSERT INTO temp_table (pid, name, quantity, image_data) VALUES
                ($productId, '$name',$quantity, '$image')";
                mysqli_query($conn,$sql);
                }
                

            }
            
        } else {
            
            echo "<script>
            alert('No products selected for checkout.')
            window.location.href = 'cart.php'
            </script>";
            exit();
        }
        $sql = "SELECT address from customer where customerid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i",$_SESSION['cid']);
        $stmt->execute();
        $stmt->bind_result($address);
        $stmt->fetch();
        $stmt->close();

        echo '<div class = "address"';
        echo '<label for="address">Confirm you address:</label><br>';
        echo '<textarea id="address" name="address" rows="4" cols="50">'.$address.'</textarea><br>';
        echo '</div>';
       
        
        echo '<label for="coupon">Select Coupon:</label><br>';

        $cid = $_SESSION['cid'];
        $sql= "SELECT c.couponid,co.image_data,co.dollarsoff from customercoupon c
        join coupon co on co.couponid = c.couponid  where customerid = $cid";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo '<div class="couponSec">';
                echo '<div class="coupon-item">';
    

                echo '<img src="' . $row["image_data"] . '" alt="Product Image" style="width:400px; height:222px;"> ';
                echo '</div>';
                echo '<div class="price">';
                echo '<input type="radio" name="couponCheckbox[]" value="' . $row["dollarsoff"] . '" onclick="updateTotalPrice()">';
                echo '<p> $' . $row["dollarsoff"] . ' off</p>';
                echo '</div>';
                echo '</div>';
            }
        }
        else{
            echo"<label>No coupons available<br></label>";
        }
        echo '<label for="paymentLabel">Select Payment Method</label>';
        echo '<hr>';
        echo '<div class="payment">';
        echo '<input type="radio" id="payPal" name="paymentMethod" value="EasyPaisa">';
        echo '<label for="payPal">EasyPaisa</label><br>';

        echo '<input type="radio" id="creditCard" name="paymentMethod" value="CashOnDelivery">';
        echo '<label for="cod">Cash On Delivery</label><br>';


        echo '<label for="totalprice">The total price is $<span id="totalprice">' . $totalprice . '</span></label><br>';
        echo '<input type="submit" value="Place Your Order" >';
        echo '</div>';
        echo'</form>';

    }
    else{
        header("location:cart.php");
        exit();
    }
?>
<script>
function updateTotalPrice() {
    // Get all selected checkboxes
    const checkboxes = document.querySelectorAll('input[name="couponCheckbox[]"]:checked');

    // Calculate the updated total price
    let updatedTotalPrice = <?php echo $totalprice; ?>; // Set to your initial base price

    checkboxes.forEach(checkbox => {
        // Add or subtract the value of each selected coupon
        updatedTotalPrice -= parseFloat(checkbox.value);
        if(updatedTotalPrice<0){
            updatedTotalPrice=0;
        }
    });

    // Update the displayed total price
    document.getElementById('totalprice').innerText = updatedTotalPrice.toFixed(2);
}
</script>
</body>
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
</html>

