<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COSMOS-FOOD</title>
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
        <h1>FOOD</h1>
        <hr>

        <div class="f2 " >
            <div class="general" id="general">
                <img src="food/burger.png" class="im" >
                <div class="textcontainer" id="burger">
                    <h3 onclick="addToCart('burger', 'food/burger.png', document.getElementById('burgerQuantity').value)">Chicken Burger</h3>
                    <div class="cc">
                        <h5 onclick="addToCart('burger', 'food/burger.png', document.getElementById('burgerQuantity').value)">Add to Cart</h5>
                        <i class="fa-solid fa-cart-shopping" onclick="addToCart('burger', 'food/burger.png', document.getElementById('burgerQuantity').value)"></i>
                    </div>
            </div>
            <div class="price">
                <div class="quan">
                    <h5 class="qtext">Quantity: </h5>
                    <input type="number" class="quantity" id="burgerQuantity" value="1" min="1">
                </div>
                    <h4><br>$4.99</h4>
                </div>
            </div>
            

            <div class="general">
                <img src= "food/chick.png" class="im">
                <div class="textcontainer" id="chick" >
                    <h3 onclick="addToCart('chick', 'food/chick.png', document.getElementById('chickQuantity').value)">Fried Chicken</h3>
                    <div class="cc">
                            <h5 onclick="addToCart('chick', 'food/chick.png', document.getElementById('chickQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('chick', 'food/chick.png', document.getElementById('chickQuantity').value)"></i>
                    </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="chickQuantity" value="1" min="1">
                    </div>
                    <h4><br>$3.49</h4>
                </div>
            </div>
        </div>

        <br>
        <hr>

        <div class="s2 ">
            <div class="general">
                <img src= "food/fries.png" class="im"  >
                <div class="textcontainer" id="fries">
                    <h3 onclick="addToCart('fries', 'food/fries.png', document.getElementById('friesQuantity').value)">Fresh Fries</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('fries', 'food/fries.png', document.getElementById('friesQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('fries', 'food/fries.png', document.getElementById('friesQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="friesQuantity" value="1" min="1">
                    </div>
                    <h4><br>$2.99</h4>
                </div>
                
            </div>

            <div class="general">
                <img src= "food/wrap.png" class="im">
                <div class="textcontainer" id="wrap">
                    <h3 onclick="addToCart('wrap', 'food/wrap.png', document.getElementById('wrapQuantity').value)">Shwarma Wrap</h3>
                        <div class="cc">
                            <h5 onclick="addToCart('wrap', 'food/wrap.png', document.getElementById('wrapQuantity').value)">Add to Cart</h5>
                            <i class="fa-solid fa-cart-shopping" onclick="addToCart('wrap', 'food/wrap.png', document.getElementById('wrapQuantity').value)"></i>
                        </div>
                </div>
                <div class="price">
                    <div class="quan">
                        <h5 class="qtext">Quantity: </h5>
                        <input type="number" class="quantity" id="wrapQuantity" value="1" min="1">
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
    <script src="categoryCss/food.js"></script>
</body>
</html>







