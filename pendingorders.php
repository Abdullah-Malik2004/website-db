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
        where o.customerid = $cid AND (o.status='pending' OR o.status='shipped')";

        $result = mysqli_query($conn,$sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo '<div style="display: flex; align-items: center;">';
                echo '  <div style="margin-right: 20px;">';
                echo '    <img src="' . $row["image_data"] . '" alt="Product Image" style="width:400px; height:222px;"><br>';
                echo '    <label for="name">' . $row['name'] . '</label>';
                echo '  </div>';
                echo '  <div>';
                echo '    <label for="' . $row['productid'] . 'Quantity">Quantity: '.$row['quantity'].'</label><br>';
                echo '    <label for="' . $row['productid'] . 'Price">Price: '.$row['total_amount'].'</label><br>';
                echo '    <label for="' . $row['productid'] . 'Status">Status: '.$row['status'].'</label><br>';
                echo '  </div>';
                echo '  </div>';
            }
        }

    ?>
    
</body>
<style>
        *{
            font-family: "Roboto", sans-serif;
        }
        body
        {
            background-color: #737880;
        }
        .copy
        {
            bottom: 0;
            display: flex;
            text-align: center;
            color: #737880;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
            background-color: #03092b;
            height: 80px;
            width: 100%;
        }
        .content 
        {
            margin-top: 50px;
            display: inline;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        img
        {
            margin-top: 60px;
            margin-bottom: 20px;
        } 
        .labelName
        {
            margin-top: 20px;
            color: #03092b;
            font-size: 18px;
            font-weight: 550;
        }

        label[for="name"]
        {
            margin-top: 20px;
            color: #03092b;
            font-size: 30px;
            font-weight: 600;
        }
    </style>
</html>