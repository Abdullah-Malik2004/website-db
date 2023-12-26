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
    <title>Checkout</title>
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

                echo '<div style="display: flex; align-items: center;">';
                echo '  <div style="margin-right: 20px;">';
                echo '    <img src="' . $image . '" style="width: 400px; height: 222px;" >';
                echo '  </div>';
                echo '  <div>';
                echo '    <p>' . $name . '</p>';
                echo '    <p>' . $quantity . 'x</p>';
                echo '    <p>Price = ' . $lprice . '</p>';
                echo '  </div>';
                echo '</div>';


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

        echo '<label for="address">Confirm you address:</label><br>';
        echo '<textarea id="address" name="address" rows="4" cols="50">'.$address.'</textarea><br>';
        
       
        
        echo '<label for="coupon">Select Coupon:</label><br>';


        echo '<input type="radio" id="coupon10" name="coupon" value="coupon10">';
        echo '<label for="coupon10">$10 Off</label><br>';

        
        // Radio button for $5 off
        echo '<input type="radio" id="coupon5" name="coupon" value="coupon5">';
        echo '<label for="coupon5">$5 Off</label><br>';

        echo '<label for="paymentMethod">Select Payment Method:</label><br>';

        // Radio button for Credit Card
        echo '<input type="radio" id="creditCard" name="paymentMethod" value="creditCard">';
        echo '<label for="creditCard">Credit Card</label><br>';

        // Radio button for PayPal
        echo '<input type="radio" id="payPal" name="paymentMethod" value="EasyPaisa">';
        echo '<label for="payPal">EasyPaisa</label><br>';

        echo '<input type="radio" id="creditCard" name="paymentMethod" value="CashOnDelivery">';
        echo '<label for="cod">Cash On Delivery</label><br>';

        echo '<input type="submit" name="placeorder" value="Place Your Order" ';

        echo'</form>';

    }
    else{
        header("location:cart.php");
        exit();
    }
?>
</body>
</html>

