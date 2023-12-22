<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-CLOTHES</title>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" href="headerCOSMOS.png">
    <link rel="stylesheet" href="border.css">
    <link rel="stylesheet" href="categoryCss/book.css">

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
        

        <hr>
        <h1>CLOTHES</h1>
        <hr>

        <div class="f2 " >
            <div class="general" id="general">
                <img src="clothes/hoodie.png" class="im" >
                <div class="textcontainer" id="hoodie">
                    <h3 onclick="addToCart('hoodie', 'clothes/hoodie.png', document.getElementById('hoodieQuantity').value)">Hoodie</h3>
                    <div class="cc">
                        <h5 onclick="addToCart('hoodie', 'clothes/hoodie.png', document.getElementById('hoodieQuantity').value)">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('hoodie', 'clothes/hoodie.png', document.getElementById('hoodieQuantity').value)"></i>
                    </div>
            </div>
            <div class="price">
                <div class="quan">
                    <h5 class="qtext">Quantity: </h5>
                    <input type="number" class="quantity" id="hoodieQuantity" value="1" min="1">
                </div>
                    <h4><br>$9.99</h4>
                </div>
            </div>
            

            <div class="general">
                <img src= "clothes/pink.png" class="im">
                <div class="textcontainer" id="pink" >
                    <h3 onclick="addToCart('pink', 'clothes/pink.png', document.getElementById('pinkQuantity').value)">Pinky Shirt</h3>
                    <div class="cc">
                            <h5 onclick="addToCart('pink', 'clothes/pink.png', document.getElementById('pinkQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('pink', 'clothes/pink.png', document.getElementById('quranQuantity').value)"></i>
                    </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="pinkQuantity" value="1" min="1">
                    </div>
                    <h4><br>$3.49</h4>
                </div>
            </div>
        </div>

        <br>
        <hr>

        <div class="s2 ">
            <div class="general">
                <img src= "clothes/white.png" class="im"  >
                <div class="textcontainer" id="white">
                    <h3 onclick="addToCart('white', 'clothes/white.png', document.getElementById('whiteQuantity').value)">White Shirt</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('white', 'clothes/white.png', document.getElementById('whiteQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('white', 'clothes/white.png', document.getElementById('whiteQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="whiteQuantity" value="1" min="1">
                    </div>
                    <h4><br>$8.99</h4>
                </div>
                
            </div>

            <div class="general">
                <img src= "clothes/black.png" class="im">
                <div class="textcontainer" id="black">
                    <h3 onclick="addToCart('black', 'clothes/black.png', document.getElementById('blackQuantity').value)">Black Shirt</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('black', 'clothes/black.png', document.getElementById('blackQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('black', 'clothes/black.png', document.getElementById('blackQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="blackQuantity" value="1" min="1">
                    </div>
                    <h4><br>$4.98</h4>
                </div>
            </div>
        </div>

        <footer class="copy" id="footer">
        <p>&copy;  DBMS Project Fall 2023.
        <br>
        This is an intellectual property of Abdullah Waqar and Waqar Ahmed.
        <br>
        All rights reserved.  </p>
    </footer>

    <style>
        .cc 
        {
            display: flex;
            
        }
        .fa-cart-shopping
        {
            margin-top: 10px;
        }


        /* line114 to 124 removes the arrows on the in side of 
        quntity box*/

        .quantity::-webkit-inner-spin-button,
        .quantity::-webkit-outer-spin-button 
        {
            -webkit-appearance: none;
            margin: 0;
        }

        .quantity 
        {
            -moz-appearance: textfield;
        }

        .quantity 
        {
            margin-top: 30px;
            font-size: 20px;
            color: #2F4550;
            font-weight: bolder;
            text-align: center;
            border: none;
            outline: none;
            background-color: #8490dd;
            height: 40px;
            width: 70px;
            transition: 0.3s ease;
            -moz-appearance: textfield;
        }
        .quantity:hover
        {
            background-color: #face4a;
            transition: 0.3s ease;
        }
        .quantity:focus
        {
            background-color: #FFC107;
        }


        /*Quan and qtext are the div containing quantity box
        and the "quantity" text */
        .quan
        {
            display: flex;
        }
        .qtext
        {
            margin-top: 35px;
            font-size: 30px;
        }



        h5
        {
            margin-top: 10px;
            margin-right: 10px;
        }
        .price 
        {
            display: flex;
            justify-content: space-around;
            font-size: 27px;
            text-align: center;
            margin-top: -10px; /* Adjust the margin as needed */
        }
           
    </style>
    <script src="categoryCss/nclothes.js"></script>
</body>
</html>

