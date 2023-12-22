<?php 
    include('database.php');
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location:signIn.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-GAMES</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="categoryCss/games.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>
<body class="body">
    <a href="main.php">
        <div class = 'logobar'>
            <div class="logo-cover border_logo">
                <div class="logo"></div>
            </div>
        </div>
    </a>
        
    <script>
    </script>

    <hr>
    <h1>GAMES</h1>
    <hr>

    <div class="f2 " >
        <div class="assissin" id="assissin">
        <img src="games/assasin.jpg" class="im" >
        <div class="textcontainer">
            <h3 onclick="addToCart('assissin', 'games/assasin.jpg')">Assassin's Creed</h3>
            <div class="cc">
                <h5 onclick="addToCart('assissin', 'games/assasin.jpg')">Add to Cart</h5>
                <i class="fa-solid fa-cart-shopping" onclick="addToCart('assissin', 'games/assasin.jpg')"></i>
            </div>
        </div>
        <div class="price">
            <h4><br>$79.99</h4>
        </div>
    </div>

    <script>
      
    </script>
        

        <div class="assissin">
            <img src="games/fc5.jpg" class="im">
            <div class="textcontainer" id="fc5" >
                <h3 onclick="addToCart('fc5', 'games/fc5.jpg')">Far Cry 5</h3>
                <div class="cc">
                        <h5 onclick="addToCart('fc5', 'games/fc5.jpg')">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('fc5', 'games/fc5.jpg')"></i>
                </div>
            </div>
            <div class="price">
                <h4><br>$19.99</h4>
            </div>
        </div>
    </div>

    <div class="s2 ">
        <div class="assissin">
            <img src="games/wwz.jpg" class="im"  >
            <div class="textcontainer" id="wwz">
                <h3 onclick="addToCart('wwz', 'games/wwz.jpg')">World War Z</h3>
                    <div class="cc">
                        <h5 onclick="addToCart('wwz', 'games/wwz.jpg')">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('wwz', 'games/wwz.jpg')"></i>
                    </div>
            </div>
            <div class="price">
                <h4><br>$39.99</h4>
            </div>
            
        </div>
            
        <div class="assissin">
            <img src="games/jedi.jpg" class="im">
            <div class="textcontainer" id="jedi">
                <h3 onclick="addToCart('jedi', 'games/jedi.jpg')">Star Wars: Jedi Survivor</h3>
                    <div class="cc">
                        <h5 onclick="addToCart('jedi', 'games/jedi.jpg')">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('jedi', 'games/jedi.jpg')"></i>
                    </div>
            </div>
            <div class="price">
                <h4><br>$49.71</h4>
            </div>
        </div>
    </div>

    <style>
            .cc 
            {
                display: flex;
            }
            .fa-cart-shopping
            {
                margin-top: 10px;
            }
            h5
            {
                margin-top: 10px;
                margin-right: 10px;
            }
            .price 
            {
                font-size: 27px;
                text-align: center;
                margin-top: -10px; /* Adjust the margin as needed */
            }
        </style>

<div id="itemPicture" class="item-picture-container">
    <!-- Item pictures will be dynamically added here -->
    </div>


    <script src="newGames.js">
    </script>


    <footer class="copy" id="footer">
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>
</body>
</html>
