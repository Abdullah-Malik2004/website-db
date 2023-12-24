<?php
    include('database.php');
    session_start();

    $fid=$_SESSION['fid'];

    $sql = "SELECT p.productid,p.name,p.price,p.stockquantity,p.rating,p.image_data,COUNT(orderid) from product as p
    left join orders on p.productid = orders.productid
    where p.sellerid = $fid
    group by productid,name,price,stockquantity,rating,image_data";

    
    $result = mysqli_query($conn,$sql);

    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

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
            echo '    <label for="' . $row['productid'] . 'Orders">Number of Orders: '.$row['COUNT(orderid)'].'</label><br>';
            echo '    <label for="' . $row['productid'] . 'Orders">Rating: '.$row['rating'].'</label>';
            echo '  </div>';
            echo '  <div>';
            echo '    <input type="hidden" name="product_id" value="' . $row['productid'] . '">';
            echo '    <input type="submit" name="modify" value="Confirm">';
            echo '  </div>';
            echo '</div>';
            echo '</form>';


        }
    }
    else{
        echo 'You have no products. To add a product click the link below';
        echo '<a href="sell.php">Add A Product</a>';
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