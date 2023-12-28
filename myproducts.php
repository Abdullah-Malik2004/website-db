<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="seller.css">
</head>
<body>
<a href="seller.php">
        <div class='logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>
</body>
</html>
<style>
    body
    {
        
        background-color: #446779;
        
    }
    .center 
    {
        
        margin-top: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .center p 
    {
        font-size: 25px;
        font-weight: 550;
    }
    .center a 
    {
        margin-top: 20px;
        font-size: 20px;
        font-weight: 550;
    }
</style>
<?php
    include('database.php');
    session_start();

    $fid=$_SESSION['fid'];

    $sql = "SELECT p.productid,p.name,p.price,p.stockquantity,p.image_data,COUNT(o.orderid),AVG(o.rating) from product as p
    left join orders o on p.productid = o.productid
    where p.sellerid = $fid
    group by productid,name,price,stockquantity,image_data";

    
    $result = mysqli_query($conn,$sql);

    
    if($result->num_rows>0){
        while($row = $result->fetch_assoc())
        {

            echo '<form id="ChangeProductForm" action="myproducts.php" method="post">';
            echo '<div style="display: flex; align-items: center;">';
            echo '  <div style="margin-right: 20px;">';
            echo '    <img src="' . $row["image_data"] . '" alt="Product Image" style="width:400px; height:222px;"><br>';
            echo '    <label for="name">' . $row['name'] . '</label>';
            echo '  </div>';
            echo '  <div>';
            echo '    <label for="' . $row['productid'] . 'Quantity">Quantity:</label>';
            echo '    <input type="number" class="stock" name="stock" id="' . $row['productid'] . 'Quantity" value="' . $row['stockquantity'] . '" min="1"><br>';
            echo '    <label for="' . $row['productid'] . 'Price">Price:</label>';
            echo '    <input type="number" class="price" name="price" id="' . $row['productid'] . 'Price" value="' . $row['price'] . '" step="0.01"><br>';
            echo '    <label for="' . $row['productid'] . 'Orders">Number of Orders: '.$row['COUNT(o.orderid)'].'</label><br>';
            echo '    <label for="' . $row['productid'] . 'Orders">Rating: '.number_format($row['AVG(o.rating)'],2).'</label>';
            echo '  </div>';
            echo '  <div>';
            echo '    <input type="hidden" name="product_id" value="' . $row['productid'] . '">';
            echo '    <input type="submit" name="modify" value="Confirm">';
            echo '  </div>';
            echo '</div>';
            echo '</form>';


        }
    }
    else
    {
        echo '<div class="center">';
        echo '<p>You have no products. To add a product click the link below</p>';
        
        echo '<a href="sell.php">Add A Product</a>';
        echo "</div>";
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $pid = $_POST['product_id'];
        $uprice = $_POST['price'];
        echo $uprice;
        $ustock = $_POST['stock'];
        echo $ustock;
        $sql = "UPDATE product SET stockquantity = ?, price = ? WHERE productid = ?";

        $stmt = $conn->prepare($sql);
        
        if (!$stmt) {
            die("Error in prepare statement: " . $conn->error);
        }
        $stmt->bind_param("idi", $ustock, $uprice, $pid);
        $stmt->execute();
        $stmt->close();
        header("location:myproducts.php");
    }
    
?>