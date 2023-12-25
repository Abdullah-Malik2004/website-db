<?php
    include('database.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $orderid = $_POST['product_id'];
        $status = $_POST['status'];
        $sql = "UPDATE orders SET status = '$status'
        where orderid = $orderid";
        $result = mysqli_query($conn,$sql);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>COSMOS Seller</title>
<link rel="stylesheet" href="main.css">
<link rel="icon" href="headerCOSMOS.png">
<link rel="stylesheet" href="border.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
<header>
    <a href="seller.php">
        <div class='logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a></header>

    <?php

        $sid = $_SESSION['fid'];    

        $sql = "SELECT p.productid,p.name,o.total_amount,o.quantity,p.image_data,o.status,o.orderid from product as p
        join orders o on o.productid = p.productid
        where p.sellerid = $sid AND (o.status='pending' OR o.status='shipped')";

        $result = mysqli_query($conn,$sql);
        if($result->num_rows>0){
            
            while($row=$result->fetch_assoc()){
                echo '<form id="ChangeOrderForm" action="myorders.php" method="post">';
                echo '<div style="display: flex; align-items: center;">';
                echo '  <div style="margin-right: 20px;">';
                echo '    <img src="' . $row["image_data"] . '" alt="Product Image" style="width:400px; height:222px;"><br>';
                echo '    <label for="name">' . $row['name'] . '</label>';
                echo '  </div>';
                echo '  <div>';
                echo '    <label for="' . $row['productid'] . 'Quantity">Quantity: '.$row['quantity'].'</label><br>';
                echo '    <label for="' . $row['productid'] . 'Price">Price: '.$row['total_amount'].'</label><br>';
               
                if($row['status']=='pending'){
                echo '<div class="selection">
                    <label for="status">Status</label>
                    <select name="status" id="status'.$row['productid'].'">
                        <option value="pending">Pending</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>';
                }
                elseif($row['status']=='shipped'){
                    echo '<div class="selection">
                    <label for="status">Status</label>
                    <select name="status" id="status'.$row['productid'].'">
                        <option value="pending">Pending</option>
                        <option value="shipped" selected>Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>';
                }
                elseif($row['status']=='delivered'){
                    echo '<div class="selection">
                    <label for="status">Status</label>
                    <select name="status" id="status'.$row['productid'].'">
                        <option value="pending">Pending</option>
                        <option value="shipped" >Shipped</option>
                        <option value="delivered" selected>Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>';   
                }
                elseif($row['status']=='cancelled'){
                    echo '<div class="selection">
                    <label for="status">Status</label>
                    <select name="status" id="status'.$row['productid'].'">
                        <option value="pending">Pending</option>
                        <option value="shipped" >Shipped</option>
                        <option value="delivered" >Delivered</option>
                        <option value="cancelled" selected>Cancelled</option>
                    </select>
                </div>'; 
                }
                echo '  </div>';
                echo '  <div>';
                echo '    <input type="hidden" name="product_id" value="' . $row['orderid'] . '">';
                echo '    <input type="submit" name="modify" value="Confirm">';
                echo '  </div>';
                echo '</div>';
                
                echo '</form>';
            }
        }
        
    ?>

    

</body>
</html>