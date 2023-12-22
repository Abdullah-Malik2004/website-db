<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
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
    </a>

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
        </ul>
    </div>
</header>



</body>

</html>