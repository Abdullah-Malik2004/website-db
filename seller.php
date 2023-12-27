<?php
include('database.php');
session_start();
if(!isset($_SESSION['sloggedin']) || $_SESSION['sloggedin']!=true){
    header("location:sellersignin.php");
    exit;
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
<link rel="stylesheet" href="seller.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<style>
    body
    {
        background-color: #8490dd;
    }
</style>

<body>
<header>
    <a href="seller.php">
        <div class='logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>

    <style>
        *
        {
            font-family: "Roboto", sans-serif;
        }
        .statName 
        {
            margin: 100px 0;
            padding-top: 100px;
            text-align: center;
            height: 100px;
            width: 100%;
            background-color: #2F4550;
            font-size: 1.2rem;
            color: #8490dd;
        }
        body
        {
            background-color: #446779;;
        }

        

    </style>

    <div id="navigation">
        <ul class="list">
            <li><a class="active" href="seller.php">
                    Home
                </a></li>

            <li><a href="sell.php">
                    Sell Your Product
                </a></li>

            <li><a href="myproducts.php">
                    My Products
                </a></li>

            <li><a href="myorders.php">
                    My Orders
                </a></li>
        </ul>
    </div>
</header>
    


    <style>
        * {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        body
        {
            background-color: #8490dd;
        }

        .row
        {
            display: flex;
            justify-content: space-evenly;
            margin-top: 30px;
        }

        .row p
        {
            font-size: 18px;
            font-weight: 500;
        }
        .entire 
        {
            margin-top: 100px;
        }
        .heading
        {
            text-align: center;
            padding-top: 10px;
            
            margin: 0 400px;
            margin-top: 200px;
            background-color: #03092b;
            color: #78808d;
            height: 50px;
            weight: 50px;
        }
    </style>
    <div class="heading">
        <h1>
            Your Stats
        </h1>
    </div>
    <?php
    $total;
    $Mostbought; $MostboughtQuantity;
    $MostboughtCategory;
    $Rating;
    $sid = $_SESSION['fid'];

$Q1 = 'SELECT COUNT(*) AS totalCount FROM orders;';
$Q2 = 'SELECT P.Name, O.quantity FROM product AS P
        JOIN orders AS O ON P.ProductID = O.ProductID
        ORDER BY O.quantity DESC LIMIT 1;';
$Q3 = 'SELECT P.Name, Q.categoryName FROM product AS P
        JOIN category AS Q ON P.categoryID = Q.categoryID;';
$Q4 = 'SELECT Name,rating from orders
ORDER BY rating DESC LIMIT 1;';

if ($conn->multi_query($Q1 . $Q2 . $Q3 )) 
{
    do {
        $result = $conn->store_result();

        if ($result) 
        {
            $row = $result->fetch_assoc(); 
            if ($row !== null && isset($row['totalCount'])) 
                $total = $row['totalCount'];
            else if (isset($row['Name'], $row['quantity'])) 
            {
                $Mostbought = $row['Name'];
                $MostboughtQuantity = $row['quantity'];
            } 
            else if (isset($row['Name'], $row['categoryName'])) 
                $MostboughtCategory = $row['categoryName'];
            
            
            
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
}
?>


<script>
    /**
     * $(document).ready(function () { ... });: This ensures that the jQuery code executes when the document is fully loaded.

$('.row').hover(...);: This sets up a hover event handler for elements with the class .row.

function () { ... }: This is the callback function that runs when you hover over or leave the element.

$(this).find('.additional-info').slideDown();: When you hover over a .row, this finds the nested .additional-info within that specific row and slides it down, making it visible.

$(this).find('.additional-info').slideUp();: When you leave the .row, this finds the nested .additional-info within that specific row and slides it up, hiding it again.
     */

</script>


<div class="entire">
    <div class="row">
        <p>Your Best Item Selling: </p>
        <p class="this"><?php echo $Mostbought; ?></p>
        
    </div>

    <div class="row">
        <p>Total orders: </p>
        <p class="this1"><?php echo $total; ?></p>
    </div>
    
    <div class="row">
        <p class="this2">Your Best Selling Category: </p>
        <p class="this2"><?php echo ucwords($MostboughtCategory); ?></p>
    </div>
    <!--<div class="row">
        <p>Highest Rated Product:</p>
        <p class="this3"><?php echo $Rating; ?></p>
    </div>-->
</div>




</body>
<footer class="copy" id="footer">
    <p>&copy;  DBMS Project Fall 2023.
    <br>
    This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
    <br>
    All rights reserved.  </p>
</footer>
</html>