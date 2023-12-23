<?php
    include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if product checkboxes are submitted
        if (isset($_POST['productCheckbox']) && is_array($_POST['productCheckbox'])) {
            $totalprice=0;
            $quantities = $_POST['quantity'];
            // Loop through the array of product checkboxes
            foreach ($_POST['productCheckbox'] as $productId) {
                // $productId will be the value of the current selected checkbox
                $quantity = $quantities[$productId];
                echo "Product with ID $productId is selected for checkout.<br>";
                echo "It had quantity $quantity";

                $stmt = $conn->prepare("SELECT image_data,price from product WHERE ProductID = ?");
                $stmt->bind_param("s", $productId);
                $stmt->execute();
                $stmt->bind_result($image,$price);
                $stmt->fetch();
                echo "<br>Yooo $price<br>";
                echo "Yes Noww $image<br>";
                $totalprice+=$price*$quantity;
                $stmt->close();

                echo' <img src="'.$image.'" style="width: 680px; height: 372px;" >';
                echo"x'.$quantity'";

            }
        } else {
            header('location:cart.php');
            echo "<script>
            alert('No products selected for checkout.')
            </script>";
            exit();
        }
        echo"Total price is $'.$totalprice'";
    }
?>
</body>
</html>

